<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * NOTE: This is demo data. Re-running will reset the announcement list.
     */
    public function run(): void
    {
        // Bersihkan data lama agar contoh selalu konsisten (demo).
        Announcement::query()->delete();

        $announcements = [
            [
                'title' => 'Libur Operasional Hari Raya Idul Fitri 1447 H',
                'is_pinned' => true,
                'published_at' => Carbon::now()->subDays(1),
                'featured_image' => 'https://images.unsplash.com/photo-1564769662533-4f00a87b4056?q=80&w=1200&auto=format&fit=crop',
                'excerpt' => 'Kantor Kisantra Consult akan libur sementara dalam rangka Hari Raya Idul Fitri. Berikut jadwal lengkap dan layanan daruratnya.',
                'content' => '<p>Sehubungan dengan perayaan <strong>Hari Raya Idul Fitri 1447 H</strong>, kami informasikan bahwa kantor Kisantra Consult akan diliburkan untuk sementara waktu.</p>
<p><strong>Jadwal Libur:</strong></p>
<ul>
<li>Tanggal mulai libur: sesuai kalender resmi pemerintah</li>
<li>Kantor kembali beroperasi normal setelah masa libur berakhir</li>
</ul>
<p>Selama masa libur, seluruh konsultasi dan layanan administrasi akan ditunda dan diproses kembali pada hari kerja pertama. Untuk keperluan mendesak, Anda tetap dapat menghubungi kami melalui email resmi.</p>
<blockquote>Segenap keluarga besar Kisantra Consult mengucapkan Selamat Hari Raya Idul Fitri, mohon maaf lahir dan batin.</blockquote>',
            ],
            [
                'title' => 'Kisantra Consult Resmi Membuka Kantor Cabang di Balikpapan',
                'is_pinned' => false,
                'published_at' => Carbon::now()->subDays(6),
                'featured_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&auto=format&fit=crop',
                'excerpt' => 'Memperluas jangkauan layanan, kami dengan bangga mengumumkan pembukaan kantor cabang baru di Balikpapan.',
                'content' => '<p>Sebagai bagian dari komitmen kami untuk melayani lebih banyak pelaku usaha di Kalimantan Timur, Kisantra Consult dengan bangga mengumumkan pembukaan <strong>kantor cabang baru di Balikpapan</strong>.</p>
<p>Dengan kehadiran cabang ini, klien di wilayah Balikpapan dan sekitarnya kini dapat mengakses layanan kami secara lebih dekat dan responsif, meliputi:</p>
<ul>
<li>Konsultasi perpajakan dan keuangan</li>
<li>Pengurusan legalitas dan administrasi usaha</li>
<li>Solusi sistem digital dan pemasaran</li>
</ul>
<p>Kami mengundang Anda untuk berkunjung dan berkonsultasi langsung dengan tim profesional kami di lokasi baru ini.</p>',
            ],
            [
                'title' => 'Layanan Konsultasi Online Kini Tersedia Setiap Hari',
                'is_pinned' => false,
                'published_at' => Carbon::now()->subDays(11),
                'featured_image' => 'https://images.unsplash.com/photo-1587560699334-cc4ff634909a?q=80&w=1200&auto=format&fit=crop',
                'excerpt' => 'Kini Anda dapat berkonsultasi dengan tim ahli kami secara daring, kapan saja dan dari mana saja.',
                'content' => '<p>Untuk memberikan kemudahan dan fleksibilitas yang lebih baik, Kisantra Consult kini menghadirkan <strong>layanan konsultasi online</strong>.</p>
<p>Melalui layanan ini, Anda dapat:</p>
<ul>
<li>Menjadwalkan sesi konsultasi tanpa harus datang ke kantor</li>
<li>Berdiskusi langsung dengan konsultan melalui video call</li>
<li>Mengirim dokumen secara digital dengan aman</li>
</ul>
<p>Hubungi kami melalui kanal resmi untuk menjadwalkan sesi konsultasi online pertama Anda.</p>',
            ],
            [
                'title' => 'Kisantra Raih Penghargaan Mitra Konsultan Terbaik 2025',
                'is_pinned' => false,
                'published_at' => Carbon::now()->subDays(18),
                'featured_image' => 'https://images.unsplash.com/photo-1531545514256-b1400bc00f31?q=80&w=1200&auto=format&fit=crop',
                'excerpt' => 'Sebuah pencapaian membanggakan berkat kepercayaan dan dukungan seluruh klien serta mitra kami.',
                'content' => '<p>Dengan penuh rasa syukur, kami mengumumkan bahwa <strong>Kisantra Consult meraih penghargaan sebagai Mitra Konsultan Terbaik 2025</strong>.</p>
<p>Penghargaan ini merupakan bentuk pengakuan atas dedikasi tim kami dalam memberikan layanan profesional di bidang perpajakan, keuangan, dan transformasi digital bisnis.</p>
<blockquote>Pencapaian ini tidak terlepas dari kepercayaan klien dan kerja keras seluruh tim. Terima kasih atas dukungan Anda.</blockquote>
<p>Kami berkomitmen untuk terus meningkatkan kualitas layanan demi pertumbuhan bisnis Anda.</p>',
            ],
            [
                'title' => 'Penyesuaian Jam Operasional Kantor Mulai Bulan Ini',
                'is_pinned' => false,
                'published_at' => Carbon::now()->subDays(25),
                'featured_image' => 'https://images.unsplash.com/photo-1501139083538-0139583c060f?q=80&w=1200&auto=format&fit=crop',
                'excerpt' => 'Mohon perhatikan perubahan jam layanan kantor agar kunjungan dan konsultasi Anda lebih nyaman.',
                'content' => '<p>Demi meningkatkan kualitas pelayanan, kami menginformasikan adanya <strong>penyesuaian jam operasional kantor</strong> Kisantra Consult.</p>
<p><strong>Jam Operasional Baru:</strong></p>
<ul>
<li>Senin&ndash;Jumat: 08.00&ndash;17.00 WITA</li>
<li>Sabtu: 09.00&ndash;13.00 WITA</li>
<li>Minggu &amp; hari libur nasional: tutup</li>
</ul>
<p>Kami menyarankan untuk membuat janji terlebih dahulu sebelum berkunjung agar Anda dapat dilayani dengan optimal. Terima kasih atas perhatiannya.</p>',
            ],
        ];

        foreach ($announcements as $data) {
            $data['slug'] = Str::slug($data['title']);
            $data['status'] = 'published';

            Announcement::create($data);
        }

        $this->command->info('Announcements seeded successfully!');
    }
}
