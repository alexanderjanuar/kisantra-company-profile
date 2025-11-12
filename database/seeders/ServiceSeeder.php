<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            // PERPAJAKAN
            [
                'name' => 'Lapor SPT Masa',
                'category' => 'Perpajakan',
                'description' => 'Layanan pelaporan SPT Masa bulanan untuk kepatuhan perpajakan perusahaan Anda',
                'price' => 'Rp 750.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Pelaporan rutin setiap bulan',
                    'Konsultasi perpajakan',
                    'Monitoring kepatuhan'
                ],
                'target_business_types' => ['umkm', 'company'],
                'target_pkp_status' => ['yes'],
                'search_keywords' => ['SPT', 'Masa', 'Bulanan', 'PKP'],
                'recommendation_priority' => 8,
                'order' => 1,
            ],
            [
                'name' => 'Lapor SPT Tahunan: Badan',
                'category' => 'Perpajakan',
                'description' => 'Pelaporan SPT Tahunan untuk badan usaha dengan layanan lengkap dan profesional',
                'price' => 'Rp 1.350.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Penyusunan laporan keuangan',
                    'Perhitungan pajak terutang',
                    'E-filing SPT Tahunan'
                ],
                'target_business_types' => ['company'],
                'target_pkp_status' => null,
                'search_keywords' => ['SPT', 'Tahunan', 'Badan', 'PT', 'Perusahaan'],
                'recommendation_priority' => 9,
                'order' => 2,
            ],
            [
                'name' => 'Lapor SPT Tahunan: Orang Pribadi',
                'category' => 'Perpajakan',
                'description' => 'Layanan pelaporan SPT Tahunan untuk orang pribadi dengan proses mudah dan cepat',
                'price' => 'Rp 500.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Perhitungan PPh 21',
                    'Konsultasi pajak pribadi',
                    'E-filing online'
                ],
                'target_business_types' => ['personal'],
                'target_pkp_status' => null,
                'search_keywords' => ['SPT', 'Tahunan', 'Pribadi', 'Personal', 'Individu'],
                'recommendation_priority' => 7,
                'order' => 3,
            ],
            [
                'name' => 'Permohonan Pengukuhan PKP',
                'category' => 'Perpajakan',
                'description' => 'Pengurusan pengukuhan sebagai Pengusaha Kena Pajak (PKP) untuk bisnis Anda',
                'price' => 'Rp 2.500.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Persiapan dokumen',
                    'Pengajuan ke DJP',
                    'Monitoring proses'
                ],
                'target_business_types' => ['new', 'umkm', 'company'],
                'target_pkp_status' => ['no', 'not_sure'],
                'search_keywords' => ['PKP', 'Pengukuhan', 'Kena Pajak'],
                'recommendation_priority' => 10,
                'order' => 4,
            ],
            [
                'name' => 'Aktivasi Sertifikat Elektronik',
                'category' => 'Perpajakan',
                'description' => 'Layanan aktivasi sertifikat elektronik untuk keperluan perpajakan digital',
                'price' => 'Rp 1.600.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Instalasi sertifikat',
                    'Konfigurasi sistem',
                    'Panduan penggunaan'
                ],
                'target_business_types' => ['umkm', 'company'],
                'target_pkp_status' => ['yes'],
                'search_keywords' => ['Sertifikat', 'Elektronik', 'Digital', 'E-Faktur'],
                'recommendation_priority' => 6,
                'order' => 5,
            ],
            [
                'name' => 'Aktivasi Kode EFIN',
                'category' => 'Perpajakan',
                'description' => 'Pengurusan dan aktivasi kode EFIN untuk akses layanan pajak online',
                'price' => 'Rp 350.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Pengurusan ke KPP',
                    'Aktivasi akun DJP Online',
                    'Panduan penggunaan'
                ],
                'target_business_types' => ['new', 'umkm', 'company', 'personal'],
                'target_pkp_status' => null,
                'search_keywords' => ['EFIN', 'Kode', 'Aktivasi', 'DJP Online'],
                'recommendation_priority' => 9,
                'order' => 6,
            ],

            // KEUANGAN
            [
                'name' => 'Laporan Keuangan Bulanan',
                'category' => 'Keuangan',
                'description' => 'Penyusunan laporan keuangan bulanan yang akurat dan tepat waktu',
                'price' => 'Rp 3.000.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Neraca & Laba Rugi',
                    'Analisis keuangan',
                    'Konsultasi bulanan'
                ],
                'target_business_types' => ['umkm', 'company'],
                'target_pkp_status' => null,
                'search_keywords' => ['Laporan', 'Keuangan', 'Bulanan', 'Financial Statement'],
                'recommendation_priority' => 7,
                'order' => 7,
            ],
            [
                'name' => 'Laporan Keuangan Triwulan',
                'category' => 'Keuangan',
                'description' => 'Laporan keuangan komprehensif setiap 3 bulan untuk evaluasi bisnis',
                'price' => 'Rp 5.000.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Laporan lengkap',
                    'Proyeksi keuangan',
                    'Rekomendasi strategis'
                ],
                'target_business_types' => ['company'],
                'target_pkp_status' => null,
                'search_keywords' => ['Laporan', 'Keuangan', 'Triwulan', 'Quarterly'],
                'recommendation_priority' => 6,
                'order' => 8,
            ],
            [
                'name' => 'Laporan Keuangan Tahunan',
                'category' => 'Keuangan',
                'description' => 'Laporan keuangan tahunan lengkap untuk keperluan audit dan evaluasi',
                'price' => 'Rp 4.500.000',
                'price_note' => 'Mulai dari',
                'features' => [
                    'Audit-ready financial statements',
                    'Analisis mendalam',
                    'Konsultasi strategis'
                ],
                'target_business_types' => ['umkm', 'company'],
                'target_pkp_status' => null,
                'search_keywords' => ['Laporan', 'Keuangan', 'Tahunan', 'Annual'],
                'recommendation_priority' => 8,
                'order' => 9,
            ],

            // PERIZINAN
            [
                'name' => 'Pengurusan NIB',
                'category' => 'Perizinan',
                'description' => 'Pengurusan Nomor Induk Berusaha (NIB) untuk legalitas usaha Anda',
                'price' => 'Hubungi Kami',
                'price_note' => null,
                'features' => [
                    'Proses cepat via OSS',
                    'Konsultasi gratis',
                    'Follow up lengkap'
                ],
                'target_business_types' => ['new'],
                'target_pkp_status' => null,
                'search_keywords' => ['NIB', 'Nomor Induk Berusaha', 'OSS', 'Izin'],
                'recommendation_priority' => 10,
                'order' => 10,
            ],
            [
                'name' => 'Izin Usaha Perdagangan',
                'category' => 'Perizinan',
                'description' => 'Pengurusan izin usaha untuk sektor perdagangan dan industri',
                'price' => 'Hubungi Kami',
                'price_note' => null,
                'features' => [
                    'SIUP & TDP',
                    'Izin domisili',
                    'Konsultasi perizinan'
                ],
                'target_business_types' => ['new', 'umkm'],
                'target_pkp_status' => null,
                'search_keywords' => ['Izin', 'Usaha', 'Perdagangan', 'SIUP', 'TDP'],
                'recommendation_priority' => 8,
                'order' => 11,
            ],
            [
                'name' => 'Akta Pendirian PT/CV',
                'category' => 'Perizinan',
                'description' => 'Pembuatan akta pendirian dan perubahan untuk PT atau CV',
                'price' => 'Hubungi Kami',
                'price_note' => null,
                'features' => [
                    'Notaris terpercaya',
                    'SK Kemenkumham',
                    'NPWP Perusahaan'
                ],
                'target_business_types' => ['new', 'company'],
                'target_pkp_status' => null,
                'search_keywords' => ['Akta', 'Pendirian', 'PT', 'CV', 'Notaris'],
                'recommendation_priority' => 9,
                'order' => 12,
            ],

            // DIGITAL
            [
                'name' => 'Social Media Management',
                'category' => 'Digital',
                'description' => 'Pengelolaan media sosial profesional untuk meningkatkan brand awareness',
                'price' => 'Rp 3.000.000',
                'price_note' => 'Per bulan',
                'features' => [
                    'Content planning',
                    'Design grafis',
                    'Analisis performa'
                ],
                'target_business_types' => ['new', 'umkm', 'company'],
                'target_pkp_status' => null,
                'search_keywords' => ['Social Media', 'Marketing', 'Instagram', 'Facebook'],
                'recommendation_priority' => 5,
                'order' => 13,
            ],
            [
                'name' => 'Logo Production',
                'category' => 'Digital',
                'description' => 'Pembuatan logo profesional dan identitas visual brand Anda',
                'price' => 'Rp 1.250.000',
                'price_note' => null,
                'features' => [
                    '3 konsep desain',
                    'Revisi unlimited',
                    'File format lengkap'
                ],
                'target_business_types' => ['new'],
                'target_pkp_status' => null,
                'search_keywords' => ['Logo', 'Design', 'Branding', 'Visual'],
                'recommendation_priority' => 7,
                'order' => 14,
            ],
            [
                'name' => 'Website Development',
                'category' => 'Digital',
                'description' => 'Pembuatan website profesional untuk kebutuhan bisnis Anda',
                'price' => 'Hubungi Kami',
                'price_note' => null,
                'features' => [
                    'Responsive design',
                    'SEO friendly',
                    'Maintenance 3 bulan'
                ],
                'target_business_types' => ['new', 'umkm', 'company'],
                'target_pkp_status' => null,
                'search_keywords' => ['Website', 'Web', 'Development', 'Online'],
                'recommendation_priority' => 6,
                'order' => 15,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}