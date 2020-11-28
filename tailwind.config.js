module.exports = {
    purge: {
        content: [
            './resources/views/welcome.view.php',
            './resources/views/dashboard.view.php',
            './resources/views/layouts/header.view.php',
            './resources/views/layouts/footer.view.php',
            './resources/views/sections/create_section.view.php',
            './resources/views/sections/edit_section.view.php',
            './resources/views/sections/section.view.php',
            './resources/views/components/blue-button.view.php',
            './resources/views/components/buttons.view.php',
            './resources/views/components/table.view.php',
            './resources/views/auth/login.view.php',
            './resources/views/auth/register.view.php',
        ]
    },
    darkMode: false, // or 'media' or 'class' or false
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
