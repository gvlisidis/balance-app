const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-red': '#E7717D',
                'custom-gray': '#C2CAD0',
                'custom-beige': '#C2B9B0',
                'custom-brown': '#7E685A',
                'custom-green': '#AFD275'
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
};
