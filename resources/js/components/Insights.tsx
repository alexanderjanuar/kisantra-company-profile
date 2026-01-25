import React from 'react';
import { motion } from 'framer-motion';

const articles = [
  {
    id: 1,
    date: '12 OKT 2024',
    title: 'Navigasi Pajak di Era Digital 2025',
    category: 'Perpajakan',
    image: 'https://images.unsplash.com/photo-1639322537228-f710d846310a?q=80&w=1000&auto=format&fit=crop' // Abstract geometric
  },
  {
    id: 2,
    date: '08 NOV 2024',
    title: 'Strategi Modal untuk Ekspansi Global',
    category: 'Finansial',
    image: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1000&auto=format&fit=crop' // Architecture high rise
  },
  {
    id: 3,
    date: '24 NOV 2024',
    title: 'Transformasi Data menjadi Aset Likuid',
    category: 'Digital',
    image: 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1000&auto=format&fit=crop' // Abstract Tech
  }
];

export const Insights: React.FC = () => {
  return (
    <section className="py-24 md:py-32 px-6 md:px-12 bg-lux-white w-full border-t border-neutral-200">
      <div className="flex flex-col md:flex-row justify-between items-end mb-16 md:mb-24 gap-6">
        <div>
          <h2 className="text-xs font-bold uppercase tracking-widest text-lux-teal mb-4">
            Wawasan & Artikel
          </h2>
          <h3 className="font-bold text-4xl md:text-6xl tracking-tighter text-lux-black">
            Perspektif <span className="text-lux-teal">Terbaru.</span>
          </h3>
        </div>
        
        <motion.button 
            whileHover={{ x: 5 }}
            className="text-sm font-bold uppercase tracking-widest border-b border-lux-black pb-1 flex items-center gap-2 text-lux-black hover:text-lux-teal hover:border-lux-teal transition-colors"
        >
            Lihat Semua
            <span>→</span>
        </motion.button>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12">
        {articles.map((article, index) => (
          <motion.div
            key={article.id}
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true, margin: "-100px" }}
            transition={{ duration: 0.6, delay: index * 0.2 }}
            className="group cursor-pointer flex flex-col h-full gap-6"
          >
             {/* Image Container with Reveal Effect */}
             <div className="relative aspect-[4/3] overflow-hidden bg-neutral-100 w-full">
                <motion.div
                    className="absolute inset-0 bg-neutral-200 z-10"
                    whileHover={{ scale: 1.05 }}
                    transition={{ duration: 0.6 }}
                >
                    <img 
                        src={article.image} 
                        alt={article.title} 
                        className="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 ease-in-out opacity-90 group-hover:opacity-100"
                    />
                    {/* Teal Tint Overlay */}
                    <div className="absolute inset-0 bg-lux-teal/20 mix-blend-overlay pointer-events-none group-hover:opacity-0 transition-opacity duration-700"></div>
                </motion.div>
                
                {/* Overlay Badge */}
                <div className="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur px-3 py-1">
                     <span className="text-[10px] font-bold uppercase tracking-wider text-lux-black">
                        {article.category}
                    </span>
                </div>
             </div>

             <div className="flex flex-col justify-between flex-grow">
                <div>
                    <span className="font-mono text-xs text-neutral-400 uppercase tracking-wider block mb-3 group-hover:text-lux-teal transition-colors">{article.date}</span>
                    <h4 className="font-bold text-2xl leading-tight text-lux-black group-hover:text-lux-teal transition-colors duration-300">
                        {article.title}
                    </h4>
                </div>
                
                <div className="mt-6 border-t border-neutral-200 pt-4 flex justify-between items-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 text-lux-teal">
                    <span className="text-xs font-bold uppercase tracking-widest">Baca Artikel</span>
                    <span className="text-lg leading-none transform group-hover:translate-x-1 transition-transform">→</span>
                </div>
             </div>
          </motion.div>
        ))}
      </div>
    </section>
  );
};