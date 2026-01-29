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
  const [selectedId, setSelectedId] = useState<string | null>(null);

  const { scrollYProgress } = useScroll({
    target: containerRef,
    offset: ["start end", "end start"]
  });

  // --- Parallax Background Animations ---
  const textX1 = useTransform(scrollYProgress, [0, 1], ["-10%", "-30%"]);
  const textX2 = useTransform(scrollYProgress, [0, 1], ["0%", "20%"]);

  const selectedService = services.find(s => s.id === selectedId);

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

        {/* --- 3. Services Grid --- */}
        <div className="px-6 md:px-12 max-w-[1400px] mx-auto">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {services.map((service, idx) => (
              <motion.div
                layoutId={`card-${service.id}`}
                key={service.id}
                onClick={() => setSelectedId(service.id)}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: idx * 0.1 }}
                className="relative h-[480px] rounded-[2rem] overflow-hidden cursor-pointer group shadow-xl shadow-lux-black/5"
              >
                {/* Background Image */}
                <motion.img
                  layoutId={`image-${service.id}`}
                  src={service.image}
                  alt={service.title}
                  className="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-lux-black/90 via-lux-black/40 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-500" />

                {/* Card Content */}
                <div className="absolute inset-0 p-8 flex flex-col justify-end">
                  <motion.span layoutId={`subtitle-${service.id}`} className="text-lux-teal text-xs font-bold uppercase tracking-widest mb-2 inline-block">
                    {service.subtitle}
                  </motion.span>
                  <motion.h3 layoutId={`title-${service.id}`} className="text-3xl font-bold text-white mb-2 leading-none">
                    {service.title}
                  </motion.h3>
                  <motion.div
                    initial={{ opacity: 0.6 }}
                    whileHover={{ opacity: 1 }}
                    className="h-1 w-12 bg-white/20 rounded-full mt-6 group-hover:w-full group-hover:bg-lux-teal transition-all duration-500"
                  />
                </div>
              </motion.div>
            ))}
          </div>
        </div>

        {/* --- 4. Detailed Modal Overlay --- */}
        <AnimatePresence>
          {selectedId && selectedService && (
            <div className="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8">
              <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                onClick={() => setSelectedId(null)}
                className="absolute inset-0 bg-lux-black/80 backdrop-blur-md"
              />
              <motion.div
                layoutId={`card-${selectedService.id}`}
                className="w-full max-w-5xl bg-neutral-900 border border-white/10 rounded-[2.5rem] overflow-hidden relative z-10 flex flex-col md:flex-row h-[85vh] md:h-[600px] shadow-2xl"
              >
                <button
                  onClick={(e) => { e.stopPropagation(); setSelectedId(null); }}
                  className="absolute top-6 right-6 z-50 w-12 h-12 bg-black/40 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-lux-teal transition-colors border border-white/10"
                >
                  <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>

                {/* Image Side */}
                <div className="w-full md:w-5/12 h-64 md:h-full relative shrink-0">
                  <motion.img
                    layoutId={`image-${selectedService.id}`}
                    src={selectedService.image}
                    className="absolute inset-0 w-full h-full object-cover"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-neutral-900 via-transparent to-transparent opacity-80" />

                  <div className="absolute bottom-8 left-8 right-8 md:hidden">
                    <motion.span layoutId={`subtitle-${selectedService.id}`} className="text-lux-teal text-xs font-bold uppercase tracking-widest mb-2 block">
                      {selectedService.subtitle}
                    </motion.span>
                    <motion.h3 layoutId={`title-${selectedService.id}`} className="text-3xl font-bold text-white leading-none">
                      {selectedService.title}
                    </motion.h3>
                  </div>
                </div>

                {/* Content Side */}
                <div className="flex-1 p-8 md:p-12 overflow-y-auto bg-neutral-900 custom-scrollbar">
                  <div className="hidden md:block">
                    <motion.span layoutId={`subtitle-${selectedService.id}`} className="text-lux-teal text-xs font-bold uppercase tracking-widest mb-3 block">
                      {selectedService.subtitle}
                    </motion.span>
                    <motion.h3 layoutId={`title-${selectedService.id}`} className="text-4xl lg:text-5xl font-bold text-white mb-6">
                      {selectedService.title}
                    </motion.h3>
                  </div>

                  <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ delay: 0.1, duration: 0.5 }}
                  >
                    <p className="text-neutral-400 text-lg leading-relaxed mb-10 border-l-2 border-lux-teal pl-6">
                      {selectedService.desc}
                    </p>
                  </motion.div>

                  <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ delay: 0.2, duration: 0.5 }}
                  >
                    <h4 className="flex items-center gap-3 text-xs font-bold uppercase tracking-widest text-white/50 mb-6">
                      <span className="w-8 h-[1px] bg-white/20"></span>
                      What You Get
                    </h4>
                    <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                      {selectedService.features.map((f, i) => (
                        <motion.div
                          key={f}
                          initial={{ opacity: 0, x: -10 }}
                          animate={{ opacity: 1, x: 0 }}
                          transition={{ delay: 0.3 + (i * 0.05) }}
                          className="flex items-start gap-3 text-neutral-300"
                        >
                          <svg className="w-5 h-5 text-lux-teal shrink-0 mt-[2px]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                          </svg>
                          <span className="text-sm font-medium">{f}</span>
                        </motion.div>
                      ))}
                    </div>
                  </motion.div>

                  <motion.div
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    transition={{ delay: 0.4 }}
                    className="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 pt-8 border-t border-white/10 bg-neutral-900/50 -mx-4 px-4 sm:mx-0 sm:px-0 sm:bg-transparent"
                  >
                    <div>
                      <span className="block text-[10px] uppercase font-bold text-neutral-500 mb-1">Estimated Investment</span>
                      <div className="text-3xl font-bold text-white tracking-tight">
                        <span className="text-lg text-neutral-400 mr-1">IDR</span>
                        {selectedService.price}
                        <span className="text-sm font-normal text-neutral-500 ml-1">{selectedService.priceUnit}</span>
                      </div>
                    </div>

                    <a
                      href={`https://wa.me/6281180009787?text=Halo%20Kisantra%2C%20saya%20tertarik%20dengan%20layanan%20${encodeURIComponent(selectedService.title)}`}
                      target="_blank"
                      rel="noreferrer"
                      className="w-full sm:w-auto bg-lux-white text-lux-black px-8 py-4 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-lux-teal hover:text-white transition-all duration-300 shadow-lg shadow-white/5 text-center"
                    >
                      Book Consultation
                    </a>
                  </motion.div>
                </div>
              </motion.div>
            </div>
          )}
        </AnimatePresence>

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
