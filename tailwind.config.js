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
            fontSize: {
                xxs: ['0.625rem', {lineHeight: '1rem'}],
                label: ['1.75rem', {lineHeight: '2,15rem'}]
            },
            padding: {
                '1/3': '33.33333%',
                '2/3': '66.66667%',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
};
