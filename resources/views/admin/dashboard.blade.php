{{-- resources/views/admin/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wise Jobs Admin Dashboard">
    <title>Wise Jobs - Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('css/dark-mode.css') }}">
    <script src="{{ asset('js/dark-mode.js') }}"></script>
    <script src="{{ asset('js/admin-login.js') }}"></script>
    <script>
        // Simple auth check on page load
        document.addEventListener('DOMContentLoaded', function() {
            const isLoggedIn = localStorage.getItem('isAdminLoggedIn');
            if (isLoggedIn !== 'true') {
                window.location.href = '/';
            }
        });
    </script>
</head>

<body class="bg-gray-100">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolutefocus:z-50
    mt-3 items-center p-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">Skip to main content</a>

    <div class="container mx-auto p-6 pt-0" x-data="initDarkMode()" x-init="init()">
        <!-- Use the reusable header component -->
        <x-header />

        <main id="main-content" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 mb-8">
            <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Admin Dashboard</h1>

            <p class="text-gray-600 dark:text-gray-300 mb-4">
                This is a simple blank admin page. You can customize it as needed.
            </p>
        </main>
    </div>
    <x-admin-login-modal />
</body>

</html>
