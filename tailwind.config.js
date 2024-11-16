import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    // https://tailwindcss.com/docs/using-with-preprocessors
    mode: "jit",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#007bff",
                secondary: "#6c757d",
                success: "#28a745",
                info: "#17a2b8",
                warning: "#ffc107",
                danger: "#dc3545",
                link: "#007bff",
            },
        },
    },

    plugins: [forms],
};
