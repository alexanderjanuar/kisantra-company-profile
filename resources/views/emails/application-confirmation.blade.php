<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Lamaran - {{ $jobTitle }}</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #374151;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
            height: auto;
            filter: brightness(0) invert(1);
        }

        .header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            font-weight: 700;
        }

        .header p {
            margin: 0;
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 30px;
        }

        .success-message {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            margin-bottom: 25px;
        }

        .success-icon {
            font-size: 48px;
            color: #10b981;
            margin-bottom: 15px;
        }

        .section {
            margin-bottom: 25px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f8fafc;
            border-left: 4px solid #10b981;
        }

        .section h3 {
            margin: 0 0 15px 0;
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .info-grid {
            display: table;
            width: 100%;
        }

        .info-row {
            display: table-row;
        }

        .label {
            display: table-cell;
            font-weight: 600;
            color: #4b5563;
            width: 120px;
            padding-right: 15px;
            padding-bottom: 8px;
            vertical-align: top;
        }

        .value {
            display: table-cell;
            color: #1f2937;
            padding-bottom: 8px;
            vertical-align: top;
        }

        .next-steps {
            background: linear-gradient(135deg, #fef3f4 0%, #fce7e8 100%);
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }

        .next-steps h3 {
            color: #dc2626;
            margin: 0 0 15px 0;
        }

        .next-steps ul {
            margin: 0;
            padding-left: 20px;
            color: #374151;
        }

        .next-steps li {
            margin-bottom: 8px;
        }

        .footer {
            background-color: #f3f4f6;
            padding: 25px 30px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }

        .footer p {
            margin: 5px 0;
            font-size: 14px;
            color: #6b7280;
        }

        .footer .company {
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
        }

        .contact-info {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }

        @media (max-width: 600px) {
            .container {
                margin: 0;
                box-shadow: none;
            }

            .header,
            .content,
            .footer {
                padding: 20px;
            }

            .info-grid {
                display: block;
            }

            .info-row {
                display: block;
                margin-bottom: 15px;
            }

            .label,
            .value {
                display: block;
                width: 100%;
                padding: 0;
            }

            .label {
                margin-bottom: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="cid:company-logo.png" alt="PT Kisantra Indonesia Logo">
            </div>
            <h1>Terima Kasih!</h1>
            <p>Lamaran Anda telah berhasil dikirim</p>
        </div>

        <div class="content">
            <div class="success-message">
                <div class="success-icon">✅</div>
                <h2 style="margin: 0 0 10px 0; color: #065f46;">Lamaran Berhasil Dikirim</h2>
                <p style="margin: 0; color: #374151;">Halo <strong>{{ $applicantName }}</strong>, terima kasih telah
                    melamar untuk posisi <strong>{{ $jobTitle }}</strong> di PT Kisantra Indonesia.</p>
            </div>

            <div class="section">
                <h3>📋 Ringkasan Lamaran Anda</h3>
                <div class="info-grid">
                    <div class="info-row">
                        <div class="label">Posisi:</div>
                        <div class="value"><strong>{{ $applicationData['nama_posisi'] }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="label">Divisi:</div>
                        <div class="value">{{ $applicationData['divisi'] }}</div>
                    </div>
                    <div class="info-row">
                        <div class="label">Tanggal:</div>
                        <div class="value">{{ $applicationData['applied_at'] }}</div>
                    </div>
                    <div class="info-row">
                        <div class="label">Email:</div>
                        <div class="value">{{ $applicationData['email_aktif'] }}</div>
                    </div>
                </div>
            </div>

            <div class="next-steps">
                <h3>🚀 Langkah Selanjutnya</h3>
                <ul>
                    <li>Tim HR kami akan meninjau lamaran Anda dalam waktu <strong>7-14 hari kerja</strong></li>
                    <li>Jika profil Anda sesuai, kami akan menghubungi melalui email atau telepon</li>
                    <li>Pastikan nomor telepon dan email Anda selalu aktif</li>
                    <li>Periksa folder spam/junk email secara berkala</li>
                </ul>
            </div>

            <div class="contact-info">
                <h4 style="margin: 0 0 10px 0; color: #374151;">📞 Butuh Bantuan?</h4>
                <p style="margin: 0; font-size: 14px; color: #6b7280;">
                    Jika Anda memiliki pertanyaan, silakan hubungi tim recruitment kami di
                    <a href="mailto:recruitment@kisantra.com"
                        style="color: #10b981; text-decoration: none;">recruitment@kisantra.com</a>
                </p>
            </div>
        </div>

        <div class="footer">
            <p class="company">PT Kisantra Indonesia</p>
            <p>Email ini dikirim otomatis dari sistem recruitment kami</p>
            <p>Mohon untuk tidak membalas email ini secara langsung</p>
            <p style="margin-top: 15px; color: #374151;"><strong>Terima kasih atas minat Anda bergabung dengan
                    kami!</strong></p>
        </div>
    </div>
</body>

</html>