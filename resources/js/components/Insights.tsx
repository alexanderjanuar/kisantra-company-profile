import React from 'react';
import { motion } from 'framer-motion';
import { Link } from '@inertiajs/react';

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

interface InsightsProps {
  articles: Article[];
}

export const  Insights: React.FC<InsightsProps> = ({ articles }) => {
  const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    const months = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'];
    return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
  };
  return (
    <section className="py-24 md:py-32 px-6 md:px-12 bg-lux-white w-full border-t border-neutral-200">
      <div className="flex flex-col md:flex-row justify-between items-end mb-16 md:mb-24 gap-6">
        <div>
          <h2 className="text-xs font-sans font-bold uppercase tracking-widest text-lux-teal mb-4">
            Wawasan & Artikel
          </h2>
          <h3 className="font-sans font-bold text-4xl md:text-6xl tracking-tighter text-lux-black">
            Perspektif <span className="text-lux-teal">Terbaru.</span>
          </h3>
        </div>
        
        <Link href="/berita">
          <motion.button
              whileHover={{ x: 5 }}
              className="text-sm font-sans font-bold uppercase tracking-widest border-b border-lux-black pb-1 flex items-center gap-2 text-lux-black hover:text-lux-teal hover:border-lux-teal transition-colors"
          >
              Lihat Semua
              <span>→</span>
          </motion.button>
        </Link>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12">
        {articles.map((article, index) => (
          <Link key={article.id} href={`/berita/${article.slug}`}>
            <motion.div
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true, margin: "-100px" }}
              transition={{ duration: 0.8, delay: index * 0.15 }}
              className="group cursor-pointer flex flex-col h-full gap-6"
            >
               {/* Image Container with Reveal Effect */}
               <div className="relative aspect-[4/3] overflow-hidden bg-neutral-100 w-full">
                  <motion.div
                      className="absolute inset-0 bg-neutral-200 z-10"
                      whileHover={{ scale: 1.05 }}
                      transition={{ duration: 0.9 }}
                  >
                      <img
                          src={article.featured_image || 'https://images.unsplash.com/photo-1639322537228-f710d846310a?q=80&w=1000&auto=format&fit=crop'}
                          alt={article.title}
                          loading="lazy"
                          decoding="async"
                          className="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 ease-in-out opacity-90 group-hover:opacity-100"
                      />
                      {/* Teal Tint Overlay */}
                      <div className="absolute inset-0 bg-lux-teal/20 mix-blend-overlay pointer-events-none group-hover:opacity-0 transition-opacity duration-700"></div>
                  </motion.div>

                  {/* Overlay Badge */}
                  {article.categories.length > 0 && (
                    <div className="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur px-3 py-1">
                       <span className="text-[10px] font-sans font-bold uppercase tracking-wider text-lux-black">
                          {article.categories[0].name}
                      </span>
                    </div>
                  )}
               </div>

               <div className="flex flex-col justify-between flex-grow">
                  <div>
                      <span className="font-mono text-xs text-neutral-400 uppercase tracking-wider block mb-3 group-hover:text-lux-teal transition-colors">
                        {formatDate(article.published_at)}
                      </span>
                      <h4 className="font-sans font-bold text-2xl leading-tight text-lux-black group-hover:text-lux-teal transition-colors duration-300">
                          {article.title}
                      </h4>
                  </div>

                  <div className="mt-6 border-t border-neutral-200 pt-4 flex justify-between items-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 text-lux-teal">
                      <span className="text-xs font-sans font-bold uppercase tracking-widest">Baca Artikel</span>
                      <span className="text-lg leading-none transform group-hover:translate-x-1 transition-transform">→</span>
                  </div>
               </div>
            </motion.div>
          </Link>
        ))}
      </div>
    </section>
  );
};