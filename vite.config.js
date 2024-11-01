import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
          scss: {
            api: 'modern' // or "modern"
          }
        }
      },
});
