import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/switcher.css',
                'resources/js/app.js',
                'resources/js/bootstrap.bundle.js',
                'resources/js/cabinetStepsHeight.js',
                'resources/js/downloadImage.js',
                'resources/js/editModal.js',
                'resources/js/editUserModal.js',
                'resources/js/fillPurposeContainers.js',
                'resources/js/letterCounter.js',
                'resources/js/orderListFromMainSite.js',
                'resources/js/uploadImage.js',
                'resources/sass/app.scss',
                'resources/js/selectMessage.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
