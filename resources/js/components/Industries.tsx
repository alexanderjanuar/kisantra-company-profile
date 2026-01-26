import React from 'react';
import { motion } from 'framer-motion';

const industries = [
  {
    title: "Ekspedisi",
    subtitle: "Logistik & Rantai Pasok",
    desc: "Optimasi rute dan efisiensi biaya operasional armada dengan teknologi pelacakan real-time.",
    id: "01",
    image: "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1000&auto=format&fit=crop", 
    color: "bg-neutral-900" // Back to dark neutral
  },
  {
    title: "Klinik",
    subtitle: "Manajemen Kesehatan",
    desc: "Kepatuhan regulasi medis dan strukturisasi profitabilitas melalui sistem manajemen pasien terintegrasi.",
    id: "02",
    image: "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=1000&auto=format&fit=crop", 
    color: "bg-neutral-800" // Back to dark neutral
  },
  {
    title: "Konstruksi",
    subtitle: "Infrastruktur & Pengembangan",
    desc: "Manajemen risiko proyek dan perencanaan pajak jangka panjang untuk proyek skala besar.",
    id: "03",
    image: "https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=1000&auto=format&fit=crop",
    color: "bg-neutral-900" // Back to dark neutral
  },
  {
    title: "Perkapalan",
    subtitle: "Maritim & Kelautan",
    desc: "Navigasi hukum maritim dan strategi aset bernilai tinggi, memberikan solusi komprehensif.",
    id: "04",
    image: "https://images.unsplash.com/photo-1578575437130-527eed3abbec?q=80&w=1000&auto=format&fit=crop",
    color: "bg-neutral-800" // Back to dark neutral
  }
];

export const Industries: React.FC = () => {
  return (
    <section className="bg-lux-black text-lux-white relative">
        {/* Intro Header Section - Static at top */}
        <div className="py-24 px-6 md:px-12 max-w-7xl mx-auto">
             <h2 className="text-xs font-bold uppercase tracking-widest text-lux-teal mb-6">
                Sektor Fokus
            </h2>
            <p className="font-bold text-3xl md:text-5xl lg:text-6xl text-white leading-tight tracking-tight max-w-4xl">
                Keahlian mendalam di industri yang <span className="text-lux-teal">menggerakkan ekonomi.</span>
            </p>
        </div>

        <div className="w-full">
            {industries.map((project, i) => (
                <div 
                    key={i} 
                    className="sticky top-0 h-screen w-full flex items-center justify-center overflow-hidden"
                    style={{ zIndex: i + 1 }}
                >
                    <motion.div 
                        initial={{ y: 100 }}
                        whileInView={{ y: 0 }}
                        transition={{ duration: 0.8, ease: "easeOut" }}
                        className={`relative w-full h-full flex flex-col md:flex-row ${project.color}`}
                    >
                         {/* Text Content */}
                         <div className="w-full md:w-1/2 p-8 md:p-16 flex flex-col justify-center z-10 relative">
                            {/* Large Background ID */}
                            <span className="absolute top-8 left-8 text-[12rem] md:text-[20rem] font-bold text-white/[0.03] select-none leading-none -translate-y-1/4 -translate-x-1/4 pointer-events-none">
                                {project.id}
                            </span>

                            <div className="relative">
                                <span className="font-mono text-xs text-lux-teal tracking-widest uppercase mb-6 block border border-neutral-700 w-fit px-3 py-1 rounded-full">
                                    Sektor {project.id}
                                </span>
                                <h3 className="font-bold text-5xl md:text-7xl lg:text-8xl leading-none tracking-tighter text-white mb-8">
                                    {project.title}
                                </h3>
                                
                                <h4 className="text-xl md:text-2xl text-lux-teal font-medium mb-8 border-l-2 border-white pl-6">
                                    {project.subtitle}
                                </h4>
                                
                                <p className="font-light text-neutral-400 text-lg md:text-xl leading-relaxed max-w-md">
                                    {project.desc}
                                </p>
                            </div>
                        </div>

                        {/* Image Side */}
                        <div className="w-full md:w-1/2 h-[40vh] md:h-full relative">
                            <div className="absolute inset-0 bg-neutral-900/40 z-10 mix-blend-multiply" />
                            <img
                                src={project.image}
                                alt={project.title}
                                loading="lazy"
                                className="w-full h-full object-cover"
                            />
                        </div>

                        {/* Stacking Gradient Indicator at bottom of each card (except last) */}
                        {i !== industries.length - 1 && (
                            <div className="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-black/50 to-transparent pointer-events-none z-20 md:hidden" />
                        )}
                    </motion.div>
                </div>
            ))}
        </div>
        
        {/* Buffer to finish scrolling */}
        <div className="h-[10vh] bg-lux-black" />
    </section>
  );
};