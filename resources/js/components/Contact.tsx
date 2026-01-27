import React from 'react';
import { Link } from '@inertiajs/react';

export const Contact: React.FC = () => {
  return (
    <footer className="bg-lux-black text-lux-white relative overflow-hidden">
      
      {/* Address & Info Section */}
      <div className="px-6 md:px-12 py-16 md:py-24 max-w-7xl mx-auto border-t border-neutral-800">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12">

            {/* Brand Column */}
            <div className="col-span-1 lg:col-span-2">
                <h3 className="font-sans font-bold text-2xl tracking-tight mb-4 text-white">KISANTRA CONSULT</h3>
                <p className="text-neutral-400 text-sm leading-relaxed max-w-sm">
                    Mitra strategis terpercaya Anda sebagai <span className="text-lux-teal">konsultan pajak di Samarinda</span>. Integrasi keuangan dan solusi digital untuk pertumbuhan bisnis yang kokoh di Kalimantan Timur.
                </p>
            </div>

            {/* Address */}
            <div>
                 <span className="text-xs uppercase tracking-widest text-lux-teal font-sans font-bold block mb-6">Kantor & Wilayah</span>
                 <p className="text-neutral-300 font-sans font-light leading-relaxed">
                    Jl. A. Wahab Syahranie Perum Pondok Alam Indah No.mor 3D,<br/>
                    Sempaja Sel., Kec. Samarinda Utara,<br/>
                    Kota Samarinda, Kalimantan Timur 75119
                 </p>
            </div>

            {/* Contact Info */}
            <div>
                <span className="text-xs uppercase tracking-widest text-lux-teal font-sans font-bold block mb-6">Hubungi Kami</span>
                <ul className="space-y-3">
                    <li>
                        <a href="https://wa.me/6281180009787?text=Halo%20Kisantra%2C%20saya%20ingin%20menghubungi%20tim%20Anda." target="_blank" rel="noopener noreferrer" className="text-neutral-400 hover:text-lux-teal transition-colors font-sans font-medium text-sm">
                            0811-8000-9787
                        </a>
                    </li>
                    <li>
                        <a href="mailto:kisantra.official@gmail.com" className="text-neutral-400 hover:text-lux-teal transition-colors font-sans font-medium text-sm">
                            kisantra.official@gmail.com
                        </a>
                    </li>
                </ul>
            </div>

            {/* Menu Links */}
            <div>
                <span className="text-xs uppercase tracking-widest text-lux-teal font-sans font-bold block mb-6">Navigasi</span>
                <ul className="space-y-3">
                    {[
                        { label: 'Beranda', href: '/', isExternal: false, isRoute: true },
                        { label: 'Tentang Kami', href: '/tentang-kami', isExternal: false, isRoute: true },
                        { label: 'Layanan', href: '/layanan', isExternal: false, isRoute: true },
                        { label: 'Kontak', href: 'https://wa.me/6281180009787?text=Halo%20Kisantra%2C%20saya%20ingin%20menghubungi%20tim%20Anda%20untuk%20informasi%20lebih%20lanjut.', isExternal: true, isRoute: false },
                    ].map((item) => (
                        <li key={item.label}>
                            {item.isRoute ? (
                                <Link href={item.href} className="text-neutral-400 hover:text-lux-teal transition-colors font-sans font-medium text-sm">
                                    {item.label}
                                </Link>
                            ) : (
                                <a href={item.href} target={item.isExternal ? '_blank' : undefined} rel={item.isExternal ? 'noopener noreferrer' : undefined} className="text-neutral-400 hover:text-lux-teal transition-colors font-sans font-medium text-sm">
                                    {item.label}
                                </a>
                            )}
                        </li>
                    ))}
                </ul>
            </div>
        </div>
      </div>

      {/* Elegant Monochrome Map Integration - Samarinda Centered */}
      <div className="w-full h-[300px] relative filter grayscale contrast-125 border-y border-neutral-800">
        <div className="absolute inset-0 bg-neutral-900/40 pointer-events-none z-10 mix-blend-overlay"></div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6950118734067!2d117.14601379999998!3d-0.45046249999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df679c547514d5f%3A0x8025788902b609e1!2sKisantra%20Consulting!5e0!3m2!1sen!2sid!4v1769397363131!5m2!1sen!2sid"
            width="100%"
            height="100%"
            style={{ border: 0 }}
            allowFullScreen
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
            title="Kisantra Consulting Location"
            className="opacity-60 hover:opacity-100 transition-opacity duration-700"
        ></iframe>
      </div>

      {/* Copyright Bar */}
      <div className="px-6 md:px-12 py-8 flex flex-col md:flex-row justify-between items-center gap-6 bg-lux-black relative z-20">
        <div className="flex gap-8">
            {[
                { name: 'LinkedIn', href: '#' },
                { name: 'Facebook', href: '#' },
                { name: 'Twitter', href: '#' },
                { name: 'Instagram', href: 'https://www.instagram.com/kisantra.official/' },
            ].map(social => (
                <a key={social.name} href={social.href} target={social.href !== '#' ? '_blank' : undefined} rel={social.href !== '#' ? 'noopener noreferrer' : undefined} className="text-[10px] md:text-xs uppercase tracking-[0.2em] text-neutral-500 hover:text-lux-teal transition-colors">
                    {social.name}
                </a>
            ))}
        </div>
        
        <div className="text-[10px] text-neutral-600 uppercase tracking-wider">
            © {new Date().getFullYear()} Kisantra Consult Samarinda. Hak Cipta Dilindungi.
        </div>
      </div>
    </footer>
  );
};