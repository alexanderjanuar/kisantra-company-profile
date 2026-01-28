import React, { useState, useMemo, useRef } from 'react';
import { Head, Link } from '@inertiajs/react';
import { motion, AnimatePresence, useScroll, useTransform } from 'framer-motion';
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
        title: "Strategi Perpajakan Tahun 2025.",
        slug: "strategi-perpajakan-2025",
        excerpt: "Panduan lengkap mengenai perubahan regulasi pajak terbaru dan dampaknya bagi korporasi. Simak analisis mendalam dari tim ahli kami.",
        featured_image: "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=1000&auto=format&fit=crop",
        published_at: "2025-01-15T09:00:00Z",
        categories: [{ id: 1, name: "Pajak", slug: "pajak" }]
    },
    {
        id: 2,
        title: "Digitalisasi Keuangan: Excel Tidak Cukup Lagi",
        slug: "digitalisasi-keuangan",
        excerpt: "Transformasi sistem keuangan manual menuju otomatisasi ERP untuk efisiensi maksimal.",
        featured_image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-12-20T14:30:00Z",
        categories: [{ id: 2, name: "Teknologi", slug: "teknologi" }]
    },
    {
        id: 3,
        title: "Audit Internal: Kebocoran Cash Flow",
        slug: "audit-internal-cash-flow",
        excerpt: "Bagaimana audit internal berkala dapat menyelamatkan bisnis Anda dari kerugian tak terdeteksi.",
        featured_image: "https://images.unsplash.com/photo-1628348068343-c6a848d2b6dd?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-11-10T10:15:00Z",
        categories: [{ id: 3, name: "Audit", slug: "audit" }]
    },
    {
        id: 4,
        title: "Insentif Pajak UMKM: Peluang Tersembunyi",
        slug: "insentif-pajak-umkm",
        excerpt: "Peluang penghematan pajak legal yang sering dilewatkan oleh pengusaha lokal.",
        featured_image: "https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-10-05T08:45:00Z",
        categories: [{ id: 1, name: "Pajak", slug: "pajak" }]
    },
    {
        id: 5,
        title: "Brand Identity di Era Digital",
        slug: "brand-identity-era-digital",
        excerpt: "Pentingnya konsistensi visual dan pesan dalam membangun kepercayaan pelanggan.",
        featured_image: "https://images.unsplash.com/photo-1493612276216-9c783706349d?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-09-12T11:20:00Z",
        categories: [{ id: 4, name: "Marketing", slug: "marketing" }]
    },
    {
        id: 6,
        title: "Cybersecurity Bisnis Finansial",
        slug: "cybersecurity-bisnis-finansial",
        excerpt: "Melindungi data sensitif klien dari ancaman siber yang semakin canggih.",
        featured_image: "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-08-30T13:00:00Z",
        categories: [{ id: 2, name: "Teknologi", slug: "teknologi" }]
    },
    {
        id: 7,
        title: "Tren Ekonomi Kaltim 2025",
        slug: "analisis-pasar-kaltim-2025",
        excerpt: "Proyeksi pertumbuhan ekonomi lokal dan sektor-sektor potensial tahun depan.",
        featured_image: "https://images.unsplash.com/photo-1526304640152-d4619684e484?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-07-20T09:00:00Z",
        categories: [{ id: 5, name: "Bisnis", slug: "bisnis" }]
    },
    {
        id: 8,
        title: "Automation Payroll System",
        slug: "automation-payroll",
        excerpt: "Mengurangi human error dalam penggajian karyawan.",
        featured_image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1000&auto=format&fit=crop",
        published_at: "2024-06-15T09:00:00Z",
        categories: [{ id: 2, name: "Teknologi", slug: "teknologi" }]
    }
];

// --- Helpers ---
const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(date);
};

// --- Components ---

const FeaturedHero: React.FC<{ article: Article }> = ({ article }) => {
    const ref = useRef(null);
    const { scrollYProgress } = useScroll({
        target: ref,
        offset: ["start start", "end start"]
    });

    // Parallax & Fade Effects
    const y = useTransform(scrollYProgress, [0, 1], ["0%", "30%"]);
    const textY = useTransform(scrollYProgress, [0, 1], ["0%", "50%"]);
    const opacity = useTransform(scrollYProgress, [0, 0.8], [1, 0]);

    return (
        <section ref={ref} className="relative w-full h-[90vh] overflow-hidden bg-lux-black flex items-end">
            <Link href={`/berita/${article.slug}`} className="absolute inset-0 group">
                <motion.div style={{ y, opacity }} className="absolute inset-0">
                    <img
                        src={article.featured_image}
                        alt={article.title}
                        className="w-full h-full object-cover opacity-60 group-hover:opacity-70 transition-opacity duration-1000 ease-out scale-105"
                    />
                    <div className="absolute inset-0 bg-gradient-to-t from-lux-black via-lux-black/30 to-transparent" />
                </motion.div>

                <motion.div
                    style={{ y: textY, opacity }}
                    className="relative z-10 p-6 md:p-16 w-full max-w-[1600px] mx-auto flex flex-col items-start gap-6 pb-24 md:pb-32"
                >
                    <div className="overflow-hidden">
                        <motion.span
                            initial={{ y: "100%" }}
                            animate={{ y: 0 }}
                            transition={{ duration: 0.8, ease: [0.76, 0, 0.24, 1] }}
                            className="inline-block px-4 py-2 bg-lux-teal text-white text-xs font-bold uppercase tracking-widest rounded-full"
                        >
                            Featured Insight
                        </motion.span>
                    </div>

                    <div className="overflow-hidden">
                        <motion.h1
                            initial={{ y: "100%" }}
                            animate={{ y: 0 }}
                            transition={{ duration: 0.8, delay: 0.1, ease: [0.76, 0, 0.24, 1] }}
                            className="text-5xl md:text-8xl lg:text-9xl font-black text-white leading-[0.9] tracking-tighter max-w-6xl group-hover:text-lux-teal transition-colors duration-500"
                        >
                            {article.title}
                        </motion.h1>
                    </div>

                    <div className="overflow-hidden max-w-2xl">
                        <motion.p
                            initial={{ y: "100%" }}
                            animate={{ y: 0 }}
                            transition={{ duration: 0.8, delay: 0.2, ease: [0.76, 0, 0.24, 1] }}
                            className="text-neutral-300 text-lg md:text-2xl font-light line-clamp-3 leading-relaxed"
                        >
                            {article.excerpt}
                        </motion.p>
                    </div>
                </motion.div>
            </Link>
        </section>
    );
};

const EditorialGrid: React.FC<{ category: string, articles: Article[] }> = ({ category, articles }) => {
    // If we have 3 or more articles, use a "Bento" style layout
    const primary = articles[0];
    const secondaries = articles.slice(1);

    return (
        <section className="py-20 w-full px-6 md:px-12 max-w-[1600px] mx-auto border-t border-neutral-200">
            <div className="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <h2 className="text-[12vw] md:text-[8vw] leading-[0.8] font-black tracking-tighter text-lux-black opacity-10 select-none">
                    {category.toUpperCase()}
                </h2>
                <div className="absolute left-6 md:left-12 mt-10 md:mt-24">
                    <span className="block text-xs font-bold text-lux-teal uppercase tracking-[0.3em] mb-2">// Category</span>
                    <span className="text-3xl md:text-5xl font-bold text-lux-black">{category}</span>
                </div>
                <Link href={`/search?category=${category}`} className="hidden md:block text-xs font-bold uppercase tracking-widest border-b border-lux-black pb-1 hover:text-lux-teal hover:border-lux-teal transition-colors">
                    View All {category}
                </Link>
            </div>

            <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                {/* Primary Article - Big Focus */}
                <div className="lg:col-span-7 flex flex-col gap-6 group cursor-pointer">
                    <Link href={`/berita/${primary.slug}`} className="block overflow-hidden rounded-[2rem]">
                        <div className="relative aspect-[4/3] overflow-hidden">
                            <img
                                src={primary.featured_image}
                                alt={primary.title}
                                className="w-full h-full object-cover transition-transform duration-1000 ease-[0.22,1,0.36,1] group-hover:scale-105"
                            />
                            <div className="absolute inset-0 bg-lux-black/10 group-hover:bg-transparent transition-colors" />
                        </div>
                    </Link>
                    <div>
                        <span className="text-xs font-mono text-neutral-400 uppercase tracking-widest mb-2 block">
                            {formatDate(primary.published_at)}
                        </span>
                        <Link href={`/berita/${primary.slug}`}>
                            <h3 className="text-3xl md:text-5xl font-bold text-lux-black leading-[1.1] mb-4 group-hover:text-lux-teal transition-colors">
                                {primary.title}
                            </h3>
                        </Link>
                        <p className="text-neutral-500 text-lg leading-relaxed max-w-xl">
                            {primary.excerpt}
                        </p>
                    </div>
                </div>

                {/* Secondary Articles - List / Smaller Grid */}
                <div className="lg:col-span-5 flex flex-col gap-12 border-l border-neutral-100 lg:pl-12">
                    {secondaries.map((article) => (
                        <div key={article.id} className="flex flex-col md:flex-row gap-6 group cursor-pointer">
                            <Link href={`/berita/${article.slug}`} className="w-full md:w-1/3 aspect-square rounded-xl overflow-hidden shrink-0">
                                <img
                                    src={article.featured_image || 'https://via.placeholder.com/400'}
                                    alt={article.title}
                                    className="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                />
                            </Link>
                            <div className="flex flex-col justify-center">
                                <span className="text-[10px] font-mono text-neutral-400 uppercase tracking-widest mb-2">
                                    {formatDate(article.published_at)}
                                </span>
                                <Link href={`/berita/${article.slug}`}>
                                    <h4 className="text-xl font-bold text-lux-black leading-tight mb-2 group-hover:text-lux-teal transition-colors">
                                        {article.title}
                                    </h4>
                                </Link>
                                <div className="mt-auto pt-4 flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-lux-teal opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">
                                    Read Insights <span>→</span>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
};

const ArticleCardSimple: React.FC<{ article: Article }> = ({ article }) => (
    <Link href={`/berita/${article.slug}`} className="group block">
        <div className="relative aspect-[16/9] overflow-hidden rounded-xl bg-neutral-100 mb-4">
            <img
                src={article.featured_image || 'https://via.placeholder.com/800x500'}
                alt={article.title}
                className="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
            />
        </div>
        <h3 className="text-xl font-bold text-lux-black leading-tight group-hover:text-lux-teal transition-colors mb-2">
            {article.title}
        </h3>
        <p className="text-sm text-neutral-500 line-clamp-2">
            {article.excerpt}
        </p>
    </Link>
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
                transition={{ duration: 1 }}
                className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white"
            >
                <Navbar />

                {/* --- Search/Nav Overlay (Floating) --- */}
                <motion.div
                    initial={{ y: -100 }}
                    animate={{ y: 0 }}
                    className="fixed top-0 left-0 w-full z-40 ptr-events-none"
                >
                    <div className="absolute top-6 right-20 md:right-32 z-50 pointer-events-auto">
                        <button
                            onClick={() => {
                                const el = document.getElementById('search-panel');
                                el?.scrollIntoView({ behavior: 'smooth' });
                            }}
                            className="w-10 h-10 md:w-12 md:h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-lux-black hover:bg-lux-teal hover:text-white transition-all duration-300"
                        >
                            <svg className="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </motion.div>

                <main className="w-full">
                    <AnimatePresence mode="wait">
                        {isNewsstandMode ? (
                            <motion.div
                                key="newsstand"
                                initial={{ opacity: 0 }}
                                animate={{ opacity: 1 }}
                                exit={{ opacity: 0 }}
                            >
                                {/* 1. Massive Featured Hero */}
                                {featuredArticle && <FeaturedHero article={featuredArticle} />}

                                {/* 2. Editorial Sections */}
                                <div className="flex flex-col gap-0 bg-lux-white relative z-10">
                                    {Object.entries(groupedArticles).map(([category, groupArticles], idx) => (
                                        <EditorialGrid key={idx} category={category} articles={groupArticles} />
                                    ))}
                                </div>
                            </motion.div>
                        ) : (
                            <motion.div
                                key="search-results"
                                initial={{ opacity: 0 }}
                                animate={{ opacity: 1 }}
                                exit={{ opacity: 0 }}
                                className="pt-32 px-6 md:px-12 max-w-[1400px] mx-auto min-h-screen"
                            >
                                <div className="mb-12">
                                    <h2 className="text-4xl font-bold mb-4">Search Results</h2>
                                    <p className="text-neutral-500">
                                        Showing {filteredArticles.length} results matches your criteria.
                                    </p>
                                </div>
                                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                                    {filteredArticles.map(article => (
                                        <ArticleCardSimple key={article.id} article={article} />
                                    ))}
                                </div>
                            </motion.div>
                        )}
                    </AnimatePresence>

                    {/* --- Search Panel Footer --- */}
                    <div id="search-panel" className="bg-neutral-50 border-t border-neutral-200 py-24 px-6 md:px-12">
                        <div className="max-w-4xl mx-auto text-center">
                            <h3 className="text-3xl font-bold mb-8">Discover More Insights</h3>
                            <div className="relative max-w-xl mx-auto mb-12">
                                <input
                                    type="text"
                                    placeholder="Search topic, keyword..."
                                    value={search}
                                    onChange={(e) => setSearch(e.target.value)}
                                    className="w-full text-center text-xl py-4 bg-transparent border-b-2 border-neutral-300 focus:border-lux-teal focus:outline-none transition-colors"
                                />
                            </div>

                            <div className="flex flex-wrap justify-center gap-4">
                                {categories.map(category => (
                                    <button
                                        key={category}
                                        onClick={() => {
                                            setSelectedCategory(category);
                                            window.scrollTo({ top: 0, behavior: 'smooth' });
                                        }}
                                        className={`px-6 py-3 rounded-full text-sm font-bold uppercase tracking-widest transition-all duration-300 ${selectedCategory === category
                                            ? 'bg-lux-black text-white'
                                            : 'bg-white border border-neutral-200 text-neutral-500 hover:border-lux-teal hover:text-lux-teal'
                                            }`}
                                    >
                                        {category}
                                    </button>
                                ))}
                            </div>
                        </div>
                    </div>

                </main>
                <Contact />
            </motion.div>
        </>
    );
};

export default Articles;
