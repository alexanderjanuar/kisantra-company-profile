import React, { useState, useEffect } from 'react';
import { motion, AnimatePresence, Variants } from 'framer-motion';
import { Link, router, usePage } from '@inertiajs/react';

interface MenuItem {
  label: string;
  href: string;
}

const menuItems: MenuItem[] = [
  { label: 'Beranda', href: '/' },
  { label: 'Tentang Kami', href: '/tentang-kami' },
  { label: 'Layanan', href: '/layanan' },
  { label: 'Wawasan', href: '/articles' },
  { label: 'Karir', href: '/karir' },
  { label: 'Pengumuman', href: '/pengumuman' },
  { label: 'Kontak', href: '/kontak' },
];

export const Navbar: React.FC = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);
  const [isNavigating, setIsNavigating] = useState(false);
  const { url } = usePage();

  const isActive = (href: string) => (href === '/' ? url === '/' : url.startsWith(href));

  // Scroll-aware background
  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  // Lock body scroll when mobile menu open
  useEffect(() => {
    document.body.classList.toggle('overflow-hidden', isOpen);
    return () => document.body.classList.remove('overflow-hidden');
  }, [isOpen]);

  // Track navigation; close menu when navigating
  useEffect(() => {
    const onStart = () => {
      setIsNavigating(true);
      setIsOpen(false);
    };
    const onFinish = () => setIsNavigating(false);
    const removeStart = router.on('start', onStart);
    const removeFinish = router.on('finish', onFinish);
    return () => {
      removeStart();
      removeFinish();
    };
  }, []);

  const overlayVariants: Variants = {
    closed: { opacity: 0, y: '-100%', transition: { duration: 0.6, ease: [0.76, 0, 0.24, 1] } },
    open: { opacity: 1, y: '0%', transition: { duration: 0.6, ease: [0.76, 0, 0.24, 1] } },
  };
  const listVariants: Variants = {
    closed: { transition: { staggerChildren: 0.05, staggerDirection: -1 } },
    open: { transition: { staggerChildren: 0.07, delayChildren: 0.25 } },
  };
  const itemVariants: Variants = {
    closed: { y: 30, opacity: 0 },
    open: { y: 0, opacity: 1, transition: { duration: 0.6, ease: [0.76, 0, 0.24, 1] } },
  };

  // Desktop links use a dark + white-glow treatment when over a hero (top),
  // and plain dark text once the frosted bar appears (scrolled).
  const deskLinkBase = 'group relative text-sm font-semibold tracking-tight transition-colors duration-300';
  // Bar stays transparent at all times — keep a white glow so links stay legible over any background.
  const glow = 'drop-shadow-[0_1px_3px_rgba(255,255,255,0.95)]';

  return (
    <>
      {/* Page loading progress bar */}
      <AnimatePresence>
        {isNavigating && (
          <motion.div
            initial={{ scaleX: 0 }}
            animate={{ scaleX: 1 }}
            exit={{ scaleX: 0, opacity: 0 }}
            transition={{ duration: 0.8, ease: 'easeInOut' }}
            className="fixed left-0 top-0 z-[200] h-1 w-full origin-left bg-lux-teal"
          />
        )}
      </AnimatePresence>

      {/* Top bar */}
      <motion.header
        initial={{ y: -20, opacity: 0 }}
        animate={{ y: 0, opacity: 1 }}
        transition={{ duration: 0.8, delay: 0.1 }}
        className={`fixed inset-x-0 top-0 z-50 bg-transparent transition-all duration-300 ${
          scrolled ? 'py-4' : 'py-5 md:py-6'
        }`}
      >
        <div className="mx-auto flex max-w-[1500px] items-center justify-between px-6 md:px-12">
          {/* Logo */}
          <Link href="/" className="group block shrink-0" aria-label="Kisantra Consult — Beranda">
            <picture>
              <source srcSet="/image/Logo/Logo Horizontal - Copy.webp" type="image/webp" />
              <source srcSet="/image/Logo/Logo Horizontal.png" type="image/png" />
              <img
                src="/image/Logo/Logo Horizontal.png"
                alt="Kisantra Consult"
                className={`w-auto drop-shadow-[0_1px_2px_rgba(255,255,255,0.8)] transition-all duration-300 group-hover:scale-105 ${
                  scrolled ? 'h-8' : 'h-9 md:h-10'
                }`}
              />
            </picture>
          </Link>

          {/* Desktop navigation */}
          <nav className="hidden items-center gap-7 lg:flex xl:gap-9">
            {menuItems.slice(0, -1).map((item) => {
              const active = isActive(item.href);
              return (
                <Link
                  key={item.href}
                  href={item.href}
                  className={`${deskLinkBase} ${glow} ${
                    active ? 'text-lux-teal' : 'text-lux-black hover:text-lux-teal'
                  }`}
                >
                  {item.label}
                  <span
                    className={`absolute -bottom-1.5 left-0 h-0.5 rounded-full bg-lux-teal transition-all duration-300 ${
                      active ? 'w-full' : 'w-0 group-hover:w-full'
                    }`}
                  />
                </Link>
              );
            })}

            {/* Kontak CTA */}
            <Link
              href="/kontak"
              className={`rounded-full px-5 py-2.5 text-xs font-bold uppercase tracking-[0.12em] transition-all duration-300 ${
                isActive('/kontak')
                  ? 'bg-lux-teal text-white'
                  : 'bg-lux-black text-white hover:bg-lux-teal'
              }`}
            >
              Kontak
            </Link>
          </nav>

          {/* Mobile hamburger */}
          <button
            onClick={() => setIsOpen(!isOpen)}
            className="group ml-auto flex flex-col items-end gap-[6px] p-2 transition-transform duration-300 hover:scale-105 lg:hidden"
            aria-label="Buka menu"
            aria-expanded={isOpen}
          >
            <span className={`h-[2px] bg-lux-black drop-shadow-[0_1px_2px_rgba(255,255,255,0.8)] transition-all duration-300 ${isOpen ? 'w-7 translate-y-[8px] rotate-45' : 'w-7 group-hover:bg-lux-teal'}`} />
            <span className={`h-[2px] bg-lux-black drop-shadow-[0_1px_2px_rgba(255,255,255,0.8)] transition-all duration-300 ${isOpen ? 'w-7 opacity-0' : 'w-5 group-hover:w-7 group-hover:bg-lux-teal'}`} />
            <span className={`h-[2px] bg-lux-black drop-shadow-[0_1px_2px_rgba(255,255,255,0.8)] transition-all duration-300 ${isOpen ? 'w-7 -translate-y-[8px] -rotate-45' : 'w-4 group-hover:w-7 group-hover:bg-lux-teal'}`} />
          </button>
        </div>
      </motion.header>

      {/* Mobile / tablet full-screen menu */}
      <AnimatePresence>
        {isOpen && (
          <motion.div
            variants={overlayVariants}
            initial="closed"
            animate="open"
            exit="closed"
            className="fixed inset-0 z-40 flex flex-col bg-lux-black/95 backdrop-blur-xl lg:hidden"
          >
            <motion.nav
              variants={listVariants}
              initial="closed"
              animate="open"
              exit="closed"
              className="flex flex-1 flex-col justify-center gap-2 px-8 sm:px-12"
            >
              {menuItems.map((item, i) => {
                const active = isActive(item.href);
                return (
                  <motion.div key={item.href} variants={itemVariants}>
                    <Link
                      href={item.href}
                      onClick={() => setIsOpen(false)}
                      className="group flex items-baseline gap-4 border-b border-white/10 py-3"
                    >
                      <span className={`font-mono text-xs ${active ? 'text-lux-teal' : 'text-white/40'}`}>
                        0{i + 1}
                      </span>
                      <span
                        className={`text-3xl font-bold tracking-tight transition-colors duration-300 sm:text-4xl ${
                          active ? 'text-lux-teal' : 'text-white group-hover:text-lux-teal'
                        }`}
                      >
                        {item.label}
                      </span>
                    </Link>
                  </motion.div>
                );
              })}
            </motion.nav>

            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ delay: 0.6, duration: 0.8 }}
              className="px-8 pb-10 sm:px-12"
            >
              <span className="text-xs uppercase tracking-[0.3em] text-neutral-500">Samarinda — Kalimantan Timur</span>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </>
  );
};
