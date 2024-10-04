import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/css/style.css', 'public/js/script.js'],
            refresh: true,
        }),
    ],
});
