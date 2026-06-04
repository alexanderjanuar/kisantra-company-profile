import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { Navbar } from '../components/Navbar';
import { Contact } from '../components/Contact';

interface Announcement {
  id: number;
  title: string;
  slug: string;
  excerpt?: string | null;
  featured_image?: string | null;
  is_pinned: boolean;
  published_at: string | null;
  attachments_count: number;
}

interface PengumumanProps {
  announcements?: Announcement[];
}

const formatDate = (date: string | null) => {
  if (!date) return '';
  return new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(new Date(date));
};

const Cover: React.FC<{ src?: string | null; alt: string; className?: string }> = ({ src, alt, className }) =>
  src ? (
    <img src={src} alt={alt} className={`h-full w-full object-cover ${className ?? ''}`} loading="lazy" />
  ) : (
    <div className={`flex h-full w-full items-center justify-center bg-gradient-to-br from-neutral-100 to-lux-teal/10 ${className ?? ''}`}>
      <svg className="h-12 w-12 text-lux-teal/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.25} d="M10 19v-8.586l-3.293 3.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L13 10.414V19m6 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2z" />
      </svg>
    </div>
  );

const PinnedBadge: React.FC = () => (
  <span className="inline-flex items-center gap-1.5 rounded-full bg-lux-teal/10 px-3 py-1 text-[11px] font-bold uppercase tracking-[0.12em] text-lux-teal-dark">
    <svg className="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24">
      <path d="M6 2a1 1 0 00-1 1v18l7-5 7 5V3a1 1 0 00-1-1H6z" />
    </svg>
    Disematkan
  </span>
);

const FeaturedCard: React.FC<{ item: Announcement }> = ({ item }) => (
  <motion.div
    initial={{ opacity: 0, y: 28 }}
    animate={{ opacity: 1, y: 0 }}
    transition={{ duration: 0.6, ease: [0.16, 1, 0.3, 1] }}
  >
    <Link
      href={`/pengumuman/${item.slug}`}
      className="group grid overflow-hidden rounded-3xl border border-neutral-200 bg-white transition-all duration-300 hover:border-lux-teal/60 hover:shadow-[0_30px_70px_-30px_rgba(10,10,10,0.25)] lg:min-h-[400px] lg:grid-cols-2"
    >
      <div className="relative aspect-[16/10] overflow-hidden lg:aspect-auto">
        <Cover
          src={item.featured_image}
          alt={item.title}
          className="transition-transform duration-700 group-hover:scale-105 lg:absolute lg:inset-0"
        />
      </div>
      <div className="flex flex-col justify-center gap-4 p-8 md:p-12">
        <div className="flex flex-wrap items-center gap-3">
          {item.is_pinned && <PinnedBadge />}
          <span className="font-mono text-xs uppercase tracking-[0.2em] text-neutral-400">
            {formatDate(item.published_at)}
          </span>
        </div>
        <h2 className="text-3xl font-bold leading-tight tracking-tight text-lux-black transition-colors duration-300 group-hover:text-lux-teal md:text-4xl">
          {item.title}
        </h2>
        {item.excerpt && <p className="line-clamp-3 text-base leading-relaxed text-neutral-500">{item.excerpt}</p>}
        <span className="mt-2 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.15em] text-lux-black transition-colors group-hover:text-lux-teal">
          Baca Selengkapnya
          <svg className="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </span>
      </div>
    </Link>
  </motion.div>
);

const AnnouncementCard: React.FC<{ item: Announcement; index: number }> = ({ item, index }) => (
  <motion.div
    initial={{ opacity: 0, y: 28 }}
    whileInView={{ opacity: 1, y: 0 }}
    viewport={{ once: true, margin: '-60px' }}
    transition={{ duration: 0.5, delay: (index % 3) * 0.08, ease: [0.16, 1, 0.3, 1] }}
  >
    <Link
      href={`/pengumuman/${item.slug}`}
      className="group flex h-full flex-col overflow-hidden rounded-3xl border border-neutral-200 bg-white transition-all duration-300 hover:-translate-y-1.5 hover:border-lux-teal/60 hover:shadow-[0_24px_60px_-24px_rgba(10,10,10,0.18)]"
    >
      <div className="relative aspect-[16/10] overflow-hidden">
        <Cover src={item.featured_image} alt={item.title} className="transition-transform duration-700 group-hover:scale-105" />
        {item.is_pinned && (
          <span className="absolute left-4 top-4 inline-flex items-center gap-1.5 rounded-full bg-white/95 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.12em] text-lux-teal-dark shadow-sm backdrop-blur">
            <svg className="h-3 w-3" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6 2a1 1 0 00-1 1v18l7-5 7 5V3a1 1 0 00-1-1H6z" />
            </svg>
            Disematkan
          </span>
        )}
      </div>
      <div className="flex flex-1 flex-col p-6">
        <span className="mb-2 font-mono text-xs uppercase tracking-[0.18em] text-neutral-400">
          {formatDate(item.published_at)}
        </span>
        <h3 className="text-lg font-bold leading-snug tracking-tight text-lux-black transition-colors duration-300 group-hover:text-lux-teal">
          {item.title}
        </h3>
        {item.excerpt && <p className="mt-2 line-clamp-2 text-sm leading-relaxed text-neutral-500">{item.excerpt}</p>}
        <div className="mt-auto flex items-center justify-between gap-3 border-t border-neutral-100 pt-4">
          {item.attachments_count > 0 ? (
            <span className="inline-flex items-center gap-1.5 text-xs font-medium text-neutral-400">
              <svg className="h-4 w-4 text-lux-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
              </svg>
              {item.attachments_count} lampiran
            </span>
          ) : (
            <span />
          )}
          <span className="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-[0.12em] text-lux-black transition-colors group-hover:text-lux-teal">
            Baca
            <svg className="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </span>
        </div>
      </div>
    </Link>
  </motion.div>
);

const Pengumuman: React.FC<PengumumanProps> = ({ announcements = [] }) => {
  const [featured, ...rest] = announcements;

  return (
    <>
      <Head>
        <title>Pengumuman</title>
        <meta
          name="description"
          content="Informasi dan pengumuman resmi terbaru dari Kisantra Consult di Samarinda, Kalimantan Timur."
        />
        <meta name="keywords" content="Pengumuman Kisantra, Informasi Resmi, Berita Kisantra Consult, Samarinda" />
      </Head>

      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        transition={{ duration: 0.5 }}
        className="min-h-screen bg-lux-white text-lux-black selection:bg-lux-teal selection:text-white"
      >
        <Navbar />

        {/* Header */}
        <header className="px-6 pt-36 pb-12 md:px-12 md:pt-44">
          <div className="mx-auto max-w-[1400px]">
            <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ duration: 0.6 }}>
              <span className="mb-4 block text-xs font-bold uppercase tracking-[0.3em] text-lux-teal">Informasi</span>
              <h1 className="max-w-4xl text-4xl font-bold leading-[1.05] tracking-tight text-lux-black md:text-6xl lg:text-7xl">
                Pengumuman <span className="font-serif font-normal italic text-lux-teal">Terkini</span>
              </h1>
              <p className="mt-6 max-w-2xl text-base leading-relaxed text-neutral-500 md:text-lg">
                Informasi dan kabar resmi terbaru dari Kisantra Consult. Pastikan Anda selalu mengikuti
                perkembangan melalui kanal resmi ini.
              </p>
            </motion.div>
          </div>
        </header>

        {/* Content */}
        <main className="px-6 pb-24 md:px-12">
          <div className="mx-auto flex max-w-[1400px] flex-col gap-12">
            {announcements.length === 0 ? (
              <div className="flex flex-col items-center justify-center rounded-3xl border border-dashed border-neutral-300 bg-white/50 px-6 py-24 text-center">
                <svg className="mb-5 h-12 w-12 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <h3 className="text-lg font-bold text-lux-black">Belum ada pengumuman</h3>
                <p className="mt-2 max-w-sm text-sm text-neutral-500">
                  Pengumuman terbaru akan tampil di sini. Silakan cek kembali secara berkala.
                </p>
              </div>
            ) : (
              <>
                {featured && <FeaturedCard item={featured} />}

                {rest.length > 0 && (
                  <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    {rest.map((item, index) => (
                      <AnnouncementCard key={item.id} item={item} index={index} />
                    ))}
                  </div>
                )}
              </>
            )}
          </div>
        </main>

        <Contact />
      </motion.div>
    </>
  );
};

export default Pengumuman;
