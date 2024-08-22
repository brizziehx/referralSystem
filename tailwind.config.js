/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
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

