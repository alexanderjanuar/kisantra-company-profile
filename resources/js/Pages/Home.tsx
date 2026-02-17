import React, { useRef, useState, useEffect } from 'react';
import { motion, useScroll, useTransform, useSpring, AnimatePresence } from 'framer-motion';
import { Head, usePage } from '@inertiajs/react';
import type { PageProps } from '@inertiajs/core';
import { Navbar } from '../components/Navbar';
import { Hero } from '../components/Hero';
import { Impact } from '../components/Impact';
import { Services } from '../components/Services';
import { Industries } from '../components/Industries';
import { Philosophy } from '../components/Philosophy';
import { Insights } from '../components/Insights';
import { Contact } from '../components/Contact';
import { CTA } from '../components/CTA';
import { FAQ } from '@/components/FAQ';
import { SplashScreen } from '../components/SplashScreen';

interface Article {
  id: number;
  title: string;
  slug: string;
  excerpt?: string;
  featured_image?: string;
  published_at: string;
  categories: Array<{
    id: number;
    name: string;
    slug: string;
  }>;
}

interface HomePageProps extends PageProps {
  articles: Article[];
}

// Custom Smooth Scroll Implementation
const SmoothScrollContainer: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const contentRef = useRef<HTMLDivElement>(null);
  const [contentHeight, setContentHeight] = useState(0);

  // Sync window scroll height with content height
  useEffect(() => {
    const handleResize = () => {
      if (contentRef.current) {
        setContentHeight(contentRef.current.scrollHeight);
      }
    };

    handleResize();
    window.addEventListener('resize', handleResize);

    const observer = new ResizeObserver(handleResize);
    if (contentRef.current) {
      observer.observe(contentRef.current);
    }

    return () => {
      window.removeEventListener('resize', handleResize);
      observer.disconnect();
    };
  }, []);

  const { scrollY } = useScroll();
  const smoothY = useSpring(scrollY, {
    damping: 15,
    mass: 0.1,
    stiffness: 100,
  });

  const y = useTransform(smoothY, (value) => -value);

  return (
    <>
      <div style={{ height: contentHeight }} />
      <motion.div
        style={{ y }}
        ref={contentRef}
        className="fixed top-0 left-0 w-full overflow-hidden will-change-transform"
      >
        {children}
      </motion.div>
    </>
  );
};

const App: React.FC = () => {
  const { articles } = usePage<HomePageProps>().props;

  // Only show splash screen on first visit (not on SPA navigation)
  const [loading, setLoading] = useState(() => {
    if (typeof window === 'undefined') return true;
    return !sessionStorage.getItem('splashShown');
  });

  const isMobile = typeof window !== 'undefined' && window.innerWidth < 768;

  const handleSplashComplete = () => {
    sessionStorage.setItem('splashShown', 'true');
    setLoading(false);
  };

  return (
    <>
      <Head>
        <title>Konsultan Bisnis, Pajak & Keuangan Samarinda</title>
        <meta name="description" content="Mitra strategis terpercaya untuk solusi perpajakan, audit keuangan, dan transformasi digital bisnis di Samarinda dan Kalimantan Timur." />
        <meta name="keywords" content="Konsultan Samarinda, Jasa Pajak Samarinda, Audit Keuangan, Konsultan Bisnis Kaltim, ERP System Samarinda, Kisantra Consult" />
      </Head>
      <div className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white">
        <AnimatePresence mode="wait">
          {loading && <SplashScreen onComplete={handleSplashComplete} />}
        </AnimatePresence>

        {!loading && (
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            transition={{ duration: 0.5 }}
          >
            <Navbar />

            {isMobile ? (
              <main>
                <Hero />
                <Impact />
                <Philosophy />
                <Services />
                <Industries />
                <CTA />
                <FAQ />
                <Insights articles={articles} />
                <Contact />
              </main>
            ) : (
              <SmoothScrollContainer>
                <main>
                  <Hero />
                  <Impact />
                  <Philosophy />
                  <Services />
                  <Industries />
                  <FAQ />
                  <CTA />
                  <Insights articles={articles} />
                  <Contact />
                </main>
              </SmoothScrollContainer>
            )}
          </motion.div>
        )}
      </div>
    </>
  );
};

export default App;
