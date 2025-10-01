<!DOCTYPE html>
<html lang="id" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>Konfirmasi Lamaran - {{ $jobTitle }}</title>
    <style type="text/css">
        /* Reset styles */
        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a {
            text-decoration: none;
        }

        /* Typography */
        body,
        table,
        td,
        p,
        a {
            font-family: Arial, Helvetica, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Main container */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
        }

        /* Header styles */
        .header {
            background-color: #111827;
            padding: 40px 30px;
            text-align: center;
            border-bottom: 3px solid #111827;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 180px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .header-title {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 8px 0;
            line-height: 1.3;
        }

        .header-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            font-weight: 400;
            margin: 0;
        }

        /* Content styles */
        .content {
            background-color: #ffffff;
            padding: 40px 30px;
        }

        .success-box {
            background-color: #ffffff;
            border: 2px solid #111827;
            padding: 24px;
            text-align: center;
            margin-bottom: 32px;
        }

        .success-title {
            color: #111827;
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 12px 0;
        }

        .success-text {
            color: #374151;
            font-size: 15px;
            margin: 0;
            line-height: 1.6;
        }

        /* Section styles */
        .section {
            margin-bottom: 32px;
        }

        .section-header {
            color: #111827;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 16px 0;
            padding-bottom: 12px;
            border-bottom: 2px solid #e5e7eb;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-row {
            border-bottom: 1px solid #f3f4f6;
        }

        .info-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
            padding: 12px 20px 12px 0;
            width: 120px;
            vertical-align: top;
        }

        .info-value {
            color: #111827;
            font-size: 14px;
            padding: 12px 0;
            vertical-align: top;
        }

        .info-value strong {
            font-weight: 600;
        }

        /* Next steps notice */
        .next-steps {
            background-color: #fffbeb;
            border: 2px solid #fbbf24;
            padding: 20px;
            margin-bottom: 32px;
        }

        .next-steps-title {
            color: #92400e;
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 12px 0;
            text-transform: uppercase;
        }

        .next-steps-list {
            color: #374151;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding-left: 20px;
        }

        .next-steps-list li {
            margin-bottom: 8px;
        }

        /* Contact box */
        .contact-box {
            background-color: #f9fafb;
            border: 2px solid #e5e7eb;
            padding: 20px;
            margin-bottom: 32px;
        }

        .contact-title {
            color: #111827;
            font-size: 15px;
            font-weight: 700;
            margin: 0 0 10px 0;
        }

        .contact-text {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
        }

        .contact-text a {
            color: #111827;
            text-decoration: none;
            border-bottom: 1px solid #d1d5db;
        }

        /* Footer styles */
        .footer {
            background-color: #f9fafb;
            padding: 32px 30px;
            text-align: center;
            border-top: 2px solid #e5e7eb;
        }

        .company-name {
            color: #111827;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0 0 12px 0;
        }

        .footer-text {
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
            margin: 4px 0;
        }

        .divider {
            height: 2px;
            background-color: #e5e7eb;
            margin: 20px auto;
        }

        .footer-highlight {
            color: #111827;
            font-size: 14px;
            font-weight: 600;
            margin: 16px 0 0 0;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {

            .header,
            .content,
            .footer {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }

            .logo img {
                max-width: 150px !important;
            }

            .header-title {
                font-size: 24px !important;
            }

            .info-table {
                display: block;
            }

            .info-row {
                display: block;
                padding: 12px 0;
            }

            .info-label,
            .info-value {
                display: block;
                width: 100%;
                padding: 0;
            }

            .info-label {
                margin-bottom: 4px;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0; background-color: #f5f5f5;">

    <!-- Email wrapper -->
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
        style="background-color: #f5f5f5;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <!-- Email container -->
                <table role="presentation" class="email-container" width="600" cellspacing="0" cellpadding="0"
                    border="0" style="background-color: #ffffff; max-width: 600px;">

                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <div class="logo">
                                <img src="{{ asset('image/Logo/Logo Vertical.png') }}" alt="PT Kisantra Indonesia"
                                    width="180">
                            </div>
                            <h1 class="header-title">Terima Kasih!</h1>
                            <p class="header-subtitle">Lamaran Anda telah berhasil dikirim</p>
                        </td>
                    </tr>

                    <!-- Main content -->
                    <tr>
                        <td class="content">

                            <!-- Success message -->
                            <div class="success-box">
                                <h2 class="success-title">Lamaran Berhasil Dikirim</h2>
                                <p class="success-text">
                                    Halo <strong>{{ $applicantName }}</strong>, terima kasih telah melamar untuk posisi
                                    <strong>{{ $jobTitle }}</strong> di PT Kisantra Indonesia.
                                </p>
                            </div>

                            <!-- Application Summary Section -->
                            <div class="section">
                                <h3 class="section-header">Ringkasan Lamaran Anda</h3>
                                <table role="presentation" class="info-table" width="100%" cellspacing="0"
                                    cellpadding="0" border="0">
                                    <tr class="info-row">
                                        <td class="info-label">Posisi</td>
                                        <td class="info-value"><strong>{{ $applicationData['nama_posisi'] }}</strong>
                                        </td>
                                    </tr>
                                    <tr class="info-row">
                                        <td class="info-label">Divisi</td>
                                        <td class="info-value">{{ $applicationData['divisi'] }}</td>
                                    </tr>
                                    <tr class="info-row">
                                        <td class="info-label">Tanggal</td>
                                        <td class="info-value">{{ $applicationData['applied_at'] }}</td>
                                    </tr>
                                    <tr class="info-row">
                                        <td class="info-label">Email</td>
                                        <td class="info-value">{{ $applicationData['email_aktif'] }}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Next steps notice -->
                            <div class="next-steps">
                                <h3 class="next-steps-title">Langkah Selanjutnya</h3>
                                <ul class="next-steps-list">
                                    <li>Tim HR kami akan meninjau lamaran Anda dalam waktu <strong>7-14 hari
                                            kerja</strong></li>
                                    <li>Jika profil Anda sesuai, kami akan menghubungi melalui email atau telepon</li>
                                    <li>Pastikan nomor telepon dan email Anda selalu aktif</li>
                                    <li>Periksa folder spam/junk email secara berkala</li>
                                </ul>
                            </div>

                            <!-- Contact box -->
                            <div class="contact-box">
                                <h4 class="contact-title">Butuh Bantuan?</h4>
                                <p class="contact-text">
                                    Jika Anda memiliki pertanyaan, silakan hubungi tim recruitment kami di
                                    <a href="mailto:recruitment@kisantra.com">recruitment@kisantra.com</a>
                                </p>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="footer">
                            <p class="company-name">PT Kisantra Indonesia</p>
                            <p class="footer-text">Email ini dikirim otomatis dari sistem recruitment kami</p>
                            <p class="footer-text">Mohon untuk tidak membalas email ini secara langsung</p>

                            <div class="divider"></div>

                            <p class="footer-highlight">Terima kasih atas minat Anda bergabung dengan kami!</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>