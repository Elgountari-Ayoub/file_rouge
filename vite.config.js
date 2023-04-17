import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],  

    resolve: {
        alias: {
        //   '@heroicons/vue': '/path/to/node_modules/@heroicons/vue',
        //   '@heroicons/vue': path.resolve(__dirname, 'node_modules/@heroicons/vue')
            '@': `${__dirname}/resources/js`,
            '@heroicons/vue': `${__dirname}/node_modules/@heroicons/vue`
        }
      }
});
