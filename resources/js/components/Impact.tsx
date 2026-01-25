import React, { useRef } from 'react';
import { motion, useScroll, useTransform, useSpring, useInView } from 'framer-motion';

// Animated Counter Component
const Counter: React.FC<{ value: number; suffix?: string; decimals?: number }> = ({ value, suffix = "", decimals = 0 }) => {
    const ref = useRef<HTMLSpanElement>(null);
    const inView = useInView(ref, { once: true, margin: "-50px" });
    const springValue = useSpring(0, { bounce: 0, duration: 2500 });

    React.useEffect(() => {
        if (inView) {
            springValue.set(value);
        }
    }, [inView, value, springValue]);

    const displayValue = useTransform(springValue, (current) => 
        current.toFixed(decimals) + suffix
    );

    return <motion.span ref={ref}>{displayValue}</motion.span>;
};

export const Impact: React.FC = () => {
    const clients = [
        "Nusantara Capital", "Bumi Resources Tech", "Indo Global Holdings", 
        "Sentra Solusi", "Mega Finance Group", "Alpha Digital Ventures",
        "Prima Strategis", "Cipta Karya Mandiri", "Venture Indo"
    ];

    return (
        <section className="py-20 md:py-32 bg-lux-white w-full overflow-hidden border-b border-neutral-200">
            {/* Split Layout: Text Left, Stats Right */}
            <div className="px-6 md:px-12 mb-32 max-w-[1400px] mx-auto">
                 <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-start">
                    
                    {/* Left Column: Narrative Text */}
                    <div className="flex flex-col gap-8 sticky top-32">
                        <motion.h2 
                            initial={{ opacity: 0, y: 20 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            viewport={{ once: true }}
                            transition={{ duration: 0.8 }}
                            className="font-bold text-4xl md:text-5xl lg:text-6xl leading-tight text-lux-black tracking-tight"
                        >
                            Dampak Terukur bagi Bisnis di <span className="text-lux-teal">Samarinda.</span>
                        </motion.h2>
                        <motion.p 
                            initial={{ opacity: 0 }}
                            whileInView={{ opacity: 1 }}
                            viewport={{ once: true }}
                            transition={{ duration: 0.8, delay: 0.2 }}
                            className="text-lg md:text-xl text-neutral-600 font-light leading-relaxed max-w-md"
                        >
                            Sebagai partner <span className="text-lux-black font-semibold">konsultan pajak di Samarinda</span>, kami telah membantu ratusan entitas bisnis di Kalimantan Timur meraih efisiensi fiskal dan transformasi digital yang signifikan.
                        </motion.p>
                    </div>

                    {/* Right Column: Massive Statistics */}
                    <div className="flex flex-col gap-16 md:gap-24">
                        
                        <div className="flex flex-col group cursor-default">
                            <div className="h-[1px] w-full bg-neutral-200 mb-6 group-hover:bg-lux-teal transition-colors duration-500" />
                            <span className="text-7xl md:text-9xl font-bold leading-none mb-4 text-lux-black tracking-tighter group-hover:text-lux-teal transition-colors duration-500">
                                <Counter value={10} suffix="T+" />
                            </span>
                            <span className="text-xs uppercase tracking-[0.2em] text-neutral-500 mt-2 font-medium">Aset Dikelola (IDR)</span>
                        </div>

                        <div className="flex flex-col group cursor-default">
                            <div className="h-[1px] w-full bg-neutral-200 mb-6 group-hover:bg-lux-teal transition-colors duration-500" />
                            <span className="text-7xl md:text-9xl font-bold leading-none mb-4 text-lux-black tracking-tighter group-hover:text-lux-teal transition-colors duration-500">
                                <Counter value={500} suffix="+" />
                            </span>
                            <span className="text-xs uppercase tracking-[0.2em] text-neutral-500 mt-2 font-medium">Mitra Korporat Lokal</span>
                        </div>

                        <div className="flex flex-col group cursor-default">
                            <div className="h-[1px] w-full bg-neutral-200 mb-6 group-hover:bg-lux-teal transition-colors duration-500" />
                            <span className="text-7xl md:text-9xl font-bold leading-none mb-4 text-lux-black tracking-tighter group-hover:text-lux-teal transition-colors duration-500">
                                <Counter value={98} suffix="%" />
                            </span>
                            <span className="text-xs uppercase tracking-[0.2em] text-neutral-500 mt-2 font-medium">Tingkat Retensi Klien</span>
                        </div>

                    </div>

                 </div>
            </div>

            {/* Infinite Horizontal Marquee */}
            <div className="w-full relative py-12 border-t border-neutral-100">
                <div className="absolute top-0 left-0 w-32 md:w-64 h-full z-10 bg-gradient-to-r from-lux-white to-transparent pointer-events-none" />
                <div className="absolute top-0 right-0 w-32 md:w-64 h-full z-10 bg-gradient-to-l from-lux-white to-transparent pointer-events-none" />
                
                <div className="flex overflow-hidden">
                    <motion.div 
                        className="flex gap-16 md:gap-32 items-center pl-16 md:pl-32"
                        animate={{ x: "-50%" }}
                        transition={{ 
                            duration: 40, 
                            repeat: Infinity, 
                            ease: "linear",
                            repeatType: "loop" 
                        }}
                        style={{ width: "fit-content" }}
                    >
                        {[...clients, ...clients, ...clients, ...clients].map((client, index) => (
                            <span 
                                key={index} 
                                className="text-2xl md:text-4xl font-semibold text-neutral-300 whitespace-nowrap tracking-tight"
                            >
                                {client}
                            </span>
                        ))}
                    </motion.div>
                </div>
            </div>
        </section>
    );
};