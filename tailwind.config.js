/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                abu: {
                    100: "#F5F7F9",
                    300: "#E8E8E8",
                    400: "#B7B7B7",
                    500: "#949494",
                },
                hijau: {
                    DEFAULT: "#739127",
                    100: "#F3F9D5",
                    200: "#E6F4AC",
                    300: "#C8DE7C",
                    400: "#A2BD55",
                },
            },
        },
    },
    plugins: [],
};
