import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
import defaultTheme from 'tailwindcss/defaultTheme';

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/livewire/*.blade.php',
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
            }
        }
    }
}

