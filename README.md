# DHCI - Delhi Health Care Institute

Source code and web portal for Delhi Health Care Institute (DHCI).

## Overview
This is a full-featured educational web application built with **CodeIgniter 4** (PHP MVC framework), featuring a public-facing portal, online student registration and admission management, franchise branch workflows, certificate verification, and an administrative management dashboard.

---

## Key Modules & Architecture

### 1. Frontend Web Portal (`app/Views/web/`)
* **Information & Programs:** About Us, Facilities, Chairman's Message, Courses & Course Details, International Partnerships (Germany Program).
* **Admissions & Registrations:** Online student admission form, prospectus downloads, and application tracking.
* **Verification & Services:** Certificate verification, Student ID Card download, Admit card download.
* **Interaction:** Contact forms, Franchise application system, Chatbot integration, News, Events, and Blogs.

### 2. Administrative Dashboard (`app/Controllers/Admin/`)
* **Student Management:** View, approve, edit, and bulk-import students via CSV.
* **Academic Control:** Course creation, category categorization, session, and batch management.
* **Franchise / Branch Management:** Manage study center applications and approvals.
* **Content Management:** News, events, blogs, gallery images, and student testimonials.
* **Enquiries & Reports:** Course enquiries, admission records, and export to Excel.

### 3. Student / User Portal (`app/Controllers/Admin/UserController.php`)
* Student dashboard, syllabus viewing, and profile details.

---

## Requirements
* **PHP:** Version 8.1 or higher
* **PHP Extensions:** `intl`, `mbstring`, `mysqli`, `gd`, `curl`, `json`
* **Web Server:** Apache (with `mod_rewrite` enabled) or Nginx
* **Database:** MySQL 5.7+ / MariaDB 10.3+

---

## Local Development Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/tanmayverma032/DHCI.git
   cd DHCI
   ```

2. **Configure Environment:**
   Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```
   Open `.env` and set:
   * `CI_ENVIRONMENT = development`
   * `app.baseURL = 'http://localhost:8080/'`
   * Configure your local MySQL database credentials:
     ```ini
     database.default.hostname = localhost
     database.default.database = dhciindia
     database.default.username = root
     database.default.password = 
     ```

3. **Install Dependencies (if needed):**
   Dependencies are pre-bundled in `vendor/`. If required:
   ```bash
   composer install
   ```

4. **Generate Encryption Key:**
   ```bash
   php spark key:generate
   ```

5. **Start the Development Server:**
   ```bash
   php spark serve
   ```
   Open your browser and navigate to `http://localhost:8080`.

---

## Security & Maintenance
* Backdoors and unauthorized scripts have been sanitized.
* Sensitive production database credentials and personal resumes are gitignored to prevent credential and PII leakage.
