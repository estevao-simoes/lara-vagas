/** @type {import('tailwindcss').Config} */

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Mulish", "sans-serif"],
                body: ["Mulish", "sans-serif"],
            },
            colors: {
                "prussian-blue": "#072939ff",
                "orange-web": "#fca311ff",
                "vermilion": "#f9322bff",
                "lavender-web": "#d6e3f8ff",
                "seashell": "#fef5efff",
            },
        },
    },
    plugins: [],
};
