/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')
import colors from 'tailwindcss/colors'

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/views/livewire/*.blade.php",
    "./resources/views/filament/*/*.blade.php",
    './storage/framework/views/*.php',
    './vendor/wire-elements/modal/resources/views/*.blade.php',
    './app/Livewire/**/*.php',
    './app/Filament/**/*.php',
    './resources/views/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
  ],
  theme: {
    extend: {
        colors: {
            'pacific-blue': {
                '50': '#f0faff',
                '100': '#e0f5fe',
                '200': '#b9ecfe',
                '300': '#7cdffd',
                '400': '#36d0fa',
                '500': '#0cbaeb',
                '600': '#0099cc',
                '700': '#0178a3',
                '800': '#066586',
                '900': '#0b536f',
                '950': '#07354a',
            },
            'off-white': '#f9fafb',
        },
        fontFamily: {
            sans: ["Raleway", ...defaultTheme.fontFamily.sans]
        },
    },
  },
  plugins: [],
}

