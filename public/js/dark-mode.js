// Dark mode functionality
function initDarkMode() {
    return {
        darkMode: localStorage.getItem('darkMode') === 'true' || false,
        init() {
            if (this.darkMode) {
                document.documentElement.classList.add('dark-theme');
            }
        },
        toggleDarkMode() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('darkMode', this.darkMode);

            if (this.darkMode) {
                document.documentElement.classList.add('dark-theme');
            } else {
                document.documentElement.classList.remove('dark-theme');
            }
        }
    };
}
