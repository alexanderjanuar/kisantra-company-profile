import React from 'react';

export const Contact: React.FC = () => {
  return (
    <footer className="bg-lux-black text-lux-white relative overflow-hidden">
      
      {/* Address & Info Section */}
      <div className="px-6 md:px-12 py-16 md:py-24 max-w-7xl mx-auto border-t border-neutral-800">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
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
                    Jl. Pahlawan No. 12, Samarinda Ulu<br/>
                    Kalimantan Timur, 75123<br/>
                    Indonesia
                 </p>
            </div>

            {/* Menu Links */}
            <div>
                <span className="text-xs uppercase tracking-widest text-lux-teal font-sans font-bold block mb-6">Layanan Populer</span>
                <ul className="space-y-3">
                    {['Pajak Samarinda', 'Audit Keuangan', 'SEO Samarinda', 'Ads Management'].map((item) => (
                        <li key={item}>
                            <a href="#" className="text-neutral-400 hover:text-lux-teal transition-colors font-sans font-medium text-sm">
                                {item}
                            </a>
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
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127660.82520335805!2d117.07941910243178!3d-0.4901358700051187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67fdd6d634129%3A0x6b490f2095f3a09e!2sSamarinda%2C%20Samarinda%20City%2C%20East%20Kalimantan!5e0!3m2!1sen!2sid!4v1677654321098!5m2!1sen!2sid" 
            width="100%" 
            height="100%" 
            style={{ border: 0 }} 
            loading="lazy" 
            title="Kisantra Consult Samarinda Location"
            className="opacity-60 hover:opacity-100 transition-opacity duration-700"
        ></iframe>
      </div>

      {/* Copyright Bar */}
      <div className="px-6 md:px-12 py-8 flex flex-col md:flex-row justify-between items-center gap-6 bg-lux-black relative z-20">
        <div className="flex gap-8">
            {['LinkedIn', 'Facebook', 'Twitter'].map(social => (
                <a key={social} href="#" className="text-[10px] md:text-xs uppercase tracking-[0.2em] text-neutral-500 hover:text-lux-teal transition-colors">
                    {social}
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