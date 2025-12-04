# 📝 Content Population Guide - Yeti Routes

## Overview

This guide will help you populate your website with trek routes, blog posts, and other content through the admin panel.

---

## 🚀 Quick Start

### 1. Access Admin Panel

**URL**: `/admin`
**Default Credentials** (if using sample data):
- Email: `admin@yetiroutes.com`
- Password: `admin123` (⚠️ Change this immediately!)

---

## 🏔️ Adding Trek Routes

### Step 1: Navigate to Routes
1. Go to `/admin/routes`
2. Click "Add New Route"

### Step 2: Fill in Route Details

#### **Basic Information**
- **Title**: Full trek name (e.g., "Everest Base Camp Trek")
- **Location**: Select from dropdown (Everest, Annapurna, Langtang, etc.)
- **Difficulty**: Easy | Moderate | Challenging | Extreme
- **Duration**: Number of days (e.g., 14)
- **Max Altitude**: In meters (e.g., 5364 for EBC)
- **Base Price**: In USD (e.g., 1299.00)

#### **Descriptions**
- **Short Description** (160-200 characters):
  ```
  Experience the journey of a lifetime to the base of the world's highest mountain. 14-day adventure through stunning Sherpa villages and breathtaking Himalayan scenery.
  ```

- **Full Description** (500-1000 words):
  Include: Overview, What makes it special, Who it's for, What to expect

#### **Highlights** (One per line)
```
Reach Everest Base Camp at 5,364m
Visit the famous Tengboche Monastery
Experience authentic Sherpa culture in Namche Bazaar
Witness stunning sunrise from Kala Patthar
Trek through Sagarmatha National Park
```

#### **Inclusions** (One per line)
```
All airport transfers
14 nights accommodation (teahouses)
All meals during trek (breakfast, lunch, dinner)
Experienced English-speaking guide
Porter service (1 porter for 2 trekkers)
All necessary permits and fees
First aid kit and oxygen cylinder
```

#### **Exclusions** (One per line)
```
International flights
Nepal visa fees ($50 for 30 days)
Travel insurance
Personal expenses and tips
Additional porters
Alcoholic beverages
Hot showers and WiFi charges
```

#### **Settings**
- ✅ **Featured Route**: Check if you want it on the homepage
- ✅ **Active**: Check to make it visible on the website

### Step 3: Add Itinerary (After Creating Route)
1. Click "Manage Itinerary" link after saving the route
2. Add day-by-day breakdown:

**Example Itinerary Day:**
```
Day: 1
Title: Arrival in Kathmandu
Description: Upon arrival at Tribhuvan International Airport, our representative will meet you and transfer you to your hotel in Thamel. Evening briefing about the trek. Overnight in Kathmandu.
Altitude: 1400m
Accommodation: Hotel
```

---

## 📝 Creating Blog Posts

### Step 1: Navigate to Blog
1. Go to `/admin/blog`
2. Click "Create New Post"

### Step 2: Write Your Post

#### **Post Title**
Examples:
- "10 Essential Tips for First-Time Everest Base Camp Trekkers"
- "What to Pack for Annapurna Circuit: Complete Gear List"
- "Altitude Sickness: Prevention and Treatment Guide"

#### **Excerpt** (160 characters recommended)
```
Planning your first EBC trek? Here are 10 essential tips to ensure you're fully prepared for this once-in-a-lifetime adventure in the Himalayas.
```

#### **Content** (HTML Supported)
Use proper heading structure for auto-generated Table of Contents:

```html
<h2>1. Train for High Altitude</h2>
<p>Paragraph content here...</p>

<h2>2. Get the Right Gear</h2>
<h3>Footwear</h3>
<p>Details about boots...</p>

<h3>Clothing Layers</h3>
<ul>
    <li>Base layer</li>
    <li>Mid layer</li>
    <li>Outer shell</li>
</ul>

<blockquote>
"The mountains are calling and I must go." - John Muir
</blockquote>
```

#### **Category**
Select from:
- Trekking Guides
- Trip Reports
- Travel Tips
- Culture & People
- Gear Reviews

#### **Tags** (Comma-separated)
```
everest, trekking, tips, preparation, nepal
```

#### **Featured Image**
- Recommended size: 1200x630px
- Format: JPG or PNG
- Max size: 2MB
- Choose a high-quality, relevant image

#### **Read Time**
Leave blank to auto-calculate (based on 200 words/minute)

---

## 📊 Sample Content Templates

### Trek Route Template

```
TITLE: Annapurna Base Camp Trek

SHORT DESCRIPTION:
Journey to the sanctuary of Annapurna, surrounded by towering peaks. 10-day moderate trek offering spectacular mountain views and cultural immersion.

FULL DESCRIPTION:
The Annapurna Base Camp Trek is one of Nepal's most popular treks, offering a perfect blend of natural beauty and cultural richness. This 10-day adventure takes you deep into the Annapurna Sanctuary, a high glacial basin lying forty kilometers directly north of Pokhara.

The trek begins in the lakeside city of Pokhara and winds through lush rhododendron forests, charming Gurung villages, and terraced farmlands. As you gain altitude, the landscape transforms dramatically, revealing breathtaking views of Annapurna I (8,091m), Machapuchare (6,993m), and other magnificent peaks.

What sets this trek apart is its accessibility and moderate difficulty level, making it suitable for trekkers with a good fitness level but limited high-altitude experience. The well-established teahouse trail provides comfortable accommodation and the opportunity to interact with local communities.

Best Time to Trek: March-May, September-November
Difficulty: Moderate
Max Altitude: 4,130m
Duration: 10 days

HIGHLIGHTS:
360-degree panoramic views of Annapurna massif
Natural hot springs at Jhinu Danda
Traditional Gurung villages and culture
Diverse landscape from subtropical to alpine
Modi Khola river valley trek
Machapuchare Base Camp
Poon Hill sunrise (optional)

INCLUSIONS:
All ground transportation (Kathmandu-Pokhara-Kathmandu)
10 nights teahouse accommodation
All meals during trek
Experienced English-speaking guide
Porter service
TIMS card and Annapurna Conservation Area Permit
First aid kit

EXCLUSIONS:
International airfare
Nepal visa ($50)
Meals in Kathmandu and Pokhara
Travel insurance
Tips for guide and porter
Personal expenses
```

### Blog Post Template

```
TITLE: How to Prepare for Everest Base Camp Trek: 3-Month Training Plan

EXCERPT:
Preparing physically and mentally for EBC trek is crucial for success. This comprehensive 3-month training plan will get you ready for the challenge of a lifetime.

CATEGORY: Trekking Guides

TAGS: everest base camp, training, preparation, fitness, hiking

CONTENT:

<h2>Introduction</h2>
<p>Trekking to Everest Base Camp is a bucket-list adventure that requires serious physical preparation. While the trek doesn't require technical mountaineering skills, the combination of high altitude and daily 5-7 hour hikes demands excellent cardiovascular fitness and mental resilience.</p>

<p>This guide provides a structured 3-month training plan to ensure you're fully prepared for the challenge ahead.</p>

<h2>Month 1: Building Base Fitness</h2>

<h3>Cardiovascular Training (4-5 times per week)</h3>
<ul>
    <li><strong>Week 1-2:</strong> 30-minute sessions of jogging, cycling, or swimming</li>
    <li><strong>Week 3-4:</strong> Increase to 45-minute sessions, add intervals</li>
</ul>

<h3>Strength Training (2-3 times per week)</h3>
<ul>
    <li>Squats and lunges for leg strength</li>
    <li>Core exercises (planks, Russian twists)</li>
    <li>Upper body for carrying backpack</li>
</ul>

<h2>Month 2: Increasing Intensity</h2>
<p>Continue content...</p>

<h2>Conclusion</h2>
<p>Following this 3-month plan will significantly improve your chances of successfully completing the Everest Base Camp trek. Remember, proper preparation is the key to enjoying this incredible journey.</p>

<blockquote>
"It's not the mountain we conquer, but ourselves." - Sir Edmund Hillary
</blockquote>
```

---

## 🗄️ Sample Data SQL

For quick content population, use the `sample-trek-data.sql` file in the root directory:

```bash
# Import sample data
mysql -u your_username -p your_database < sample-trek-data.sql
```

This includes:
- 5 sample trek routes (Everest, Annapurna, Langtang, Manaslu, Mustang)
- Complete itineraries for each trek
- 3 sample blog posts
- Location data
- Sample user account

---

## 📸 Image Guidelines

### Trek Featured Images
- **Size**: 1200x800px
- **Format**: JPG (optimized)
- **Content**: Hero shot of the trek destination
- **Location**: Upload to `/uploads/treks/`

### Blog Featured Images
- **Size**: 1200x630px (optimized for social sharing)
- **Format**: JPG or PNG
- **Style**: High-quality, relevant to content
- **Location**: Upload to `/uploads/blog/`

### Image Optimization Tips:
- Use tools like TinyPNG or ImageOptim
- Target file size: < 300KB
- Always add descriptive alt text

---

## ✅ Content Quality Checklist

### For Trek Routes:
- [ ] Compelling title and description
- [ ] Accurate difficulty and duration
- [ ] Complete itinerary (all days)
- [ ] Clear inclusions/exclusions
- [ ] High-quality featured image
- [ ] SEO meta title and description
- [ ] Marked as "Active"
- [ ] Featured (if it's a top trek)

### For Blog Posts:
- [ ] Engaging headline (50-60 characters)
- [ ] SEO-optimized excerpt
- [ ] Proper heading structure (H2, H3)
- [ ] Min 800 words (for guides)
- [ ] Featured image (1200x630px)
- [ ] Relevant category and tags
- [ ] Internal links to related content
- [ ] Proofread for grammar/spelling

---

## 🚀 Quick Content Schedule

### Week 1: Core Treks (Priority 1)
- [ ] Everest Base Camp Trek
- [ ] Annapurna Base Camp Trek
- [ ] Langtang Valley Trek

### Week 2: Popular Treks (Priority 2)
- [ ] Annapurna Circuit
- [ ] Manaslu Circuit
- [ ] Ghorepani Poon Hill

### Week 3: Blog Content
- [ ] 5 trekking guide articles
- [ ] 3 trip reports
- [ ] 2 gear review posts

### Week 4: Additional Content
- [ ] Luxury/premium treks
- [ ] Short treks (3-5 days)
- [ ] Cultural articles

---

## 💡 SEO Best Practices

### For Treks:
- **Meta Title**: `[Trek Name] - [Duration] Days | Yeti Routes Nepal`
  - Example: `Everest Base Camp Trek - 14 Days | Yeti Routes Nepal`

- **Meta Description**: `[Engaging description with keyword, 155-160 characters]`
  - Example: `Experience the iconic Everest Base Camp trek with expert guides. 14-day adventure through Sherpa villages to the base of the world's highest peak.`

### For Blog:
- Include primary keyword in title
- Use keyword in first paragraph
- Add internal links to relevant treks
- Include clear call-to-action (CTA)

---

## 📞 Need Help?

If you encounter any issues while populating content:

1. **Check the documentation** in the main README
2. **Review example content** in `sample-trek-data.sql`
3. **Test on staging** before publishing

---

## 🎯 Next Steps After Content Population

1. **Test all pages** - Click through every trek and blog post
2. **Check mobile responsiveness**
3. **Verify SEO tags** (use tools like Screaming Frog)
4. **Set up Google Analytics**
5. **Submit sitemap** to Google Search Console
6. **Create social media posts** for new content
7. **Set up email marketing** (newsletter)

---

**Ready to start?** Head to `/admin` and begin adding your first trek! 🏔️
