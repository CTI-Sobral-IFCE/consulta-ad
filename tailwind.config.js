module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                green: {
                    light: '#54b74f',
                    DEFAULT: '#359830',
                    dark: '#167911',
                },
            },
        },
        listStyleType: {
            none: 'none',
            disc: 'disc',
            decimal: 'decimal',
            square: 'square',
            roman: 'upper-roman',
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
