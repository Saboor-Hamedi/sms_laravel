import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel(['resources/js/app.jsx']),
        tailwindcss(),
        react(),
    ],
    // resolve: {
    //     alias: {
    //         '@': path.resolve('resources/js'),
    //     },
    // },

});
