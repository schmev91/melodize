import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    // darkMode: "selector",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                wall: "#191919",
                such: "#d4d7f8",
                hypergreen: "#35e668",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                client: "url('/public/img/utils/client-bg.jpg')",
            },
            container: {
                padding: {
                    DEFAULT: "1rem",
                    sm: "2rem",
                    lg: "4rem",
                    xl: "5rem",
                    "2xl": "6rem",
                },
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
        require("@tailwindcss/container-queries"),
        require("daisyui"),
    ],

    daisyui: {
        themes: [
            {
                melodize: {
                    primary: "#35e668",

                    secondary: "#6b7280",

                    accent: "#d4d7f8",

                    neutral: "#d1d5db",

                    "base-100": "#f3f4f6",

                    info: "#38bdf8",

                    success: "#22c55e",

                    warning: "#facc15",

                    error: "#ef4444",
                },
            },
        ],
    },

    safelist: [
        "text-primary",
        "text-secondary",
        "text-success",
        "text-warning",
        "text-error",
        "text-info",
    ],
};
