<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecruitmentAnnouncementSeeder extends Seeder
{
    /**
     * Satu contoh pengumuman rekrutmen umum (tanpa tautan hardcoded).
     * Tambahkan link (mis. ke /karir) lewat tombol "link" di RichEditor admin bila diperlukan.
     * Idempotent (updateOrCreate by slug) dan tidak menghapus data lain.
     */
    public function run(): void
    {
        $title = 'Rekrutmen Terbuka: Bergabunglah Bersama Tim Kisantra Consult';

        $content = '<p>Kisantra Consult kembali membuka kesempatan berkarier bagi Anda yang ingin berkembang bersama tim profesional di bidang perpajakan, keuangan, dan teknologi. Kami mencari individu yang berdedikasi, teliti, dan siap memberikan dampak nyata bagi pertumbuhan bisnis klien.</p>
<p><strong>Posisi yang sedang kami buka:</strong></p>
<ul>
<li>Senior Tax Consultant</li>
<li>Financial Auditor</li>
<li>Digital Marketing Specialist</li>
<li>Frontend Developer</li>
</ul>
<p><strong>Cara melamar sangat mudah.</strong> Seluruh proses lamaran dilakukan secara online melalui halaman Karir kami. Pilih posisi yang sesuai, lengkapi formulir, dan unggah CV terbaru Anda.</p>
<blockquote>Pendaftaran tidak dipungut biaya apa pun. Pastikan Anda hanya melamar melalui kanal resmi kami.</blockquote>';

        Announcement::updateOrCreate(
            ['slug' => Str::slug($title)],
            [
                'title' => $title,
                'excerpt' => 'Kami sedang mencari talenta terbaik untuk berbagai posisi. Lihat lowongan yang tersedia dan kirim lamaran Anda langsung melalui halaman Karir kami.',
                'featured_image' => 'https://images.unsplash.com/photo-1521737711867-e3b97375f902?q=80&w=1200&auto=format&fit=crop',
                'content' => $content,
                'is_pinned' => true,
                'status' => 'published',
                'published_at' => Carbon::now(),
            ],
        );

        $this->command->info('Recruitment announcement seeded successfully!');
    }
}
