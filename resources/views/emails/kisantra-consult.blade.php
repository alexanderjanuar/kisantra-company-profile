@php($d = $data)
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Email – Sesi Tanya Kisantra</title>
</head>

<body style="font-family:ui-sans-serif,system-ui,-apple-system;font-size:14px;color:#0f172a;line-height:1.5;">
    @if ($isAutoReply ?? false)
    <h2 style="margin:0 0 8px;">Terima kasih, {{ $d['nama'] }}!</h2>
    <p>Kami telah menerima pendaftaran Anda untuk <strong>Sesi Tanya Kisantra</strong>.</p>
    <p>Link Zoom akan kami kirimkan melalui email/grup Kisantra sebelum sesi dimulai.</p>
    <hr style="margin:16px 0;border:none;border-top:1px solid #e5e7eb;">
    @else
    <h2 style="margin:0 0 8px;">Pendaftaran Baru – Sesi Tanya Kisantra</h2>
    <p>Berikut detail peserta:</p>
    @endif

    <table cellpadding="6" cellspacing="0"
        style="border-collapse:collapse;background:#f8fafc;border:1px solid #e5e7eb;">
        <tr>
            <td><strong>Nama</strong></td>
            <td>{{ $d['nama'] }}</td>
        </tr>
        <tr>
            <td><strong>Usaha/Perusahaan</strong></td>
            <td>{{ $d['usaha'] ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>NPWP</strong></td>
            <td>{{ $d['npwp'] ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Jenis Usaha</strong></td>
            <td>{{ $d['jenis_usaha'] ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td>{{ $d['alamat'] ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Telepon/WA</strong></td>
            <td>{{ $d['telepon'] }}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $d['email'] }}</td>
        </tr>
        <tr>
            <td><strong>Sumber Info</strong></td>
            <td>{{ $d['sumber'] ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Persetujuan Grup</strong></td>
            <td>{{ $d['persetujuan'] }}</td>
        </tr>
        <tr>
            <td style="vertical-align:top;"><strong>Topik</strong></td>
            <td style="white-space:pre-wrap;">{{ $d['topik'] }}</td>
        </tr>
    </table>

    @if ($isAutoReply ?? false)
    <p style="margin-top:16px;">Salam,<br>Kisantra</p>
    @endif
</body>

</html>