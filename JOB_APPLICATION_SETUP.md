# Job Application Email System - Setup Complete

## Overview
The job application system has been successfully implemented. When users apply for positions on the career page (Karir.tsx), their applications are now sent to **hr.kisantra@gmail.com** with proper headers, body, and resume attachments.

## What Was Implemented

### 1. Frontend Changes (Karir.tsx)
- **Application Form Modal**: Added a comprehensive job application form with the following fields:
  - Full Name (required)
  - Email Address (required)
  - Phone Number (required)
  - Resume/CV upload (PDF, DOC, DOCX - Max 5MB) (required)
  - Cover Letter (required)
- **Form Validation**: Client-side validation for all required fields
- **Submit Handling**: Sends application data to Laravel backend via POST request
- **User Feedback**: Success/error messages after submission
- **File Upload**: Supports resume/CV attachment

Location: `resources/js/Pages/Karir.tsx`

### 2. Backend Controller
Created `JobApplicationController.php` to handle job application submissions:
- Validates incoming data
- Stores resume file in `storage/app/public/resumes/`
- Sends email to hr.kisantra@gmail.com
- Returns JSON response to frontend

Location: `app/Http/Controllers/JobApplicationController.php`

### 3. Email Template
Created two files for email functionality:

**Mailable Class**: `app/Mail/JobApplicationMail.php`
- Handles email structure
- Attaches resume/CV to email
- Sets proper subject line: "New Job Application: [Job Title] - [Applicant Name]"
- Sets reply-to as applicant's email

**Email View**: `resources/views/emails/job-application-recruitment.blade.php`
- Professional HTML email template
- Displays all applicant information:
  - Contact details (name, email, phone)
  - Position applied for
  - Full cover letter
  - Resume attachment notice
- Mobile-responsive design
- Branded with Kisantra colors and styling

### 4. Routing
Added route to handle job applications:
```php
Route::post('/api/apply-job', [JobApplicationController::class, 'store'])->name('job.apply');
```

Location: `routes/web.php`

### 5. CSRF Protection
Added CSRF token meta tag to the main layout for secure form submissions.

Location: `resources/views/app.blade.php`

## Email Configuration Required

To make the email system work, you need to configure your `.env` file with proper mail settings:

### Option 1: Using Gmail (for testing)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Kisantra Recruitment"
```

### Option 2: Using Mailtrap (for development testing)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hr.kisantra@gmail.com
MAIL_FROM_NAME="Kisantra Recruitment"
```

### Option 3: Using Production SMTP (recommended for production)
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host.com
MAIL_PORT=587
MAIL_USERNAME=hr.kisantra@gmail.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hr.kisantra@gmail.com
MAIL_FROM_NAME="Kisantra Recruitment"
```

## Storage Setup

Make sure the storage is linked properly:

```bash
php artisan storage:link
```

This creates a symbolic link from `public/storage` to `storage/app/public` so uploaded resumes are accessible.

## How It Works

1. **User clicks "Apply for Position"** on a job listing
2. **Application form modal opens** with required fields
3. **User fills out the form** and uploads their resume
4. **Form is submitted** to `/api/apply-job` endpoint
5. **Backend validates** all data and file upload
6. **Resume is stored** in `storage/app/public/resumes/`
7. **Email is sent** to hr.kisantra@gmail.com with:
   - Subject: "New Job Application: [Job Title] - [Applicant Name]"
   - Body: Professional HTML template with all applicant details
   - Attachment: Resume/CV file
   - Reply-To: Applicant's email address
8. **User receives confirmation** message

## Email Details

### Subject Line Format
```
New Job Application: [Job Title] - [Applicant Name]
```
Example: "New Job Application: Senior Tax Consultant - John Doe"

### Email Contains
- Applicant's full name
- Contact information (email and phone)
- Position applied for
- Job ID reference
- Complete cover letter
- Resume attached as PDF/DOC/DOCX

### Reply-To Feature
When HR team clicks "Reply" in their email client, it automatically addresses the response to the applicant's email address.

## Testing

To test the system:

1. Configure your `.env` mail settings (use Mailtrap for safe testing)
2. Run `php artisan config:clear` to clear config cache
3. Navigate to the Karir page
4. Click on any job listing
5. Click "Apply for Position"
6. Fill out the form completely
7. Submit the application
8. Check the configured email inbox for the application

## File Locations Summary

```
Frontend:
└── resources/js/Pages/Karir.tsx (Updated)

Backend:
├── app/Http/Controllers/JobApplicationController.php (New)
├── app/Mail/JobApplicationMail.php (New)
└── resources/views/emails/job-application-recruitment.blade.php (New)

Routes:
└── routes/web.php (Updated)

Layout:
└── resources/views/app.blade.php (Updated - added CSRF token)
```

## Security Features

- CSRF token protection on form submission
- Server-side validation of all inputs
- File type validation (only PDF, DOC, DOCX allowed)
- File size limit (5MB maximum)
- Sanitized email content
- Secure file storage

## Next Steps

1. Configure `.env` with proper mail credentials
2. Run `php artisan storage:link`
3. Run `php artisan config:clear`
4. Test the application flow
5. Update company address and contact info in the email template if needed
6. Consider adding email notifications to applicants as well (confirmation email)

## Support

If you encounter any issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Verify mail configuration in `.env`
3. Test mail configuration: `php artisan tinker` then `Mail::raw('Test', function($msg) { $msg->to('test@example.com'); });`
4. Check storage permissions for resume uploads
