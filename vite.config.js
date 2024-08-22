import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { resolve } from "node:path";
import {AntDesignVueResolver} from 'unplugin-vue-components/resolvers';
import Components from 'unplugin-vue-components/vite';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
            port: 3000,
        },
        watch: {
            usePolling: true,
        },
    },
    resolve: {
        alias: {
            'ziggy-js': resolve('vendor/tightenco/ziggy'),
            '@': resolve(__dirname, 'resources/js'),
            '@/': resolve(__dirname, 'resources/js'),
        }
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
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
        Components({
            resolvers: [
                AntDesignVueResolver({
                    importStyle: false,
                }),
            ],
        }),
    ],
});
