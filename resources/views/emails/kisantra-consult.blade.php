<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $isAutoReply ? 'Terima Kasih - Sesi Tanya Kisantra' : 'Pendaftaran Baru - Sesi Tanya Kisantra' }}</title>
</head>

<body
    style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
        style="background-color: #f3f4f6; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

                    {{-- Header --}}
                    <tr>
                        <td
                            style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); padding: 40px 30px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: 700;">
                                @if($isAutoReply)
                                Terima Kasih Telah Mendaftar!
                                @else
                                Pendaftaran Baru
                                @endif
                            </h1>
                            <p style="margin: 10px 0 0; color: #e0e7ff; font-size: 14px;">
                                Sesi Tanya Kisantra - Konsultasi Keuangan & Perpajakan
                            </p>
                        </td>
                    </tr>

                    {{-- Content --}}
                    <tr>
                        <td style="padding: 40px 30px;">
                            @if($isAutoReply)
                            {{-- Auto Reply Content --}}
                            <p style="margin: 0 0 20px; color: #374151; font-size: 16px; line-height: 1.6;">
                                Hai <strong>{{ $data['nama'] }}</strong>,
                            </p>
                            <p style="margin: 0 0 20px; color: #374151; font-size: 16px; line-height: 1.6;">
                                Terima kasih telah mendaftar untuk <strong>Sesi Tanya Kisantra</strong>. Kami sangat
                                senang Anda bergabung!
                            </p>
                            <div
                                style="background-color: #eff6ff; border-left: 4px solid #2563eb; padding: 20px; margin: 20px 0; border-radius: 6px;">
                                <p style="margin: 0; color: #1e40af; font-size: 15px; line-height: 1.6;">
                                    <strong>📅 Langkah Selanjutnya:</strong><br>
                                    Anda akan segera diundang ke <strong>grup WhatsApp eksklusif Kisantra</strong> untuk
                                    menerima:
                                </p>
                                <ul style="margin: 10px 0 0; padding-left: 20px; color: #1e40af;">
                                    <li>Link Zoom meeting</li>
                                    <li>Jadwal sesi konsultasi</li>
                                    <li>Informasi terbaru seputar acara</li>
                                </ul>
                            </div>
                            <p style="margin: 0; color: #374151; font-size: 16px; line-height: 1.6;">
                                Pastikan nomor WhatsApp Anda <strong>({{ $data['telepon'] }})</strong> aktif ya!
                            </p>
                            @else
                            {{-- Admin Notification Content --}}
                            <p style="margin: 0 0 20px; color: #374151; font-size: 16px; line-height: 1.6;">
                                Halo Tim Kisantra,
                            </p>
                            <p style="margin: 0 0 20px; color: #374151; font-size: 16px; line-height: 1.6;">
                                Ada pendaftaran baru untuk <strong>Sesi Tanya Kisantra</strong>. Berikut detail
                                lengkapnya:
                            </p>
                            @endif

                            {{-- Registration Details --}}
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin: 30px 0; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
                                <tr>
                                    <td colspan="2"
                                        style="background-color: #f9fafb; padding: 15px 20px; border-bottom: 1px solid #e5e7eb;">
                                        <h3 style="margin: 0; color: #111827; font-size: 18px; font-weight: 600;">
                                            📋 Data Pendaftaran
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px; width: 40%;">
                                        <strong>Nama Lengkap</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['nama'] }}
                                    </td>
                                </tr>
                                @if(!empty($data['usaha']))
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>Nama Usaha</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['usaha'] }}
                                    </td>
                                </tr>
                                @endif
                                @if(!empty($data['npwp']))
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>NPWP</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['npwp'] }}
                                    </td>
                                </tr>
                                @endif
                                @if(!empty($data['jenis_usaha']))
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>Jenis Usaha</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['jenis_usaha'] }}
                                    </td>
                                </tr>
                                @endif
                                @if(!empty($data['alamat']))
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>Alamat</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['alamat'] }}
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>No. WhatsApp</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['telepon'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>Email</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['email'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>Topik Konsultasi</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['topik'] }}
                                    </td>
                                </tr>
                                @if(!empty($data['sumber']))
                                <tr>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #6b7280; font-size: 14px;">
                                        <strong>Sumber Info</strong>
                                    </td>
                                    <td
                                        style="padding: 12px 20px; border-bottom: 1px solid #e5e7eb; color: #111827; font-size: 14px;">
                                        {{ $data['sumber'] }}
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 12px 20px; color: #6b7280; font-size: 14px;">
                                        <strong>Persetujuan Grup</strong>
                                    </td>
                                    <td style="padding: 12px 20px; color: #111827; font-size: 14px;">
                                        {{ $data['persetujuan'] }}
                                    </td>
                                </tr>
                            </table>

                            @if($isAutoReply)
                            <div
                                style="background-color: #fef3c7; border: 1px solid #fbbf24; padding: 20px; margin: 30px 0; border-radius: 8px;">
                                <p style="margin: 0; color: #92400e; font-size: 14px; line-height: 1.6;">
                                    <strong>💡 Tips:</strong> Siapkan pertanyaan Anda sebelum sesi dimulai agar diskusi
                                    lebih efektif!
                                </p>
                            </div>
                            <p style="margin: 20px 0 0; color: #374151; font-size: 16px; line-height: 1.6;">
                                Sampai jumpa di sesi Zoom! 🎉
                            </p>
                            @else
                            <div
                                style="background-color: #dbeafe; border-left: 4px solid #2563eb; padding: 20px; margin: 30px 0; border-radius: 6px;">
                                <p style="margin: 0; color: #1e40af; font-size: 14px; line-height: 1.6;">
                                    <strong>📞 Action Required:</strong><br>
                                    Segera hubungi peserta di nomor WhatsApp <strong>{{ $data['telepon'] }}</strong>
                                    untuk mengundang ke grup eksklusif Kisantra.
                                </p>
                            </div>
                            @endif
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td
                            style="background-color: #f9fafb; padding: 30px; text-align: center; border-top: 1px solid #e5e7eb;">
                            <p style="margin: 0 0 10px; color: #6b7280; font-size: 14px;">
                                <strong>Kisantra</strong> - Konsultan Keuangan & Perpajakan Terpercaya
                            </p>
                            <p style="margin: 0; color: #9ca3af; font-size: 12px;">
                                Email ini dikirim otomatis. Untuk pertanyaan lebih lanjut, hubungi kami di <a
                                    href="mailto:info@kisantra.com"
                                    style="color: #2563eb; text-decoration: none;">info@kisantra.com</a>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>