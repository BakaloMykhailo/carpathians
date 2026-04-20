import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import liveReload from 'vite-plugin-live-reload'
import { resolve } from 'path'

export default defineConfig({
    plugins: [
        tailwindcss(),
        liveReload(__dirname + '/**/*.php'),
    ],

    root: '',
    base: process.env.NODE_ENV === 'development'
        ? '/'
        : '/dist/',

    build: {
        outDir: resolve(__dirname, './dist'),
        emptyOutDir: true,
        manifest: true,
        target: 'es2018',
        rollupOptions: {
            input: {
                main: resolve(__dirname + '/src/main.js'),
            },
        },
        minify: true,
        write: true,
    },

    server: {
        cors: true,
        strictPort: true,
        port: 3000,
        https: false,
        hmr: {
            host: 'localhost',
        },
    },
})
