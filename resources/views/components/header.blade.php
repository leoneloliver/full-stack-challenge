<header class="flex justify-between items-center mb-4 mt-8">
    <!-- Logo -->
    <div class="w-56">
        <a href="/">
            <img src="{{ asset('images/wise-jobs-logo.svg') }}" alt="Wise Jobs Logo" width="300" height="100">
        </a>
    </div>

    <!-- Dark mode toggle -->
    <div class="flex justify-end mb-6 items-center">
        <button
            @click="$dispatch('open-admin-modal')"
            class="mr-4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Login as Admin
        </button>

        <button @click="toggleDarkMode()"
            aria-label="Toggle dark mode"
            class="p-2 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
            :aria-pressed="darkMode ? 'true' : 'false'">
            <svg x-show="darkMode" class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span x-show="darkMode" class="sr-only">Switch to light mode</span>
            <svg x-show="!darkMode" class="h-6 w-6 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
            <span x-show="!darkMode" class="sr-only">Switch to dark mode</span>
        </button>
    </div>
</header>
