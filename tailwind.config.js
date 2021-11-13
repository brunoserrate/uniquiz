const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
const plugin = require('tailwindcss/plugin');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',

            black: colors.black,
            white: colors.white,
            gray: colors.coolGray,
            red: colors.red,
            yellow: colors.amber,
            green: colors.emerald,
            blue: colors.blue,
            indigo: colors.indigo,
            purple: colors.violet,
            pink: colors.pink,
            // Custom
            uni_primary: {
                DEFAULT: '#253369'
            },
            uni_info: {
                light: '#40A9FF',
                DEFAULT: '#1890FF',
                dark: '#096DD9'
            },
        },
    },

    variants: {
        backgroundColor: ['responsive', 'dark', 'group-hover', 'focus-within', 'hover', 'focus', 'checked', 'label-checked'],
        borderColor: ['label-checked'],
        opacity: ['responsive', 'group-hover', 'focus-within', 'hover', 'focus'],
        textColor: ['responsive', 'dark', 'group-hover', 'focus-within', 'hover', 'focus'],
    },

    plugins: [
        require('daisyui'),
        // require('@tailwindcss/forms')
        require('tailwindcss/colors'),
        plugin(({ addVariant, e }) => {
            addVariant('label-checked', ({ modifySelectors, separator }) => {
                modifySelectors(
                    ({ className }) => {
                        const eClassName = e(`label-checked${separator}${className}`); // escape class
                        const yourSelector = 'input[type="radio"]'; // your input selector. Could be any
                        return `${yourSelector}:checked ~ .${eClassName}`; // ~ - CSS selector for siblings
                    }
                )
            })
        }),
    ],
    daisyui: {
        styled: true,
        themes: false,
        base: true,
        utils: true,
        logs: true,
        rtl: false,
    },
};
