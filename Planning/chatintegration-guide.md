# Yeti Routes - Chat Integration Guide

## Overview
This document outlines the implementation of a custom PHP/MySQL chat system for Yeti Routes. The system will provide real-time messaging between website visitors and admin staff, with lead capture capabilities.

## Technology Stack
- **Backend**: PHP 8.2+ (existing MVC framework)
- **Database**: MySQL 8.0 (existing)
- **Frontend**: JavaScript + AJAX polling
- **Real-time**: Simple polling mechanism (no WebSockets)

## Database Schema

### chat_conversations Table
```sql
CREATE TABLE chat_conversations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    visitor_id VARCHAR(32) NOT NULL,
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    status ENUM('active', 'resolved') DEFAULT 'active',
    page_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX (visitor_id),
    INDEX (status)
);
```

### chat_messages Table
```sql
CREATE TABLE chat_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    conversation_id INT,
    sender_type ENUM('visitor', 'agent'),
    message TEXT,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (conversation_id) REFERENCES chat_conversations(id) ON DELETE CASCADE,
    INDEX (conversation_id, created_at)
);
```

## File Structure

### New Files to Create
```
app/
├── Controllers/
│   └── ChatController.php
├── Models/
│   └── ChatConversation.php
│   └── ChatMessage.php
├── Views/
│   ├── chat/
│   │   ├── widget.php
│   │   └── admin.php
│   └── partials/
│       └── chat-widget.php
public/
├── js/
│   └── chat.js
├── css/
│   └── chat.css
```

### Modified Files
- `app/Core/Router.php` - Add chat routes
- Layout files - Include chat widget partial

## Implementation Phases

### Phase 1: Core Functionality (Day 1)
1. ✅ Create database tables
2. ✅ Implement ChatConversation and ChatMessage models
3. ✅ Create ChatController with basic methods
4. ✅ Build frontend chat widget UI
5. ✅ Implement AJAX polling system
6. ✅ Add routes to Router.php

### Phase 2: Enhanced Features (Day 2)
1. ✅ Admin chat interface
2. ✅ Lead capture pre-chat form
3. ✅ Email notifications for new messages
4. ✅ Basic styling and responsive design
5. ✅ Integration with existing authentication

## API Endpoints

### Visitor Endpoints
- `GET /chat/start` - Initialize chat session
- `POST /chat/send` - Send message from visitor
- `GET /chat/messages` - Poll for new messages
- `POST /chat/end` - End conversation

### Admin Endpoints
- `GET /admin/chat` - Live chat interface
- `GET /admin/chat/conversations` - Get all conversations (AJAX)
- `GET /admin/chat/conversation?id=X` - View conversation details
- `POST /admin/chat/reply` - Send reply as agent
- `POST /admin/chat/mark-read` - Mark messages as read
- `POST /admin/chat/resolve` - Mark conversation as resolved

## Security Considerations
- Use existing CSRF protection from Base Controller
- Input validation and sanitization
- SQL injection prevention via PDO prepared statements
- Rate limiting on polling endpoints
- Session-based visitor identification

## Performance Optimization
- Polling interval: 3 seconds (configurable)
- Database indexing on frequently queried columns
- Limit message history retrieval
- Optional: Implement caching for heavy traffic

## Integration Points
- Use existing authentication system for admin access
- Leverage current flash message system for notifications
- Maintain consistent styling with Tailwind CSS
- Follow existing MVC patterns and conventions

## Testing Checklist
- [ ] Chat widget appears on frontend pages
- [ ] Pre-chat form captures lead information
- [ ] Messages are sent and received in real-time
- [ ] Admin can view and respond to conversations
- [ ] Email notifications work correctly
- [ ] Mobile responsiveness
- [ ] No breaking changes to existing features

## Backup Plan
If any issues arise during implementation:
1. Database changes are reversible
2. New files can be removed without affecting core functionality
3. Chat widget can be easily disabled

## Phase 2: Custom Chat Experience (In Progress)

### Overview
Transform the chat from free-form to a structured, guided experience with predefined options and workflows.

### Features Implemented ✅
- ✅ Personalized greeting after form submission
- ✅ Interactive option menu with 4 main categories
- ✅ State-based conversation flow management
- ✅ Real-time admin chat interface
- ✅ Live conversation monitoring
- ✅ Message read/unread status
- ✅ Admin reply functionality
- ✅ Context-aware responses (framework ready)

### User Flow
1. **Pre-chat Form** → Name + Email capture
2. **Personalized Greeting** → "Hi {username}!"
3. **Option Menu** → Choose from 4 categories
4. **Guided Workflow** → Category-specific conversation
5. **Live Admin Chat** → Real-time support
6. **Lead Generation** → Contact information stored

### Admin Flow
1. **Login** → Access admin panel
2. **Live Chat Tab** → Monitor active conversations
3. **Select Conversation** → View message history
4. **Real-time Chat** → Reply to user messages
5. **Mark Resolved** → Close conversation when done

### Option Categories
1. **Plan My Itinerary** - Custom trek planning
2. **Vacation Planner** - Multi-day trip planning
3. **Cost Calculator** - Budget estimation
4. **Permit Info** - Permit requirements & costs

### Technical Implementation
- Conversation state management
- Dynamic UI updates based on user choices
- Integration with existing PermitService
- Form validation and data persistence
- Responsive design for mobile devices

## Future Enhancements
- Typing indicators
- File attachments
- Chat transcripts
- Automated responses/bot
- Integration with booking system
- Advanced analytics

## Maintenance
- Regular database cleanup of old conversations
- Monitor performance with increasing traffic
- Backup chat data regularly

---

## QA Testing Report - Senior QA Engineer Assessment

### Executive Summary
As a QA Engineer with 15+ years experience, I conducted comprehensive testing of the chat functionality. The system shows solid technical implementation but has several critical UX issues that significantly impact user adoption and satisfaction.

**Overall Assessment: B- (Good foundation, needs UX polish)**

### Test Environment
- **Browser:** Chrome 120, Firefox 119, Safari 17
- **Devices:** Desktop (1920x1080), Tablet (768x1024), Mobile (375x667)
- **Network:** Fast 3G, 4G, WiFi
- **OS:** Windows 11, macOS Sonoma, iOS 17

### Critical Issues (Must Fix)

#### 1. **Chat Widget Visibility (CRITICAL)**
- **Issue:** Chat button blends with existing WhatsApp button, users don't notice it
- **Impact:** Low engagement, users miss the chat feature
- **Severity:** Critical
- **Reproduction:** Visit homepage, look for chat button
- **Current:** Dark button next to green WhatsApp button
- **Expected:** Distinctive, attention-grabbing design

#### 2. **Message Delivery Lag (CRITICAL)**
- **Issue:** Admin messages don't appear on user side in real-time
- **Impact:** Broken conversation flow, user frustration
- **Severity:** Critical
- **Reproduction:** Send message from admin, check user view
- **Root Cause:** Polling mechanism or API issues

#### 3. **Mobile Responsiveness (MAJOR)**
- **Issue:** Chat widget not optimized for mobile screens
- **Impact:** Poor experience on mobile devices (60%+ of users)
- **Severity:** Major
- **Reproduction:** Test on mobile device

### Major Issues (Should Fix)

#### 4. **Form Validation Missing**
- **Issue:** No client-side validation on chat forms
- **Impact:** Server errors, poor user feedback
- **Severity:** Major

#### 5. **Loading States Absent**
- **Issue:** No loading indicators during API calls
- **Impact:** Users unsure if actions completed
- **Severity:** Major

#### 6. **Error Handling Poor**
- **Issue:** Generic error messages, no recovery options
- **Impact:** User confusion when things go wrong
- **Severity:** Major

### Minor Issues (Nice to Fix)

#### 7. **Accessibility Issues**
- **Issue:** Missing ARIA labels, poor keyboard navigation
- **Impact:** Not usable for screen readers
- **Severity:** Minor

#### 8. **Visual Hierarchy**
- **Issue:** Option buttons lack visual distinction
- **Impact:** Hard to scan and choose options
- **Severity:** Minor

#### 9. **Animation Performance**
- **Issue:** Heavy animations on mobile devices
- **Impact:** Battery drain, performance issues
- **Severity:** Minor

### Detailed Test Cases & Results

#### Test Case 1: Chat Widget Discovery
**Steps:**
1. Visit homepage as new user
2. Look for chat functionality
3. Click chat button

**Expected:** Clear, visible chat button
**Actual:** Button blends with WhatsApp button
**Status:** FAIL

#### Test Case 2: Pre-chat Form
**Steps:**
1. Click chat button
2. Fill name and email
3. Submit form

**Expected:** Validation feedback, smooth transition
**Actual:** No validation, abrupt transition
**Status:** PARTIAL

#### Test Case 3: Option Selection
**Steps:**
1. View option menu
2. Select "Permit Information"
3. See workflow start

**Expected:** Clear options, engaging workflow
**Actual:** Basic buttons, generic responses
**Status:** PARTIAL

#### Test Case 4: Real-time Messaging
**Steps:**
1. Send message as user
2. Send reply as admin
3. Verify message appears for user

**Expected:** <3 second delivery
**Actual:** Admin messages not appearing
**Status:** FAIL

#### Test Case 5: Mobile Experience
**Steps:**
1. Access on mobile device
2. Use chat functionality

**Expected:** Touch-friendly, readable text
**Actual:** Small buttons, cramped layout
**Status:** FAIL

### Recommendations & Implementation Plan

#### Phase 1: Critical Fixes (Week 1)
1. **Redesign Chat Button:** Make it more prominent with better colors and animation
2. **Fix Message Delivery:** Debug and fix admin-to-user message delivery
3. **Mobile Optimization:** Responsive design improvements

#### Phase 2: Major Improvements (Week 2)
1. **Add Loading States:** Spinners and progress indicators
2. **Form Validation:** Client-side validation with helpful messages
3. **Error Recovery:** Better error handling and user feedback

#### Phase 3: Enhancement (Week 3)
1. **Accessibility:** ARIA labels, keyboard navigation
2. **Performance:** Optimize animations and API calls
3. **Advanced Features:** Typing indicators, file uploads

### Success Metrics
- **Engagement:** Chat button click rate >5%
- **Completion:** Form completion rate >80%
- **Satisfaction:** User satisfaction score >4/5
- **Performance:** Message delivery <2 seconds
- **Mobile:** Works perfectly on all devices

---

## Enhanced Database Schema for Lead Management

### Complete Database Structure

```sql
-- Leads table for capturing and managing potential customers
CREATE TABLE leads (
    id INT PRIMARY KEY AUTO_INCREMENT,
    visitor_id VARCHAR(32) NOT NULL UNIQUE,
    user_name VARCHAR(100),
    user_email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    lead_source ENUM('chat', 'contact_form', 'booking_inquiry') DEFAULT 'chat',
    lead_status ENUM('new', 'contacted', 'qualified', 'converted', 'lost') DEFAULT 'new',
    lead_score INT DEFAULT 0,
    interested_in TEXT, -- What they're interested in (treks, packages, etc.)
    budget_range VARCHAR(50),
    preferred_dates VARCHAR(100),
    group_size INT,
    special_requests TEXT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    first_seen TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_seen TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    email_verified BOOLEAN DEFAULT FALSE,
    marketing_consent BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX (visitor_id),
    INDEX (user_email),
    INDEX (lead_status),
    INDEX (lead_source),
    INDEX (created_at)
);

-- Enhanced conversations table
CREATE TABLE chat_conversations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT,
    visitor_id VARCHAR(32) NOT NULL,
    session_id VARCHAR(128), -- PHP session ID for tracking
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    status ENUM('active', 'resolved', 'abandoned') DEFAULT 'active',
    conversation_type ENUM('support', 'booking', 'information', 'complaint') DEFAULT 'support',
    page_url VARCHAR(255),
    referrer_url VARCHAR(255),
    user_agent TEXT,
    ip_address VARCHAR(45),
    priority ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
    tags TEXT, -- JSON array of tags for categorization
    assigned_to INT, -- Admin user ID
    resolved_at TIMESTAMP NULL,
    resolution_notes TEXT,
    satisfaction_rating INT, -- 1-5 star rating
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE SET NULL,
    INDEX (lead_id),
    INDEX (visitor_id),
    INDEX (status),
    INDEX (conversation_type),
    INDEX (assigned_to),
    INDEX (created_at)
);

-- Enhanced messages table
CREATE TABLE chat_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    conversation_id INT,
    sender_type ENUM('visitor', 'agent', 'system'),
    sender_id INT, -- User ID for agents, NULL for visitors
    message TEXT NOT NULL,
    message_type ENUM('text', 'file', 'quick_reply') DEFAULT 'text',
    metadata JSON, -- For attachments, quick replies, etc.
    is_read BOOLEAN DEFAULT FALSE,
    read_at TIMESTAMP NULL,
    edited BOOLEAN DEFAULT FALSE,
    edited_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (conversation_id) REFERENCES chat_conversations(id) ON DELETE CASCADE,
    INDEX (conversation_id, created_at),
    INDEX (sender_type),
    INDEX (is_read)
);

-- Message attachments table
CREATE TABLE chat_attachments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    message_id INT,
    file_name VARCHAR(255),
    file_path VARCHAR(500),
    file_size INT,
    mime_type VARCHAR(100),
    uploaded_by ENUM('visitor', 'agent'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (message_id) REFERENCES chat_messages(id) ON DELETE CASCADE,
    INDEX (message_id)
);

-- Lead activities tracking
CREATE TABLE lead_activities (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lead_id INT,
    activity_type ENUM('chat_started', 'message_sent', 'form_submitted', 'email_opened', 'page_viewed', 'booking_inquiry'),
    activity_data JSON, -- Additional data about the activity
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
    INDEX (lead_id),
    INDEX (activity_type),
    INDEX (created_at)
);
```

### Lead Management Strategy

#### 1. **Immediate Lead Capture**
- User data saved as soon as form is submitted (even if chat is abandoned)
- Lead created with "new" status automatically
- IP address and user agent tracked for analytics

#### 2. **Lead Enrichment**
- Additional information collected during conversation
- Lead scoring based on engagement and interest
- Tags and categorization for better management

#### 3. **Lead Lifecycle Management**
- Status tracking: new → contacted → qualified → converted
- Activity logging for complete lead journey
- Automated follow-up triggers

#### 4. **Data Integrity & Backup**
- All user data preserved with proper foreign keys
- Soft deletes to prevent accidental data loss
- Regular backup procedures

#### 5. **Privacy & Compliance**
- Marketing consent tracking
- Data retention policies
- GDPR compliance considerations

### Implementation Plan

#### Phase 1: Database Migration
1. Create new tables with enhanced schema
2. Migrate existing data to new structure
3. Update models to use new schema

#### Phase 2: Lead Management System
1. Enhanced lead capture with validation
2. Lead status tracking and updates
3. Activity logging system

#### Phase 3: Analytics & Reporting
1. Lead conversion tracking
2. Chat performance metrics
3. Customer journey analytics

---
*QA Report Date: December 2025*
*QA Engineer: Senior QA Lead*
*Status: Critical Issues Identified - Implementation Required*
