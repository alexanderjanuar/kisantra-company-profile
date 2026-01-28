import React, { useRef, useState } from 'react';
import { motion, useScroll, useTransform, AnimatePresence } from 'framer-motion';
import { Head } from '@inertiajs/react';
import { Navbar } from '../components/Navbar';
import { Contact } from '../components/Contact';
import { ServiceCTA } from '../components/ServiceCTA';

// --- Data Structures ---
const workflowSteps = [
  {
    step: "01",
    title: "Konsultasi",
    desc: "Diskusi mendalam untuk memetakan kebutuhan & tantangan.",
    icon: (
      <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
      </svg>
    )
  },
  {
    step: "02",
    title: "Asesmen",
    desc: "Audit data internal untuk identifikasi risiko & peluang.",
    icon: (
      <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
      </svg>
    )
  },
  {
    step: "03",
    title: "Implementasi",
    desc: "Eksekusi strategi perpajakan & sistem dengan presisi.",
    icon: (
      <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
      </svg>
    )
  },
  {
    step: "04",
    title: "Evaluasi",
    desc: "Monitoring berkala & laporan performa transparan.",
    icon: (
      <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg>
    )
  }
];

const services = [
  {
    id: "01",
    title: "Perpajakan",
    subtitle: "Tax Compliance & Strategy",
    desc: "Solusi kepatuhan pajak menyeluruh untuk meminimalisir risiko sengketa dan denda. Kami menangani segala aspek perpajakan perusahaan Anda dengan presisi tinggi.",
    price: "2.500.000",
    priceUnit: "/ bulan",
    image: "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=1000&auto=format&fit=crop",
    features: [
      "Pelaporan SPT Tahunan",
      "Perhitungan PPN & PPH Masa",
      "Pendampingan Tax Amnesty",
      "Review & Audit Kepatuhan",
      "Restitusi Pajak Korporasi",
      "Konsultasi Sengketa Pajak"
    ]
  },
  {
    id: "02",
    title: "Keuangan",
    subtitle: "Financial Advisory & Audit",
    desc: "Transformasi data transaksi menjadi laporan keuangan standar PSAK yang akurat untuk pengambilan keputusan bisnis yang lebih tajam dan terukur.",
    price: "3.000.000",
    priceUnit: "/ bulan",
    image: "https://images.unsplash.com/photo-1628348068343-c6a848d2b6dd?q=80&w=1000&auto=format&fit=crop",
    features: [
      "Laporan Laba Rugi & Neraca",
      "Analisis Arus Kas (Cash Flow)",
      "Valuasi Aset & Bisnis",
      "Studi Kelayakan Bisnis",
      "Sistem Payroll & Penggajian",
      "Audit Internal Operasional"
    ]
  },
  {
    id: "03",
    title: "Digital Marketing",
    subtitle: "Growth & Performance",
    desc: "Strategi pemasaran berbasis data untuk meningkatkan omset dan brand awareness. Kami membantu bisnis Anda menjangkau audiens yang tepat di waktu yang tepat.",
    price: "5.000.000",
    priceUnit: "/ project",
    image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000&auto=format&fit=crop",
    features: [
      "SEO & SEM Optimization",
      "Social Media Management",
      "Meta & Google Ads",
      "Content Strategy",
      "Brand Identity Design",
      "Market Research Analytics"
    ]
  },
  {
    id: "04",
    title: "Sistem Digital",
    subtitle: "Automation & ERP",
    desc: "Membangun infrastruktur teknologi untuk efisiensi operasional tanpa batas. Integrasikan seluruh proses bisnis Anda dalam satu dashboard terpusat.",
    price: "15.000.000",
    priceUnit: "/ system",
    image: "https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1000&auto=format&fit=crop",
    features: [
      "Custom ERP Development",
      "Pembuatan Website Korporat",
      "Integrasi POS & Stok",
      "Dashboard Visualisasi Data",
      "Cloud Server Setup",
      "Cybersecurity Audit"
    ]
  }
];

export const ServicesSection: React.FC = () => {
  const containerRef = useRef<HTMLElement>(null);
  const [activeId, setActiveId] = useState<string | null>(null);

  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start end", "end start"]
  });

  // --- Parallax Background Animations ---
  const textX1 = useTransform(scrollYProgress, [0, 1], ["-10%", "-30%"]);
  const textX2 = useTransform(scrollYProgress, [0, 1], ["0%", "20%"]);

  return (
    <section ref={containerRef} id="services" className="relative w-full bg-lux-white pt-32 pb-24 overflow-hidden">

      {/* --- Dynamic Background Layer --- */}
      <div className="absolute inset-0 pointer-events-none z-0 overflow-hidden">
        <div className="absolute inset-0 bg-grain opacity-[0.03] mix-blend-multiply" />
        <div className="absolute top-[5%] left-0 w-full opacity-[0.02] select-none whitespace-nowrap">
          <motion.div style={{ x: textX1 }} className="text-[12vw] font-black leading-none tracking-tighter text-lux-black">
            TAX • AUDIT • STRATEGY • COMPLIANCE • GROWTH •
          </motion.div>
        </div>
        <div className="absolute bottom-[20%] left-0 w-full opacity-[0.02] select-none whitespace-nowrap">
          <motion.div style={{ x: textX2 }} className="text-[12vw] font-black leading-none tracking-tighter text-lux-black">
            SYSTEMS • DIGITAL • FINANCE • AUTOMATION • ERP •
          </motion.div>
        </div>
      </div>

      <div className="relative z-10">

        {/* --- 1. Introductory Header --- */}
        <div className="px-6 md:px-12 mb-20 max-w-[1400px] mx-auto">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="flex flex-col items-center text-center"
          >
            <span className="text-xs font-bold uppercase tracking-[0.3em] text-lux-teal mb-4 block">
              Layanan & Proses
            </span>
            <h2 className="font-bold text-4xl md:text-5xl lg:text-6xl text-lux-black mb-8 tracking-tight">
              Our Services
            </h2>
          </motion.div>
        </div>

        {/* --- 2. Workflow Process --- */}
        <div className="px-6 md:px-12 max-w-[1400px] mx-auto mb-32">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
            {/* Connecting Line (Desktop) */}
            <div className="hidden md:block absolute top-[28px] left-[12%] right-[12%] h-[2px] bg-neutral-100 -z-10" />

            {workflowSteps.map((step, idx) => (
              <motion.div
                key={idx}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: idx * 0.15 }}
                className="flex flex-col items-center text-center group cursor-default"
              >
                <div className="w-14 h-14 rounded-full bg-white border border-neutral-200 text-lux-teal flex items-center justify-center shadow-lg mb-6 z-10 group-hover:scale-110 group-hover:border-lux-teal transition-all duration-300">
                  {step.icon}
                </div>
                <span className="text-xs font-bold text-neutral-300 uppercase tracking-widest mb-2">{step.step}</span>
                <h4 className="text-lg font-bold text-lux-black mb-2">{step.title}</h4>
                <p className="text-sm text-neutral-500 leading-relaxed max-w-[200px]">{step.desc}</p>
              </motion.div>
            ))}
          </div>
        </div>

        {/* --- 3. Full-Width Interactive Rows --- */}
        <div className="flex flex-col w-full">
          {services.map((service) => {
            const isActive = activeId === service.id;

            return (
              <motion.div
                layout
                key={service.id}
                onClick={() => setActiveId(isActive ? null : service.id)}
                initial={{ opacity: 0 }}
                whileInView={{ opacity: 1 }}
                viewport={{ once: true }}
                className={`relative w-full overflow-hidden cursor-pointer transition-all duration-700 ease-[0.22,1,0.36,1] group border-b border-white/10 ${isActive ? 'h-[85vh]' : 'h-[120px] md:h-[180px] hover:h-[140px] md:hover:h-[220px]'}`}
              >
                {/* Background Image */}
                <motion.div
                  layoutId={`bg-img-${service.id}`}
                  className="absolute inset-0 w-full h-full"
                >
                  <img
                    src={service.image}
                    alt={service.title}
                    className={`w-full h-full object-cover transition-all duration-[1.5s] ease-[0.22,1,0.36,1] ${isActive ? 'scale-105 grayscale-0' : 'scale-100 grayscale group-hover:scale-105 group-hover:grayscale-[0.5]'}`}
                  />
                  {/* Overlay Gradient */}
                  <div className={`absolute inset-0 bg-gradient-to-r from-lux-black via-lux-black/80 to-transparent transition-opacity duration-1000 ${isActive ? 'opacity-90 md:opacity-80' : 'opacity-90 group-hover:opacity-75'}`} />
                </motion.div>

                {/* Content Container */}
                <div className="relative z-10 h-full w-full max-w-[1400px] mx-auto px-6 md:px-12 flex flex-col justify-center">

                  {/* Header (Title & Subtitle) */}
                  <motion.div
                    layout="position"
                    className={`flex flex-col md:flex-row md:items-end justify-between gap-4 transition-all duration-700 ${isActive ? 'mb-12' : 'mb-0'}`}
                  >
                    <div className="flex items-baseline gap-6">
                      <span className={`text-sm md:text-xl font-mono text-lux-teal font-bold transition-all duration-500 ${isActive ? 'opacity-100' : 'opacity-40 group-hover:opacity-100'}`}>
                        {service.id}
                      </span>
                      <h3 className={` font-bold text-white leading-none transition-all duration-700 ${isActive ? 'text-4xl md:text-7xl' : 'text-3xl md:text-5xl text-white/50 group-hover:text-white'}`}>
                        {service.title}
                      </h3>
                    </div>

                    {/* Collapsed State: Hint */}
                    {!isActive && (
                      <motion.div
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        className="hidden md:flex items-center gap-3 text-white/30 group-hover:text-lux-teal transition-colors duration-500"
                      >
                        <span className="text-xs uppercase tracking-widest font-bold">Explore</span>
                        <svg className="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M19 9l-7 7-7-7" />
                        </svg>
                      </motion.div>
                    )}
                  </motion.div>

                  {/* Expanded Details */}
                  <AnimatePresence>
                    {isActive && (
                      <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                        exit={{ opacity: 0, y: 10 }}
                        transition={{ duration: 0.5, delay: 0.2 }}
                        className="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 text-white"
                      >
                        {/* Left Column: Description & Features */}
                        <div className="space-y-8">
                          <span className="inline-block py-1 px-3 border border-lux-teal/50 rounded-full text-lux-teal text-[10px] font-bold uppercase tracking-widest">
                            {service.subtitle}
                          </span>
                          <p className="text-lg md:text-xl text-neutral-300 font-light leading-relaxed max-w-xl">
                            {service.desc}
                          </p>

                          <div className="pt-8 border-t border-white/10">
                            <h4 className="text-xs font-bold uppercase tracking-widest text-white/50 mb-6">Key Deliverables</h4>
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                              {service.features.map((feature, idx) => (
                                <div key={idx} className="flex items-start gap-3">
                                  <div className="mt-1 w-1.5 h-1.5 rounded-full bg-lux-teal flex-shrink-0" />
                                  <span className="text-sm text-neutral-300 font-medium">{feature}</span>
                                </div>
                              ))}
                            </div>
                          </div>
                        </div>

                        {/* Right Column: Pricing & CTA */}
                        <div className="flex flex-col justify-end lg:items-end">
                          <div className="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-2xl w-full max-w-md hover:bg-white/10 transition-colors duration-500">
                            <div className="flex justify-between items-start mb-8">
                              <div>
                                <span className="block text-[10px] uppercase font-bold text-neutral-400 mb-1">
                                  Investasi Mulai Dari
                                </span>
                                <div className="flex items-baseline gap-1">
                                  <span className="font-bold text-3xl text-white">
                                    IDR {service.price}
                                  </span>
                                  <span className="text-xs text-neutral-400">{service.priceUnit}</span>
                                </div>
                              </div>
                              <div className="w-12 h-12 bg-lux-teal rounded-full flex items-center justify-center text-lux-black">
                                <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                              </div>
                            </div>

                            <button className="w-full py-4 rounded-xl bg-white text-lux-black text-xs font-bold uppercase tracking-widest hover:bg-lux-teal hover:text-white transition-all duration-300 flex items-center justify-center gap-3 group/btn">
                              Konsultasi Layanan
                              <svg className="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                              </svg>
                            </button>
                          </div>
                        </div>
                      </motion.div>
                    )}
                  </AnimatePresence>
                </div>
              </motion.div>
            );
          })}
        </div>

      </div>
    </section>
  );
};

const Layanan: React.FC = () => {
  return (
    <>
      <Head title="Layanan" />
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        exit={{ opacity: 0 }}
        transition={{ duration: 0.8 }}
        className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white"
      >
        <Navbar />
        <main>
          <ServicesSection />
          <ServiceCTA />
        </main>
        <Contact />
      </motion.div>
    </>
  );
};

export default Layanan;
