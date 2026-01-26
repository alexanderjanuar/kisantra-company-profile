import React, { useRef, useState, useEffect, useMemo } from 'react';
import { motion, useScroll, useTransform, useInView, useSpring, AnimatePresence } from 'framer-motion';
import { Head } from '@inertiajs/react';
import { Navbar } from '../components/Navbar';
import { Contact } from '../components/Contact';
import { geoMercator, geoPath } from 'd3-geo';
import { feature } from 'topojson-client';

const stats = [
  { label: 'Tahun Pengalaman', value: '10+' },
  { label: 'Klien Korporasi', value: '150+' },
  { label: 'Sertifikasi Ahli', value: '12' },
  { label: 'Wilayah Layanan', value: 'Global' },
];

// Using jsDelivr for better reliability and CORS support
const geoUrl = "https://cdn.jsdelivr.net/npm/world-atlas@2/countries-50m.json";

const locations = [
  {
    id: 'samarinda',
    name: 'Samarinda',
    role: 'Headquarters',
    desc: 'Pusat operasional utama. Fokus pada sektor pertambangan & konstruksi.',
    coordinates: [117.1536, -0.5022] as [number, number],
  },
  {
    id: 'jakarta',
    name: 'Jakarta',
    role: 'Representative Office',
    desc: 'Hubungan investor & klien korporasi multinasional.',
    coordinates: [106.8456, -6.2088] as [number, number],
  },
  {
    id: 'surabaya',
    name: 'Surabaya',
    role: 'Commercial Hub',
    desc: 'Pusat perdagangan strategis dan gerbang logistik wilayah Timur Indonesia.',
    coordinates: [112.7521, -7.2575] as [number, number],
  },
  {
    id: 'balikpapan',
    name: 'Balikpapan',
    role: 'Industrial Hub',
    desc: 'Gerbang utama industri migas dan logistik alat berat Kalimantan Timur.',
    coordinates: [116.8312, -1.2379] as [number, number],
  },
  {
    id: 'banjarmasin',
    name: 'Banjarmasin',
    role: 'Trading Branch',
    desc: 'Sentra perdagangan komoditas dan transportasi logistik sungai.',
    coordinates: [114.5901, -3.3186] as [number, number],
  },
  {
    id: 'sukabumi',
    name: 'Sukabumi',
    role: 'Operational Unit',
    desc: 'Dukungan operasional untuk manufaktur dan agribisnis Jawa Barat.',
    coordinates: [106.9279, -6.9215] as [number, number],
  }
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

export const AboutSection: React.FC = () => {
  const containerRef = useRef<HTMLDivElement>(null);
  const narrativeRef = useRef<HTMLDivElement>(null);
  const isInView = useInView(containerRef, { once: true, margin: "-100px" });
  const [activeLocation, setActiveLocation] = useState<string | null>(null);
  const [geographies, setGeographies] = useState<any[]>([]);
  const [isLoading, setIsLoading] = useState(true);

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

  // Map Data Fetching
  useEffect(() => {
    setIsLoading(true);
    fetch(geoUrl)
      .then(res => res.json())
      .then(data => {
        // Use World Atlas 50m - ID 360 is Indonesia
        const countries = (feature(data, data.objects.countries) as any).features;
        const indonesia = countries.filter((d: any) => d.id === "360" || d.id === 360);

        if (indonesia.length > 0) {
          setGeographies(indonesia);
        } else {
          console.warn("Indonesia feature not found in map data");
        }
        setIsLoading(false);
      })
      .catch(err => {
        console.error("Error loading map data:", err);
        setIsLoading(false);
      });
  }, []);

  // Map Projection Setup
  const projection = useMemo(() => {
    // Mercator projection centered on Indonesia
    return geoMercator()
      .center([118, -2.5]) // Centered
      .scale(800) // Zoomed out to show entire archipelago (Aceh to Papua)
      .translate([400, 200]); // Center in 800x400 viewBox
  }, []);

  const pathGenerator = useMemo(() => geoPath().projection(projection), [projection]);

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

              {/* Portfolio Download Button */}
              <motion.a
                href="/files/Company Profile_.pdf"
                target="_blank"
                initial={{ opacity: 0, y: 20 }}
                animate={isInView ? { opacity: 1, y: 0 } : {}}
                transition={{ duration: 1, delay: 0.6 }}
                className="group flex items-center gap-6 mt-12 cursor-pointer w-fit"
              >
                <div className="relative w-16 h-16 rounded-full border border-neutral-200 flex items-center justify-center overflow-hidden group-hover:border-lux-teal transition-colors duration-500 bg-white">
                  <div className="absolute inset-0 bg-lux-teal translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-[0.22,1,0.36,1]" />
                  <svg className="w-6 h-6 text-lux-black relative z-10 group-hover:text-white transition-colors duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                </div>
                <div className="flex flex-col">
                  <span className="font-sans font-bold text-sm uppercase tracking-[0.2em] text-lux-black group-hover:text-lux-teal transition-colors duration-300">Unduh Portofolio</span>
                  <span className="font-serif italic text-neutral-400 text-sm">Company Profile 2025</span>
                </div>
              </motion.a>
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
        <div ref={narrativeRef} className="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-32 items-center">
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

        {/* Vision & Mission Statement (Moved) */}
        <div className="mb-48 grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center border-t border-neutral-100 pt-24">
          {/* Vision */}
          <motion.div
            initial={{ opacity: 0, x: -50 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 1 }}
          >
            <h5 className="font-sans font-bold text-xs uppercase tracking-[0.4em] text-lux-teal mb-8">Visi Utama</h5>
            <h3 className="font-serif text-5xl md:text-6xl lg:text-7xl leading-none text-lux-black mb-10">
              The Future of <br /> <span className="italic text-lux-teal-dark">Consultancy.</span>
            </h3>
            <p className="text-xl md:text-2xl text-neutral-500 font-light leading-relaxed max-w-lg">
              "Mewujudkan ekosistem konsultasi masa depan di mana kecerdasan data bertemu dengan keindahan desain, memberdayakan bisnis untuk tumbuh melalui pengalaman digital yang imersif dan tanpa hambatan."
            </p>
          </motion.div>

          {/* Mission */}
          <motion.div
            initial={{ opacity: 0, x: 50 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 1, delay: 0.2 }}
            className="bg-neutral-50 p-10 md:p-16 rounded-[3rem] relative overflow-hidden"
          >
            {/* Decorative Element */}
            <div className="absolute top-0 right-0 w-64 h-64 bg-lux-teal/5 rounded-full blur-[80px] pointer-events-none" />

            <h5 className="font-sans font-bold text-xs uppercase tracking-[0.4em] text-lux-teal mb-8 relative z-10">Misi Strategis</h5>
            <ul className="space-y-8 relative z-10">
              <li className="flex gap-6 items-start group">
                <span className="flex-shrink-0 w-8 h-8 rounded-full border border-neutral-300 flex items-center justify-center text-xs font-bold text-lux-teal group-hover:bg-lux-teal group-hover:text-white group-hover:border-lux-teal transition-all duration-300">01</span>
                <div>
                  <h4 className="font-sans font-bold text-xl text-lux-black mb-2">Desain Intuitif & Memikat</h4>
                  <p className="text-sm text-neutral-500 leading-relaxed">Merancang antarmuka yang tidak hanya fungsional tetapi juga emosional, menjadikan data kompleks mudah dipahami.</p>
                </div>
              </li>
              <li className="flex gap-6 items-start group">
                <span className="flex-shrink-0 w-8 h-8 rounded-full border border-neutral-300 flex items-center justify-center text-xs font-bold text-lux-teal group-hover:bg-lux-teal group-hover:text-white group-hover:border-lux-teal transition-all duration-300">02</span>
                <div>
                  <h4 className="font-sans font-bold text-xl text-lux-black mb-2">Interaksi Dinamis</h4>
                  <p className="text-sm text-neutral-500 leading-relaxed">Menggunakan animasi responsif untuk memandu perjalanan pengguna, menciptakan pengalaman yang hidup dan menarik.</p>
                </div>
              </li>
              <li className="flex gap-6 items-start group">
                <span className="flex-shrink-0 w-8 h-8 rounded-full border border-neutral-300 flex items-center justify-center text-xs font-bold text-lux-teal group-hover:bg-lux-teal group-hover:text-white group-hover:border-lux-teal transition-all duration-300">03</span>
                <div>
                  <h4 className="font-sans font-bold text-xl text-lux-black mb-2">Solusi Berpusat pada Pengguna</h4>
                  <p className="text-sm text-neutral-500 leading-relaxed">Memastikan setiap fitur dan layanan dirancang dengan fokus utama pada kenyamanan dan kepuasan klien.</p>
                </div>
              </li>
            </ul>
          </motion.div>
        </div>

        {/* Custom D3 Interactive Indonesia Map Section */}
        <div className="mb-64 relative">
          <div className="flex flex-col md:flex-row justify-between items-end mb-16 px-4">
            <div className="max-w-xl">
              <span className="text-xs font-bold uppercase tracking-[0.4em] text-lux-teal mb-4 block">Jangkauan & Konektivitas</span>
              <h3 className="font-sans font-bold text-4xl md:text-5xl leading-tight text-lux-black tracking-tight">
                Dari Samarinda, <br />Melayani <span className="text-lux-teal">Indonesia.</span>
              </h3>
            </div>
            <p className="text-neutral-500 max-w-sm text-sm font-medium leading-relaxed mt-6 md:mt-0">
              Jaringan strategis kami memastikan setiap klien, dimanapun berada, mendapatkan standar layanan premium yang sama.
            </p>
          </div>

          <div className="w-full aspect-[2/1] bg-neutral-50 rounded-[2rem] border border-neutral-100 relative overflow-hidden group shadow-inner">

            {/* Map Container */}
            <div className="absolute inset-0 flex items-center justify-center">
              {isLoading ? (
                <div className="flex items-center gap-4 text-neutral-400">
                  <svg className="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                    <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  <span className="text-xs uppercase tracking-widest font-sans">Memuat Peta...</span>
                </div>
              ) : (
                <svg viewBox="0 0 800 400" className="w-full h-full" style={{ filter: 'drop-shadow(0 4px 6px rgba(0,0,0,0.05))' }}>
                  {/* Render Geographies */}
                  <g className="transition-opacity duration-1000">
                    {geographies.map((geo, i) => {
                      const d = pathGenerator(geo);
                      return (
                        <path
                          key={`path-${i}`}
                          d={d || ""}
                          fill="#d4d4d4"
                          stroke="#fafafa"
                          strokeWidth="0.5"
                          className="hover:fill-neutral-400 transition-colors duration-300 ease-out cursor-pointer outline-none"
                        />
                      );
                    })}
                  </g>

                  {/* Render Markers */}
                  {locations.map((loc) => {
                    const [x, y] = projection(loc.coordinates) || [0, 0];
                    const isActive = activeLocation === loc.id;

                    // Don't render markers if projection returns 0,0 (off screen/invalid)
                    if (!x || !y || isNaN(x) || isNaN(y)) return null;

                    return (
                      <g
                        key={loc.id}
                        onMouseEnter={() => setActiveLocation(loc.id)}
                        onMouseLeave={() => setActiveLocation(null)}
                        style={{ cursor: 'pointer' }}
                      >
                        {/* Pulse Animation */}
                        <circle cx={x} cy={y} r={isActive ? 12 : 6} fill="#14b8a6" fillOpacity="0.2">
                          <animate attributeName="r" from="6" to="20" dur="2s" repeatCount="indefinite" />
                          <animate attributeName="opacity" from="0.4" to="0" dur="2s" repeatCount="indefinite" />
                        </circle>

                        {/* Core Dot */}
                        <circle
                          cx={x}
                          cy={y}
                          r={isActive ? 6 : 4}
                          fill={isActive ? "#0a0a0a" : "#14b8a6"}
                          stroke="#fff"
                          strokeWidth="1.5"
                          className="transition-all duration-300"
                        />
                      </g>
                    );
                  })}
                </svg>
              )}
            </div>

            {/* Tooltip Layer - Pure React Floating UI */}
            <div className="absolute inset-0 pointer-events-none">
              <AnimatePresence>
                {locations.map((loc) => {
                  const [x, y] = projection(loc.coordinates) || [0, 0];

                  if (!x || !y) return null;

                  // Convert SVG coordinates to percentage for DOM positioning
                  const leftPct = (x / 800) * 100;
                  const topPct = (y / 400) * 100;

                  return activeLocation === loc.id && (
                    <motion.div
                      key={loc.id}
                      initial={{ opacity: 0, y: "calc(-100% - 12px)", scale: 0.9 }}
                      animate={{ opacity: 1, y: "calc(-100% - 24px)", scale: 1 }}
                      exit={{ opacity: 0, y: "calc(-100% - 12px)", scale: 0.9 }}
                      transition={{ type: "spring", stiffness: 300, damping: 20 }}
                      style={{
                        left: `${leftPct}%`,
                        top: `${topPct}%`,
                        x: '-50%',
                      }}
                      className="absolute bg-white/95 backdrop-blur-md p-5 rounded-xl shadow-2xl border border-neutral-100 w-64 pointer-events-none z-50 origin-bottom"
                    >
                      <div className="flex items-center justify-between mb-2">
                        <span className="font-sans font-bold text-lux-black text-lg">{loc.name}</span>
                        {loc.role.includes('Head') && <span className="text-[9px] bg-lux-black text-white px-2 py-0.5 rounded-full uppercase tracking-wider">HQ</span>}
                      </div>
                      <span className="block text-xs font-bold uppercase tracking-widest text-lux-teal mb-2">{loc.role}</span>
                      <p className="text-xs text-neutral-500 leading-relaxed font-medium">
                        {loc.desc}
                      </p>
                      {/* Triangle arrow */}
                      <div className="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-full w-0 h-0 border-l-[8px] border-l-transparent border-r-[8px] border-r-transparent border-t-[8px] border-t-white/95" />
                    </motion.div>
                  );
                })}
              </AnimatePresence>
            </div>

            {/* Decorative Grid Lines */}
            <div className="absolute inset-0 opacity-[0.03] pointer-events-none" style={{
              backgroundImage: 'linear-gradient(#000 1px, transparent 1px), linear-gradient(90deg, #000 1px, transparent 1px)',
              backgroundSize: '40px 40px'
            }} />
          </div>
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

        {/* New Services Overview Section */}
        <motion.div
          initial={{ opacity: 0, scale: 0.95 }}
          whileInView={{ opacity: 1, scale: 1 }}
          viewport={{ once: true }}
          transition={{ duration: 1.2, ease: [0.22, 1, 0.36, 1] }}
          className="my-32 md:my-48 relative"
        >
          <div className="absolute inset-0 bg-lux-black rounded-[2.5rem] transform -rotate-1 opacity-5" />
          <div className="relative bg-lux-black rounded-[2.5rem] p-10 md:p-20 overflow-hidden text-white flex flex-col lg:flex-row items-center justify-between gap-12 shadow-2xl">
            {/* Decor */}
            <div className="absolute -top-24 -right-24 w-64 h-64 bg-lux-teal rounded-full blur-[100px] opacity-20" />
            <div className="absolute -bottom-24 -left-24 w-64 h-64 bg-lux-teal-dark rounded-full blur-[100px] opacity-20" />

            <div className="relative z-10 max-w-2xl">
              <span className="text-lux-teal font-sans font-bold text-xs uppercase tracking-[0.3em] mb-6 block">Ekspertise Kami</span>
              <h3 className="font-sans font-bold text-4xl md:text-5xl leading-[1.1] mb-6 tracking-tight">
                Layanan Menyeluruh untuk <br /><span className="text-lux-teal font-serif italic font-normal">Performa Puncak.</span>
              </h3>
              <p className="text-neutral-400 font-light text-lg leading-relaxed max-w-lg">
                Kami memadukan konsultasi pajak presisi, manajemen keuangan strategis, dan solusi digital inovatif dalam satu atap untuk akselerasi bisnis Anda.
              </p>
            </div>

            <motion.a
              href="#services"
              whileHover={{ scale: 1.05 }}
              whileTap={{ scale: 0.95 }}
              className="relative z-10 group flex items-center gap-4 bg-white text-lux-black px-10 py-5 rounded-full font-sans font-bold text-sm uppercase tracking-widest hover:bg-lux-teal hover:text-white transition-all duration-300 shadow-[0_0_40px_-10px_rgba(255,255,255,0.3)]"
            >
              <span>Lihat Layanan</span>
              <svg className="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </motion.a>
          </div>
        </motion.div>

      </div>

      {/* Aesthetic Noise & Gradient Overlays */}
      <div className="absolute top-0 left-0 w-full h-full bg-grain opacity-[0.03] pointer-events-none mix-blend-overlay" />
      <div className="absolute bottom-0 left-0 w-full h-96 bg-gradient-to-t from-lux-white via-lux-white/80 to-transparent pointer-events-none z-20" />
    </section>
  );
};

const About: React.FC = () => {
  return (
    <>
      <Head title="Tentang Kami" />
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ duration: 0.5 }}
        className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white"
      >
        <Navbar />
        <main>
          <AboutSection />
        </main>
        <Contact />
      </motion.div>
    </>
  );
};

export default About;
