import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';

interface ServiceItemProps {
  number: string;
  title: string;
  description: string;
  tags: string[];
  isOpen: boolean;
  onClick: () => void;
}

const ServiceItem: React.FC<ServiceItemProps> = ({ number, title, description, tags, isOpen, onClick }) => {
  return (
    <motion.div 
      onClick={onClick}
      className={`relative border-t border-neutral-200 cursor-pointer group transition-colors duration-500 ${isOpen ? 'bg-lux-black text-white' : 'hover:bg-neutral-50'}`}
    >
      <div className="py-10 px-6 md:px-12 md:py-16 flex flex-col md:flex-row md:items-baseline justify-between gap-6">
        <div className="flex items-baseline gap-6 md:gap-12 md:w-1/2">
          <span className={`font-mono text-sm tracking-widest transition-colors duration-500 ${isOpen ? 'text-lux-teal' : 'text-neutral-400 group-hover:text-lux-teal'}`}>
            ({number})
          </span>
          <h3 className={`font-bold text-3xl md:text-5xl lg:text-6xl tracking-tight transition-colors duration-500 ${isOpen ? 'text-white' : 'text-lux-black'}`}>
            {title}
          </h3>
        </div>
        
        <div className="md:w-1/2 flex justify-end items-center">
            <motion.span
                animate={{ rotate: isOpen ? 45 : 0 }}
                transition={{ duration: 0.5 }}
                className={`text-2xl font-light transition-colors duration-500 ${isOpen ? 'text-lux-teal' : 'text-neutral-400'}`}
            >
                +
            </motion.span>
        </div>
      </div>

      <AnimatePresence>
        {isOpen && (
          <motion.div
            initial={{ height: 0, opacity: 0 }}
            animate={{ height: "auto", opacity: 1 }}
            exit={{ height: 0, opacity: 0 }}
            transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
            className="overflow-hidden"
          >
            <div className="px-6 pb-12 md:px-12 md:pb-16 md:pl-[calc(3rem+40px)] lg:pl-[calc(3rem+50px)]">
              <p className="text-lg md:text-xl font-sans font-light leading-relaxed max-w-2xl text-neutral-400 mb-8">
                {description}
              </p>
              <div className="flex flex-wrap gap-3">
                {tags.map((tag) => (
                  <span key={tag} className="px-4 py-1 border border-neutral-700 rounded-full text-xs font-sans font-medium uppercase tracking-wider text-lux-teal">
                    {tag}
                  </span>
                ))}
              </div>
            </div>
          </motion.div>
        )}
      </AnimatePresence>
    </motion.div>
  );
};

export const Services: React.FC = () => {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const services = [
    {
      title: "Perpajakan",
      description: "Layanan ahli konsultan pajak di Samarinda untuk navigasi regulasi kompleks dengan kepatuhan presisi. Kami membantu perusahaan di Kalimantan Timur meminimalkan risiko dan mengoptimalkan kewajiban pajak.",
      tags: ["Audit Pajak", "Kepatuhan", "Perencanaan", "Samarinda Tax"]
    },
    {
      title: "Keuangan",
      description: "Jasa keuangan Samarinda yang mencakup analisis mendalam untuk kesehatan arus kas perusahaan. Dari penilaian valuasi hingga strategi investasi untuk pertumbuhan berkelanjutan di sektor industri Kaltim.",
      tags: ["Valuasi", "Arus Kas", "Laporan Keuangan", "Forecasting"]
    },
    {
      title: "Digital Marketing",
      description: "Solusi digital marketing Samarinda untuk transformasi kehadiran online menjadi aset pendapatan strategis. Kami merancang strategi pemasaran berbasis data yang menghubungkan brand Anda dengan audiens lokal.",
      tags: ["SEO Samarinda", "Ads Strategy", "Social Media", "Analytics"]
    },
    {
      title: "Sistem Digital",
      description: "Membangun tulang punggung operasional melalui solusi teknologi terintegrasi. Kami merancang arsitektur sistem yang mengotomasi alur kerja bisnis Anda di wilayah Samarinda dan sekitarnya.",
      tags: ["Software Dev", "ERP Solutions", "Automation", "Data Security"]
    }
  ];

  return (
    <section className="py-20 md:py-32 w-full bg-lux-white">
      <div className="px-6 md:px-12 mb-16 md:mb-24">
        <h2 className="text-xs font-sans font-bold uppercase tracking-widest text-lux-teal mb-4">Layanan Kami di Samarinda</h2>
        <div className="h-[1px] w-full bg-neutral-200" />
      </div>

      <div className="w-full">
        {services.map((service, index) => (
          <ServiceItem
            key={index}
            number={`0${index + 1}`}
            title={service.title}
            description={service.description}
            tags={service.tags}
            isOpen={openIndex === index}
            onClick={() => setOpenIndex(openIndex === index ? null : index)}
          />
        ))}
        <div className="border-t border-neutral-200" />
      </div>
    </section>
  );
};