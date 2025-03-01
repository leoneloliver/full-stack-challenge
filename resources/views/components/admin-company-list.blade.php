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
                        <div class="text-md font-medium text-gray-600" x-text="company.name"></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-md text-gray-600" x-text="company.jobCount + ' jobs'"></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-md font-medium">
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
