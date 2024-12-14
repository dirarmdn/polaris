/** @type {import('tailwindcss').Config} */
import flowbite from 'flowbite/plugin'
import tailwindScrollbar from 'tailwind-scrollbar'
import forms from '@tailwindcss/forms'

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      backgroundImage: {
        'landing-bg-1': "url('/images/Landing-1.svg')",
      },
      fontFamily: {
        manrope: ['Manrope', 'sans-serif'],
      },
      colors: {
        'primary': {
          '50': '#eef8ff',
          '100': '#d9eeff',
          '200': '#bce2ff',
          '300': '#8ed1ff',
          '400': '#59b6ff',
          '500': '#3296ff',
          '600': '#1c77f4',
          '700': '#1460e1',
          '800': '#174db6',
          '900': '#173f84',
          '950': '#142a57',
        },
        'secondary': {
          '50': '#ebf9ff',
          '100': '#d2f1ff',
          '200': '#aee8ff',
          '300': '#76dcff',
          '400': '#37c5ff',
          '500': '#09a2ff',
          '600': '#007dff',
          '700': '#0064ff',
          '800': '#0052d6',
          '900': '#014dae',
          '950': '#072d64',
        },
        'light-blue': {
          '50': '#effafc',
          '100': '#d6f0f7',
          '200': '#b1e1f0',
          '300': '#7ccae4',
          '400': '#50b2d5',
          '500': '#238eb7',
          '600': '#20729a',
          '700': '#215d7d',
          '800': '#234e67',
          '900': '#214258',
          '950': '#112a3b',
        },
        'accent-light': {
          '50': '#fff8ed',
          '100': '#ffefd4',
          '200': '#ffdba9',
          '300': '#ffc172',
          '400': '#fe9c39',
          '500': '#fd851e',
          '600': '#ee6308',
          '700': '#c54a09',
          '800': '#9c3a10',
          '900': '#7e3210',
          '950': '#441606',
        },
        'accent': {
          '50': '#fff9ec',
          '100': '#fff2d3',
          '200': '#ffe2a5',
          '300': '#ffcc6d',
          '400': '#ffaa32',
          '500': '#ff8e0a',
          '600': '#ff7600',
          '700': '#cc5502',
          '800': '#a1420b',
          '900': '#82380c',
          '950': '#461a04',
        },
        'dark': {
          '50': '#f6f6f6',
          '100': '#e7e7e7',
          '200': '#d1d1d1',
          '300': '#b0b0b0',
          '400': '#888888',
          '500': '#6d6d6d',
          '600': '#5d5d5d',
          '700': '#4f4f4f',
          '800': '#454545',
          '900': '#383838',
          '950': '#262626',
        },
      }
    },
  },
  plugins: [
    flowbite({
      datatables: true,
    }),
    tailwindScrollbar,
    forms,
  ],
}
