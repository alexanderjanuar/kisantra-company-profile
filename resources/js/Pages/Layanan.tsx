import React, { useRef, useState } from 'react';
import { motion, useScroll, useTransform, AnimatePresence } from 'framer-motion';
import { Head } from '@inertiajs/react';
import { Navbar } from '../components/Navbar';
import { Contact } from '../components/Contact';

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
    desc: "Solusi kepatuhan pajak menyeluruh untuk meminimalisir risiko sengketa dan denda.",
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
    desc: "Transformasi data transaksi menjadi laporan keuangan standar PSAK yang akurat.",
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
    desc: "Strategi pemasaran berbasis data untuk meningkatkan omset dan brand awareness.",
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
    desc: "Membangun infrastruktur teknologi untuk efisiensi operasional tanpa batas.",
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

const ServicesSection: React.FC = () => {
  const containerRef = useRef<HTMLElement>(null);
  const [activeService, setActiveService] = useState(services[0]);

  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start end", "end start"]
  });

  // --- Parallax Background Animations ---
  const textX1 = useTransform(scrollYProgress, [0, 1], ["-10%", "-30%"]);
  const textX2 = useTransform(scrollYProgress, [0, 1], ["0%", "20%"]);
  const shapeRotate = useTransform(scrollYProgress, [0, 1], [0, 90]);
  const shapeY = useTransform(scrollYProgress, [0, 1], [0, 200]);
  const shapeScale = useTransform(scrollYProgress, [0, 0.5, 1], [0.8, 1, 0.8]);

  return (
    <section ref={containerRef} id="services" className="relative w-full bg-lux-white pt-32 pb-32 px-6 md:px-12 overflow-hidden">
      
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
        <motion.div 
            style={{ rotate: shapeRotate, y: shapeY }}
            className="absolute top-1/4 -right-20 w-[600px] h-[600px] border-[1px] border-dashed border-lux-black opacity-[0.03] rounded-full flex items-center justify-center"
        >
             <div className="w-[400px] h-[400px] border-[1px] border-lux-black rounded-full" />
        </motion.div>
        <motion.div 
            style={{ y: useTransform(scrollYProgress, [0, 1], [100, -100]), scale: shapeScale }}
            className="absolute bottom-1/4 -left-20 w-[500px] h-[500px] bg-gradient-to-tr from-lux-teal/5 to-transparent rounded-full blur-[80px]"
        />
      </div>

      <div className="max-w-[1400px] mx-auto relative z-10">
        
        {/* --- 1. Introductory Header --- */}
        <div className="text-center max-w-3xl mx-auto mb-20">
          <motion.div 
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="flex flex-col items-center"
          >
            <span className="text-xs font-bold uppercase tracking-[0.3em] text-lux-teal mb-4 block">
              Layanan & Proses
            </span>
            <h2 className="font-bold text-4xl md:text-5xl lg:text-6xl text-lux-black mb-8 tracking-tight">
              Our Services
            </h2>
            <p className="text-neutral-500 text-lg leading-relaxed font-light">
              Kami menyederhanakan kompleksitas bisnis Anda melalui pendekatan terstruktur. Dari kepatuhan pajak hingga akselerasi digital.
            </p>
          </motion.div>
        </div>

        {/* --- 2. Workflow Process --- */}
        <div className="mb-32">
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

        {/* --- 3. Interactive Split-Pane Services --- */}
        <div className="flex flex-col lg:flex-row gap-12 lg:gap-24 relative min-h-[800px] lg:min-h-[700px]">
          
          {/* Left Panel: Navigation List (Sticky on Desktop) */}
          <div className="w-full lg:w-1/3 z-20">
             <div className="lg:sticky lg:top-32">
                <h3 className="text-xs font-bold uppercase tracking-widest text-neutral-400 mb-8 hidden lg:block">
                    Pilih Layanan
                </h3>
                
                {/* Scrollable Container for Mobile, Vertical Stack for Desktop */}
                <div className="flex lg:flex-col gap-4 overflow-x-auto lg:overflow-visible pb-6 lg:pb-0 no-scrollbar snap-x snap-mandatory">
                  {services.map((service) => {
                    const isActive = activeService.id === service.id;
                    return (
                      <button
                        key={service.id}
                        onClick={() => setActiveService(service)}
                        className={`group relative flex-shrink-0 snap-center text-left pl-6 pr-8 py-5 transition-all duration-300 rounded-xl lg:rounded-l-none lg:rounded-r-xl border-l-4 lg:border-l-4 border-transparent hover:bg-neutral-50 ${isActive ? 'bg-white shadow-lg lg:shadow-none lg:bg-transparent' : 'opacity-60 hover:opacity-100'}`}
                      >
                         {/* Active Indicator Line (Desktop) */}
                         <div className={`absolute left-0 top-0 bottom-0 w-1 bg-lux-teal transition-all duration-300 ${isActive ? 'opacity-100 h-full' : 'opacity-0 h-0 group-hover:opacity-30 group-hover:h-1/2 top-1/4'}`} />

                         <span className={`text-xs font-bold uppercase tracking-widest block mb-2 transition-colors ${isActive ? 'text-lux-teal' : 'text-neutral-400'}`}>
                            {service.id}
                         </span>
                         <span className={`text-2xl lg:text-3xl font-bold block transition-colors tracking-tight ${isActive ? 'text-lux-black' : 'text-neutral-300 group-hover:text-lux-black'}`}>
                            {service.title}
                         </span>
                         
                         {/* Mobile Active Indicator Dot */}
                         {isActive && <div className="lg:hidden absolute bottom-2 left-1/2 -translate-x-1/2 w-1 h-1 rounded-full bg-lux-teal" />}
                      </button>
                    );
                  })}
                </div>
             </div>
          </div>

          {/* Right Panel: Content Display */}
          <div className="w-full lg:w-2/3 relative">
            <AnimatePresence mode="wait">
               <motion.div
                  key={activeService.id}
                  initial={{ opacity: 0, x: 20 }}
                  animate={{ opacity: 1, x: 0 }}
                  exit={{ opacity: 0, x: -20 }}
                  transition={{ duration: 0.5, ease: [0.22, 1, 0.36, 1] }}
                  className="w-full"
               >
                   {/* Visual Column Reuse */}
                   <div className="relative group">
                        
                        {/* Decorative Offset Border */}
                        <div className="absolute top-6 -right-6 w-full h-full border-[1.5px] border-lux-teal/20 rounded-[2.5rem] -z-10" />
                        
                        {/* Main Image Container */}
                        <div className="relative rounded-[2.5rem] overflow-hidden aspect-[16/9] lg:aspect-[2/1] shadow-2xl shadow-neutral-200 bg-neutral-100 mb-10">
                             <img 
                                src={activeService.image} 
                                alt={activeService.title} 
                                className="w-full h-full object-cover"
                             />
                             <div className="absolute inset-0 bg-gradient-to-t from-lux-black/60 via-transparent to-transparent opacity-80" />
                             
                             {/* Floating Glass Pricing Card */}
                             <div className="absolute bottom-6 left-6 right-6 lg:left-auto lg:right-6 lg:w-80 p-5 bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl flex items-center justify-between shadow-lg">
                                 <div>
                                    <span className="text-[10px] text-white/80 uppercase tracking-widest font-bold mb-1 block">Starting From</span>
                                    <span className="text-white font-bold text-xl md:text-2xl">IDR {activeService.price}</span>
                                 </div>
                             </div>
                        </div>
                   </div>

                   {/* Text Content */}
                   <div className="pl-2">
                        {/* Header */}
                        <div className="mb-8">
                            <span className="inline-block py-1.5 px-4 border border-lux-teal/30 rounded-full text-lux-teal text-xs font-bold uppercase tracking-widest mb-6">
                                {activeService.subtitle}
                            </span>
                            <h3 className="font-bold text-4xl md:text-5xl text-lux-black mb-6 leading-tight tracking-tight">
                                {activeService.title}
                            </h3>
                            <p className="text-lg text-neutral-500 font-light leading-relaxed max-w-2xl">
                                {activeService.desc}
                            </p>
                        </div>

                        {/* Features Grid */}
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                            {activeService.features.map((feature, fIdx) => (
                                <motion.div 
                                    key={fIdx} 
                                    initial={{ opacity: 0, y: 10 }}
                                    animate={{ opacity: 1, y: 0 }}
                                    transition={{ delay: 0.1 + (fIdx * 0.05) }}
                                    className="flex items-start gap-3 p-3 rounded-xl hover:bg-neutral-50 transition-colors duration-300 border border-transparent hover:border-neutral-100"
                                >
                                    <div className="mt-0.5 w-5 h-5 rounded-full bg-lux-teal/10 flex items-center justify-center flex-shrink-0 text-lux-teal">
                                        <svg className="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span className="text-sm text-neutral-700 font-medium leading-snug">{feature}</span>
                                </motion.div>
                            ))}
                        </div>

                        {/* CTA Button */}
                        <motion.a
                            href={`https://wa.me/6281180009787?text=${encodeURIComponent(`Halo Kisantra, saya tertarik dengan layanan ${activeService.title} dan ingin berkonsultasi lebih lanjut.`)}`}
                            target="_blank"
                            rel="noopener noreferrer"
                            whileHover={{ x: 10 }}
                            className="group inline-flex items-center gap-4 text-lux-black font-bold uppercase tracking-widest text-sm"
                        >
                            <span className="border-b-2 border-lux-black pb-1 group-hover:border-lux-teal group-hover:text-lux-teal transition-colors duration-300">
                                Konsultasi Layanan Ini
                            </span>
                            <svg className="w-5 h-5 group-hover:text-lux-teal transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </motion.a>
                   </div>
               </motion.div>
            </AnimatePresence>
          </div>

        </div>

        {/* Disclaimer */}
        <div className="mt-32 text-center border-t border-neutral-100 pt-12">
             <p className="text-xs text-neutral-400 italic">
                *Harga tercantum adalah estimasi awal (starting price) dan dapat disesuaikan dengan kompleksitas serta skala operasional bisnis Anda.
            </p>
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
        </main>
        <Contact />
      </motion.div>
    </>
  );
};

export default Layanan;
