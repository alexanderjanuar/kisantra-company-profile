<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, create categories if they don't exist
        $categories = [
            [
                'name' => 'Perpajakan',
                'slug' => 'perpajakan',
                'description' => 'Artikel seputar perpajakan dan regulasi pajak',
                'color' => '#14b8a6',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Keuangan',
                'slug' => 'keuangan',
                'description' => 'Strategi keuangan dan manajemen finansial',
                'color' => '#3b82f6',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Bisnis',
                'slug' => 'bisnis',
                'description' => 'Tips dan strategi pengembangan bisnis',
                'color' => '#8b5cf6',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Digital',
                'slug' => 'digital',
                'description' => 'Transformasi digital dan teknologi',
                'color' => '#ec4899',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Regulasi',
                'slug' => 'regulasi',
                'description' => 'Update regulasi dan kebijakan pemerintah',
                'color' => '#f59e0b',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        // Get first user as author, or create one
        $author = User::first();
        if (!$author) {
            $author = User::create([
                'name' => 'Admin Kisantra',
                'email' => 'admin@kisantra.id',
                'password' => bcrypt('password'),
            ]);
        }

        // Get categories for assignment
        $perpajakanCategory = Category::where('slug', 'perpajakan')->first();
        $keuanganCategory = Category::where('slug', 'keuangan')->first();
        $bisnisCategory = Category::where('slug', 'bisnis')->first();
        $digitalCategory = Category::where('slug', 'digital')->first();
        $regulasiCategory = Category::where('slug', 'regulasi')->first();

        // Create articles
        $articles = [
            [
                'title' => 'Panduan Lengkap Pelaporan Pajak Digital di Era 2025',
                'slug' => 'panduan-lengkap-pelaporan-pajak-digital-era-2025',
                'excerpt' => 'Memahami sistem pelaporan pajak digital terbaru dan bagaimana bisnis Anda dapat beradaptasi dengan perubahan regulasi perpajakan di Indonesia.',
                'content' => '<p>Sistem pelaporan pajak digital telah mengalami transformasi signifikan di tahun 2025. Dengan implementasi teknologi blockchain dan AI, proses pelaporan menjadi lebih efisien dan transparan.</p><h2>Perubahan Utama</h2><p>Direktorat Jenderal Pajak telah mengimplementasikan sistem terintegrasi yang memungkinkan wajib pajak untuk melaporkan kewajiban perpajakan secara real-time. Sistem ini tidak hanya mempermudah pelaporan, tetapi juga meningkatkan akurasi data.</p><h2>Manfaat Sistem Digital</h2><ul><li>Pelaporan real-time dan otomatis</li><li>Pengurangan kesalahan manual</li><li>Integrasi dengan sistem akuntansi</li><li>Transparansi yang lebih baik</li></ul><h2>Langkah-Langkah Implementasi</h2><p>Untuk mengadopsi sistem baru ini, perusahaan perlu mempersiapkan infrastruktur digital yang memadai dan melatih tim keuangan untuk menggunakan platform baru.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1554224311-beee4156a875?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'views_count' => rand(100, 500),
                'categories' => [$perpajakanCategory->id, $digitalCategory->id],
            ],
            [
                'title' => 'Strategi Optimalisasi Cash Flow untuk UKM di Samarinda',
                'slug' => 'strategi-optimalisasi-cash-flow-ukm-samarinda',
                'excerpt' => 'Tips praktis mengelola arus kas untuk usaha kecil dan menengah di Kalimantan Timur agar tetap sehat secara finansial.',
                'content' => '<p>Cash flow atau arus kas adalah nadi kehidupan setiap bisnis. Bagi UKM di Samarinda, mengelola arus kas dengan baik menjadi kunci keberlanjutan usaha.</p><h2>Pentingnya Cash Flow Management</h2><p>Banyak UKM mengalami kesulitan bukan karena tidak menguntungkan, tetapi karena masalah arus kas. Pelanggan yang terlambat membayar atau pengeluaran yang tidak terkontrol dapat mengganggu operasional bisnis.</p><h2>5 Strategi Efektif</h2><ol><li>Buat proyeksi cash flow bulanan</li><li>Percepat penagihan piutang</li><li>Negosiasi terms pembayaran dengan supplier</li><li>Bangun cadangan dana darurat</li><li>Gunakan software akuntansi</li></ol><h2>Studi Kasus Lokal</h2><p>Beberapa UKM di Samarinda telah berhasil meningkatkan likuiditas mereka dengan menerapkan sistem pembayaran digital dan manajemen inventory yang lebih baik.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'views_count' => rand(150, 600),
                'categories' => [$keuanganCategory->id, $bisnisCategory->id],
            ],
            [
                'title' => 'Transformasi Digital: Kunci Pertumbuhan Bisnis Modern',
                'slug' => 'transformasi-digital-kunci-pertumbuhan-bisnis-modern',
                'excerpt' => 'Bagaimana teknologi digital dapat meningkatkan efisiensi operasional dan membuka peluang pasar baru untuk bisnis Anda.',
                'content' => '<p>Transformasi digital bukan lagi pilihan, melainkan keharusan bagi bisnis yang ingin tetap kompetitif di era modern. Di Kalimantan Timur, adopsi teknologi digital mengalami percepatan signifikan.</p><h2>Apa itu Transformasi Digital?</h2><p>Transformasi digital adalah integrasi teknologi digital ke dalam semua aspek bisnis, mengubah cara perusahaan beroperasi dan memberikan nilai kepada pelanggan.</p><h2>Area Implementasi Utama</h2><ul><li>Digitalisasi proses bisnis</li><li>E-commerce dan marketplace</li><li>Customer Relationship Management (CRM)</li><li>Data analytics dan business intelligence</li><li>Cloud computing</li></ul><h2>Manfaat Nyata</h2><p>Perusahaan yang telah menjalani transformasi digital melaporkan peningkatan produktivitas hingga 40% dan pengurangan biaya operasional yang signifikan.</p><h2>Langkah Awal</h2><p>Mulai dengan mengidentifikasi proses bisnis yang dapat didigitalkan, kemudian pilih solusi teknologi yang sesuai dengan kebutuhan dan skala bisnis Anda.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(7),
                'views_count' => rand(200, 700),
                'categories' => [$digitalCategory->id, $bisnisCategory->id],
            ],
            [
                'title' => 'Update Regulasi PMK 2025: Yang Perlu Anda Ketahui',
                'slug' => 'update-regulasi-pmk-2025-yang-perlu-anda-ketahui',
                'excerpt' => 'Ringkasan perubahan Peraturan Menteri Keuangan terbaru dan dampaknya terhadap pelaporan keuangan perusahaan.',
                'content' => '<p>Pemerintah telah menerbitkan beberapa Peraturan Menteri Keuangan (PMK) baru di tahun 2025 yang membawa perubahan signifikan dalam tata kelola keuangan perusahaan.</p><h2>Perubahan Utama PMK 2025</h2><p>Regulasi terbaru fokus pada transparansi keuangan, pelaporan berkelanjutan, dan integrasi sistem digital dalam pelaporan pajak dan keuangan.</p><h2>Dampak bagi Perusahaan</h2><ol><li>Kewajiban pelaporan ESG (Environmental, Social, Governance)</li><li>Implementasi e-faktur 4.0</li><li>Perubahan threshold PKP</li><li>Penyesuaian tarif pajak tertentu</li></ol><h2>Timeline Implementasi</h2><p>Perusahaan diberikan masa transisi 6 bulan untuk menyesuaikan sistem dan proses internal mereka dengan regulasi baru.</p><h2>Rekomendasi</h2><p>Segera lakukan gap analysis terhadap sistem Anda saat ini dan konsultasikan dengan ahli pajak untuk memastikan compliance penuh.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'views_count' => rand(300, 800),
                'categories' => [$regulasiCategory->id, $perpajakanCategory->id],
            ],
            [
                'title' => 'Manajemen Risiko Keuangan untuk Ekspansi Bisnis',
                'slug' => 'manajemen-risiko-keuangan-ekspansi-bisnis',
                'excerpt' => 'Strategi mengelola risiko finansial saat perusahaan melakukan ekspansi ke pasar baru atau meluncurkan produk baru.',
                'content' => '<p>Ekspansi bisnis membawa peluang pertumbuhan yang menjanjikan, namun juga datang dengan risiko keuangan yang perlu dikelola dengan hati-hati.</p><h2>Jenis-jenis Risiko Keuangan</h2><ul><li>Risiko likuiditas</li><li>Risiko kredit</li><li>Risiko pasar</li><li>Risiko operasional</li><li>Risiko mata uang (untuk ekspansi internasional)</li></ul><h2>Framework Manajemen Risiko</h2><p>Penerapan framework yang terstruktur membantu perusahaan mengidentifikasi, menilai, dan mengelola risiko secara proaktif.</p><h2>Best Practices</h2><ol><li>Diversifikasi sumber pendanaan</li><li>Hedging untuk risiko mata uang</li><li>Stress testing dan scenario planning</li><li>Monitoring KPI finansial secara real-time</li><li>Asuransi untuk risiko spesifik</li></ol><h2>Studi Kasus</h2><p>Perusahaan yang menerapkan manajemen risiko yang baik memiliki tingkat keberhasilan ekspansi 60% lebih tinggi dibanding yang tidak.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(12),
                'views_count' => rand(120, 450),
                'categories' => [$keuanganCategory->id, $bisnisCategory->id],
            ],
            [
                'title' => 'Insentif Pajak untuk Investasi di Kalimantan Timur',
                'slug' => 'insentif-pajak-investasi-kalimantan-timur',
                'excerpt' => 'Panduan lengkap memanfaatkan insentif pajak dan kemudahan investasi di Provinsi Kalimantan Timur.',
                'content' => '<p>Pemerintah Provinsi Kalimantan Timur menawarkan berbagai insentif pajak yang menarik untuk mendorong investasi di wilayah ini, terutama dalam sektor strategis.</p><h2>Jenis-jenis Insentif</h2><ul><li>Tax holiday untuk industri pionir</li><li>Pengurangan pajak penghasilan</li><li>Pembebasan bea masuk</li><li>Super deduction untuk R&D</li><li>Kemudahan perizinan</li></ul><h2>Sektor Prioritas</h2><p>Fokus insentif diberikan untuk sektor energi terbarukan, teknologi informasi, manufaktur, dan agribisnis.</p><h2>Persyaratan dan Prosedur</h2><ol><li>Registrasi di BKPM atau DPMPTSP</li><li>Memenuhi kriteria investasi minimum</li><li>Komitmen penyerapan tenaga kerja lokal</li><li>Rencana transfer teknologi</li></ol><h2>Case Study</h2><p>Beberapa investor telah merasakan manfaat signifikan dengan penghematan pajak hingga 30% dalam 5 tahun pertama investasi.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(15),
                'views_count' => rand(180, 550),
                'categories' => [$perpajakanCategory->id, $regulasiCategory->id],
            ],
            [
                'title' => 'Blockchain dalam Audit Keuangan: Masa Depan atau Hype?',
                'slug' => 'blockchain-audit-keuangan-masa-depan-atau-hype',
                'excerpt' => 'Eksplorasi potensi teknologi blockchain dalam meningkatkan transparansi dan efisiensi proses audit keuangan.',
                'content' => '<p>Teknologi blockchain menjanjikan revolusi dalam dunia audit keuangan dengan menawarkan transparansi, immutability, dan efisiensi yang belum pernah ada sebelumnya.</p><h2>Apa itu Blockchain Audit?</h2><p>Blockchain audit memanfaatkan distributed ledger technology untuk mencatat transaksi keuangan secara transparan dan tidak dapat diubah, memudahkan proses audit.</p><h2>Keunggulan Blockchain</h2><ul><li>Real-time audit capability</li><li>Pengurangan fraud hingga 90%</li><li>Otomatisasi proses reconciliation</li><li>Trail audit yang lengkap dan permanen</li><li>Biaya audit yang lebih rendah</li></ul><h2>Tantangan Implementasi</h2><p>Meski menjanjikan, adopsi blockchain dalam audit masih menghadapi tantangan seperti regulasi, skalabilitas, dan resistensi terhadap perubahan.</p><h2>Outlook Masa Depan</h2><p>Para ahli memprediksi bahwa dalam 5 tahun ke depan, 50% perusahaan besar akan mengintegrasikan blockchain dalam sistem audit mereka.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1639762681485-074b7f938ba0?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(18),
                'views_count' => rand(250, 650),
                'categories' => [$digitalCategory->id, $keuanganCategory->id],
            ],
            [
                'title' => 'Strategi Pengelolaan Piutang untuk Arus Kas yang Sehat',
                'slug' => 'strategi-pengelolaan-piutang-arus-kas-sehat',
                'excerpt' => 'Teknik efektif mengelola accounts receivable agar cash flow perusahaan tetap positif dan operasional berjalan lancar.',
                'content' => '<p>Piutang yang menumpuk adalah salah satu penyebab utama masalah cash flow dalam bisnis. Pengelolaan piutang yang efektif sangat krusial untuk kesehatan keuangan perusahaan.</p><h2>Masalah Umum Piutang</h2><ul><li>Keterlambatan pembayaran</li><li>Bad debt yang menumpuk</li><li>Tidak ada sistem follow-up yang jelas</li><li>Terms pembayaran yang tidak optimal</li></ul><h2>Strategi Pengelolaan Efektif</h2><ol><li>Implementasi credit policy yang ketat</li><li>Early payment discount</li><li>Aging report dan regular follow-up</li><li>Automated reminder system</li><li>Kolaborasi dengan collection agency</li></ol><h2>Tools dan Teknologi</h2><p>Software AR management modern dapat mengotomatisasi banyak proses dan memberikan visibility real-time terhadap status piutang.</p><h2>Hasil yang Diharapkan</h2><p>Dengan pengelolaan yang baik, perusahaan dapat mengurangi DSO (Days Sales Outstanding) hingga 40% dan meningkatkan cash conversion cycle.</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1554224311-beee4156a875?q=80&w=1200&auto=format&fit=crop',
                'author_id' => $author->id,
                'status' => 'published',
                'published_at' => now()->subDays(20),
                'views_count' => rand(140, 480),
                'categories' => [$keuanganCategory->id, $bisnisCategory->id],
            ],
        ];

        foreach ($articles as $articleData) {
            $categories = $articleData['categories'];
            unset($articleData['categories']);

            $article = Article::updateOrCreate(
                ['slug' => $articleData['slug']],
                $articleData
            );

            // Attach categories
            $article->categories()->sync($categories);
        }

        $this->command->info('Articles seeded successfully!');
    }
}
