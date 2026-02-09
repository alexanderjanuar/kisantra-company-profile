import React, { useRef, useState } from 'react';
import { Head } from '@inertiajs/react';
import { motion, useScroll, useTransform, useSpring, AnimatePresence } from 'framer-motion';
import { Navbar } from '../components/Navbar';
import { Contact } from '../components/Contact';

interface JobPosting {
    id: number;
    title: string;
    location: string;
    type: string;
    work_type: string;
    department: string;
    description?: string;
    requirements?: string;
}

interface KarirProps {
    jobPostings: JobPosting[];
}

// --- Data ---
const values = [
    {
        title: "Keunggulan",
        desc: "Kami tidak kompromi pada kualitas. Setiap detail diperhitungkan untuk hasil standar global.",
        image: "https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&auto=format&fit=crop"
    },
    {
        title: "Inovasi",
        desc: "Mendorong batas kemungkinan dengan teknologi dan strategi kreatif.",
        image: "https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=800&auto=format&fit=crop"
    },
    {
        title: "Integritas",
        desc: "Kepercayaan adalah mata uang kami. Transparansi dan etika di atas segalanya.",
        image: "https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=800&auto=format&fit=crop"
    }
];

const jobs = [
    {
        id: 1,
        role: "Senior Tax Consultant",
        department: "Taxation",
        type: "Full Time",
        location: "Jakarta / Hybrid"
    },
    {
        id: 2,
        role: "Financial Auditor",
        department: "Audit",
        type: "Full Time",
        location: "Samarinda"
    },
    {
        id: 3,
        role: "Frontend Developer",
        department: "Technology",
        type: "Contract",
        location: "Remote"
    },
    {
        id: 4,
        role: "Marketing Strategist",
        department: "Marketing",
        type: "Full Time",
        location: "Jakarta"
    }
];

const Hero = () => {
    return (
        <section className="relative h-[80vh] min-h-[600px] flex items-center justify-center overflow-hidden bg-lux-white pt-20">
            <div className="absolute inset-0 z-0 overflow-hidden">
                <div className="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]"></div>
                <div className="absolute top-[20%] right-[10%] w-[500px] h-[500px] bg-lux-teal/5 rounded-full blur-[120px] pointer-events-none" />
                <div className="absolute bottom-[10%] left-[10%] w-[400px] h-[400px] bg-lux-black/5 rounded-full blur-[100px] pointer-events-none" />
            </div>

            <div className="container mx-auto px-6 md:px-12 relative z-10 text-center">
                <motion.span
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.6 }}
                    className="inline-block py-1 px-3 border border-lux-teal text-lux-teal text-xs font-bold uppercase tracking-[0.3em] rounded-full mb-6"
                >
                    Karir di Kisantra
                </motion.span>
                <motion.h1
                    initial={{ opacity: 0, y: 30 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.8, delay: 0.2 }}
                    className="text-5xl md:text-7xl lg:text-8xl font-black text-lux-black tracking-tight leading-none mb-8"
                >
                    Bangun Masa Depan <br className="hidden md:block" />
                    <span className="text-transparent bg-clip-text bg-gradient-to-r from-lux-teal to-lux-black">Bersama Kami</span>
                </motion.h1>
                <motion.p
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.8, delay: 0.4 }}
                    className="max-w-2xl mx-auto text-lg md:text-xl text-neutral-500 font-light leading-relaxed"
                >
                    Bergabunglah dengan tim visioner yang mendefinisikan ulang standar industri melalui keahlian, integritas, dan inovasi tanpa henti.
                </motion.p>
            </div>
        </section>
    )
}

const Culture = () => {
    return (
        <section className="py-24 bg-lux-black text-white px-6 md:px-12 rounded-t-[3rem] -mt-12 relative z-20">
            <div className="max-w-[1400px] mx-auto">
                <div className="flex flex-col md:flex-row justify-between items-end mb-20 border-b border-white/10 pb-12">
                    <div>
                        <span className="text-lux-teal text-xs font-bold uppercase tracking-[0.3em] mb-4 block">Budaya Kami</span>
                        <h2 className="text-4xl md:text-6xl font-bold">Lebih Dari <br /> Sekedar Kerja</h2>
                    </div>
                    <p className="mt-8 md:mt-0 max-w-md text-neutral-400 leading-relaxed">
                        Kami membangun lingkungan di mana potensi terbaik Anda dapat berkembang. Kolaborasi, ambisi, dan keseimbangan adalah inti dari siapa kami.
                    </p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {values.map((item, idx) => (
                        <motion.div
                            key={idx}
                            initial={{ opacity: 0, y: 40 }}
                            whileInView={{ opacity: 1, y: 0 }}
                            viewport={{ once: true }}
                            transition={{ delay: idx * 0.2 }}
                            className="group relative h-[400px] rounded-2xl overflow-hidden cursor-default"
                        >
                            <img src={item.image} alt={item.title} className="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0" />
                            <div className="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-90" />
                            <div className="absolute bottom-0 left-0 p-8">
                                <h3 className="text-2xl font-bold mb-3">{item.title}</h3>
                                <p className="text-sm text-neutral-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform translate-y-4 group-hover:translate-y-0">
                                    {item.desc}
                                </p>
                            </div>
                        </motion.div>
                    ))}
                </div>
            </div>
        </section>
    )
}

const Jobs: React.FC<{ jobs: JobPosting[] }> = ({ jobs }) => {
    const [selectedJob, setSelectedJob] = useState<JobPosting | null>(null);

    return (
        <section className="py-32 bg-lux-white px-6 md:px-12 relative">
            <div className="max-w-[1200px] mx-auto">
                <div className="text-center mb-20">
                    <span className="text-lux-teal text-xs font-bold uppercase tracking-[0.3em] mb-4 block">Posisi Terbuka</span>
                    <h2 className="text-4xl md:text-5xl font-bold text-lux-black">Bergabung dengan Tim Kami</h2>
                </div>

                <div className="flex flex-col">
                    {jobs.length > 0 ? (
                        jobs.map((job) => (
                            <motion.div
                                key={job.id}
                                layoutId={`job-card-${job.id}`}
                                onClick={() => setSelectedJob(job)}
                                initial={{ opacity: 0, y: 20 }}
                                whileInView={{ opacity: 1, y: 0 }}
                                viewport={{ once: true }}
                                className="group flex flex-col md:flex-row items-start md:items-center justify-between py-10 border-b border-neutral-200 hover:border-lux-teal transition-colors duration-300 cursor-pointer"
                            >
                                <div className="mb-4 md:mb-0">
                                    <motion.h3 layoutId={`job-title-${job.id}`} className="text-2xl font-bold text-lux-black group-hover:text-lux-teal transition-colors">{job.title}</motion.h3>
                                    <div className="flex items-center gap-4 mt-2 text-sm text-neutral-500 font-mono uppercase tracking-wide">
                                        <span>{job.department}</span>
                                        <span className="w-1 h-1 bg-neutral-300 rounded-full" />
                                        <span>{job.type}</span>
                                        <span className="w-1 h-1 bg-neutral-300 rounded-full" />
                                        <span>{job.work_type}</span>
                                        <span className="w-1 h-1 bg-neutral-300 rounded-full" />
                                        <span>{job.location}</span>
                                    </div>
                                </div>

                                <div className="flex items-center gap-4 opacity-0 group-hover:opacity-100 -translate-x-4 group-hover:translate-x-0 transition-all duration-300">
                                    <span className="text-xs font-bold uppercase tracking-widest text-lux-black">Lihat Detail</span>
                                    <div className="w-10 h-10 rounded-full border border-lux-black flex items-center justify-center group-hover:bg-lux-black group-hover:text-white transition-colors">
                                        <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </div>
                                </div>
                            </motion.div>
                        ))
                    ) : (
                        <div className="text-center py-12 text-neutral-400">
                            <p>Saat ini belum ada posisi yang tersedia.</p>
                        </div>
                    )}
                </div>

                <div className="mt-20 text-center">
                    <p className="text-neutral-500 mb-6">Tidak menemukan posisi yang cocok?</p>
                    <a href="mailto:hr.kisantra@gmail.com" className="inline-block border-b-2 border-lux-black pb-1 text-lux-black font-bold uppercase tracking-widest hover:text-lux-teal hover:border-lux-teal transition-colors">
                        Email CV Anda
                    </a>
                </div>
            </div>

            {/* Job Detail Modal */}
            <AnimatePresence>
                {selectedJob && (
                    <div className="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8">
                        <motion.div
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            exit={{ opacity: 0 }}
                            onClick={() => setSelectedJob(null)}
                            className="absolute inset-0 bg-lux-black/60 backdrop-blur-sm"
                        />
                        <motion.div
                            layoutId={`job-card-${selectedJob.id}`}
                            className="w-full max-w-3xl bg-white rounded-3xl overflow-hidden relative z-10 shadow-2xl max-h-[90vh] flex flex-col"
                        >
                            <button
                                onClick={() => setSelectedJob(null)}
                                className="absolute top-6 right-6 p-2 rounded-full bg-neutral-100 hover:bg-neutral-200 transition-colors z-20"
                            >
                                <svg className="w-5 h-5 text-neutral-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <div className="p-8 md:p-12 overflow-y-auto custom-scrollbar">
                                <span className="inline-block py-1 px-3 bg-lux-teal/10 text-lux-teal text-[10px] font-bold uppercase tracking-widest rounded-full mb-6">
                                    {selectedJob.department}
                                </span>
                                <motion.h3 layoutId={`job-title-${selectedJob.id}`} className="text-3xl md:text-4xl font-bold text-lux-black mb-4">
                                    {selectedJob.title}
                                </motion.h3>

                                <div className="flex flex-wrap gap-4 text-sm text-neutral-500 font-mono uppercase tracking-wide mb-10 border-b border-neutral-100 pb-8">
                                    <div className="flex items-center gap-2">
                                        <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                        {selectedJob.type}
                                    </div>
                                    <div className="flex items-center gap-2">
                                        <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                        {selectedJob.work_type}
                                    </div>
                                    <div className="flex items-center gap-2">
                                        <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        {selectedJob.location}
                                    </div>
                                </div>

                                <div className="space-y-8 text-neutral-600 leading-relaxed">
                                    <div>
                                        <h4 className="font-bold text-lux-black text-lg mb-3">Deskripsi Pekerjaan</h4>
                                        <div
                                            className="text-sm text-neutral-600 [&_p]:mb-4 [&_ul]:list-disc [&_ul]:pl-5 [&_ul]:mb-4 [&_ol]:list-decimal [&_ol]:pl-5 [&_ol]:mb-4 [&_li]:mb-1 [&_strong]:font-bold [&_b]:font-bold"
                                            dangerouslySetInnerHTML={{ __html: selectedJob.description || "Deskripsi tidak tersedia." }}
                                        />
                                    </div>
                                    <div>
                                        <h4 className="font-bold text-lux-black text-lg mb-3">Kualifikasi</h4>
                                        <div
                                            className="text-sm text-neutral-600 [&_p]:mb-4 [&_ul]:list-disc [&_ul]:pl-5 [&_ul]:mb-4 [&_ol]:list-decimal [&_ol]:pl-5 [&_ol]:mb-4 [&_li]:mb-1 [&_strong]:font-bold [&_b]:font-bold"
                                            dangerouslySetInnerHTML={{ __html: selectedJob.requirements || "Kualifikasi tidak tersedia." }}
                                        />
                                    </div>
                                </div>
                            </div>

                            <div className="p-8 border-t border-neutral-100 bg-neutral-50 flex justify-end gap-4">
                                <button
                                    onClick={() => setSelectedJob(null)}
                                    className="px-6 py-3 rounded-xl text-neutral-500 font-bold text-xs uppercase tracking-widest hover:text-lux-black transition-colors"
                                >
                                    Tutup
                                </button>
                                <a
                                    href={`mailto:hr.kisantra@gmail.com?subject=Lamaran Kerja - ${selectedJob.title}&body=Kepada Yth.%0D%0ATim HR PT Kisantra Indonesia%0D%0A%0D%0ADengan hormat,%0D%0A%0D%0ASaya tertarik untuk melamar posisi ${selectedJob.title} di perusahaan Bapak/Ibu.%0D%0A%0D%0ATerlampir CV/Resume saya untuk bahan pertimbangan.%0D%0A%0D%0ATerima kasih atas perhatian dan kesempatan yang diberikan.%0D%0A%0D%0AHormat saya,`}
                                    className="px-8 py-3 rounded-xl bg-lux-black text-white font-bold text-xs uppercase tracking-widest hover:bg-lux-teal transition-colors shadow-lg shadow-lux-black/20"
                                >
                                    Lamar Posisi Ini
                                </a>
                            </div>
                        </motion.div>
                    </div>
                )}
            </AnimatePresence>
        </section>
    )
}

const Karir: React.FC<KarirProps> = ({ jobPostings }) => {
    return (
        <>
            <Head title="Karir" />
            <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={{ duration: 0.8 }}
                className="bg-lux-white min-h-screen text-lux-black selection:bg-lux-teal selection:text-white"
            >
                <Navbar />
                <main>
                    <Hero />
                    {/* <Culture /> */}
                    <Jobs jobs={jobPostings} />
                </main>
                <Contact />
            </motion.div>
        </>
    );
};

export default Karir;
