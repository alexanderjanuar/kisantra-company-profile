import React, { useRef, useState } from 'react';
import { motion, useScroll, useTransform, useSpring } from 'framer-motion';

export const ServiceCTA: React.FC = () => {
    const containerRef = useRef<HTMLDivElement>(null);
    const [isHovered, setIsHovered] = useState(false);

    // Parallax effect for the background text
    const { scrollYProgress } = useScroll({
        target: containerRef,
        offset: ["start end", "end start"]
    });

    const y = useTransform(scrollYProgress, [0, 1], [-50, 50]);
    const opacity = useTransform(scrollYProgress, [0, 0.5, 1], [0.5, 1, 0.5]);

    return (
        <section
            ref={containerRef}
            className="relative w-full py-32 px-6 md:px-12 bg-lux-white overflow-hidden"
        >
            <div className="max-w-[1400px] mx-auto relative">

                {/* Background Decorative Elements */}
                <div className="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[600px] h-[600px] bg-lux-teal/5 rounded-full blur-[120px] pointer-events-none" />
                <div className="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-[400px] h-[400px] bg-lux-black/5 rounded-full blur-[100px] pointer-events-none" />

                {/* Main Content Card */}
                <motion.div
                    initial={{ opacity: 0, y: 40 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    viewport={{ once: true, margin: "-100px" }}
                    transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
                    className="relative z-10 w-full bg-lux-black text-white rounded-[2rem] md:rounded-[3rem] p-8 md:p-20 overflow-hidden group shadow-2xl shadow-lux-black/10"
                    onMouseEnter={() => setIsHovered(true)}
                    onMouseLeave={() => setIsHovered(false)}
                >
                    {/* Animated Background Gradient */}
                    <motion.div
                        className="absolute inset-0 bg-gradient-to-br from-lux-teal/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"
                    />

                    {/* Giant Background Text */}
                    <motion.div
                        style={{ y, opacity }}
                        className="absolute right-0 top-1/2 -translate-y-1/2 text-[20vw] leading-none font-black text-white/5 pointer-events-none whitespace-nowrap hidden md:block select-none"
                    >
                        GROWTH
                    </motion.div>

                    <div className="relative z-20 flex flex-col items-start max-w-4xl">
                        <motion.div
                            initial={{ opacity: 0, x: -20 }}
                            whileInView={{ opacity: 1, x: 0 }}
                            transition={{ delay: 0.3 }}
                            className="flex items-center gap-3 mb-8"
                        >
                            <span className="w-12 h-[1px] bg-lux-teal"></span>
                            <span className="text-lux-teal font-bold uppercase tracking-[0.3em] text-xs">Excellence in Action</span>
                        </motion.div>

                        <h2 className="text-4xl md:text-6xl lg:text-7xl font-bold leading-[1.1] md:leading-[1.1] mb-10 tracking-tight">
                            Siap Mengubah <br />
                            <span className="text-transparent bg-clip-text bg-gradient-to-r from-lux-teal to-white/70">Tantangan Menjadi Peluang?</span>
                        </h2>

                        <p className="text-neutral-400 text-lg md:text-xl font-light leading-relaxed max-w-xl mb-12">
                            Jangan biarkan kompleksitas menghambat pertumbuhan bisnis Anda. Diskusikan strategi masa depan bersama tim ahli kami sekarang.
                        </p>

                        <motion.a
                            href="https://wa.me/6281180009787?text=Halo%20Kisantra%2C%20saya%20tertarik%20untuk%20diskusi%20lebih%20lanjut%20mengenai%20layanan%20Anda."
                            target="_blank"
                            rel="noopener noreferrer"
                            whileHover={{ scale: 1.02 }}
                            whileTap={{ scale: 0.98 }}
                            className="group/btn relative overflow-hidden bg-white text-lux-black px-10 py-6 rounded-2xl flex items-center gap-6 cursor-pointer"
                        >
                            <span className="font-bold text-sm uppercase tracking-widest relative z-10 group-hover/btn:text-white transition-colors duration-500">
                                Jadwalkan Konsultasi
                            </span>
                            <div className="w-8 h-8 rounded-full bg-lux-black/10 flex items-center justify-center relative z-10 group-hover/btn:bg-white/20 transition-colors duration-500">
                                <svg className="w-4 h-4 group-hover/btn:translate-x-1 transition-transform duration-300 group-hover/btn:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>

                            {/* Button Fill Animation */}
                            <div className="absolute inset-0 bg-lux-teal translate-y-full group-hover/btn:translate-y-0 transition-transform duration-500 ease-[0.22,1,0.36,1]" />
                        </motion.a>
                    </div>
                </motion.div>
            </div>
        </section>
    );
};
