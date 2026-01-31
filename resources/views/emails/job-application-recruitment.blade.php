<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Application - {{ $jobTitle }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #111827;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header-badge {
            display: inline-block;
            background-color: #0f766e;
            color: #ffffff;
            padding: 6px 14px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 4px;
            margin-bottom: 12px;
        }
        .header h1 {
            margin: 10px 0;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .content {
            padding: 30px;
        }
        .applicant-box {
            background-color: #f9fafb;
            border-left: 4px solid #0f766e;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 4px;
        }
        .applicant-box h2 {
            margin: 0 0 8px 0;
            font-size: 20px;
            color: #111827;
        }
        .applicant-box p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e5e7eb;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-row {
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #f3f4f6;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .info-value {
            font-size: 14px;
            color: #111827;
            font-weight: 500;
        }
        .info-value a {
            color: #0f766e;
            text-decoration: none;
        }
        .info-value a:hover {
            text-decoration: underline;
        }
        .cover-letter-box {
            background-color: #f9fafb;
            border: 2px solid #e5e7eb;
            padding: 20px;
            border-radius: 4px;
            margin-top: 15px;
        }
        .cover-letter-text {
            font-size: 14px;
            color: #374151;
            line-height: 1.7;
            white-space: pre-wrap;
        }
        .attachment-notice {
            background-color: #fffbeb;
            border: 2px solid #fbbf24;
            padding: 16px;
            border-radius: 4px;
            margin-top: 20px;
        }
        .attachment-notice p {
            margin: 0;
            color: #92400e;
            font-size: 13px;
        }
        .footer {
            background-color: #f9fafb;
            padding: 20px 30px;
            text-align: center;
            border-top: 2px solid #e5e7eb;
        }
        .footer p {
            margin: 5px 0;
            color: #6b7280;
            font-size: 12px;
        }
        .company-name {
            font-weight: 700;
            color: #111827;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-badge">New Application</div>
            <h1>Job Application Received</h1>
            <p>{{ $jobTitle }}</p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Applicant Highlight -->
            <div class="applicant-box">
                <h2>{{ $applicantName }}</h2>
                <p>Applied for: {{ $jobTitle }}</p>
            </div>

            <!-- Contact Information -->
            <div class="section">
                <div class="section-title">Contact Information</div>
                <div class="info-row">
                    <div class="info-label">Full Name</div>
                    <div class="info-value">{{ $applicantName }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email Address</div>
                    <div class="info-value"><a href="mailto:{{ $applicantEmail }}">{{ $applicantEmail }}</a></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Phone Number</div>
                    <div class="info-value"><a href="tel:{{ $applicantPhone }}">{{ $applicantPhone }}</a></div>
                </div>
            </div>

            <!-- Position Details -->
            <div class="section">
                <div class="section-title">Position Applied</div>
                <div class="info-row">
                    <div class="info-label">Job Title</div>
                    <div class="info-value">{{ $jobTitle }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Job ID</div>
                    <div class="info-value">#{{ $jobId }}</div>
                </div>
            </div>

            <!-- Cover Letter -->
            <div class="section">
                <div class="section-title">Cover Letter</div>
                <div class="cover-letter-box">
                    <div class="cover-letter-text">{{ $coverLetter }}</div>
                </div>
            </div>

            <!-- Attachment Notice -->
            <div class="attachment-notice">
                <p><strong>📎 ATTACHMENT:</strong> The applicant's resume/CV is attached to this email. Please review the attached document for complete details.</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p class="company-name">PT Kisantra Indonesia</p>
            <p>Recruitment Management System</p>
            <p style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                Email: <a href="mailto:hr.kisantra@gmail.com" style="color: #6b7280;">hr.kisantra@gmail.com</a>
            </p>
            <p style="font-style: italic; margin-top: 10px;">
                This email was sent automatically from the recruitment system.
            </p>
        </div>
    </div>
</body>
</html>
