import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
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

const App: React.FC = () => {
  const { articles } = usePage<HomePageProps>().props;

  // Only show splash screen on first visit (not on SPA navigation)
  const [loading, setLoading] = useState(() => {
    if (typeof window === 'undefined') return true;
    return !sessionStorage.getItem('splashShown');
  });

  const handleSplashComplete = () => {
    sessionStorage.setItem('splashShown', 'true');
    setLoading(false);
  };

  return (
    <>
      <Head title="Beranda" />
      <div className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white">
        <AnimatePresence mode="wait">
          {loading && <SplashScreen onComplete={handleSplashComplete} />}
        </AnimatePresence>

        {!loading && (
          <motion.div
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.5 }}
          >
            <Navbar />
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
          </motion.div>
        )}
      </div>
    </>
  );
};

export default App;