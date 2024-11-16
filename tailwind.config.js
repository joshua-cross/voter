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
                'text': "#082b46",
                "primary": "#e74184",
                "secondary": {
                    "light": "#13b0ee",
                    DEFAULT: "#0c759e",
                    "dark": "#095c7c",
                },
            },
        },
    },
    plugins: [],
};
