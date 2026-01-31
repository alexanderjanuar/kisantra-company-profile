<?php

namespace Database\Seeders;

use App\Models\JobPosting;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JobPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobPostings = [
            [
                'title' => 'Senior Tax Consultant',
                'description' => '<p>Kami mencari Senior Tax Consultant yang berpengalaman untuk bergabung dengan tim konsultan pajak kami. Anda akan bertanggung jawab untuk memberikan konsultasi perpajakan kepada klien korporat dan individual.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Memberikan konsultasi perpajakan untuk klien korporat dan UKM</li>
<li>Melakukan tax review dan tax planning</li>
<li>Membantu persiapan dan pelaporan SPT Tahunan dan SPT Masa</li>
<li>Melakukan analisis risiko perpajakan</li>
<li>Membantu klien dalam menghadapi pemeriksaan pajak</li>
<li>Memberikan training perpajakan kepada klien</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal S1 Akuntansi, Perpajakan, atau bidang terkait</li>
<li>Minimal 5 tahun pengalaman di bidang konsultan pajak</li>
<li>Memiliki Brevet A dan B (Brevet C menjadi nilai tambah)</li>
<li>Menguasai peraturan perpajakan Indonesia dengan baik</li>
<li>Mahir menggunakan aplikasi e-Filing, e-Faktur, dan e-SPT</li>
<li>Memiliki kemampuan analitis dan problem-solving yang baik</li>
<li>Kemampuan komunikasi dan presentasi yang excellent</li>
<li>Dapat bekerja di bawah tekanan dan deadline</li>
</ul>',
                'location' => 'Jakarta',
                'employment_type' => 'full_time',
                'work_type' => 'hybrid',
                'salary_min' => 12000000,
                'salary_max' => 18000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonths(2),
            ],
            [
                'title' => 'Financial Auditor',
                'description' => '<p>Bergabunglah dengan tim audit kami sebagai Financial Auditor. Anda akan terlibat dalam berbagai proyek audit keuangan untuk klien dari berbagai industri.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Melakukan audit laporan keuangan sesuai standar audit yang berlaku</li>
<li>Melakukan risk assessment dan internal control evaluation</li>
<li>Menyusun working paper dan dokumentasi audit</li>
<li>Melakukan analisis keuangan dan identifikasi temuan audit</li>
<li>Menyusun laporan audit dan rekomendasi perbaikan</li>
<li>Berkomunikasi dengan klien terkait temuan dan rekomendasi</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal S1 Akuntansi dengan IPK minimal 3.00</li>
<li>Pengalaman 2-4 tahun di KAP atau internal audit</li>
<li>Memahami PSAK, IFRS, dan standar audit</li>
<li>Mahir menggunakan Ms. Office, terutama Excel</li>
<li>Memiliki sertifikasi CA, CPA, CIA menjadi nilai tambah</li>
<li>Detail-oriented dan memiliki kemampuan analitis yang kuat</li>
<li>Mampu bekerja dalam tim dan mandiri</li>
<li>Bersedia melakukan perjalanan dinas</li>
</ul>',
                'location' => 'Samarinda',
                'employment_type' => 'full_time',
                'work_type' => 'onsite',
                'salary_min' => 8000000,
                'salary_max' => 12000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonths(1),
            ],
            [
                'title' => 'Frontend Developer',
                'description' => '<p>Kami mencari Frontend Developer yang passionate untuk membangun aplikasi web modern dan user-friendly untuk platform digital kami.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Mengembangkan aplikasi web menggunakan React.js dan TypeScript</li>
<li>Implementasi UI/UX design menjadi kode yang responsif</li>
<li>Integrasi dengan RESTful API dan GraphQL</li>
<li>Optimasi performa aplikasi web</li>
<li>Melakukan code review dan testing</li>
<li>Kolaborasi dengan backend developer dan UI/UX designer</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal D3/S1 Teknik Informatika atau bidang terkait</li>
<li>Minimal 2 tahun pengalaman sebagai Frontend Developer</li>
<li>Menguasai React.js, TypeScript, dan modern JavaScript (ES6+)</li>
<li>Familiar dengan state management (Redux, Zustand, atau sejenisnya)</li>
<li>Menguasai HTML5, CSS3, dan CSS frameworks (Tailwind CSS, Bootstrap)</li>
<li>Memahami konsep RESTful API dan HTTP protokol</li>
<li>Familiar dengan version control (Git)</li>
<li>Portfolio atau GitHub profile yang dapat ditunjukkan</li>
<li>Pengalaman dengan Laravel/Inertia.js menjadi nilai tambah</li>
</ul>',
                'location' => 'Remote',
                'employment_type' => 'contract',
                'work_type' => 'remote',
                'salary_min' => 10000000,
                'salary_max' => 15000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonth(),
            ],
            [
                'title' => 'Marketing Strategist',
                'description' => '<p>Kami mencari Marketing Strategist yang kreatif dan data-driven untuk mengembangkan strategi pemasaran yang efektif untuk layanan konsultan kami.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Mengembangkan strategi marketing dan branding untuk perusahaan</li>
<li>Melakukan riset pasar dan analisis kompetitor</li>
<li>Merencanakan dan mengelola campaign marketing (digital dan konvensional)</li>
<li>Mengelola social media dan content marketing</li>
<li>Menganalisis data marketing dan ROI campaign</li>
<li>Koordinasi dengan tim sales untuk lead generation</li>
<li>Mengelola budget marketing</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal S1 Marketing, Komunikasi, atau bidang terkait</li>
<li>Minimal 3 tahun pengalaman di bidang marketing strategy</li>
<li>Memahami digital marketing (SEO, SEM, Social Media, Email Marketing)</li>
<li>Mahir menggunakan tools marketing analytics (Google Analytics, Meta Ads, dll)</li>
<li>Memiliki kemampuan copywriting dan content creation</li>
<li>Data-driven dan memiliki kemampuan analitis yang kuat</li>
<li>Kreatif, inovatif, dan up-to-date dengan tren marketing</li>
<li>Excellent communication dan presentation skills</li>
<li>Pengalaman di B2B marketing menjadi nilai tambah</li>
</ul>',
                'location' => 'Jakarta',
                'employment_type' => 'full_time',
                'work_type' => 'hybrid',
                'salary_min' => 9000000,
                'salary_max' => 14000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonths(2),
            ],
            [
                'title' => 'Business Consultant',
                'description' => '<p>Bergabunglah dengan tim konsultan bisnis kami untuk membantu klien mengoptimalkan operasional bisnis dan mencapai pertumbuhan yang berkelanjutan.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Melakukan analisis bisnis dan identifikasi area improvement</li>
<li>Mengembangkan solusi dan strategi bisnis untuk klien</li>
<li>Melakukan business process mapping dan optimization</li>
<li>Menyusun business plan dan feasibility study</li>
<li>Memberikan presentasi dan rekomendasi kepada klien</li>
<li>Memfasilitasi workshop dan training untuk klien</li>
<li>Monitoring implementasi rekomendasi</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal S1 Manajemen, Ekonomi, atau bidang terkait (S2 menjadi nilai tambah)</li>
<li>Minimal 4 tahun pengalaman di consulting atau strategic planning</li>
<li>Memahami business analysis tools dan frameworks</li>
<li>Kemampuan problem-solving dan analytical thinking yang excellent</li>
<li>Strong presentation dan communication skills</li>
<li>Mahir Ms. Office, terutama PowerPoint dan Excel</li>
<li>Mampu bekerja dengan deadline ketat</li>
<li>Bersedia melakukan perjalanan dinas</li>
<li>Memiliki sertifikasi PMP, Six Sigma, atau sejenisnya menjadi nilai tambah</li>
</ul>',
                'location' => 'Jakarta',
                'employment_type' => 'full_time',
                'work_type' => 'onsite',
                'salary_min' => 15000000,
                'salary_max' => 22000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonths(3),
            ],
            [
                'title' => 'Junior Accountant',
                'description' => '<p>Kesempatan untuk fresh graduate atau yang memiliki pengalaman 1-2 tahun untuk memulai karir sebagai Junior Accountant di perusahaan konsultan yang berkembang pesat.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Melakukan pencatatan transaksi keuangan harian</li>
<li>Membuat jurnal penyesuaian dan rekonsiliasi bank</li>
<li>Membantu penyusunan laporan keuangan</li>
<li>Mengelola dokumen keuangan dan arsip</li>
<li>Membantu proses budgeting dan forecasting</li>
<li>Membantu dalam proses audit internal dan eksternal</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal S1 Akuntansi dengan IPK minimal 3.00</li>
<li>Fresh graduate atau pengalaman maksimal 2 tahun</li>
<li>Memahami standar akuntansi (PSAK)</li>
<li>Mahir menggunakan Ms. Excel</li>
<li>Familiar dengan software akuntansi (Accurate, SAP, dll) menjadi nilai tambah</li>
<li>Teliti, detail-oriented, dan terorganisir</li>
<li>Mampu bekerja dalam tim</li>
<li>Bersedia belajar dan berkembang</li>
</ul>',
                'location' => 'Jakarta',
                'employment_type' => 'full_time',
                'work_type' => 'onsite',
                'salary_min' => 5500000,
                'salary_max' => 7500000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonth()->addWeeks(2),
            ],
            [
                'title' => 'HR Manager',
                'description' => '<p>Kami mencari HR Manager yang berpengalaman untuk memimpin fungsi human resources dan mengembangkan talent di perusahaan kami.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Mengembangkan dan mengimplementasikan strategi HR</li>
<li>Mengelola proses recruitment end-to-end</li>
<li>Mengembangkan program training dan development</li>
<li>Mengelola performance management system</li>
<li>Memastikan compliance dengan regulasi ketenagakerjaan</li>
<li>Mengelola employee engagement dan company culture</li>
<li>Menangani employee relations dan conflict resolution</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal S1 Psikologi, Manajemen SDM, atau bidang terkait</li>
<li>Minimal 5 tahun pengalaman di HR, minimal 2 tahun di posisi manajerial</li>
<li>Memahami UU Ketenagakerjaan dan regulasi terkait</li>
<li>Pengalaman dalam recruitment, training, dan performance management</li>
<li>Leadership skills dan people management yang kuat</li>
<li>Excellent communication dan interpersonal skills</li>
<li>Mampu bekerja strategis dan operasional</li>
<li>Memiliki sertifikasi HR (CHRP, CPHR, dll) menjadi nilai tambah</li>
</ul>',
                'location' => 'Jakarta',
                'employment_type' => 'full_time',
                'work_type' => 'hybrid',
                'salary_min' => 14000000,
                'salary_max' => 20000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonths(2),
            ],
            [
                'title' => 'IT Support Specialist',
                'description' => '<p>Kami mencari IT Support Specialist untuk memberikan dukungan teknis kepada tim internal dan memastikan infrastruktur IT berjalan dengan lancar.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Memberikan technical support untuk hardware dan software</li>
<li>Melakukan instalasi, konfigurasi, dan maintenance perangkat IT</li>
<li>Troubleshooting masalah teknis dan network</li>
<li>Mengelola user accounts dan access permissions</li>
<li>Melakukan backup data dan disaster recovery</li>
<li>Dokumentasi sistem dan prosedur IT</li>
<li>Memberikan training dasar IT kepada user</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal D3/S1 Teknik Informatika atau bidang terkait</li>
<li>Minimal 2 tahun pengalaman sebagai IT Support atau Help Desk</li>
<li>Menguasai Windows, MacOS, dan Linux</li>
<li>Memahami networking (TCP/IP, DNS, DHCP, VPN)</li>
<li>Familiar dengan Active Directory dan Office 365</li>
<li>Memiliki kemampuan troubleshooting yang baik</li>
<li>Customer service oriented dan komunikatif</li>
<li>Bersedia on-call untuk emergency support</li>
<li>Memiliki sertifikasi (CompTIA A+, Network+, dll) menjadi nilai tambah</li>
</ul>',
                'location' => 'Jakarta',
                'employment_type' => 'full_time',
                'work_type' => 'onsite',
                'salary_min' => 7000000,
                'salary_max' => 10000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonth()->addWeeks(3),
            ],
            [
                'title' => 'Content Writer Intern',
                'description' => '<p>Kesempatan magang untuk mahasiswa atau fresh graduate yang passionate di bidang content writing dan digital marketing.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Menulis artikel blog, social media content, dan website copy</li>
<li>Melakukan riset topik dan keyword research</li>
<li>Membuat content calendar</li>
<li>Mengedit dan proofread konten</li>
<li>Membantu tim marketing dalam campaign content</li>
<li>Menganalisis performa konten</li>
</ul>',
                'requirements' => '<ul>
<li>Mahasiswa semester akhir atau fresh graduate (S1 semua jurusan)</li>
<li>Memiliki passion di content writing dan digital marketing</li>
<li>Kemampuan menulis bahasa Indonesia dan Inggris yang baik</li>
<li>Kreatif dan memiliki ide-ide fresh</li>
<li>Familiar dengan SEO dasar</li>
<li>Aktif di social media</li>
<li>Memiliki portfolio writing menjadi nilai tambah</li>
<li>Mampu bekerja dengan deadline</li>
<li>Tersedia untuk magang minimal 3 bulan</li>
</ul>',
                'location' => 'Remote',
                'employment_type' => 'internship',
                'work_type' => 'remote',
                'salary_min' => 2500000,
                'salary_max' => 3500000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addWeeks(3),
            ],
            [
                'title' => 'Data Analyst',
                'description' => '<p>Bergabunglah dengan tim analytics kami untuk mengubah data menjadi insights yang actionable untuk mendukung keputusan bisnis klien.</p>

<p><strong>Tanggung Jawab:</strong></p>
<ul>
<li>Melakukan analisis data dan identifikasi trends</li>
<li>Membuat dashboard dan visualisasi data</li>
<li>Melakukan data cleaning dan transformation</li>
<li>Mengembangkan model prediktif dan forecasting</li>
<li>Menyusun laporan analisis dan rekomendasi</li>
<li>Berkolaborasi dengan tim untuk memahami kebutuhan data</li>
</ul>',
                'requirements' => '<ul>
<li>Minimal S1 Statistik, Matematika, Teknik Informatika, atau bidang terkait</li>
<li>Minimal 2 tahun pengalaman sebagai Data Analyst</li>
<li>Menguasai SQL dan Excel tingkat lanjut</li>
<li>Familiar dengan tools visualisasi (Tableau, Power BI, atau sejenisnya)</li>
<li>Menguasai Python atau R untuk data analysis</li>
<li>Memahami statistical analysis dan data modeling</li>
<li>Strong analytical dan problem-solving skills</li>
<li>Mampu berkomunikasi insights dengan jelas</li>
<li>Pengalaman dengan big data tools menjadi nilai tambah</li>
</ul>',
                'location' => 'Jakarta',
                'employment_type' => 'full_time',
                'work_type' => 'hybrid',
                'salary_min' => 10000000,
                'salary_max' => 16000000,
                'status' => 'active',
                'application_deadline' => Carbon::now()->addMonths(2),
            ],
        ];

        foreach ($jobPostings as $posting) {
            JobPosting::create($posting);
        }

        $this->command->info('Job postings seeded successfully!');
    }
}
