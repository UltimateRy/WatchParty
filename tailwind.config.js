const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        
        extend: {
            colors: {
                primary: '#90323D',
                primaryLight: '#4D1E24',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                myfont: ['Poppins', 'sans-serif'],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
