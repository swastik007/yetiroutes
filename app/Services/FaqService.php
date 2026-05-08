<?php

namespace App\Services;

/**
 * FAQ Service - Generate SEO-optimized FAQs for treks
 * Targets Google's "People Also Ask" featured snippets
 */
class FaqService
{
    /**
     * Generate trek-specific FAQs
     * These target common search queries and featured snippets
     *
     * @param object $route Trek/tour data
     * @return array Array of FAQ items with questions and answers
     */
    public function getTrekFaqs(object $route): array
    {
        $faqs = [];
        $isTrek = in_array($route->route_type ?? '', ['trek', 'expedition']);
        $title = $route->title ?? 'this trek';
        $days = $route->duration_days ?? 0;
        $difficulty = ucfirst($route->difficulty ?? 'moderate');
        $maxAltitude = isset($route->max_altitude_meters) ? number_format($route->max_altitude_meters) : null;
        $basePrice = isset($route->base_price) ? '$' . number_format($route->base_price) : null;

        // FAQ 1: Difficulty
        $difficultyAnswer = $this->getDifficultyAnswer($route->difficulty ?? 'moderate', $days);
        $faqs[] = [
            'question' => "How difficult is the $title?",
            'answer' => $difficultyAnswer
        ];

        // FAQ 2: Best time to visit
        $bestSeason = $route->best_season ?? 'Spring (March-May) and Autumn (September-November)';
        $faqs[] = [
            'question' => "What is the best time to do the $title?",
            'answer' => "The best time for the $title is during $bestSeason when the weather is clear, stable, and ideal for trekking. These months offer the best visibility of mountain peaks, comfortable temperatures, and dry trails. Avoid monsoon season (June-August) due to heavy rainfall and limited mountain views."
        ];

        // FAQ 3: Experience required
        $experienceAnswer = $this->getExperienceAnswer($route->difficulty ?? 'moderate', $isTrek);
        $faqs[] = [
            'question' => "Do I need previous trekking experience for the $title?",
            'answer' => $experienceAnswer
        ];

        // FAQ 4: Fitness requirements
        $faqs[] = [
            'question' => "What fitness level is required for the $title?",
            'answer' => "For the $title, you should be in good physical condition and able to walk 5-7 hours per day for consecutive days. Regular cardio exercise (running, cycling, swimming) for 2-3 months before the trek is recommended. No technical climbing skills are needed, but strong cardiovascular fitness and mental preparation are essential."
        ];

        // FAQ 5: Altitude sickness (if high altitude)
        if ($isTrek && $maxAltitude && $route->max_altitude_meters > 3000) {
            $faqs[] = [
                'question' => "Is there a risk of altitude sickness on the $title?",
                'answer' => "Yes, altitude sickness can occur on the $title as you'll reach a maximum altitude of $maxAltitude meters. We build in acclimatization days to help your body adjust. Symptoms include headache, nausea, and fatigue. Our experienced guides monitor your health daily, and we descend immediately if serious symptoms appear. Proper hydration, slow ascent, and listening to your body are key."
            ];
        }

        // FAQ 6: Accommodation
        $accommodationType = $isTrek ? 'teahouses and lodges' : 'hotels and guesthouses';
        $faqs[] = [
            'question' => "What type of accommodation is provided on the $title?",
            'answer' => "On the $title, you'll stay in comfortable $accommodationType. Accommodations are simple but clean, typically offering twin-sharing rooms with basic amenities. In higher altitudes, facilities become more basic. Sleeping bags are recommended for warmth. Solo travelers may need to pay a single supplement for private rooms."
        ];

        // FAQ 7: Meals
        $faqs[] = [
            'question' => "What meals are included in the $title?",
            'answer' => "The $title package typically includes breakfast, lunch, and dinner during the trekking days. You'll enjoy a mix of Nepali dal bhat (rice and lentils), international dishes (pasta, pizza, soups), and local specialties. Teahouse menus offer variety, and vegetarian options are widely available. Drinks (tea, coffee, soft drinks) are available but usually cost extra."
        ];

        // FAQ 8: Cost breakdown
        if ($basePrice) {
            $faqs[] = [
                'question' => "How much does the $title cost?",
                'answer' => "The $title starts from $basePrice per person. This typically includes permits, guide and porter services, accommodation, meals during the trek, and ground transportation. Additional costs include international flights, Nepal visa, travel insurance, personal gear, drinks, snacks, tips, and emergency evacuation insurance. We offer transparent pricing with no hidden fees."
            ];
        }

        // FAQ 9: Permits required
        $faqs[] = [
            'question' => "What permits are required for the $title?",
            'answer' => "For the $title, you'll need specific permits depending on the region. Common permits include TIMS (Trekkers' Information Management System) card and national park entry permits. We handle all permit arrangements for you. Just provide us with passport photos and copies in advance. Permit costs are typically included in the package price."
        ];

        // FAQ 10: Group size
        $faqs[] = [
            'question' => "What is the group size for the $title?",
            'answer' => "We maintain small group sizes for the $title, typically 2-12 people maximum. This ensures personalized attention, better safety, and a more intimate experience. We also offer private treks for solo travelers, couples, or families who prefer a customized itinerary. Solo travelers can join group departures at no extra cost."
        ];

        // FAQ 11: Cancellation policy
        $faqs[] = [
            'question' => "What is the cancellation policy for the $title?",
            'answer' => "For the $title, we offer flexible cancellation terms. Free cancellation is available up to 30 days before departure with full refund. Cancellations 15-29 days before incur a 25% fee. Cancellations within 14 days are non-refundable unless rescheduled. We strongly recommend comprehensive travel insurance that covers trip cancellation and interruption."
        ];

        // FAQ 12: Porters
        if ($isTrek) {
            $faqs[] = [
                'question' => "Do I need a porter for the $title?",
                'answer' => "While not mandatory, we highly recommend hiring a porter for the $title. Porters carry your main backpack (up to 10-12kg), allowing you to trek with just a light daypack. This significantly improves your trekking experience, reduces fatigue, and helps you enjoy the scenery. Porter costs are typically $15-20 per day and support local communities."
            ];
        }

        return $faqs;
    }

    /**
     * Get difficulty-specific answer
     */
    private function getDifficultyAnswer(string $difficulty, int $days): string
    {
        return match(strtolower($difficulty)) {
            'easy' => "This trek is considered Easy, making it suitable for beginners and families. You'll trek 3-5 hours per day on well-maintained trails with gentle elevation gains. Basic fitness is sufficient. This is a great introduction to Himalayan trekking without the challenges of high altitude or technical terrain.",

            'moderate' => "This trek is rated Moderate, requiring good physical fitness and some trekking experience. Expect to walk 5-7 hours daily over $days days with elevation gains between 400-800 meters per day. You should be comfortable with uphill and downhill hiking. Regular exercise for 2-3 months before departure is recommended.",

            'challenging', 'difficult' => "This trek is Challenging and demands excellent physical fitness and previous trekking experience. Daily trekking lasts 6-8 hours with significant elevation gains (800-1200m per day). You'll face steep ascents, rocky terrain, and high altitude. Intensive training for 3-4 months prior is essential. Mental toughness and determination are equally important.",

            'strenuous', 'extreme' => "This trek is Strenuous and only suitable for experienced trekkers in peak physical condition. Expect 7-9 hours of daily trekking over challenging terrain at high altitude. You'll need previous high-altitude experience, advanced fitness training, and strong mental resilience. This is an expedition-level trek requiring serious preparation.",

            default => "This trek is rated $difficulty, requiring appropriate fitness and preparation. Daily trekking hours vary, and you'll encounter a mix of terrain types. We recommend consulting with our team to ensure this trek matches your experience level and fitness."
        };
    }

    /**
     * Get experience requirement answer
     */
    private function getExperienceAnswer(string $difficulty, bool $isTrek): string
    {
        $activityType = $isTrek ? 'trekking' : 'touring';

        return match(strtolower($difficulty)) {
            'easy' => "No previous $activityType experience is required. This is perfect for first-timers! Our experienced guides will provide all necessary instruction and support. As long as you're in reasonable health and enjoy walking, you'll have a great experience.",

            'moderate' => "Some hiking or trekking experience is beneficial but not mandatory. If you're new to trekking, ensure you're physically fit and have done multi-day hikes at lower altitudes. Our guides will support you throughout, but mental preparation for consecutive days of trekking is important.",

            'challenging', 'difficult' => "Previous trekking experience at altitude (above 3000m) is highly recommended. You should have completed at least 2-3 multi-day treks and be familiar with altitude effects. Experience with long trekking days (6+ hours) and basic camping/teahouse trekking is expected.",

            'strenuous', 'extreme' => "Extensive high-altitude trekking experience is essential. You must have successfully completed treks above 4000m, understand altitude acclimatization, and be confident in challenging mountain terrain. This is not suitable for beginners under any circumstances.",

            default => "The experience requirements vary based on your fitness and determination. Contact us to discuss whether this trek matches your background and abilities. We'll provide honest guidance to ensure your safety and enjoyment."
        };
    }

    /**
     * Generate region-specific FAQs
     */
    public function getRegionFaqs(string $region): array
    {
        $regionName = ucfirst($region);

        return [
            [
                'question' => "What makes the $regionName region special for trekking?",
                'answer' => "The $regionName region is renowned for its unique combination of stunning mountain scenery, rich cultural heritage, and diverse trekking routes suitable for all experience levels."
            ],
            [
                'question' => "How do I get to the $regionName region?",
                'answer' => "Most $regionName treks start with a scenic drive or flight from Kathmandu. The journey itself is part of the adventure, offering glimpses of rural Nepal and approaching mountain vistas."
            ],
            [
                'question' => "What is the best season for $regionName treks?",
                'answer' => "The $regionName region is best visited during Spring (March-May) for rhododendron blooms and clear skies, or Autumn (September-November) for the most stable weather and best mountain views."
            ]
        ];
    }

    /**
     * Generate activity-specific FAQs
     * For activities like paragliding, climbing, rafting, bungee jumping, etc.
     *
     * @param object $activity Activity data
     * @return array Array of FAQ items with questions and answers
     */
    public function getActivityFaqs(object $activity): array
    {
        $faqs = [];
        $title = $activity->title ?? 'this activity';
        $difficulty = ucfirst($activity->difficulty ?? 'moderate');
        $location = $activity->location ?? 'Nepal';
        $bestSeason = $activity->best_season ?? 'Throughout the year';

        // FAQ 1: What is the activity about?
        $description = $activity->short_description ?? $activity->full_description ?? '';
        if ($description) {
            $cleanDesc = strip_tags(substr($description, 0, 200));
            $faqs[] = [
                'question' => "What is $title?",
                'answer' => "$cleanDesc This activity offers an exciting way to experience Nepal's natural beauty and adventure opportunities. Perfect for thrill-seekers and those looking to add excitement to their Nepal trip."
            ];
        }

        // FAQ 2: Experience required
        $experienceAnswer = $this->getActivityExperienceAnswer($difficulty);
        $faqs[] = [
            'question' => "Do I need previous experience for $title?",
            'answer' => $experienceAnswer
        ];

        // FAQ 3: Safety
        $faqs[] = [
            'question' => "Is $title safe?",
            'answer' => "$title is conducted with the highest safety standards. All equipment is regularly inspected and maintained, our instructors are internationally certified, and comprehensive safety briefings are provided before the activity. We use quality gear, follow strict safety protocols, and have emergency procedures in place. Thousands of people safely enjoy this activity every year."
        ];

        // FAQ 4: Best time
        $faqs[] = [
            'question' => "When is the best time for $title?",
            'answer' => "The best time for $title is $bestSeason. Weather conditions during this period provide optimal visibility, comfortable temperatures, and the best overall experience. However, availability and conditions may vary, so we recommend checking with us for specific dates."
        ];

        // FAQ 5: What's included
        $faqs[] = [
            'question' => "What is included in the $title package?",
            'answer' => "The $title package typically includes all necessary equipment, safety gear, experienced guide/instructor, transportation to and from the activity site, safety briefing, and insurance coverage during the activity. Photos and videos may be available at additional cost. Detailed inclusions will be provided upon booking."
        ];

        // FAQ 6: Age and fitness requirements
        $faqs[] = [
            'question' => "What are the age and fitness requirements for $title?",
            'answer' => "For $title, participants typically must be between 12-65 years old (varies by activity). You should be in good general health without serious medical conditions like heart problems, back issues, or pregnancy. Specific age limits and fitness requirements depend on the nature of the activity. Contact us if you have concerns about eligibility."
        ];

        // FAQ 7: Difficulty level
        $difficultyAnswer = $this->getActivityDifficultyAnswer($difficulty);
        $faqs[] = [
            'question' => "How difficult is $title?",
            'answer' => $difficultyAnswer
        ];

        // FAQ 8: What to bring
        $faqs[] = [
            'question' => "What should I bring for $title?",
            'answer' => "For $title, we recommend bringing: comfortable clothing suitable for outdoor activity, closed-toe sports shoes, sunscreen and sunglasses, water bottle, camera (optional), and any personal medications. We provide all specialized equipment needed. Avoid loose jewelry or accessories. Detailed packing list will be provided after booking."
        ];

        // FAQ 9: Booking and cancellation
        $faqs[] = [
            'question' => "How do I book $title and what is the cancellation policy?",
            'answer' => "You can book $title through our website, email, or phone. Advance booking is recommended, especially during peak season. Cancellations made 48+ hours in advance receive full refund. Cancellations within 48 hours are non-refundable. Weather-related cancellations by us result in full refund or rescheduling. We recommend travel insurance covering activity cancellations."
        ];

        // FAQ 10: Group size
        $faqs[] = [
            'question' => "Can I do $title alone or do I need a group?",
            'answer' => "Both solo travelers and groups are welcome for $title. Solo participants can join scheduled group sessions, which is a great way to meet other travelers. Private sessions for individuals, couples, or groups can be arranged with advance notice. Group discounts may be available for parties of 4 or more."
        ];

        return $faqs;
    }

    /**
     * Get activity-specific experience answer
     */
    private function getActivityExperienceAnswer(string $difficulty): string
    {
        return match(strtolower($difficulty)) {
            'easy' => "No previous experience is required! This activity is designed for beginners and first-timers. Our experienced instructors will provide complete guidance and training before you begin. All you need is enthusiasm and a willingness to try something new.",

            'moderate' => "Basic physical fitness is required, but no specialized experience is necessary. Brief training will be provided by our instructors. If you're moderately active and comfortable with outdoor activities, you'll enjoy this experience. Some activities may require you to be comfortable with heights or water.",

            'challenging', 'difficult' => "Some prior experience or good physical fitness is recommended. While beginners can participate with proper instruction, those with related experience will feel more comfortable. You should be confident in your physical abilities and comfortable with adventurous activities.",

            'strenuous', 'extreme' => "Previous experience is highly recommended for this advanced activity. You should be in excellent physical condition and comfortable with high-adrenaline experiences. This is not suitable for first-timers or those with limited adventure activity experience.",

            default => "The activity is suitable for most people with reasonable fitness. Our team will assess your suitability during the safety briefing. If you have any concerns, please contact us in advance to discuss whether this activity is right for you."
        };
    }

    /**
     * Get activity-specific difficulty answer
     */
    private function getActivityDifficultyAnswer(string $difficulty): string
    {
        return match(strtolower($difficulty)) {
            'easy' => "This activity is rated Easy and suitable for almost everyone, including beginners and families. The pace is relaxed, physical demands are minimal, and full instruction is provided. It's a perfect introduction to adventure activities in Nepal without intense challenges.",

            'moderate' => "This activity is rated Moderate, meaning it requires reasonable fitness and some confidence. While not extremely challenging, you should be comfortable with outdoor activities and potentially some height or speed. Most people in good health can participate and enjoy it.",

            'challenging', 'difficult' => "This activity is rated Challenging and involves significant physical exertion or technical skill. Participants should be fit, confident, and prepared for an intense experience. This is for those seeking a serious adventure challenge and willing to push their limits.",

            'strenuous', 'extreme' => "This activity is rated Extreme and is only for experienced adventurers in peak physical condition. It involves significant risk factors, high speeds, extreme heights, or technical complexity. Participants must sign comprehensive waivers and meet strict eligibility criteria.",

            default => "The difficulty level varies based on individual fitness and experience. Our instructors will ensure the activity is conducted at an appropriate level for your abilities. Safety is always our top priority regardless of difficulty rating."
        };
    }
}
