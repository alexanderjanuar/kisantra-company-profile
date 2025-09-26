<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamaran Kerja - {{ $jobTitle }}</title>
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
            background: linear-gradient(135deg, #e91e63 0%, #ad1457 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            font-weight: 700;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 400;
            opacity: 0.9;
        }

        .content {
            padding: 30px;
        }

        .section {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #e91e63;
            background-color: #f8fafc;
        }

        .section h3 {
            margin: 0 0 20px 0;
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
            margin-bottom: 12px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .label {
            display: table-cell;
            font-weight: 600;
            color: #4b5563;
            width: 140px;
            padding-right: 20px;
            padding-bottom: 8px;
            vertical-align: top;
        }

        .value {
            display: table-cell;
            color: #1f2937;
            padding-bottom: 8px;
            vertical-align: top;
        }

        .highlight-section {
            background: linear-gradient(135deg, #fef3f4 0%, #fce7e8 100%);
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        .highlight-section .priority {
            color: #dc2626;
            font-weight: 700;
            font-size: 16px;
            margin: 0;
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
        }

        .badge {
            display: inline-block;
            background-color: #e91e63;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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
            <h1>LAMARAN KERJA BARU</h1>
            <h2>{{ $jobTitle }}</h2>
            <span class="badge">Recruitment Portal</span>
        </div>

        <div class="content">
            <div class="highlight-section">
                <p class="priority">Lamaran baru memerlukan review segera</p>
                <p style="margin: 5px 0 0 0; color: #374151;">Pelamar: <strong>{{ $applicationData['nama_lengkap']
                        }}</strong></p>
            </div>

            <div class="section">
                <h3>👤 Informasi Pelamar</h3>
                <div class="info-grid">
                    <div class="info-row">
                        <div class="label">Nama Lengkap:</div>
                        <div class="value">{{ $applicationData['nama_lengkap'] }}</div>
                    </div>
                    <div class="info-row">
                        <div class="label">Email:</div>
                        <div class="value"><a href="mailto:{{ $applicationData['email_aktif'] }}"
                                style="color: #e91e63; text-decoration: none;">{{ $applicationData['email_aktif'] }}</a>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="label">Telepon/WA:</div>
                        <div class="value"><a href="tel:{{ $applicationData['nomor_telepon'] }}"
                                style="color: #e91e63; text-decoration: none;">{{ $applicationData['nomor_telepon']
                                }}</a></div>
                    </div>
                    <div class="info-row">
                        <div class="label">Alamat:</div>
                        <div class="value">{{ $applicationData['alamat'] }}</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>💼 Informasi Posisi</h3>
                <div class="info-grid">
                    <div class="info-row">
                        <div class="label">Divisi:</div>
                        <div class="value">{{ $applicationData['divisi'] }}</div>
                    </div>
                    <div class="info-row">
                        <div class="label">Posisi:</div>
                        <div class="value"><strong>{{ $applicationData['nama_posisi'] }}</strong></div>
                    </div>
                    <div class="info-row">
                        <div class="label">Sumber Info:</div>
                        <div class="value">{{ $applicationData['sumber_info'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p class="company">PT Kisantra Indonesia</p>
            <p>Diterima pada: <strong>{{ $applicationData['applied_at'] }}</strong></p>
            <p>Email ini dikirim otomatis dari sistem recruitment Kisantra</p>
            <p style="margin-top: 15px; font-style: italic;">💡 Untuk membalas pelamar, gunakan tombol Reply pada email
                ini</p>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lamaran Kerja - {{ $jobTitle }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 20px;
            padding: 15px;
            border-left: 4px solid #e91e63;
            background-color: #fafafa;
        }

        .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }

        .value {
            color: #2d3748;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>LAMARAN KERJA BARU</h1>
        <h2>{{ $jobTitle }}</h2>
    </div>

    <div class="section">
        <h3>Informasi Pelamar</h3>
        <p><span class="label">Nama Lengkap:</span> {{ $applicationData['nama_lengkap'] }}</p>
        <p><span class="label">Email:</span> {{ $applicationData['email_aktif'] }}</p>
        <p><span class="label">Telepon:</span> {{ $applicationData['nomor_telepon'] }}</p>
        <p><span class="label">Alamat:</span> {{ $applicationData['alamat'] }}</p>
        <p><span class="label">Divisi:</span> {{ $applicationData['divisi'] }}</p>
        <p><span class="label">Posisi:</span> {{ $applicationData['nama_posisi'] }}</p>
        <p><span class="label">Sumber Info:</span> {{ $applicationData['sumber_info'] }}</p>
    </div>

    <div class="section">
        <p><strong>Diterima pada:</strong> {{ $applicationData['applied_at'] }}</p>
        <p><em>Untuk membalas pelamar, gunakan tombol Reply pada email ini.</em></p>
    </div>
</body>

</html>