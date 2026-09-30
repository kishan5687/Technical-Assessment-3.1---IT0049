# POS Application Upgrade - TFA3

**Student Name:** QUEJADA, RAINA KISHAN S.  
**Section:** TW35  

## Project Overview
This repository contains the extended Point of Sale (POS) system built using **CodeIgniter 4**. This update introduces editable forms, dynamic validation rules, and profile avatar file uploading with automated thumbnail rendering using the CI4 Image Service.

## Live Application URL
* Hosted Version: [(http://rkishan.thsite.top/)]

## Features Implemented
- **Customer Management:** 
  - Add Customer (`/customers/new`) with name and valid email validation.
  - Edit/Update existing customer accounts.
- **User Accounts Management:**
  - Add User (`/users/new`) with a unique username requirement.
  - Edit/Update user records with PNG/JPG file uploads (Max 2MB).
  - Automated image resizing to a display-ready thumbnail.
  - Avatar placeholder fallbacks on the user directory page.

## Installation and Setup Instructions

### 1. Prerequisites
- XAMPP / Wampserver (PHP 8.1+ recommended)
- Composer installed globally

### 2. Database Configuration
1. Open **phpMyAdmin**.
2. Create a new database named `pos_system`.
3. Import the SQL database export file included in this repository root (e.g., `pos_system.sql`).

### 3. Environment Environment Config (`.env`)
1. Rename the `env` file in the root directory to `.env`.
2. Open the file and update your database credentials:
   ```text
   database.default.database = pos_system
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

### 4. Running the Project
1. Open your terminal inside the root project directory.
2. Run the framework development server:
   ```bash
   php spark serve
   ```
3. Open your browser and navigate to: 
        
        new user: (http://localhost:8080/users/new) or 
        new customer (http://localhost:8080/customers/new)
        `http://localhost:8080`.
