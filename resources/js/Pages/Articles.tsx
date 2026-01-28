import React, { useState, useMemo } from 'react';
import { Head, Link } from '@inertiajs/react';
import { motion, AnimatePresence } from 'framer-motion';
import { Navbar } from '../components/Navbar';
import { Contact } from '../components/Contact';

// --- Shared Types ---
interface Article {
    id: number;
    title: string;
    slug: string;
    excerpt?: string;
    featured_image?: string;
    published_at: string;
    categories: Array<{
        id: number;
        name: string;
        slug: string;
    }>;
}

interface ArticlesPageProps {
    articles?: Article[];
}

// --- Mock Data ---
const MOCK_ARTICLES: Article[] = [
    {
        id: 1,
        title: "Strategi Perpajakan Tahun 2025: Apa yang Perlu Diketahui?",
        slug: "strategi-perpajakan-2025",
        excerpt: "Panduan lengkap mengenai perubahan regulasi pajak terbaru dan dampaknya bagi korporasi. Simak analisis mendalam dari tim ahli kami.",
        featured_image: "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=1000&auto=format&fit=crop",
        published_at: "2025-01-15T09:00:00Z",
        categories: [{ id: 1, name: "Pajak", slug: "pajak" }]
    },
    {
        id: 2,
        title: "Digitalisasi Keuangan: Mengapa Excel Tidak Cukup Lagi",
        slug: "digitalisasi-keuangan",
        excerpt: "Transformasi sistem keuangan manual menuju otomatisasi ERP untuk efisiensi maksimal.",
        featured_image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-12-20T14:30:00Z",
        categories: [{ id: 2, name: "Teknologi", slug: "teknologi" }]
    },
    {
        id: 3,
        title: "Audit Internal: Menemukan Kebocoran Cash Flow",
        slug: "audit-internal-cash-flow",
        excerpt: "Bagaimana audit internal berkala dapat menyelamatkan bisnis Anda dari kerugian tak terdeteksi.",
        featured_image: "https://images.unsplash.com/photo-1628348068343-c6a848d2b6dd?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-11-10T10:15:00Z",
        categories: [{ id: 3, name: "Audit", slug: "audit" }]
    },
    {
        id: 4,
        title: "Memahami Insentif Pajak untuk UMKM di Kalimantan",
        slug: "insentif-pajak-umkm",
        excerpt: "Peluang penghematan pajak legal yang sering dilewatkan oleh pengusaha lokal.",
        featured_image: "https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-10-05T08:45:00Z",
        categories: [{ id: 1, name: "Pajak", slug: "pajak" }]
    },
    {
        id: 5,
        title: "Membangun Brand Identity di Era Digital",
        slug: "brand-identity-era-digital",
        excerpt: "Pentingnya konsistensi visual dan pesan dalam membangun kepercayaan pelanggan.",
        featured_image: "https://images.unsplash.com/photo-1493612276216-9c783706349d?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-09-12T11:20:00Z",
        categories: [{ id: 4, name: "Marketing", slug: "marketing" }]
    },
    {
        id: 6,
        title: "Cybersecurity untuk Bisnis Finansial",
        slug: "cybersecurity-bisnis-finansial",
        excerpt: "Melindungi data sensitif klien dari ancaman siber yang semakin canggih.",
        featured_image: "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-08-30T13:00:00Z",
        categories: [{ id: 2, name: "Teknologi", slug: "teknologi" }]
    },
    {
        id: 7,
        title: "Analisis Pasar: Tren Ekonomi Kaltim 2025",
        slug: "analisis-pasar-kaltim-2025",
        excerpt: "Proyeksi pertumbuhan ekonomi lokal dan sektor-sektor potensial tahun depan.",
        featured_image: "https://images.unsplash.com/photo-1526304640152-d4619684e484?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-07-20T09:00:00Z",
        categories: [{ id: 5, name: "Bisnis", slug: "bisnis" }]
    }
];

// --- Helpers ---
const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(date);
};

// --- Components ---

const ArticleCard: React.FC<{ article: Article; compact?: boolean }> = ({ article, compact = false }) => (
    <Link href={`/berita/${article.slug}`} className="group block h-full">
        <div className={`relative overflow-hidden rounded-xl bg-neutral-100 mb-4 ${compact ? 'aspect-[4/3]' : 'aspect-[16/10]'}`}>
            <img
                src={article.featured_image || 'https://via.placeholder.com/800x500'}
                alt={article.title}
                className="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
            />
            <div className="absolute inset-0 bg-lux-black/10 group-hover:bg-transparent transition-colors duration-500" />
            {!compact && (
                <div className="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded shadow-sm">
                    <span className="text-[10px] font-bold uppercase tracking-widest text-lux-black">
                        {article.categories[0]?.name}
                    </span>
                </div>
            )}
        </div>
        <div className="flex flex-col gap-2">
            <span className="text-[10px] md:text-xs font-mono text-neutral-400 uppercase tracking-widest">
                {formatDate(article.published_at)}
            </span>
            <h3 className={`font-bold text-lux-black leading-tight group-hover:text-lux-teal transition-colors duration-300 ${compact ? 'text-lg' : 'text-xl md:text-2xl'}`}>
                {article.title}
            </h3>
            {!compact && (
                <p className="text-sm text-neutral-500 line-clamp-2 leading-relaxed">
                    {article.excerpt}
                </p>
            )}
        </div>
    </Link>
);

const FeaturedArticle: React.FC<{ article: Article }> = ({ article }) => (
    <div className="relative w-full aspect-[4/5] md:aspect-[21/9] rounded-3xl overflow-hidden mb-20 group cursor-pointer">
        <Link href={`/berita/${article.slug}`}>
            <img
                src={article.featured_image}
                alt={article.title}
                className="absolute inset-0 w-full h-full object-cover transition-transform duration-[1.5s] ease-out group-hover:scale-105"
            />
            <div className="absolute inset-0 bg-gradient-to-t from-lux-black via-lux-black/40 to-transparent opacity-90" />

            <div className="absolute bottom-0 left-0 w-full p-8 md:p-16 flex flex-col items-start gap-6">
                <div className="flex items-center gap-4">
                    <span className="px-4 py-1.5 bg-lux-teal text-white text-xs font-bold uppercase tracking-widest rounded-full">
                        Featured
                    </span>
                    <span className="text-xs font-mono text-neutral-300 uppercase tracking-widest">
                        {formatDate(article.published_at)}
                    </span>
                </div>
                <h2 className="text-3xl md:text-5xl lg:text-6xl font-bold text-white leading-[1.1] max-w-4xl group-hover:text-lux-teal transition-colors duration-300">
                    {article.title}
                </h2>
                <p className="text-neutral-300 text-lg md:text-xl max-w-2xl font-light line-clamp-3">
                    {article.excerpt}
                </p>
                <div className="flex items-center gap-3 text-white font-bold text-sm uppercase tracking-widest mt-2 group-hover:gap-6 transition-all duration-300">
                    Baca Artikel Utama <span>→</span>
                </div>
            </div>
        </Link>
    </div>
);

const Articles: React.FC<ArticlesPageProps> = ({ articles = MOCK_ARTICLES }) => {
    // --- State ---
    const [search, setSearch] = useState('');
    const [selectedCategory, setSelectedCategory] = useState<string>('All');

    // --- Processing Data ---
    const categories = useMemo(() => {
        const uniqueParams = new Set(articles.flatMap(article => article.categories.map(c => c.name)));
        return ['All', ...Array.from(uniqueParams)];
    }, [articles]);

    const isNewsstandMode = search === '' && selectedCategory === 'All';

    // 1. Featured Logic (Latest Article)
    const featuredArticle = useMemo(() => {
        return [...articles].sort((a, b) => new Date(b.published_at).getTime() - new Date(a.published_at).getTime())[0];
    }, [articles]);

    // 2. Grouped Articles (excluding Featured)
    const groupedArticles = useMemo(() => {
        const remaining = articles.filter(a => a.id !== featuredArticle.id);
        const groups: Record<string, Article[]> = {};

        remaining.forEach(article => {
            const cat = article.categories[0]?.name || 'Uncategorized';
            if (!groups[cat]) groups[cat] = [];
            groups[cat].push(article);
        });

        // Ensure "Pajak" or "Teknologi" come first if prominent
        return groups;
    }, [articles, featuredArticle]);

    // 3. Filtered Logic (Search/Category Mode)
    const filteredArticles = useMemo(() => {
        return articles.filter(article => {
            const matchesSearch = article.title.toLowerCase().includes(search.toLowerCase()) ||
                article.excerpt?.toLowerCase().includes(search.toLowerCase());
            const matchesCategory = selectedCategory === 'All' ||
                article.categories.some(c => c.name === selectedCategory);
            return matchesSearch && matchesCategory;
        });
    }, [articles, search, selectedCategory]);

    return (
        <>
            <Head title="Wawasan & Artikel" />
            <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ duration: 0.8 }}
                className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white"
            >
                <Navbar />

                <main className="pt-32 pb-24 px-6 md:px-12 w-full max-w-[1400px] mx-auto min-h-screen">

                    {/* --- Filters & Search Toolbar --- */}
                    <div className="sticky top-24 z-30 bg-lux-white/95 backdrop-blur-xl py-6 mb-12 border-b border-neutral-100 transition-all">
                        <div className="flex flex-col md:flex-row justify-between items-center gap-6">

                            {/* Category Tabs */}
                            <div className="flex flex-wrap gap-2 justify-center md:justify-start">
                                {categories.map(category => (
                                    <button
                                        key={category}
                                        onClick={() => setSelectedCategory(category)}
                                        className={`px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 ${selectedCategory === category
                                            ? 'bg-lux-black text-white shadow-lg shadow-lux-black/20 scale-105'
                                            : 'bg-neutral-100 text-neutral-500 hover:bg-neutral-200'
                                            }`}
                                    >
                                        {category}
                                    </button>
                                ))}
                            </div>

                            {/* Search */}
                            <div className="relative w-full md:w-72">
                                <input
                                    type="text"
                                    placeholder="Cari topik..."
                                    value={search}
                                    onChange={(e) => setSearch(e.target.value)}
                                    className="w-full pl-4 pr-10 py-2.5 border border-neutral-200 rounded-full text-sm focus:outline-none focus:border-lux-teal focus:ring-1 focus:ring-lux-teal bg-neutral-50/50"
                                />
                                <svg className="w-4 h-4 text-neutral-400 absolute right-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {/* --- Content Layout Switcher --- */}
                    <AnimatePresence mode="wait">
                        {isNewsstandMode ? (
                            <motion.div
                                key="newsstand"
                                initial={{ opacity: 0, y: 20 }}
                                animate={{ opacity: 1, y: 0 }}
                                exit={{ opacity: 0, y: -20 }}
                                transition={{ duration: 0.5 }}
                            >
                                {/* 1. Featured Hero */}
                                {featuredArticle && <FeaturedArticle article={featuredArticle} />}

                                {/* 2. Categorized Groups */}
                                <div className="space-y-24">
                                    {Object.entries(groupedArticles).map(([category, groupArticles]) => (
                                        <section key={category}>
                                            <div className="flex items-end gap-6 mb-10 border-b border-neutral-200 pb-4">
                                                <h3 className="text-3xl md:text-4xl font-bold text-lux-black tracking-tight">
                                                    {category}
                                                </h3>
                                                <span className="text-sm font-mono text-neutral-400 mb-1.5 uppercase tracking-widest">
                                                    // {groupArticles.length} Artikel
                                                </span>
                                            </div>

                                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                                                {groupArticles.map((article) => (
                                                    <div key={article.id} className="h-full">
                                                        <ArticleCard article={article} compact={true} />
                                                    </div>
                                                ))}
                                            </div>
                                        </section>
                                    ))}
                                </div>
                            </motion.div>
                        ) : (
                            <motion.div
                                key="search-results"
                                initial={{ opacity: 0 }}
                                animate={{ opacity: 1 }}
                                exit={{ opacity: 0 }}
                                transition={{ duration: 0.5 }}
                            >
                                <div className="mb-8">
                                    <h2 className="text-lg text-neutral-500">
                                        Menampilkan {filteredArticles.length} hasil untuk
                                        {search && <span className="text-lux-black font-bold"> "{search}"</span>}
                                        {selectedCategory !== 'All' && <span> di kategori <span className="text-lux-black font-bold">{selectedCategory}</span></span>}
                                    </h2>
                                </div>

                                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-16">
                                    {filteredArticles.length > 0 ? (
                                        filteredArticles.map(article => (
                                            <ArticleCard key={article.id} article={article} />
                                        ))
                                    ) : (
                                        <div className="col-span-full py-20 text-center text-neutral-400">
                                            Tidak ada artikel yang cocok dengan kriteria pencarian.
                                        </div>
                                    )}
                                </div>
                            </motion.div>
                        )}
                    </AnimatePresence>

                </main>
                <Contact />
            </motion.div>
        </>
    );
};

export default Articles;
