import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js','public/fonts/Satoshi-Variable.ttf'],
            refresh: true,
        }),
    ],
});
