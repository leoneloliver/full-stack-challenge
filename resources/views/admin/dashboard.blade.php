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
    <script src="{{ asset('js/admin-company-management.js') }}"></script>
</head>

<body class="bg-gray-100">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolutefocus:z-50
    mt-3 items-center p-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">Skip to main content</a>

    <div class="container mx-auto p-6 pt-0" x-data="initDarkMode()" x-init="init()">

        <x-header />

        <main id="main-content" class="bg-white shadow-md rounded-lg p-8 mb-8" x-data="companyManagement()">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-600">Companies / Jobs</h1>
            </div>

            <!-- Search bar -->
            <div class="mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        x-model="searchTerm"
                        placeholder="Search companies..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <!-- Companies list -->
            <div x-show="!loading && !error" class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Company Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Job Listings
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <template x-for="company in filteredCompanies" :key="company.id">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-600" x-text="company.name"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600" x-text="company.jobCount + ' jobs'"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        @click="$dispatch('open-company-details', company)"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        View Details
                                    </button>
                                </td>
                            </tr>
                        </template>

                        <tr x-show="!loading && !error && filteredCompanies.length === 0">
                            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                                No companies found. Try a different search or add a new company.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <x-admin-login-modal />
    <x-company-details-modal />

    <script src="{{ asset('js/admin-company-details.js') }}"></script>
</body>

</html>
