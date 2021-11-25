const path = require("path");

module.exports = {
    resolve: {
        alias: {
            "@": path.resolve("resources/js"),
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
