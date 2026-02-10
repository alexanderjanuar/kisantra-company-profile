import React, { useRef } from 'react';
import { motion, useScroll, useTransform, Variants } from 'framer-motion';
import { Link } from '@inertiajs/react';

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
        staggerChildren: 0.05,
        delayChildren: 0.8,
      }
    }
  };

  const charVariants: Variants = {
    hidden: { opacity: 0, display: "none" },
    visible: {
      opacity: 1,
      display: "inline",
      transition: { duration: 0.01 }
    }
  };

  return (
    <section ref={containerRef} className="relative h-screen w-full flex flex-col justify-center items-center overflow-hidden px-6 pt-20 bg-lux-white">

      <div className="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div className="absolute inset-0 z-10 opacity-30 bg-grain mix-blend-multiply pointer-events-none"></div>

        <motion.div
          className="absolute top-1/2 left-1/2 w-[80vw] h-[80vw] md:w-[600px] md:h-[600px] bg-gradient-to-tr from-lux-teal-light to-transparent rounded-full opacity-30 blur-[100px]"
          style={{ x: '-50%', y: '-50%' }}
          animate={{
            scale: [1, 1.2, 1],
            opacity: [0.3, 0.4, 0.3]
          }}
          transition={{
            duration: 8,
            repeat: Infinity,
            ease: "easeInOut"
          }}
        />

        <motion.div
          className="absolute -top-[50%] -left-[50%] w-[200%] h-[200%] opacity-[0.05]"
          animate={{
            x: ["0%", "-2%"],
            y: ["0%", "-2%"]
          }}
          transition={{
            duration: 15,
            repeat: Infinity,
            repeatType: "reverse",
            ease: "linear"
          }}
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
            <motion.span
              animate={{ opacity: [0, 1, 0] }}
              transition={{ duration: 0.8, repeat: Infinity }}
              className="inline-block w-2 h-10 md:h-20 bg-lux-teal ml-1 align-middle"
            />
          </h1>
        </motion.div>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1, delay: 3.5, ease: "easeOut" }}
          className="max-w-xl text-center"
        >
          <p className="text-base md:text-xl text-neutral-500 font-medium tracking-wide leading-relaxed">
            Partner strategis <span className="text-lux-black font-bold">konsultan pajak di Samarinda</span>. Mengintegrasikan regulasi, manajemen finansial, dan inovasi digital untuk bisnis di Kalimantan Timur.
          </p>
        </motion.div>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1, delay: 4.2, ease: "easeOut" }}
          className="mt-8 md:mt-12"
        >
          <Link
            href="/kontak"
            className="group relative inline-flex items-center justify-center px-8 py-3 overflow-hidden font-medium tracking-widest text-lux-black transition duration-300 ease-out border border-neutral-300 rounded-full hover:border-lux-black hover:shadow-lg"
          >
            <span className="absolute inset-0 w-full h-full bg-lux-black opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-out"></span>
            <span className="relative z-10 text-xs md:text-sm uppercase group-hover:text-white transition-colors duration-300">
              Hubungi Kami
            </span>
          </Link>
        </motion.div>
      </motion.div>

      <motion.div
        className="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 text-lux-black opacity-40"
        animate={{ y: [0, 10, 0] }}
        transition={{ duration: 2, repeat: Infinity, ease: "easeInOut" }}
      >
        <span className="text-[10px] uppercase tracking-widest font-semibold">Scroll</span>
      </motion.div>
    </section>
  );
};