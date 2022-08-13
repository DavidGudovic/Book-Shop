/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./resources/views/**/*.js",
    "./resources/**/*.vue",

    //pagination
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      backgroundImage: {
        'header-pattern': "url('/images/util/header_pattern.png')",
        'aurora-login': "url('/images/auroras/aurora-login.png')",
        'aurora-register': "url('/images/auroras/aurora-register.png')",
        'aurora-heading' : "url('/images/auroras/aurora-heading.png')",
        'aurora-phone': "url('/images/auroras/aurora-phone.png')",
      },
    },
  },
  plugins: [],
}
