import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap.css',
                'resources/js/bootstrap.bundle.js',
            ],
            refresh: true,
        }),
    ],
});
