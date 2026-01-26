import React from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { router } from '@inertiajs/react';

interface MainLayoutProps {
  children: React.ReactNode;
}

export const MainLayout: React.FC<MainLayoutProps> = ({ children }) => {
  const [isNavigating, setIsNavigating] = React.useState(false);

  React.useEffect(() => {
    const handleStart = () => setIsNavigating(true);
    const handleFinish = () => setIsNavigating(false);

    const removeStartListener = router.on('start', handleStart);
    const removeFinishListener = router.on('finish', handleFinish);

    return () => {
      removeStartListener();
      removeFinishListener();
    };
  }, []);

  return (
    <>
      {/* Page Transition Overlay */}
      <AnimatePresence>
        {isNavigating && (
          <motion.div
            initial={{ scaleY: 0 }}
            animate={{ scaleY: 1 }}
            exit={{ scaleY: 0 }}
            transition={{ duration: 0.5, ease: [0.76, 0, 0.24, 1] }}
            className="fixed inset-0 z-[100] bg-lux-black origin-top"
          />
        )}
      </AnimatePresence>

      {/* Page Content with fade transition */}
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        transition={{ duration: 0.3 }}
      >
        {children}
      </motion.div>
    </>
  );
};
