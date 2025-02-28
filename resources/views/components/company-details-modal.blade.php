<div
    x-data="companyDetailsModal()"
    x-show="isOpen"
    @open-company-details.window="openModal($event.detail)"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;"
    role="dialog"
    aria-modal="true">

    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div
            x-show="isOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity"
            aria-hidden="true"
            @click="closeModal()">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal panel -->
        <div
            x-show="isOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6"
            @click.away="closeModal()">

            <div>
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" x-text="company.name"></h3>
                    <button @click="closeModal()" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Company details section -->
                <div class="mb-6 border-b border-gray-200 pb-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">About the Company</h4>
                            <p class="mt-2 text-sm text-gray-600">
                                <span x-text="company.about || 'No information available.'"></span>
                            </p>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Company Details</h4>
                            <div class="mt-2 text-sm text-gray-600">
                                <div class="flex items-start mb-2">
                                    <svg class="h-5 w-5 mr-2 text-gray-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    <span x-text="company.address || 'Address not available'"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="text-sm font-medium text-gray-500">Job Statistics</h4>
                        <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-indigo-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500">Total Jobs</p>
                                <p class="text-lg font-semibold text-indigo-600" x-text="jobs.length"></p>
                            </div>
                            <div class="bg-amber-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500">Types of Jobs</p>
                                <div class="text-sm font-medium text-amber-600">
                                    <template x-for="(count, type) in getJobTypes()" :key="type">
                                        <div class="flex justify-between">
                                            <span x-text="type"></span>
                                            <span x-text="count"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jobs listing section -->
                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-4">Job Listings</h4>

                    <div x-show="!loading" class="overflow-y-auto max-h-96">
                        <template x-if="jobs.length > 0">
                            <div class="space-y-4">
                                <template x-for="job in jobs" :key="job.id">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h5 class="text-sm font-semibold text-gray-900" x-text="job.title"></h5>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <span x-text="job.location || 'Remote'"></span> •
                                                    <span x-text="job.position_type || 'Not specified'"></span> •
                                                    <span x-text="job.salary ? '$' + job.salary : 'Salary not disclosed'"></span>
                                                </p>
                                            </div>
                                            <p class="text-xs text-gray-500" x-text="'Posted: ' + formatDate(job.created_at)"></p>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-2 line-clamp-2" x-text="job.description || 'No description available.'"></p>


                                        <div class="mt-4">

                                            <button
                                                class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </button>

                                            <button
                                                @click="deleteJob()"
                                                class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </div>

                                </template>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="mt-6 sm:mt-8 sm:flex sm:justify-end">
                    <button @click="closeModal()" class="w-full sm:w-auto px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
