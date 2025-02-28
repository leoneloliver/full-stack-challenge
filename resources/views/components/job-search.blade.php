<!-- resources/views/components/job-search.blade.php -->
<div class="mb-6">
    <div class="relative">
        <label for="job-search" class="sr-only">Search job titles</label>
        <input
            id="job-search"
            type="search"
            x-model="searchTerm"
            @input="applyFilters()"
            placeholder="Search job titles..."
            aria-describedby="search-description"
            class="w-full p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        <div class="absolute inset-y-0 right-0 flex items-center pr-3" aria-hidden="true">
            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
    <!-- Results counter -->
    <p id="search-description" class="text-gray-600 mt-2" aria-live="polite">
        <span x-text="jobs.length"></span> jobs found
    </p>
</div>
