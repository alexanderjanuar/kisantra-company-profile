import React, { useRef } from 'react';
import { motion, useScroll, useTransform, Variants } from 'framer-motion';

export const Hero: React.FC = () => {
  const containerRef = useRef<HTMLDivElement>(null);
  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start start", "end start"]
  });

  const yText = useTransform(scrollYProgress, [0, 1], ["0%", "50%"]);
  const opacity = useTransform(scrollYProgress, [0, 0.5], [1, 0]);

  // Full text to type out once
  const text = "Sinergi Strategis: Pajak, Finansial, & Pemasaran Digital.";
  const characters = Array.from(text);

  const containerVariants: Variants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.02,
        delayChildren: 0.1,
      }
    }
  };

  const charVariants: Variants = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: { duration: 0.01 }
    }
  };

  return (
    <section ref={containerRef} className="relative h-screen w-full flex flex-col justify-center items-center overflow-hidden px-6 pt-20 bg-lux-white">
      
      <div className="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div className="absolute inset-0 z-10 opacity-30 bg-grain mix-blend-multiply pointer-events-none"></div>

        <div
            className="absolute top-1/2 left-1/2 w-[80vw] h-[80vw] md:w-[600px] md:h-[600px] bg-gradient-to-tr from-lux-teal-light to-transparent rounded-full opacity-30 blur-[100px]"
            style={{ transform: 'translate(-50%, -50%)' }}
        />

        <div
            className="absolute -top-[50%] -left-[50%] w-[200%] h-[200%] opacity-[0.05]"
            style={{
                backgroundImage: `linear-gradient(to right, #000 1px, transparent 1px),
                                  linear-gradient(to bottom, #000 1px, transparent 1px)`,
                backgroundSize: '120px 120px',
                maskImage: 'radial-gradient(circle at center, black 30%, transparent 70%)'
            }}
        />
      </div>

      <motion.div 
        style={{ y: yText, opacity }}
        className="relative z-10 flex flex-col items-center text-center max-w-7xl mx-auto"
      >
        <motion.div
            variants={containerVariants}
            initial="hidden"
            animate="visible"
            className="mb-10 md:mb-12 max-w-5xl"
        >
            <h1 className="font-bold text-5xl md:text-7xl lg:text-8xl leading-[1.1] text-lux-black tracking-tighter break-words min-h-[3em] md:min-h-[auto]">
                {characters.map((char, i) => (
                    <motion.span key={i} variants={charVariants}>
                        {char}
                    </motion.span>
                ))}
                <span
                    className="inline-block w-2 h-10 md:h-20 bg-lux-teal ml-1 align-middle animate-pulse"
                />
            </h1>
        </motion.div>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 1.2, ease: "easeOut" }}
          className="max-w-xl text-center"
        >
            <p className="text-base md:text-xl text-neutral-500 font-medium tracking-wide leading-relaxed">
                Partner strategis <span className="text-lux-black font-bold">konsultan pajak di Samarinda</span>. Mengintegrasikan regulasi, manajemen finansial, dan inovasi digital untuk bisnis di Indonesia.
            </p>
        </motion.div>
      </motion.div>

      <div
        className="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 text-lux-black opacity-40 animate-bounce"
      >
        <span className="text-[10px] uppercase tracking-widest font-semibold">Scroll</span>
      </div>
    </section>
  );
};