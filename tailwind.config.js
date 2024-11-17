import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'background': "#f2f5e5",
                'text': {
                    light: "#0a365a",
                    DEFAULT: "#082b46"
                },
                "primary": "#e74184",
                "secondary": {
                    "light": "#13b0ee",
                    DEFAULT: "#0c759e",
                    "dark": "#095c7c",
                },
                "chart": {
                    "1": "#e74141",
                    "2": "#c941e7",
                    "3": "#41e1e7",
                    "4": "#4194e7",
                    "5": "#41e74f",
                    "6": "#7841e7",
                    "7": "#41e7bb",
                    "8": "#e7df41",
                    "9": "#e77341",
                    "10": "#e74f41",
                }
            },
        },
    },
    plugins: [],
};
