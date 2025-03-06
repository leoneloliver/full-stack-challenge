<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wise Jobs Admin Dashboard">
    <title>Wise Jobs - Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/dark-mode.js') }}"></script>
    <script src="{{ asset('js/admin-login.js') }}"></script>
    <script src="{{ asset('js/api-service.js') }}"></script>
    <script src="{{ asset('js/admin-company-management.js') }}"></script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen h-full">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolutefocus:z-50
    mt-3 items-center p-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">Skip to main content</a>
    <div class="container mx-auto p-6 pt-0" x-data="initDarkMode()" x-init="init()">
        <x-common.header />
        <main id="main-content" class="bg-white shadow-md rounded-lg p-8 mb-8" x-data="companyManagement()">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-600">Companies / Jobs</h1>
            </div>
            <!-- Search bar -->
            <x-admin.search />
            <!-- Companies list -->
            <x-admin.company-list />
        </main>
    </div>
    <!-- Footer component -->
    <x-common.footer />
    <x-admin.company-details-modal />
    <script src="{{ asset('js/admin-company-details.js') }}"></script>
</body>

</html>
