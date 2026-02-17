import React, { useState } from 'react';
import { Head } from '@inertiajs/react';
import { motion, Variants } from 'framer-motion';
import { Navbar } from '../components/Navbar';
import { Contact as Footer } from '../components/Contact';

const ContactPage = () => {
    const [form, setForm] = useState({
        name: '',
        email: '',
        message: ''
    });

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
        setForm({ ...form, [e.target.name]: e.target.value });
    };

    const fadeInUp: Variants = {
        hidden: { opacity: 0, y: 40 },
        visible: {
            opacity: 1,
            y: 0,
            transition: {
                duration: 0.8,
                ease: [0.22, 1, 0.36, 1] // Custom ease for "luxury" feel
            }
        }
    };

    const staggerContainer: Variants = {
        hidden: { opacity: 0 },
        visible: {
            opacity: 1,
            transition: {
                staggerChildren: 0.1,
                delayChildren: 0.2
            }
        }
    };

    return (
        <div className="bg-lux-white min-h-screen text-lux-black font-sans selection:bg-lux-teal selection:text-white flex flex-col">
            <Head>
                <title>Hubungi Kami</title>
                <meta name="description" content="Hubungi Kisantra Consult untuk konsultasi bisnis, pajak, dan keuangan. Kantor pusat kami berlokasi di Samarinda, Kalimantan Timur." />
                <meta name="keywords" content="Kontak Kisantra, Alamat Konsultan Samarinda, Telepon Kisantra, Email Kisantra, Lokasi Kantor Kisantra" />
            </Head>
            <Navbar />

            <main className="flex-grow pt-32 pb-20 px-6 md:px-12 w-full max-w-[1600px] mx-auto relative">

                {/* 1. Cinematic Header */}
                <motion.div
                    initial="hidden"
                    animate="visible"
                    variants={staggerContainer}
                    className="mb-24 md:mb-32 relative z-10"
                >
                    <motion.div variants={fadeInUp} className="overflow-hidden">
                        <h5 className="text-lux-teal uppercase tracking-[0.25em] font-bold text-xs md:text-sm mb-6 ml-1">
                            Hubungi Kami
                        </h5>
                    </motion.div>

                    <motion.div variants={fadeInUp}>
                        <h1 className="text-6xl md:text-8xl lg:text-9xl font-serif font-bold text-lux-black leading-[0.9] tracking-tight">
                            Let's Build <br />
                            <span className="italic font-light text-neutral-400">The Future.</span>
                        </h1>
                    </motion.div>

                    <motion.div variants={fadeInUp} className="mt-8 max-w-xl">
                        <p className="text-lg md:text-xl text-neutral-600 leading-relaxed">
                            Kami percaya setiap percakapan hebat berawal dari sapaan sederhana.
                            Diskusikan visi Anda, dan biarkan kami merancang strateginya.
                        </p>
                    </motion.div>
                </motion.div>


                {/* 2. Asymmetric Layout Grid */}
                <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-0 relative">

                    {/* Visual Anchor (Image) - Spans 5 columns */}
                    <motion.div
                        initial={{ opacity: 0, scale: 0.9 }}
                        whileInView={{ opacity: 1, scale: 1 }}
                        viewport={{ once: true }}
                        transition={{ duration: 1, ease: [0.22, 1, 0.36, 1] }}
                        className="lg:col-span-5 h-[500px] lg:h-[700px] relative rounded-t-[40px] lg:rounded-l-[40px] lg:rounded-tr-none overflow-hidden"
                    >
                        <img
                            src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=2070&auto=format&fit=crop"
                            alt="Kisantra Workspace"
                            className="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000 ease-in-out"
                        />
                        {/* Overlay Detail */}
                        <div className="absolute top-8 left-8 bg-white/90 backdrop-blur-md px-6 py-4 rounded-full">
                            <span className="text-xs font-bold uppercase tracking-widest text-lux-black">Samarinda HQ</span>
                        </div>
                    </motion.div>

                    {/* The Form - Overlaps and Spans 7 columns */}
                    <div className="lg:col-span-7 relative z-20 lg:-ml-12 lg:mt-24">
                        <motion.div
                            variants={fadeInUp}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            className="bg-white p-8 md:p-16 shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] rounded-b-[40px] lg:rounded-[40px] border border-neutral-100"
                        >
                            <form className="space-y-12">
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-12">
                                    <div className="group relative">
                                        <input
                                            type="text"
                                            name="name"
                                            value={form.name}
                                            onChange={handleChange}
                                            placeholder=" "
                                            className="peer w-full border-b border-neutral-300 bg-transparent py-3 text-lux-black text-lg focus:border-lux-teal focus:outline-none transition-colors"
                                        />
                                        <label className="absolute left-0 top-3 text-neutral-400 transition-all peer-focus:-top-6 peer-focus:text-xs peer-focus:text-lux-teal peer-[:not(:placeholder-shown)]:-top-6 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-neutral-500 cursor-text">
                                            Nama Lengkap
                                        </label>
                                    </div>

                                    <div className="group relative">
                                        <input
                                            type="email"
                                            name="email"
                                            value={form.email}
                                            onChange={handleChange}
                                            placeholder=" "
                                            className="peer w-full border-b border-neutral-300 bg-transparent py-3 text-lux-black text-lg focus:border-lux-teal focus:outline-none transition-colors"
                                        />
                                        <label className="absolute left-0 top-3 text-neutral-400 transition-all peer-focus:-top-6 peer-focus:text-xs peer-focus:text-lux-teal peer-[:not(:placeholder-shown)]:-top-6 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-neutral-500 cursor-text">
                                            Alamat Email
                                        </label>
                                    </div>
                                </div>

                                <div className="group relative">
                                    <textarea
                                        name="message"
                                        value={form.message}
                                        onChange={handleChange}
                                        rows={3}
                                        placeholder=" "
                                        className="peer w-full border-b border-neutral-300 bg-transparent py-3 text-lux-black text-lg focus:border-lux-teal focus:outline-none transition-colors resize-none"
                                    ></textarea>
                                    <label className="absolute left-0 top-3 text-neutral-400 transition-all peer-focus:-top-6 peer-focus:text-xs peer-focus:text-lux-teal peer-[:not(:placeholder-shown)]:-top-6 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:text-neutral-500 cursor-text">
                                        Ceritakan project Anda...
                                    </label>
                                </div>

                                <div className="flex items-center justify-between pt-8">
                                    <div className="hidden md:block">
                                        <p className="text-xs text-neutral-400 max-w-[200px] leading-relaxed">
                                            Dengan mengirim formulir ini, Anda menyetujui kebijakan privasi kami.
                                        </p>
                                    </div>
                                    <button
                                        type="button"
                                        className="group relative px-10 py-5 bg-lux-black text-white rounded-full overflow-hidden hover:shadow-2xl transition-all duration-300"
                                    >
                                        <div className="absolute inset-0 bg-lux-teal transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out"></div>
                                        <span className="relative z-10 font-bold uppercase tracking-[0.2em] text-sm group-hover:text-white transition-colors">
                                            Kirim Pesan
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </motion.div>

                        {/* Minimalist Info Grid */}
                        <motion.div
                            variants={fadeInUp}
                            initial="hidden"
                            whileInView="visible"
                            viewport={{ once: true }}
                            className="mt-20 border-t border-neutral-100 pt-12 px-4 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-12"
                        >
                            {/* Phone */}
                            <a href="https://wa.me/6281180009787" className="group block">
                                <div className="flex items-center gap-3 mb-3">
                                    <svg className="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    <span className="text-xs font-bold uppercase tracking-widest text-neutral-400 group-hover:text-lux-teal transition-colors">Telepon</span>
                                </div>
                                <p className="text-xl font-serif text-lux-black group-hover:translate-x-2 transition-transform duration-300">
                                    +62 811 8000 9787
                                </p>
                            </a>

                            {/* Email */}
                            <a href="mailto:kisantra.official@gmail.com" className="group block">
                                <div className="flex items-center gap-3 mb-3">
                                    <svg className="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <span className="text-xs font-bold uppercase tracking-widest text-neutral-400 group-hover:text-lux-teal transition-colors">Email</span>
                                </div>
                                <p className="text-xl font-serif text-lux-black group-hover:translate-x-2 transition-transform duration-300">
                                    kisantra.official<br />@gmail.com
                                </p>
                            </a>

                            {/* Socials */}
                            <div className="group block">
                                <div className="flex items-center gap-3 mb-3">
                                    <svg className="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                    <span className="text-xs font-bold uppercase tracking-widest text-neutral-400 group-hover:text-lux-teal transition-colors">Sosial Media</span>
                                </div>
                                <div className="flex gap-6 pt-1">
                                    <a href="#" className="font-serif text-lg text-lux-black hover:text-lux-teal transition-colors hover:-translate-y-1 transform duration-300 inline-block">Instagram</a>
                                    <a href="#" className="font-serif text-lg text-lux-black hover:text-lux-teal transition-colors hover:-translate-y-1 transform duration-300 inline-block">LinkedIn</a>
                                </div>
                            </div>
                        </motion.div>
                    </div>

                </div>
            </main>

            <Footer />
        </div>
    );
};

export default ContactPage;
