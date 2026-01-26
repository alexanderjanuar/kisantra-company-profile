import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';

interface FAQItem {
  question: string;
  answer: string;
}

const faqs: FAQItem[] = [
  {
    question: "Apa keunggulan Kisantra dibanding konsultan lain di Samarinda?",
    answer: "Kami tidak hanya memberikan laporan angka, tetapi arsitektur solusi yang terintegrasi antara kepatuhan pajak, efisiensi finansial, dan skalabilitas sistem digital. Tim kami memahami lanskap bisnis lokal Kalimantan Timur dengan standar operasional global."
  },
  {
    question: "Bagaimana proses penanganan audit pajak dilakukan?",
    answer: "Proses kami dimulai dengan pre-audit internal untuk mengidentifikasi celah risiko, dilanjutkan dengan pendampingan penuh selama proses pemeriksaan oleh otoritas pajak, hingga penyelesaian sengketa jika diperlukan, memastikan hak-hak wajib pajak terlindungi sepenuhnya."
  },
  {
    question: "Apakah Sistem Digital yang ditawarkan dapat dikustomisasi?",
    answer: "Tentu. Kami tidak percaya pada solusi 'one-size-fits-all'. Setiap arsitektur sistem yang kami bangun disesuaikan dengan alur kerja (workflow) spesifik perusahaan Anda, mulai dari manajemen inventaris hingga integrasi laporan keuangan otomatis."
  },
  {
    question: "Berapa lama durasi konsultasi strategis awal?",
    answer: "Sesi konsultasi diagnostik awal biasanya berlangsung selama 60-90 menit. Dalam sesi ini, kami akan membedah tantangan utama bisnis Anda dan memberikan gambaran kasar mengenai roadmap solusi yang bisa diimplementasikan segera."
  },
  {
    question: "Bagaimana mekanisme kerahasiaan data klien dijamin?",
    answer: "Integritas adalah nilai inti kami. Seluruh data klien dikelola dalam infrastruktur yang aman dan dilindungi oleh Non-Disclosure Agreement (NDA) yang ketat. Kami menggunakan standar enkripsi kelas industri untuk memastikan informasi finansial Anda tetap privat."
  }
];

export const FAQ: React.FC = () => {
  const [activeIndex, setActiveIndex] = useState<number | null>(null);

  return (
    <section className="py-24 md:py-32 px-6 md:px-12 bg-lux-white w-full border-t border-neutral-200">
      <div className="max-w-4xl mx-auto">
        <div className="text-center mb-20">
          <motion.span 
            initial={{ opacity: 0, y: 10 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="text-xs font-bold uppercase tracking-[0.3em] text-lux-teal mb-4 block"
          >
            Pertanyaan Umum
          </motion.span>
          <motion.h2 
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ delay: 0.1 }}
            className="font-bold text-4xl md:text-6xl tracking-tighter text-lux-black"
          >
            Mencari <span className="text-lux-teal">Jawaban?</span>
          </motion.h2>
        </div>

        <div className="space-y-4">
          {faqs.map((faq, index) => {
            const isOpen = activeIndex === index;
            return (
              <motion.div 
                key={index}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: index * 0.05 }}
                className={`border-b border-neutral-200 transition-colors duration-500 ${isOpen ? 'bg-neutral-50/50' : ''}`}
              >
                <button
                  onClick={() => setActiveIndex(isOpen ? null : index)}
                  className="w-full py-8 flex justify-between items-center text-left group focus:outline-none"
                >
                  <span className={`text-xl md:text-2xl font-bold tracking-tight transition-colors duration-300 ${isOpen ? 'text-lux-teal' : 'text-lux-black group-hover:text-lux-teal'}`}>
                    {faq.question}
                  </span>
                  <div className="relative flex items-center justify-center w-8 h-8">
                    <motion.div 
                      animate={{ rotate: isOpen ? 90 : 0 }}
                      className="absolute w-4 h-[2px] bg-neutral-300"
                    />
                    <motion.div 
                      animate={{ rotate: isOpen ? 0 : 90 }}
                      className="absolute w-4 h-[2px] bg-neutral-300"
                    />
                  </div>
                </button>
                
                <AnimatePresence>
                  {isOpen && (
                    <motion.div
                      initial={{ height: 0, opacity: 0 }}
                      animate={{ height: "auto", opacity: 1 }}
                      exit={{ height: 0, opacity: 0 }}
                      transition={{ duration: 0.3, ease: [0.16, 1, 0.3, 1] }}
                      className="overflow-hidden"
                    >
                      <div className="pb-8 pr-12">
                        <p className="text-neutral-500 font-light text-lg leading-relaxed">
                          {faq.answer}
                        </p>
                      </div>
                    </motion.div>
                  )}
                </AnimatePresence>
              </motion.div>
            );
          })}
        </div>

        <motion.div 
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          viewport={{ once: true }}
          transition={{ delay: 0.6 }}
          className="mt-20 p-8 border border-neutral-100 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-6 bg-neutral-50/30"
        >
          <div className="text-center md:text-left">
            <h4 className="font-bold text-xl text-lux-black mb-1">Masih butuh bantuan?</h4>
            <p className="text-sm text-neutral-500">Tim ahli kami siap menjawab pertanyaan mendalam Anda.</p>
          </div>
          <motion.a
            href="https://wa.me/6281180009787?text=Halo%20Kisantra%2C%20saya%20memiliki%20pertanyaan%20yang%20ingin%20saya%20diskusikan%20dengan%20tim%20konsultan%20Anda."
            target="_blank"
            rel="noopener noreferrer"
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            className="px-8 py-3 bg-lux-black text-white rounded-full font-bold text-xs uppercase tracking-widest hover:bg-lux-teal transition-colors"
          >
            Hubungi Konsultan
          </motion.a>
        </motion.div>
      </div>
    </section>
  );
};