<!-- resources/views/components/job-filter.blade.php -->
<div class="bg-white p-6 rounded-lg shadow-lg mb-6" role="region" aria-labelledby="filter-heading">
    <h3 id="filter-heading" class="text-lg font-semibold text-gray-800 mb-4">Filter Jobs</h3>

    <!-- Position Type Filter -->
    <fieldset class="mb-4">
        <legend class="block text-gray-600 font-medium mb-2">Position Type</legend>
        <div class="flex flex-wrap gap-2" role="radiogroup" aria-labelledby="position-type-group">
            <button @click="filters.positionType = ''; applyFilters()"
                :class="filters.positionType === '' ? 'bg-indigo-700 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-3 py-1 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                :aria-pressed="filters.positionType === '' ? 'true' : 'false'"
                role="radio"
                aria-checked="false"
                type="button">
                All
            </button>
            <button @click="filters.positionType = 'Remote'; applyFilters()"
                :class="filters.positionType === 'Remote' ? 'bg-indigo-700 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-3 py-1 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                :aria-pressed="filters.positionType === 'Remote' ? 'true' : 'false'"
                role="radio"
                aria-checked="false"
                type="button">
                Remote
            </button>
            <button @click="filters.positionType = 'In-Person'; applyFilters()"
                :class="filters.positionType === 'In-Person' ? 'bg-indigo-700 text-white' : 'bg-gray-200 text-gray-700'"
                class="px-3 py-1 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                :aria-pressed="filters.positionType === 'In-Person' ? 'true' : 'false'"
                role="radio"
                aria-checked="false"
                type="button">
                In-Person
            </button>
        </div>
    </fieldset>

    <!-- Salary Range Filter -->
    <div class="mb-4">
        <fieldset>
            <legend class="block text-gray-600 font-medium mb-2">Salary Range</legend>
            <div class="flex items-center gap-2">
                <div class="w-1/2">
                    <label for="min-salary" class="sr-only">Minimum Salary</label>
                    <input type="number"
                        id="min-salary"
                        x-model="filters.minSalary"
                        @input="applyFilters()"
                        placeholder="Min"
                        min="0"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        aria-describedby="salary-description">
                </div>
                <span class="text-gray-500" id="salary-description">to</span>
                <div class="w-1/2">
                    <label for="max-salary" class="sr-only">Maximum Salary</label>
                    <input type="number"
                        id="max-salary"
                        x-model="filters.maxSalary"
                        @input="applyFilters()"
                        placeholder="Max"
                        min="0"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        aria-describedby="salary-description">
                </div>
            </div>
        </fieldset>
    </div>

    <!-- Company Filter -->
    <div class="mb-4">
        <label for="company-filter" class="block text-gray-600 font-medium mb-2">Company</label>
        <select id="company-filter"
            x-model="filters.companyId"
            @change="applyFilters()"
            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All Companies</option>
            <template x-for="company in companies" :key="company.id">
                <option :value="company.id" x-text="company.name"></option>
            </template>
        </select>
    </div>

    <!-- Location Filter -->
    <div class="mb-4">
        <label for="location-filter" class="block text-gray-600 font-medium mb-2">Location</label>
        <select id="location-filter"
            x-model="filters.location"
            @change="applyFilters()"
            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All Locations</option>
            <template x-for="location in uniqueLocations" :key="location">
                <option :value="location" x-text="location"></option>
            </template>
        </select>
    </div>

    <!-- Reset Filters Button -->
    <button @click="resetFilters()"
        type="button"
        aria-label="Reset all filters"
        class="w-full mt-3 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Reset Filters
    </button>
</div>
