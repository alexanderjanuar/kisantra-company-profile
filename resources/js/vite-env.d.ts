/// <reference types="vite/client" />

interface ImportMetaEnv {
    readonly VITE_APP_NAME: string
}

interface ImportMeta {
    readonly env: ImportMetaEnv
}

// Google Analytics types
declare global {
    interface Window {
        dataLayer: any[];
    }
}
