import React, { useRef } from 'react';
import { motion, useScroll, useTransform } from 'framer-motion';

export const Philosophy: React.FC = () => {
  const targetRef = useRef<HTMLDivElement>(null);
  const { scrollYProgress } = useScroll({
    target: targetRef,
    offset: ["start end", "end start"]
  });

  const opacity = useTransform(scrollYProgress, [0.1, 0.5, 0.8], [0, 1, 0]);
  const scale = useTransform(scrollYProgress, [0.1, 0.5], [0.95, 1]);

  return (
    <section ref={targetRef} className="min-h-[80vh] flex items-center justify-center py-24 px-6 md:px-12 bg-neutral-50/50">
      <motion.div 
        style={{ opacity, scale }}
        className="max-w-5xl mx-auto text-center"
      >
        <span className="inline-block mb-8 text-xs font-bold uppercase tracking-[0.2em] text-lux-teal">
          Filosofi Kami
        </span>
        <h2 className="font-bold text-3xl md:text-5xl lg:text-6xl leading-tight text-lux-black tracking-tight">
          "Bisnis bukan sekadar transaksi, melainkan <span className="text-lux-teal-dark">arsitektur kepercayaan</span>. Kami mengubah kompleksitas angka menjadi narasi pertumbuhan yang jelas."
        </h2>
        
        <div className="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
           {[
             { title: "Transparansi", desc: "Kejujuran data adalah fondasi dari setiap strategi yang kami buat." },
             { title: "Presisi", desc: "Detail kecil menciptakan dampak besar dalam perpajakan dan keuangan." },
             { title: "Adaptabilitas", desc: "Dunia digital berubah cepat; kami memastikan Anda tetap relevan." }
           ].map((item, idx) => (
             <div key={idx} className="border-l border-neutral-300 pl-6 hover:border-lux-teal transition-colors duration-300">
                <h4 className="font-bold text-xl mb-2 text-lux-black">{item.title}</h4>
                <p className="text-sm text-neutral-600 font-medium">{item.desc}</p>
             </div>
           ))}
        </div>
      </motion.div>
    </section>
  );
};