import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { motion, useScroll, useSpring, useTransform } from 'framer-motion';
import { Navbar } from '../components/Navbar';
import { Contact } from '../components/Contact';

// --- Types ---
interface Article {
    id: number;
    title: string;
    slug: string;
    excerpt: string;
    content?: string;
    featured_image: string;
    published_at: string;
    author?: {
        name: string;
        avatar?: string;
        role?: string;
    };
    categories: Array<{
        id: number;
        name: string;
        slug: string;
    }>;
}

interface ArticleDetailProps {
    article: Article;
    related_articles?: Article[];
}

// --- Mock Content ---
const MOCK_CONTENT = `
    <div class="bg-neutral-50 border-l-4 border-lux-teal p-6 md:p-8 my-8 rounded-r-xl">
        <h4 class="font-bold text-lux-teal uppercase tracking-widest text-xs mb-3">Key Insights</h4>
        <ul class="list-disc list-inside space-y-2 text-lux-black font-medium leading-relaxed">
            <li>Transformasi digital meningkatkan produktivitas hingga 60% dalam tahun pertama.</li>
            <li>Transparansi keuangan adalah kunci kepercayaan investor jangka panjang.</li>
            <li>Integrasi pajak cerdas dan teknologi finansial adalah pembeda pasar di 2025.</li>
        </ul>
    </div>

    <p class="lead">Dalam lanskap bisnis yang berubah dengan cepat saat ini, kemampuan untuk beradaptasi dengan transformasi digital bukan lagi sebuah kemewahan, melainkan kebutuhan mendesak bagi perusahaan yang ingin bertahan dan berkembang.</p>
    
    <h2>Era Baru Efisiensi</h2>
    <p>Pergeseran menuju otomatisasi tidak hanya tentang memotong biaya. Ini tentang merevolusi cara kita berpikir tentang alokasi sumber daya. Statistik terbaru menunjukkan bahwa perusahaan yang mengadopsi solusi ERP berbasis cloud mengalami peningkatan produktivitas operasional yang signifikan.</p>
    <p>Namun, tantangannya bukan pada teknologinya, melainkan pada budaya. Mengubah pola pikir tim dari "cara yang selalu kita lakukan" menjadi "cara yang mungkin kita lakukan" seringkali merupakan rintangan terbesar. Kepemimpinan yang kuat diperlukan untuk menavigasi perubahan ini.</p>

    <h2>Strategi Keuangan Berkelanjutan</h2>
    <p>Di Kisantra, kami percaya bahwa kesehatan finansial dimulai dari transparansi. Audit internal bukan sekadar mencari kesalahan, tapi memetakan peluang yang terlewatkan. Tanpa visibilitas yang jelas terhadap arus kas (cash flow), keputusan strategis hanyalah tebakan yang mahal.</p>
    <blockquote>"Transparansi keuangan adalah fondasi dari kepercayaan investor dan keberlanjutan bisnis jangka panjang."</blockquote>
    <p>Kami merekomendasikan pendekatan bertahap: audit diagnostik, implementasi kontrol sistem, dan peninjauan berkala. Ini memastikan bahwa pertumbuhan tidak mengorbankan kepatuhan.</p>

    <h2>Kesimpulan</h2>
    <p>Menghadapi 2025, integrasi antara strategi pajak yang cerdas dan teknologi finansial akan menjadi pembeda utama antara pemimpin pasar dan pengikut. Apakah bisnis Anda siap untuk langkah selanjutnya?</p>
`;

// --- Components ---

const ProgressBar = () => {
    const { scrollYProgress } = useScroll();
    const scaleX = useSpring(scrollYProgress, {
        stiffness: 100,
        damping: 30,
        restDelta: 0.001
    });

    return (
        <motion.div
            className="fixed top-0 left-0 right-0 h-1.5 bg-lux-teal origin-left z-50"
            style={{ scaleX }}
        />
    );
};

const SocialShare = () => {
    const [copied, setCopied] = React.useState(false);

    const handleCopy = () => {
        navigator.clipboard.writeText(window.location.href);
        setCopied(true);
        setTimeout(() => setCopied(false), 2000);
    };

    return (
        <div className="flex flex-row gap-2 items-center p-2 bg-white/80 backdrop-blur-xl rounded-full border border-lux-black/5 shadow-[0_8px_35px_rgba(0,0,0,0.15)] hover:scale-105 transition-transform duration-300">
            {/* Label */}
            <div className="hidden md:flex items-center gap-2 px-3 border-r border-neutral-200">
                <span className="text-[10px] font-bold uppercase tracking-widest text-lux-black">Share</span>
            </div>

            {/* Copy Link */}
            <div className="relative group">
                <button
                    onClick={handleCopy}
                    className="w-10 h-10 rounded-full bg-transparent hover:bg-lux-teal/10 flex items-center justify-center text-lux-black hover:text-lux-teal transition-all duration-300"
                    title="Copy Link"
                >
                    {copied ? (
                        <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path></svg>
                    ) : (
                        <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    )}
                </button>
                <span className="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 bg-lux-black text-white text-[10px] uppercase font-bold tracking-widest rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                    {copied ? 'Copied!' : 'Copy'}
                </span>
            </div>

            {/* Social Icons */}
            {[
                { i: 'l', label: 'LinkedIn', icon: <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" /></svg> },
                { i: 't', label: 'Twitter', icon: <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" /></svg> },
                { i: 'w', label: 'WhatsApp', icon: <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" /></svg> }
            ].map((item) => (
                <div key={item.i} className="relative group">
                    <button className="w-10 h-10 rounded-full bg-transparent hover:bg-lux-teal/10 flex items-center justify-center text-lux-black hover:text-lux-teal transition-all duration-300">
                        {item.icon}
                    </button>
                    {/* Tooltip */}
                    <span className="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 bg-lux-black text-white text-[10px] uppercase font-bold tracking-widest rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none z-50">
                        {item.label}
                    </span>
                </div>
            ))}
        </div>
    );
};

const AuthorBio: React.FC<{ author?: Article['author'] }> = ({ author }) => (
    <div className="bg-neutral-50 rounded-2xl p-8 flex flex-col md:flex-row gap-6 items-center md:items-start text-center md:text-left mt-16 border border-neutral-100">
        <div className="w-20 h-20 rounded-full overflow-hidden bg-white ring-4 ring-neutral-100 shrink-0 shadow-sm">
            <img
                src={author?.avatar || "https://ui-avatars.com/api/?name=Kisantra+Team&background=0D0D0D&color=fff"}
                alt={author?.name || "Kisantra Team"}
                className="w-full h-full object-cover"
            />
        </div>
        <div>
            <div className="flex items-center gap-3 justify-center md:justify-start mb-2">
                <h4 className="text-xl font-bold font-serif text-lux-black">{author?.name || "Tim Editorial Kisantra"}</h4>
                <span className="px-2 py-0.5 bg-lux-teal/10 text-lux-teal text-[10px] font-bold uppercase tracking-widest rounded-full">Author</span>
            </div>
            <p className="text-neutral-500 text-sm leading-relaxed max-w-lg">
                Profesional berpengalaman di bidang konsultan manajemen, perpajakan, dan teknologi finansial. Berdedikasi untuk memberikan wawasan mendalam bagi pertumbuhan bisnis klien.
            </p>
        </div>
    </div>
);

const CommentSection = () => (
    <div className="mt-16 pt-16 border-t border-neutral-200">
        <h3 className="text-2xl font-bold font-serif text-lux-black mb-8">Diskusi (3)</h3>
        {/* Mock Comments */}
        <div className="space-y-8 mb-12">
            {[1, 2].map((i) => (
                <div key={i} className="flex gap-4">
                    <div className="w-10 h-10 rounded-full bg-neutral-100 shrink-0" />
                    <div>
                        <div className="flex items-center gap-2 mb-1">
                            <span className="font-bold text-sm text-lux-black">Pembaca {i}</span>
                            <span className="text-xs text-neutral-400">• 2 jam yang lalu</span>
                        </div>
                        <p className="text-sm text-neutral-600">Artikel yang sangat membuka wawasan, terutama bagian mengenai transformasi digital.</p>
                    </div>
                </div>
            ))}
        </div>
        {/* Form */}
        <form className="bg-neutral-50 p-6 rounded-xl border border-neutral-100">
            <h4 className="text-sm font-bold uppercase tracking-widest text-neutral-500 mb-4">Tinggalkan Komentar</h4>
            <textarea
                className="w-full h-32 p-4 bg-white border border-neutral-200 rounded-lg text-sm focus:outline-none focus:border-lux-teal mb-4 transition-colors"
                placeholder="Tulis pendapat Anda..."
            ></textarea>
            <button type="button" className="px-6 py-3 bg-lux-black text-white text-xs font-bold uppercase tracking-widest rounded hover:bg-lux-teal transition-colors">
                Kirim Komentar
            </button>
        </form>
    </div>
);

const Sidebar: React.FC<{ articles: Article[] }> = ({ articles }) => {
    if (!articles || articles.length === 0) return null;

    return (
        <aside className="space-y-8 sticky top-32">
            <div className="bg-neutral-50 rounded-2xl p-6 md:p-8 border border-neutral-100">
                <span className="text-xs font-bold uppercase tracking-widest text-lux-teal mb-4 block">
                    Baca Juga
                </span>
                <h3 className="text-2xl font-bold font-serif text-lux-black mb-6">
                    Artikel Terkait
                </h3>
                <div className="flex flex-col gap-6">
                    {articles.map((article) => (
                        <Link key={article.id} href={`/articles/${article.slug}`} className="group flex gap-4 items-start">
                            <div className="w-20 h-20 rounded-lg overflow-hidden shrink-0 bg-neutral-200">
                                <img
                                    src={article.featured_image}
                                    alt={article.title}
                                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                />
                            </div>
                            <div>
                                <h4 className="text-sm font-bold text-lux-black leading-tight mb-1 group-hover:text-lux-teal transition-colors line-clamp-2">
                                    {article.title}
                                </h4>
                                <span className="text-[10px] font-mono text-neutral-400 uppercase tracking-widest">
                                    {new Date(article.published_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })}
                                </span>
                            </div>
                        </Link>
                    ))}
                </div>
            </div>

            {/* Newsletter / CTA Widget in Sidebar */}
            <div className="bg-lux-black text-white rounded-2xl p-6 md:p-8 relative overflow-hidden">
                <div className="absolute top-0 right-0 w-32 h-32 bg-lux-teal/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2" />
                <h4 className="text-lg font-bold mb-2 relative z-10">Subscribe to Kisantra</h4>
                <p className="text-neutral-400 text-sm mb-6 relative z-10 leading-relaxed">
                    Dapatkan wawasan eksklusif mingguan langsung ke inbox Anda.
                </p>
                <form className="relative z-10 space-y-3">
                    <input
                        type="email"
                        placeholder="Email Address"
                        className="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 text-sm text-white placeholder:text-neutral-500 focus:outline-none focus:border-lux-teal transition-colors"
                    />
                    <button type="button" className="w-full bg-lux-teal text-white font-bold uppercase tracking-widest text-xs py-3 rounded-lg hover:bg-lux-teal-dark transition-colors">
                        Subscribe
                    </button>
                </form>
            </div>
        </aside>
    );
};

// --- Main Page Component ---

const ArticleDetail: React.FC<ArticleDetailProps> = ({ article, related_articles = [] }) => {
    // Scroll Hooks for Parallax
    const { scrollY } = useScroll();
    const y1 = useTransform(scrollY, [0, 500], [0, 200]);
    const opacity = useTransform(scrollY, [0, 400], [1, 0]);

    // Format helpers
    const dateObj = new Date(article.published_at || new Date().toISOString());
    const dateStr = new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(dateObj);

    return (
        <>
            <Head>
                <title>{article.title}</title>
                <meta name="description" content={article.excerpt} />
                <meta property="og:title" content={article.title} />
                <meta property="og:description" content={article.excerpt} />
                <meta property="og:image" content={article.featured_image} />
                <meta property="og:type" content="article" />
                <script type="application/ld+json">
                    {JSON.stringify({
                        "@context": "https://schema.org",
                        "@type": "Article",
                        "headline": article.title,
                        "image": [article.featured_image],
                        "datePublished": article.published_at,
                        "author": [{
                            "@type": "Organization",
                            "name": "Kisantra",
                            "url": "https://kisantra.co.id"
                        }]
                    })}
                </script>
            </Head>

            <ProgressBar />

            <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={{ duration: 0.5 }}
                className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white font-sans"
            >
                <Navbar />

                {/* --- Full Width Immersive Hero --- */}
                <div className="relative w-full h-[85vh] min-h-[600px] overflow-hidden bg-lux-black">
                    <motion.div style={{ y: y1 }} className="absolute inset-0">
                        <img
                            src={article.featured_image}
                            alt={article.title}
                            className="w-full h-full object-cover opacity-60"
                            loading="eager"
                        />
                        <div className="absolute inset-0 bg-gradient-to-t from-lux-black via-transparent to-lux-black/40" />
                    </motion.div>

                    <motion.div
                        style={{ opacity }}
                        className="absolute inset-0 flex items-center justify-center text-center p-6"
                    >
                        <div className="max-w-4xl relative z-10 flex flex-col items-center gap-6">
                            <div className="flex items-center gap-3 text-xs md:text-sm font-bold uppercase tracking-[0.2em] text-white/80 animate-fade-in-up">
                                <Link href="/articles" className="hover:text-lux-teal transition-colors">Wawasan</Link>
                                <span className="text-lux-teal">•</span>
                                <span className="text-lux-teal">{article.categories?.[0]?.name || 'General'}</span>
                            </div>

                            <h1 className="text-5xl md:text-7xl lg:text-8xl font-black font-serif text-white leading-[0.9] md:leading-[0.85] tracking-tight drop-shadow-2xl">
                                {article.title}
                            </h1>

                            <div className="flex flex-wrap items-center justify-center gap-6 md:gap-8 mt-4 text-white/90 border-t border-white/20 pt-6">
                                <div className="flex items-center gap-2">
                                    <div className="w-8 h-8 rounded-full bg-white/20 backdrop-blur border border-white/30 overflow-hidden">
                                        <img src="https://ui-avatars.com/api/?name=Kasantra+Team&background=0D0D0D&color=fff" alt="Avatar" className="w-full h-full object-cover" />
                                    </div>
                                    <span className="text-xs font-bold uppercase tracking-widest">Kisantra Editorial</span>
                                </div>
                                <div className="flex items-center gap-2">
                                    <span className="text-lux-teal">●</span>
                                    <span className="text-xs font-bold uppercase tracking-widest">{dateStr}</span>
                                </div>
                            </div>
                        </div>
                    </motion.div>
                </div>

                <main className="relative z-10 bg-lux-white -mt-12 rounded-t-[3rem] shadow-[0_-10px_40px_rgba(0,0,0,0.1)] pt-16 md:pt-24 pb-24">
                    <div className="max-w-[1400px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 px-6 md:px-12">

                        {/* Main Content (Left/Center) */}
                        <div className="col-span-1 lg:col-span-8">
                            <article className="prose prose-lg md:prose-xl max-w-none 
                                prose-headings:font-serif prose-headings:font-bold prose-headings:text-lux-black 
                                prose-p:text-neutral-600 prose-p:leading-relaxed prose-p:mb-6
                                prose-a:text-lux-teal prose-a:font-bold prose-a:no-underline hover:prose-a:underline
                                prose-blockquote:border-l-4 prose-blockquote:border-lux-teal prose-blockquote:pl-6 prose-blockquote:py-2 prose-blockquote:bg-neutral-50 prose-blockquote:rounded-r-lg
                                prose-blockquote:text-xl prose-blockquote:font-serif prose-blockquote:italic prose-blockquote:text-lux-black/80
                                prose-img:rounded-3xl prose-img:shadow-xl prose-img:w-full prose-img:aspect-video prose-img:object-cover"
                            >
                                <p className="lead font-serif text-2xl md:text-3xl text-lux-black leading-normal mb-8 first-letter:text-5xl first-letter:font-black first-letter:text-lux-teal first-letter:float-left first-letter:mr-3 first-letter:mt-1">
                                    {article.excerpt}
                                </p>

                                {/* Content Injection */}
                                <div
                                    className="[&>p]:mb-6 [&>h2]:mt-12 [&>h2]:mb-6 [&>ul]:mb-6 [&>li]:mb-2"
                                    dangerouslySetInnerHTML={{ __html: article.content || MOCK_CONTENT }}
                                />
                            </article>

                            {/* Tags */}
                            <div className="mt-16 flex flex-wrap gap-2 border-t border-neutral-100 pt-8">
                                <span className="text-xs font-bold uppercase tracking-widest text-neutral-400 mr-2 py-1">Tags:</span>
                                {article.categories?.map(cat => (
                                    <Link key={cat.id} href={`/articles?category=${cat.slug}`} className="px-4 py-1.5 bg-neutral-100 text-neutral-600 text-[10px] font-bold uppercase tracking-widest rounded-full hover:bg-lux-teal hover:text-white transition-colors">
                                        #{cat.name}
                                    </Link>
                                ))}
                            </div>

                            <AuthorBio author={article.author} />
                            <CommentSection />
                        </div>

                        {/* Sidebar (Right) */}
                        <div className="col-span-1 lg:col-span-4 relative">
                            {/* Just for layout context, Sidebar component handles content */}
                            <Sidebar articles={related_articles} />
                        </div>

                    </div>

                    {/* Unified Floating Dock Share (Desktop & Mobile) */}
                    <div className="fixed bottom-8 left-1/2 -translate-x-1/2 z-40">
                        <SocialShare />
                    </div>

                </main>

                <Contact />
            </motion.div>
        </>
    );
};

export default ArticleDetail;
