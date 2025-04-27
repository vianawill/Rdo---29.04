import { reject } from 'lodash';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    'w-3', 'h-3', 'bg-green-500', 'bg-orange-500', 'bg-gray-500', 'rounded-full',
  ],
  theme: {
    extend: {
        boxShadow:{
          'blue-custom': '0 0px 10px 2px rgba(51, 102, 255, 0.5)',
        },
        colors: {
          fundo: '#151A30',
          secundario: '#222B45',
          input: '#192038',
          bdinput: '#101426',
          txtblue: '#3366FF',
          reject: '#FF4D4D',
          edit: '#FFCC00',
          accept: '#00B300',
        },
        fontFamily: {
        poppins: ['Poppins', 'sans-serif'], // Exemplo com Poppins
        },
    },
  },
  plugins: [
    require('tailwind-scrollbar-hide')
  ],
}

