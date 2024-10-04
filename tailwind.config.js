/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors: {
          cyan: '#183D55',
          'cyan-100': '#7393A7',
        },
        fontFamily: {
          "Gilgan": ['Gilgan', 'sans-serif'],
        },
        backgroundImage: {
          'jumbotron': "url('/assets/jumbotron.png')",
        },
      },
    },
    plugins: [
      require('flowbite/plugin')
    ],
  }
