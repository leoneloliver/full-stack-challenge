<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Browse and filter job listings on Wise Jobs, featuring positions from top companies">
    <title>Wise Jobs - Find Your Next Career Opportunity</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/job-listings.js') }}"></script>
    <script src="{{ asset('js/dark-mode.js') }}"></script>
    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="{{ asset('js/admin-login.js') }}"></script>
</head>

<body class="bg-gray-100">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolutefocus:z-50 mt-3 items-center p-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">Skip to main content</a>

    <div class="container mx-auto p-6 pt-0" x-data="initDarkMode()" x-init="init()">

        <x-header />

        <h1 class="text-xl text-gray-700 font-semibold mb-4 ml-4">Job Listings</h1>

        <main id="main-content" x-data="initJobListings()" x-init="init()">
            <div id="job-listings-container" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Filters -->
                <aside class="md:col-span-1">
                    <div id="filter-sidebar" class="w-full">
                        <x-job-filter />
                    </div>
                </aside>

                <div class="md:col-span-3">
                    <!-- Search Component -->
                    <x-job-search />

                    <div role="status" aria-live="polite">
                        <div x-show="jobs.length > 0">
                            <div class="sr-only" x-text="jobs.length + ' jobs found'"></div>
                            <ul class="list-none p-0">
                                <template x-for="job in jobs" :key="job.id">
                                    <li>
                                        <x-job-card />
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <div x-show="jobs.length === 0" class="text-center py-8">
                            <p class="text-xl text-gray-500">No jobs match your search criteria.</p>
                            <button @click="resetFilters()"
                                class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Reset Filters
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <x-admin-login-modal />
</body>

</html>
