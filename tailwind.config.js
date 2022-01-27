module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
     
    },
    fontFamily: {
      'rubik': ['Rubik', 'sans-serif'],
      'heebo': ['Heebo', 'sans-serif'],
    },
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer')
  ],
}
