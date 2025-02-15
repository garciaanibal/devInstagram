import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                // 'resources/css/bootstrap.css',
                // 'resources/css/styles.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';

// export default defineConfig({
// server: {
//         host: '0.0.0.0',
//         hmr: {
//             host: 'localhost',
//         },

//     },
//     plugins: [
//         laravel({
//             input: ['resources/css/app.css', 'resources/js/app.js'],
//             refresh: true,
//         }),
//     ],
// });
