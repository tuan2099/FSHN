/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./inc/**/*.php",
    "./template-parts/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'brand-blue': '#2B3C54',
        'brand-orange': '#F9A75F',
        'brand-black': {
          100: '#F0F0F0',
          300: '#D4D4D4',
          400: '#A3A3A3',
          500: '#737373',
          700: '#525252',
          800: '#404040',
          900: '#262626',
        }
      },
      fontFamily: {
        'sans': ['Gotham', 'Montserrat', 'sans-serif'],
        'serif': ['IvyMode', 'serif'],
      },
      borderRadius: {
        '3xl': '1.5rem',
        '4xl': '2rem',
      },
      spacing: {
        'px': '1px',
        '0': '0',
        '1': '4px',
        '2': '8px',
        '4': '16px',
        '6': '24px',
        '7': '28px',
        '8': '32px',
        '9': '36px',
        '10': '40px',
        '12': '48px',
        '15': '60px',
        '18': '72px',
        '24': '96px',
        '30': '120px',
      },
      container: {
        center: true,
        padding: '1rem',
        screens: {
          'sm': '640px',
          'md': '768px',
          'lg': '1040px',
          'xl': '1040px',
          '2xl': '1040px',
        }
      }
    },
  },
  plugins: [],
}
