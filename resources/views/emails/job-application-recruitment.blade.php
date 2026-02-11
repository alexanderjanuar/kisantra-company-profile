<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Application</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f9fafb; color: #374151; line-height: 1.6;">

    <!-- Main Wrapper -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f9fafb; padding: 40px 0;">
        <tr>
            <td align="center">
                
                <!-- Email Container -->
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; max-width: 600px; width: 100%; border-radius: 4px; border: 1px solid #e5e7eb;">
                    
                    <!-- Header -->
                    <tr>
                        <td style="padding: 40px 40px 10px 40px; border-bottom: 2px solid #0d9488;">
                            <p style="margin: 0; font-size: 12px; font-weight: 700; color: #0d9488; text-transform: uppercase; letter-spacing: 1px;">New Candidate Application</p>
                            <h1 style="color: #111827; font-size: 20px; font-weight: 600; margin: 8px 0 0 0;">
                                {{ $jobTitle }}
                            </h1>
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding: 30px 40px 40px 40px;">

                            <!-- Applicant Summary -->
                            <div style="margin-bottom: 32px;">
                                <h2 style="font-size: 16px; font-weight: 600; color: #111827; margin: 0 0 16px 0;">Applicant Details</h2>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="padding: 6px 0; font-size: 14px; color: #6b7280; width: 140px;">Full Name</td>
                                        <td style="padding: 6px 0; font-size: 14px; color: #111827; font-weight: 500;">{{ $applicantName }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 6px 0; font-size: 14px; color: #6b7280;">Email Address</td>
                                        <td style="padding: 6px 0; font-size: 14px; color: #111827;"><a href="mailto:{{ $applicantEmail }}" style="color: #111827; text-decoration: none;">{{ $applicantEmail }}</a></td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 6px 0; font-size: 14px; color: #6b7280;">Phone Number</td>
                                        <td style="padding: 6px 0; font-size: 14px; color: #111827;">{{ $applicantPhone ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 6px 0; font-size: 14px; color: #6b7280;">LinkedIn</td>
                                        <td style="padding: 6px 0; font-size: 14px; color: #111827;">
                                            @if(!empty($linkedinUrl) && $linkedinUrl !== '-')
                                                <a href="{{ $linkedinUrl }}" target="_blank" style="color: #0d9488; text-decoration: none;">View Profile &rarr;</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 6px 0; font-size: 14px; color: #6b7280;">Source</td>
                                        <td style="padding: 6px 0; font-size: 14px; color: #111827;">{{ ucfirst($source ?? '-') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Cover Letter -->
                             @if(!empty($coverLetter) && $coverLetter !== '-')
                                <div style="margin-bottom: 32px;">
                                    <h2 style="font-size: 16px; font-weight: 600; color: #111827; margin: 0 0 12px 0;">Cover Letter</h2>
                                    <div style="background-color: #f9fafb; padding: 20px; border-radius: 4px; font-size: 14px; color: #4b5563; white-space: pre-wrap; line-height: 1.7;">{{ $coverLetter }}</div>
                                </div>
                            @endif

                            <!-- Attachment Notice -->
                            <div style="background-color: #f0fdfa; border: 1px solid #ccfbf1; padding: 16px; border-radius: 4px; display: flex; align-items: start; gap: 12px;">
                                <div style="flex-shrink: 0; padding-top: 2px;">
                                    <!-- Simple Icon using unicode -->
                                    <span style="font-size: 16px;">📎</span>
                                </div>
                                <div>
                                    <p style="margin: 0; font-size: 14px; color: #115e59; font-weight: 500;">Attachments Included</p>
                                    <p style="margin: 4px 0 0 0; font-size: 13px; color: #134e4a;">The applicant's resume/CV and other documents are attached to this email.</p>
                                </div>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f9fafb; padding: 20px 40px; text-align: center; border-radius: 0 0 4px 4px; border-top: 1px solid #e5e7eb;">
                            <p style="margin: 0; font-size: 11px; color: #9ca3af;">
                                Generated by Kisantra Recruitment System &bull; {{ date('Y') }}
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
