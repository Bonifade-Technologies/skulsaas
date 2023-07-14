/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        roboto: ["'Roboto Slab', serif'"],
        ubuntu: ["'Ubuntu', sans-serif'"]
      },
      colors: {
        primary: {
          DEFAULT: "#dc0956",
          DARK: '#18010a',
          light: '#fee7ef',
          50: '#fdcedf',
          100: '#fcb6cf',
          200: '#fa85b0',
          300: '#f85490',
          400: '#f62370',
          500: '#c4084d',
          600: '#ab0743',
          700: '#7a0530',
          800: '#49031d',
          900: '#310213',
        },
        secondary: {
          DEFAULT: "#1E90FF",
          DARK: '#000d1a',
          light: '#e6f2ff',
          50: '#cce6ff',
          100: '#b3d9ff',
          200: '#99ccff',
          300: '#66b3ff',
          400: '#3399ff',
          500: '#1a8cff',
          600: '#0073e6',
          700: '#0059b3',
          800: '#004080',
          900: '#00264d',
        },
        background: {
          50: "#fafafd",
          100: "#f0f0f5",
          200: "#E6E7EE"
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('flowbite/plugin')
  ],
}

