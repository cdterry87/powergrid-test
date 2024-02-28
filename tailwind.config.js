const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './app/Http/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                "pg-primary": colors.gray,
            },
        },
    },
    plugins: [],
}

