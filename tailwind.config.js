import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", ...defaultTheme.fontFamily.sans],
                raleway: ["Raleway", ...defaultTheme.fontFamily.sans],
                preahvihear: ["Preahvihear", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "hero-pattern": "url('assets/images/bg.png')",
                "footer-texture": "url('/img/footer-texture.png')",
            },
        },
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#7A1CAC",

                    secondary: "#9ca3af",

                    accent: "#fb923c",

                    neutral: "#67e8f9",

                    "base-100": "#FBF3FF",

                    info: "#3b82f6",

                    success: "#16a34a",

                    warning: "#fde047",

                    error: "#ff0000",
                },
            },
        ],
    },
    plugins: [require("daisyui")],
};
