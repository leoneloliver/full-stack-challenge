<div class="bg-white rounded-lg shadow-lg mb-6" role="region" aria-labelledby="filter-heading">
    <!-- Mobile Toggle Button - Only visible on mobile -->
    <button
        @click="toggleMobileFilters()"
        class="md:hidden w-full flex justify-between items-center px-4 py-3 rounded-t-lg bg-white text-gray-800 border-b border-gray-200"
        :aria-expanded="mobileFiltersVisible"
        aria-controls="filter-content">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
            </svg>
            <h3 id="filter-heading" class="text-lg font-semibold text-gray-800">Filter Jobs</h3>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg"
            :class="mobileFiltersVisible ? 'transform rotate-180' : ''"
            class="h-5 w-5 text-gray-400 transition-transform duration-200"
            viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Filter Content - Toggleable on mobile, always visible on desktop -->
    <div
        id="filter-content"
        class="p-6"
        x-show="mobileFiltersVisible"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4">

        <!-- Desktop Heading - Only visible on desktop -->
        <h2 class="hidden md:block text-lg font-semibold text-gray-800 mb-4">Filter Jobs</h2>

        <fieldset class="mb-4">
            <legend class="block text-gray-600 font-medium mb-2">Position Type</legend>
            <div class="flex flex-wrap gap-2" role="radiogroup" aria-labelledby="position-type-group">
                <button @click="filters.positionType = ''; applyFilters()"
                    :class="filters.positionType === '' ? 'bg-indigo-700 text-white' : 'bg-gray-200 text-gray-700'"
                    class="px-3 py-1 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"

                    :aria-checked="filters.positionType === ''"
                    role="radio"
                    aria-checked="false"
                    type="button">
                    All
                </button>
                <button @click="filters.positionType = 'Remote'; applyFilters()"
                    :class="filters.positionType === 'Remote' ? 'bg-indigo-700 text-white' : 'bg-gray-200 text-gray-700'"
                    class="px-3 py-1 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"

                    :aria-checked="filters.positionType === 'Remote'"
                    role="radio"
                    aria-checked="false"
                    type="button">
                    Remote
                </button>
                <button @click="filters.positionType = 'In-Person'; applyFilters()"
                    :class="filters.positionType === 'In-Person' ? 'bg-indigo-700 text-white' : 'bg-gray-200 text-gray-700'"
                    class="px-3 py-1 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"


                    :aria-checked="filters.positionType === 'In-Person'"
                    role="radio"
                    aria-checked="false"
                    type="button">
                    In-Person
                </button>
            </div>
        </fieldset>

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

        <button @click="resetFilters()"
            type="button"
            aria-label="Reset all filters"
            class="w-full mt-3 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Reset Filters
        </button>
    </div>
</div>
