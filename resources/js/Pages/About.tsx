import React, { useRef } from 'react';
import { motion, useScroll, useTransform, useInView, useSpring } from 'framer-motion';

const stats = [
  { label: 'Tahun Pengalaman', value: '10+' },
  { label: 'Klien Korporasi', value: '150+' },
  { label: 'Sertifikasi Ahli', value: '12' },
  { label: 'Wilayah Layanan', value: 'Global' },
];

const pillars = [
  {
    title: "Integritas Lokal",
    desc: "Berakar kuat di Samarinda, kami memahami seluk-beluk ekonomi Kalimantan Timur lebih dari siapapun.",
    speed: 0.1,
    icon: (
      <svg className="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
    )
  },
  {
    title: "Standar Global",
    desc: "Metodologi kami mengacu pada standar internasional untuk memastikan bisnis Anda siap bersaing di kancah global.",
    speed: 0.2,
    icon: (
      <svg className="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
      </svg>
    )
  },
  {
    title: "Sinergi Digital",
    desc: "Pajak dan Keuangan tidak lagi terpisah dari teknologi. Kami menyatukan ketiganya dalam satu ekosistem.",
    speed: 0.15,
    icon: (
      <svg className="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
      </svg>
    )
  }
];

export const About: React.FC = () => {
  const containerRef = useRef<HTMLDivElement>(null);
  const narrativeRef = useRef<HTMLDivElement>(null);
  const isInView = useInView(containerRef, { once: true, margin: "-100px" });
  
  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start end", "end start"]
  });

  const narrativeScroll = useScroll({
    target: narrativeRef,
    offset: ["start 80%", "end 20%"]
  });

  const springConfig = { damping: 30, stiffness: 100 };
  const smoothProgress = useSpring(scrollYProgress, springConfig);

  const imageY = useTransform(smoothProgress, [0, 1], [0, -150]);
  const bgTextX = useTransform(smoothProgress, [0, 1], ["5%", "-20%"]);
  
  // Scrubbing effect for text
  const textOpacity = useTransform(narrativeScroll.scrollYProgress, [0, 0.5, 1], [0.3, 1, 0.3]);
  const textScale = useTransform(narrativeScroll.scrollYProgress, [0, 0.5, 1], [0.98, 1, 0.98]);

  return (
    <section ref={containerRef} id="about" className="relative bg-lux-white w-full py-32 md:py-64 overflow-hidden">
      
      {/* Dynamic Background Typography */}
      <div className="absolute top-0 left-0 w-full h-full pointer-events-none select-none overflow-hidden opacity-[0.02] z-0">
        <motion.span 
          style={{ x: bgTextX }}
          className="absolute top-20 left-0 text-[25vw] font-black whitespace-nowrap tracking-tighter will-change-transform"
        >
          STRATEGY • INTEGRITY • GROWTH
        </motion.span>
      </div>

      <div className="max-w-[1400px] mx-auto px-6 md:px-12 relative z-10">
        
        {/* Hero Editorial Block */}
        <div className="relative grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-56">
          <div className="lg:col-span-7 relative z-20">
            <motion.div
              initial={{ opacity: 0, x: -50 }}
              animate={isInView ? { opacity: 1, x: 0 } : {}}
              transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
            >
              <div className="flex items-center gap-4 mb-10">
                <motion.span 
                  initial={{ width: 0 }}
                  animate={isInView ? { width: 40 } : {}}
                  transition={{ duration: 1, delay: 0.5 }}
                  className="h-[1px] bg-lux-teal"
                ></motion.span>
                <span className="font-sans font-bold text-xs uppercase tracking-[0.4em] text-lux-teal">
                  The Essence of Kisantra
                </span>
              </div>
              <h2 className="font-sans font-bold text-6xl md:text-8xl lg:text-9xl leading-[0.8] tracking-tighter text-lux-black mb-12">
                Membangun <br />
                <span className="font-serif italic font-normal text-lux-teal-dark">Legasi</span> <br />
                Kredibilitas.
              </h2>
            </motion.div>
          </div>

          <motion.div 
            style={{ y: imageY }}
            className="lg:col-span-5 relative lg:translate-y-24"
          >
            <motion.div 
              initial={{ clipPath: 'inset(100% 0% 0% 0%)' }}
              animate={isInView ? { clipPath: 'inset(0% 0% 0% 0%)' } : {}}
              transition={{ duration: 1.5, ease: [0.22, 1, 0.36, 1] }}
              className="relative aspect-[3/4] rounded-3xl overflow-hidden shadow-3xl"
            >
              <img 
                src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1000&auto=format&fit=crop" 
                alt="Sophisticated Office Space" 
                className="w-full h-full object-cover grayscale brightness-90 hover:grayscale-0 transition-all duration-1000 scale-110"
              />
              <div className="absolute inset-0 bg-lux-black/10 mix-blend-multiply" />
            </motion.div>
            
            <motion.div 
              initial={{ opacity: 0, scale: 0.8, rotate: -5 }}
              whileInView={{ opacity: 1, scale: 1, rotate: 0 }}
              viewport={{ once: true }}
              transition={{ delay: 0.8, duration: 1 }}
              className="absolute -bottom-8 -left-8 md:-left-16 bg-lux-black text-white p-12 rounded-2xl hidden md:block max-w-[300px] shadow-2xl"
            >
              <p className="font-serif text-2xl italic leading-tight text-lux-teal-light">
                "Kami melampaui angka untuk menemukan jiwa dalam setiap strategi."
              </p>
            </motion.div>
          </motion.div>
        </div>

        {/* Narrative Scrubbing Section */}
        <div ref={narrativeRef} className="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-64 items-center">
          <div className="lg:col-span-2 hidden lg:block" />
          <motion.div 
            style={{ opacity: textOpacity, scale: textScale }}
            className="lg:col-span-9"
          >
            <p className="text-3xl md:text-5xl lg:text-6xl text-lux-black font-sans font-light leading-[1.1] tracking-tight mb-16">
              Lahir di Samarinda, <span className="text-lux-teal font-bold">Kisantra Consult</span> mendefinisikan ulang peran penasihat bisnis. Kami percaya bahwa setiap entitas memiliki potensi unik yang memerlukan <span className="italic font-serif">precision-engineered strategy</span> untuk berkembang di lanskap ekonomi yang dinamis.
            </p>
            
            <div className="grid grid-cols-2 md:grid-cols-4 gap-12 py-16 border-y border-neutral-100">
              {stats.map((stat, i) => (
                <div key={i} className="group cursor-default">
                  <motion.div 
                    initial={{ opacity: 0, y: 20 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    transition={{ delay: i * 0.1 + 0.5 }}
                    className="text-5xl font-bold text-lux-black mb-3 group-hover:text-lux-teal transition-colors tracking-tighter"
                  >
                    {stat.value}
                  </motion.div>
                  <div className="text-[10px] uppercase tracking-[0.3em] text-neutral-400 font-bold">{stat.label}</div>
                </div>
              ))}
            </div>
          </motion.div>
        </div>

        {/* Staggered Floating Pillars */}
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-16 relative">
          {pillars.map((pillar, i) => {
            // Each card moves at a slightly different rate
            const cardY = useTransform(smoothProgress, [0.4, 1], [0, -100 * pillar.speed * 10]);
            
            return (
              <motion.div
                key={i}
                style={{ y: cardY }}
                initial={{ opacity: 0, y: 100 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, margin: "-50px" }}
                transition={{ duration: 1, delay: i * 0.2, ease: [0.22, 1, 0.36, 1] }}
                className={`group p-12 rounded-[3.5rem] bg-white border border-neutral-100 hover:border-lux-teal/20 shadow-sm hover:shadow-2xl hover:shadow-lux-teal/5 transition-all duration-700`}
              >
                <motion.div 
                  whileHover={{ scale: 1.1, rotate: 5 }}
                  className="w-14 h-14 bg-lux-black text-white rounded-2xl flex items-center justify-center mb-12 group-hover:bg-lux-teal transition-colors duration-500 shadow-lg"
                >
                  {pillar.icon}
                </motion.div>
                <h4 className="text-3xl font-bold text-lux-black mb-6 font-sans tracking-tighter">{pillar.title}</h4>
                <p className="text-neutral-500 font-sans font-light text-lg leading-relaxed">
                  {pillar.desc}
                </p>
                <motion.div 
                  initial={{ width: 0 }}
                  whileInView={{ width: '100%' }}
                  className="h-[1px] bg-neutral-100 mt-10 group-hover:bg-lux-teal/30 transition-colors"
                />
              </motion.div>
            );
          })}
        </div>

        {/* Minimalist Trust Bar */}
        <motion.div 
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 1 }}
          className="mt-64 pt-24 border-t border-neutral-100 flex flex-col md:flex-row justify-between items-center gap-16"
        >
          <div className="text-center md:text-left max-w-sm">
            <h5 className="font-sans font-bold text-xs uppercase tracking-[0.4em] text-lux-teal mb-6">Accredited Excellence</h5>
            <p className="text-neutral-400 text-sm font-medium leading-relaxed">
              Profesionalisme kami divalidasi oleh lembaga otoritas tertinggi dalam industri keuangan dan perpajakan nasional.
            </p>
          </div>
          
          <div className="flex flex-wrap justify-center items-center gap-12 md:gap-24 opacity-20 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-1000">
             <span className="text-3xl font-black tracking-tighter">IKPI</span>
             <span className="text-3xl font-black tracking-tighter">BREVET C</span>
             <span className="text-3xl font-black tracking-tighter">ISO 9001</span>
             <span className="text-3xl font-black tracking-tighter">KADIN</span>
             <span className="text-3xl font-black tracking-tighter">HIPMI</span>
          </div>
        </motion.div>

      </div>

      {/* Aesthetic Noise & Gradient Overlays */}
      <div className="absolute top-0 left-0 w-full h-full bg-grain opacity-[0.03] pointer-events-none mix-blend-overlay" />
      <div className="absolute bottom-0 left-0 w-full h-96 bg-gradient-to-t from-lux-white via-lux-white/80 to-transparent pointer-events-none z-20" />
    </section>
  );
};

export default About;
