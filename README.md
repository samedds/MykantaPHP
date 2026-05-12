# 🛒 HIPI Marketplace / MyKanta System

A full-stack PHP + Bootstrap marketplace and social commerce platform that connects users, shops, and products in a unified ecosystem.

---

## Overview

This project is a web-based marketplace system built using **PHP, Bootstrap, JavaScript, and MySQLi**.  
It supports user accounts, shops, product listings, carts, messaging, and social interaction features.

The system is structured into a **frontend UI layer** and a **backend API/logic layer**.

---

## Key Features

### User System
- User registration and login
- Profile management
- Friend connections
- Activity tracking
- Notifications system

### Marketplace
- Create and manage shops
- Add/edit/delete products
- Product categories and tagging
- Product search and filtering
- Wishlist & likes system

### Cart & Orders
- Add to cart functionality
- Checkout system
- Order placement and processing
- Order history tracking
- PDF receipt generation

### Social Features
- Comments on products and shops
- Messaging system
- Activity feed
- Reviews and interactions

### Business Module
- Business creation and management
- Shop analytics overview
- Product management dashboard
- Subscription features

### Notifications
- Real-time notification system
- Email/FCM support (Firebase integration)
- Badge counters and alerts

### Media Handling
- Image uploads and compression
- Profile picture cropping
- Banner image processing
- GIF creation utilities

## Project Structure
root/
│
├── backend/
│ ├── chat/
│ ├── croppic/
│ ├── gifcreator/
│ ├── jscrollpane/
│ ├── models/
│ ├── push_app/
│ ├── Firebase.php
│ ├── product.php
│ ├── user.php
│ ├── place_order.php
│ ├── login.php
│ ├── checkout_process.php
│ └── ... (core backend logic files)
│
├── css/
├── js/
├── fonts/
├── img/
├── uploads/
│
├── index.php
├── login.php
├── register.php
├── profile.php
├── shopaccount.php
├── product_vis.php
├── categories.php
├── checkout.php
├── about_us.php
├── contact_us.php
├── community.php
│
│
├── .htaccess
├── FCMPlugin.js
└── README.md

## Tech Stack

### Frontend
- HTML5
- CSS3 (Bootstrap)
- JavaScript / jQuery
- AJAX

### Backend
- PHP (Core PHP / procedural + modular structure)
- MySQLi Database
- Firebase Cloud Messaging (FCM)

### UI & Utilities
- Bootstrap 5
- Croppic image cropper
- GIF generator tools
- Custom PHP utilities

## Installation

### 1. Clone Project
```bash
git clone https://github.com/samedds/MykantaPHP.git
