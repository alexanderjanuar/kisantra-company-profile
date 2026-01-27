import React, { useRef } from 'react';
import { motion, useInView } from 'framer-motion';

export const CTA: React.FC = () => {
  const containerRef = useRef<HTMLDivElement>(null);
  const isInView = useInView(containerRef, { once: true, margin: "-100px" });

  return (
    <section 
      ref={containerRef} 
      id="contact" 
      className="relative bg-lux-white w-full py-32 md:py-56 px-6 md:px-12 overflow-hidden border-t border-neutral-100"
    >
      {/* Background Sophistication - Static for better performance */}
      <div className="absolute inset-0 z-0 pointer-events-none">
        <div className="absolute inset-0 opacity-20 bg-grain mix-blend-multiply"></div>
        <div className="absolute top-1/4 -right-20 w-[500px] h-[500px] bg-lux-teal/5 rounded-full blur-[140px]" />
        <div className="absolute bottom-0 -left-20 w-[400px] h-[400px] bg-lux-teal-light/10 rounded-full blur-[120px]" />
      </div>

      <div className="max-w-[1400px] mx-auto relative z-10">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-20 lg:gap-32 items-center">
          
          {/* Left Column: Visual & Value Prop */}
          <div className="lg:col-span-7">
            <motion.div
              initial={{ opacity: 0, y: 30 }}
              animate={isInView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
            >
              <div className="flex items-center gap-4 mb-8">
                <div className="h-[1px] w-12 bg-lux-teal"></div>
                <span className="font-bold text-xs uppercase tracking-[0.4em] text-lux-teal">
                  Hubungan Jangka Panjang
                </span>
              </div>
              
              <h2 className="font-bold text-6xl md:text-8xl lg:text-9xl leading-[0.9] tracking-tighter text-lux-black mb-10">
                Akselerasi <br />
                <span className="text-lux-teal-dark">Potensi</span> <br />
                <span className="font-serif italic font-normal text-lux-black/80">Tanpa Batas.</span>
              </h2>

              <p className="text-xl md:text-2xl text-neutral-500 font-light leading-relaxed max-w-xl mb-12">
                Kami hadir di Samarinda untuk mentransformasi tantangan fiskal Anda menjadi keunggulan kompetitif yang nyata.
              </p>

              {/* Minimalist Contact Grid */}
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-10">
                <div className="group cursor-pointer">
                  <span className="block text-[10px] font-bold uppercase tracking-widest text-neutral-400 mb-2 group-hover:text-lux-teal transition-colors">WhatsApp</span>
                  <a href="https://wa.me/6281180009787?text=Halo%20Kisantra%2C%20saya%20tertarik%20untuk%20berkonsultasi%20mengenai%20layanan%20Anda." target="_blank" rel="noopener noreferrer" className="text-lg font-bold border-b border-neutral-200 pb-1 hover:border-lux-teal transition-all">0811-8000-9787</a>
                </div>
                <div className="group cursor-pointer">
                  <span className="block text-[10px] font-bold uppercase tracking-widest text-neutral-400 mb-2 group-hover:text-lux-teal transition-colors">Email</span>
                  <a href="mailto:kisantra.official@gmail.com" className="text-lg font-bold border-b border-neutral-200 pb-1 hover:border-lux-teal transition-all">kisantra.official@gmail.com</a>
                </div>
              </div>
            </motion.div>
          </div>

          {/* Right Column: Interaction Hub */}
          <div className="lg:col-span-5">
            <motion.div
              initial={{ opacity: 0, scale: 0.95 }}
              animate={isInView ? { opacity: 1, scale: 1 } : {}}
              transition={{ duration: 1, ease: [0.22, 1, 0.36, 1], delay: 0.15 }}
              className="relative p-1 bg-white rounded-[3rem] shadow-2xl shadow-lux-black/5"
            >
              {/* Main Interaction Card */}
              <div className="bg-lux-black rounded-[2.8rem] p-10 md:p-14 overflow-hidden relative group">
                <div className="absolute top-0 right-0 p-8">
                  <div className="w-16 h-16 rounded-full border border-white/10 flex items-center justify-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-lux-teal"><path d="M22 2L11 13"></path><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                  </div>
                </div>

                <div className="relative z-10">
                  <h3 className="font-bold text-3xl md:text-4xl text-white mb-6 leading-tight">
                    Mulai Sesi <br />Strategis Pertama.
                  </h3>
                  <p className="text-neutral-400 font-light text-lg mb-10 leading-relaxed">
                    Diskusikan kebutuhan spesifik Anda dengan tim konsultan senior kami secara privat.
                  </p>

                  <motion.a
                    href="https://wa.me/6281180009787?text=Halo%20Kisantra%2C%20saya%20ingin%20menjadwalkan%20sesi%20konsultasi%20gratis%20untuk%20mendiskusikan%20kebutuhan%20bisnis%20saya."
                    target="_blank"
                    rel="noopener noreferrer"
                    whileHover={{ scale: 1.05, backgroundColor: "#14b8a6", color: "#ffffff" }}
                    whileTap={{ scale: 0.95 }}
                    className="flex items-center justify-between w-full bg-white text-lux-black py-6 px-10 rounded-2xl font-bold text-sm uppercase tracking-widest transition-all duration-300"
                  >
                    <span>Konsultasi Gratis</span>
                    <span className="text-xl">→</span>
                  </motion.a>
                </div>

                {/* Background Subtle Gradient */}
                <div className="absolute -bottom-10 -left-10 w-40 h-40 bg-lux-teal/20 rounded-full blur-3xl group-hover:bg-lux-teal/40 transition-colors duration-700"></div>
              </div>

              {/* Status Pill */}
              <motion.div
                initial={{ opacity: 0, y: 10 }}
                animate={isInView ? { opacity: 1, y: 0 } : {}}
                transition={{ delay: 1.2, duration: 0.8 }}
                className="absolute -bottom-6 left-1/2 -translate-x-1/2 bg-white px-6 py-3 rounded-full shadow-xl border border-neutral-100 flex items-center gap-3 whitespace-nowrap"
              >
                <span className="flex h-2 w-2 relative">
                  <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-lux-teal opacity-75"></span>
                  <span className="relative inline-flex rounded-full h-2 w-2 bg-lux-teal"></span>
                </span>
                <span className="text-[10px] font-bold uppercase tracking-[0.2em] text-lux-black">
                  Respon dalam &lt; 24 Jam
                </span>
              </motion.div>
            </motion.div>
          </div>

        </div>
      </div>
    </section>
  );
};