import React from 'react';
import { motion } from 'framer-motion';

export const CTA: React.FC = () => {
  return (
    <section className="bg-lux-white w-full py-24 md:py-32 px-6 md:px-12 border-t border-neutral-200">
        <div className="max-w-7xl mx-auto rounded-[2rem] bg-lux-black text-lux-white p-8 md:p-16 lg:p-24 relative overflow-hidden">
            
            {/* Background Decor */}
            <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-lux-teal opacity-[0.15] rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 pointer-events-none" />

            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center relative z-10">
                <div className="flex flex-col gap-6">
                    <span className="font-mono text-xs uppercase tracking-[0.2em] text-lux-teal">
                        Langkah Selanjutnya
                    </span>
                    <h2 className="font-bold text-4xl md:text-5xl lg:text-7xl leading-[1.05] tracking-tight">
                        Siap untuk <span className="text-lux-teal">eskalasi bisnis</span> Anda?
                    </h2>
                    <p className="text-lg md:text-xl text-neutral-400 font-light leading-relaxed max-w-md">
                        Jadwalkan konsultasi strategis. Kami membedah struktur finansial dan potensi digital Anda untuk hasil yang terukur.
                    </p>
                </div>

                <div className="flex flex-col gap-8 justify-center lg:items-end">
                     {/* WhatsApp Button */}
                     <motion.a 
                        href="https://wa.me/6281234567890" 
                        target="_blank"
                        rel="noopener noreferrer"
                        whileHover={{ scale: 1.02 }}
                        whileTap={{ scale: 0.98 }}
                        className="w-full md:w-auto flex items-center justify-center gap-4 bg-lux-teal text-white px-8 py-6 rounded-full group transition-all duration-300 hover:bg-lux-teal-dark"
                    >
                        <div className="w-6 h-6">
                            <svg viewBox="0 0 24 24" fill="currentColor" className="w-full h-full">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.592 2.664-.698c.969.587 1.954.893 3.033.893h.003c3.19 0 5.775-2.587 5.776-5.767 0-3.18-2.586-5.767-5.765-5.767zm6.492 10.37c-.367.614-1.127 1.006-2.034 1.157-.905.15-2.613.123-5.228-2.489-2.614-2.612-2.64-4.322-2.491-5.227.151-.906.543-1.666 1.157-2.034.453-.272 1.096-.062 1.346.402.247.458.828 1.956.884 2.148.056.192.016.438-.13.679-.15.244-.27.35-.494.597-.184.204-.383.428-.152.83.228.397.986 1.543 2.053 2.607 1.066 1.064 2.213 1.821 2.612 2.049.401.23.626.031.83-.153.247-.223.353-.343.597-.492.241-.146.487-.186.679-.13.192.056 1.69.637 2.148.884.464.25.674.893.402 1.346v.001z"/>
                            </svg>
                        </div>
                        <span className="font-bold text-sm uppercase tracking-widest">Chat via WhatsApp</span>
                    </motion.a>

                    <div className="flex flex-col md:flex-row gap-8 md:gap-16 lg:text-right">
                        <div>
                             <span className="text-[10px] uppercase tracking-widest text-neutral-500 block mb-2">Email</span>
                             <a href="mailto:hello@kisantra.id" className="text-xl text-white hover:text-lux-teal transition-colors">hello@kisantra.id</a>
                        </div>
                        <div>
                             <span className="text-[10px] uppercase tracking-widest text-neutral-500 block mb-2">Telepon</span>
                             <a href="tel:+62215550199" className="text-xl text-white hover:text-lux-teal transition-colors">+62 21 555 0199</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  );
};