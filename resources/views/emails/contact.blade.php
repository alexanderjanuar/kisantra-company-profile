<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak Baru</title>
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
            background-color: #1f2937;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9fafb;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-weight: bold;
            color: #374151;
            margin-bottom: 5px;
        }
        .field-value {
            background-color: white;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
        }
        .services-list {
            list-style: none;
            padding: 0;
        }
        .services-list li {
            background-color: #dbeafe;
            padding: 8px 12px;
            margin: 5px 0;
            border-radius: 4px;
            display: inline-block;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Pesan Kontak Baru</h1>
    </div>
    
    <div class="content">
        <p>Anda menerima pesan kontak baru dari website:</p>
        
        <div class="field">
            <div class="field-label">Nama Lengkap:</div>
            <div class="field-value">{{ $first_name }} {{ $last_name }}</div>
        </div>

        <div class="field">
            <div class="field-label">Email:</div>
            <div class="field-value">
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
        </div>

        <div class="field">
            <div class="field-label">Nomor Telepon:</div>
            <div class="field-value">{{ $country_code }} {{ $phone }}</div>
        </div>

        <div class="field">
            <div class="field-label">Layanan yang Diminati:</div>
            <div class="field-value">
                <ul class="services-list">
                    @foreach($services as $service)
                        <li>
                            @switch($service)
                                @case('konsultasi_pajak')
                                    Konsultasi Pajak
                                    @break
                                @case('pelaporan_pajak')
                                    Pelaporan Pajak (SPT)
                                    @break
                                @case('tax_planning')
                                    Perencanaan Pajak
                                    @break
                                @case('tax_audit')
                                    Audit Pajak
                                    @break
                                @case('ppn_pph')
                                    PPN & PPh
                                    @break
                                @case('bookkeeping')
                                    Pembukuan & Akuntansi
                                    @break
                                @case('other')
                                    Lainnya
                                    @break
                                @default
                                    {{ $service }}
                            @endswitch
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="field">
            <div class="field-label">Pesan:</div>
            <div class="field-value">{!! nl2br(e($contactData['message'])) !!}</div>
        </div>
    </div>

    <div class="footer">
        <p>Email ini dikirim secara otomatis dari formulir kontak website.</p>
        <p>Balas langsung ke email ini untuk merespons {{ $first_name }}.</p>
    </div>
</body>
</html>