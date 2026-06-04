import React from 'react';
import { motion } from 'framer-motion';

interface Service {
  title: string;
  subtitle: string;
  description: string;
  price: string;
  priceUnit: string;
  features: string[];
  popular?: boolean;
}

// Ordered so the "popular" tier (Perpajakan) sits in the centre of the row.
const services: Service[] = [
  {
    title: 'Keuangan',
    subtitle: 'Financial Advisory & Audit',
    description: 'Laporan keuangan standar PSAK yang akurat & tepat waktu.',
    price: '750.000',
    priceUnit: '/ bulan',
    features: [
      'Laporan Laba Rugi & Neraca',
      'Analisis Arus Kas',
      'Valuasi Aset & Bisnis',
      'Audit Internal Operasional',
    ],
  },
  {
    title: 'Digital Marketing',
    subtitle: 'Growth & Performance',
    description: 'Strategi pemasaran berbasis data untuk mendongkrak omset.',
    price: '1.500.000',
    priceUnit: '/ project',
    features: [
      'SEO & SEM Optimization',
      'Social Media Management',
      'Meta & Google Ads',
      'Brand Identity Design',
    ],
  },
  {
    title: 'Perpajakan',
    subtitle: 'Tax Compliance & Strategy',
    description: 'Kepatuhan pajak menyeluruh untuk menekan risiko sengketa & denda.',
    price: '1.500.000',
    priceUnit: '/ bulan',
    popular: true,
    features: [
      'Pelaporan SPT Tahunan & Masa',
      'Perhitungan PPN & PPh',
      'Review & Audit Kepatuhan',
      'Pendampingan Pemeriksaan Pajak',
      'Konsultasi Sengketa & Keberatan',
      'Tax Planning Korporasi',
    ],
  },
  {
    title: 'Sistem Digital',
    subtitle: 'Automation & ERP',
    description: 'Infrastruktur teknologi untuk efisiensi operasional terpusat.',
    price: '2.500.000',
    priceUnit: '/ system',
    features: [
      'Custom ERP Development',
      'Pembuatan Website Korporat',
      'Dashboard Visualisasi Data',
      'Cloud Server Setup',
    ],
  },
  {
    title: 'Administrasi',
    subtitle: 'Licensing & Legal Setup',
    description: 'Pengurusan legalitas & dokumen usaha hingga siap beroperasi.',
    price: '350.000',
    priceUnit: '/ dokumen',
    features: [
      'Pembuatan NPWP Pribadi & Badan',
      'Pengukuhan PKP',
      'Pendirian PT & CV',
      'Izin Usaha (NIB & OSS)',
    ],
  },
];

const CheckIcon: React.FC<{ dark?: boolean }> = ({ dark }) => (
  <span
    className={`mt-px flex h-5 w-5 shrink-0 items-center justify-center rounded-full ${
      dark ? 'bg-lux-teal text-lux-black' : 'bg-lux-teal/10 text-lux-teal'
    }`}
  >
    <svg className="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={3} d="M5 13l4 4L19 7" />
    </svg>
  </span>
);

const PriceCard: React.FC<{ service: Service; index: number }> = ({ service, index }) => {
  const popular = Boolean(service.popular);

  return (
    <motion.a
      href="/layanan"
      initial={{ opacity: 0, y: 32 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true, margin: '-60px' }}
      transition={{ duration: 0.5, delay: index * 0.08, ease: [0.16, 1, 0.3, 1] }}
      whileTap={{ scale: 0.99 }}
      className={`group relative flex h-full flex-col rounded-3xl p-7 transition-all duration-300 ${
        popular
          ? 'bg-lux-black text-white shadow-[0_30px_70px_-30px_rgba(10,10,10,0.45)] ring-2 ring-lux-teal'
          : 'border border-neutral-200 bg-white hover:-translate-y-1.5 hover:border-lux-teal/60 hover:shadow-[0_24px_60px_-24px_rgba(10,10,10,0.18)]'
      }`}
    >
      {/* Badge slot — fixed height on every card so content stays aligned */}
      <div className="mb-5 flex h-6 items-center">
        {popular && (
          <span className="inline-flex items-center gap-1.5 rounded-full bg-lux-teal px-3.5 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-lux-black">
            <span className="h-1.5 w-1.5 rounded-full bg-lux-black" />
            Paling Populer
          </span>
        )}
      </div>

      {/* Plan name (fixed-height header keeps prices on the same line) */}
      <span className={`block min-h-[2rem] text-[11px] font-bold uppercase leading-tight tracking-[0.2em] text-lux-teal`}>
        {service.subtitle}
      </span>
      <h3 className={`mt-1.5 min-h-[3.5rem] text-2xl font-bold leading-tight tracking-tight ${popular ? 'text-white' : 'text-lux-black'}`}>
        {service.title}
      </h3>
      <p className={`mt-2 min-h-[2.75rem] text-sm leading-relaxed ${popular ? 'text-white/60' : 'text-neutral-500'}`}>
        {service.description}
      </p>

      {/* Price */}
      <div className={`mt-6 border-t pt-6 ${popular ? 'border-white/10' : 'border-neutral-100'}`}>
        <span className={`block text-[11px] font-semibold uppercase tracking-[0.18em] ${popular ? 'text-white/40' : 'text-neutral-400'}`}>
          Mulai dari
        </span>
        <div className="mt-2 flex items-baseline gap-1.5">
          <span className={`text-base font-semibold ${popular ? 'text-white/50' : 'text-neutral-400'}`}>IDR</span>
          <span className={`text-3xl font-bold leading-none tracking-tight tabular-nums ${popular ? 'text-white' : 'text-lux-black'}`}>
            {service.price}
          </span>
        </div>
        <span className={`mt-1.5 block text-xs font-medium ${popular ? 'text-white/50' : 'text-neutral-400'}`}>
          {service.priceUnit}
        </span>
      </div>

      {/* Features */}
      <ul className={`mt-6 flex-grow space-y-3 border-t pt-6 ${popular ? 'border-white/10' : 'border-neutral-100'}`}>
        {service.features.map((f) => (
          <li key={f} className={`flex items-start gap-3 text-sm font-medium ${popular ? 'text-white/85' : 'text-neutral-700'}`}>
            <CheckIcon dark={popular} />
            <span>{f}</span>
          </li>
        ))}
      </ul>

      {/* CTA */}
      <div
        className={`mt-8 flex w-full items-center justify-center gap-2 rounded-xl py-3.5 text-xs font-bold uppercase tracking-[0.15em] transition-colors duration-300 ${
          popular
            ? 'bg-lux-teal text-lux-black hover:bg-lux-teal-light'
            : 'bg-lux-black text-white group-hover:bg-lux-teal'
        }`}
      >
        Selengkapnya
        <svg
          className="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1.5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
      </div>
    </motion.a>
  );
};

export const Services: React.FC = () => {
  return (
    <section className="w-full bg-lux-white py-20 md:py-32">
      <div className="mx-auto max-w-[1400px] px-6 md:px-12">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="mb-16 flex flex-col items-center text-center md:mb-20"
        >
          <span className="mb-4 block text-xs font-bold uppercase tracking-[0.3em] text-lux-teal">
            Layanan Kami di Samarinda
          </span>
          <h2 className="max-w-3xl text-4xl font-bold leading-[1.05] tracking-tight text-lux-black md:text-5xl lg:text-6xl">
            Solusi & Harga yang{' '}
            <span className="font-serif font-normal italic text-lux-teal">Transparan</span>
          </h2>
          <p className="mt-6 max-w-2xl text-base leading-relaxed text-neutral-500 md:text-lg">
            Pilih layanan yang sesuai dengan kebutuhan bisnis Anda. Semua paket dikelola langsung oleh
            konsultan berpengalaman di Samarinda.
          </p>
        </motion.div>

        {/* Pricing grid */}
        <div className="grid grid-cols-1 items-stretch gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
          {services.map((service, index) => (
            <PriceCard key={service.title} service={service} index={index} />
          ))}
        </div>

        <p className="mt-10 text-center text-sm text-neutral-400">
          Harga dapat disesuaikan dengan skala &amp; kebutuhan.{' '}
          <a href="/kontak" className="font-semibold text-lux-teal hover:underline">
            Konsultasi gratis →
          </a>
        </p>
      </div>
    </section>
  );
};
