import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence, Variants } from 'framer-motion';
import { Link, router } from '@inertiajs/react';

export const Navbar: React.FC = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isNavigating, setIsNavigating] = useState(false);

  // Lock scroll when menu is open
  useEffect(() => {
    if (isOpen) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = '';
    }
    return () => {
      document.body.style.overflow = '';
    };
  }, [isOpen]);

  // Track navigation state
  useEffect(() => {
    const handleStart = () => {
      setIsNavigating(true);
      setIsOpen(false);
    };
    const handleFinish = () => setIsNavigating(false);

    router.on('start', handleStart);
    router.on('finish', handleFinish);

    return () => {
      router.off('start', handleStart);
      router.off('finish', handleFinish);
    };
  }, []);

  const overlayVariants: Variants = {
    closed: {
      opacity: 0,
      y: "-100%",
      transition: {
        duration: 1,
        ease: [0.76, 0, 0.24, 1]
      }
    },
    open: {
      opacity: 1,
      y: "0%",
      transition: {
        duration: 1,
        ease: [0.76, 0, 0.24, 1]
      }
    }
  };

  const containerVariants: Variants = {
    closed: {
      transition: {
        staggerChildren: 0.1,
        staggerDirection: -1
      }
    },
    open: {
      transition: {
        staggerChildren: 0.15,
        delayChildren: 0.5
      }
    }
  };

  const itemVariants: Variants = {
    closed: { y: 100, opacity: 0 },
    open: { 
      y: 0, 
      opacity: 1, 
      transition: { duration: 0.8, ease: [0.76, 0, 0.24, 1] }
    }
  };

  const menuItems = [
    { label: "Beranda", href: "/", isRoute: true },
    { label: "Tentang Kami", href: "/tentang-kami", isRoute: true },
    { label: "Layanan", href: "#services", isRoute: false },
    { label: "Kontak", href: "#contact", isRoute: false }
  ];

  return (
    <>
      {/* Page Loading Progress Bar */}
      <AnimatePresence>
        {isNavigating && (
          <motion.div
            initial={{ scaleX: 0 }}
            animate={{ scaleX: 1 }}
            exit={{ scaleX: 0 }}
            transition={{ duration: 0.8, ease: "easeInOut" }}
            className="fixed top-0 left-0 h-1 bg-lux-teal z-[200] origin-left"
            style={{ width: '100%' }}
          />
        )}
      </AnimatePresence>

      {/* Fixed UI Layer (Logo & Button) - Uses mix-blend-difference to be visible on white page AND black overlay */}
      <motion.div 
        initial={{ opacity: 0, y: -20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8, delay: 0.2 }}
        className="fixed top-0 left-0 w-full z-50 px-6 py-6 md:px-12 md:py-8 flex justify-between items-start pointer-events-none mix-blend-difference text-white"
      >
        {/* Logo */}
        <Link href="/" className="flex flex-col pointer-events-auto cursor-pointer group">
          <span className="font-bold text-2xl md:text-3xl tracking-tighter group-hover:text-lux-teal transition-colors duration-300">KISANTRA</span>
          <span className="text-xs uppercase tracking-[0.2em] opacity-80 font-sans">Consult</span>
        </Link>

        {/* Floating Hamburger Button */}
        <button 
          onClick={() => setIsOpen(!isOpen)}
          className="pointer-events-auto group flex flex-col items-end gap-[6px] p-2 hover:opacity-70 transition-opacity"
          aria-label="Toggle Menu"
        >
          {/* Animated Hamburger Lines */}
          <span className={`h-[2px] bg-white transition-all duration-300 ease-out ${isOpen ? 'w-8 rotate-45 translate-y-[8px]' : 'w-8 group-hover:bg-lux-teal'}`} />
          <span className={`h-[2px] bg-white transition-all duration-300 ease-out ${isOpen ? 'w-8 opacity-0' : 'w-6 group-hover:w-8 group-hover:bg-lux-teal'}`} />
          <span className={`h-[2px] bg-white transition-all duration-300 ease-out ${isOpen ? 'w-8 -rotate-45 -translate-y-[8px]' : 'w-4 group-hover:w-8 group-hover:bg-lux-teal'}`} />
        </button>
      </motion.div>

      {/* Full Screen Menu Overlay */}
      <AnimatePresence>
        {isOpen && (
          <motion.div
            variants={overlayVariants}
            initial="closed"
            animate="open"
            exit="closed"
            className="fixed inset-0 z-40 bg-lux-black/95 backdrop-blur-xl flex flex-col justify-center items-center text-white"
          >
             <motion.div 
                variants={containerVariants}
                initial="closed"
                animate="open"
                exit="closed"
                className="flex flex-col items-center gap-2 md:gap-6"
             >
                {menuItems.map((item, i) => (
                    <div key={i} className="overflow-hidden">
                        {item.isRoute ? (
                            <motion.div variants={itemVariants}>
                                <Link
                                    href={item.href}
                                    onClick={() => setIsOpen(false)}
                                    className="block font-bold text-5xl md:text-7xl lg:text-9xl text-lux-white hover:text-lux-teal transition-colors tracking-tighter cursor-pointer"
                                >
                                    {item.label}
                                </Link>
                            </motion.div>
                        ) : (
                            <motion.a
                                href={item.href}
                                variants={itemVariants}
                                onClick={() => setIsOpen(false)}
                                className="block font-bold text-5xl md:text-7xl lg:text-9xl text-lux-white hover:text-lux-teal transition-colors tracking-tighter cursor-pointer"
                            >
                                {item.label}
                            </motion.a>
                        )}
                    </div>
                ))}
             </motion.div>

             {/* Footer inside menu */}
             <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ delay: 1, duration: 1 }}
                className="absolute bottom-12 left-0 w-full text-center"
             >
                <span className="text-xs uppercase tracking-[0.3em] text-neutral-500 font-sans">
                    Samarinda — Global
                </span>
             </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </>
  );
};