/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['poppins', 'sans-serif']
      },
      width: {
        aside: '20%',
        form_width : '28%',
        main: '80%',
      },
      height: {
        card: '150px',
      }
    },
  },
  plugins: [],
}

