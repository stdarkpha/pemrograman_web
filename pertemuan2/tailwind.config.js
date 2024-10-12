/** @type {import('tailwindcss').Config} */
module.exports = {
   content: [
      "./**/*.{html,js,php}",
      "!./node_modules/**", // Exclude node_modules
   ],
   theme: {
      extend: {},
   },
   plugins: [require("daisyui")],

   daisyui: {
      themes: ["light", "dark", "cupcake"],
   },
};
