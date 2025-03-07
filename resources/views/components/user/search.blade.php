<div class="mb-6">
    <div class="relative">
        <label for="job-search" class="sr-only">Search job titles</label>

        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input
            id="job-search"
            type="search"
            x-model="searchTerm"
            @input="applyFilters()"
            placeholder="Search job titles..."
            aria-describedby="search-description"
            class="w-full p-4 pl-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>

    <p id="search-description" class="text-gray-600 mt-2" aria-live="polite">
        <span x-text="jobs.length"></span> jobs found
    </p>
</div>
