import laravel from 'laravel-vite-plugin';
import {defineConfig} from 'vite';
import livewire from '@defstudio/vite-livewire-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ],),
        livewire({  // <-- add livewire plugin
            refresh: ['resources/css/app.css'],  // <-- will refresh css (tailwind ) as well
        }),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        }
    ],
});
