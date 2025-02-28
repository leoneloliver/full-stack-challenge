<!-- resources/views/components/job-card.blade.php -->
<article class="bg-white p-6 rounded-lg shadow-lg mb-6 hover:shadow-xl transition-all duration-300 ease-in-out"
    x-data="{ showDetails: false }"
    :id="'job-' + job.id">

    <div class="flex flex-wrap justify-between items-center mb-2">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4" x-text="job.title"></h2>
        <time :datetime="job.created_at" class="posted bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm">
            <span>Posted on </span><span x-text="formatDate(job.created_at)"></span>
        </time>
    </div>

    <dl class="grid grid-cols-1 gap-2 mb-4">
        <div>
            <dt class="sr-only">Company</dt>
            <dd class="font-semibold text-gray-800"><span class="font-bold">Company: </span><span x-text="getCompanyName(job.company_id)"></span></dd>
        </div>

        <div>
            <dt class="sr-only">Position Type</dt>
            <dd class="text-gray-600"><span class="font-bold">Type: </span><span x-text="job.position_type"></span></dd>
        </div>

        <div>
            <dt class="sr-only">Location</dt>
            <dd class="text-gray-600"><span class="font-bold">Location: </span><span x-text="job.location"></span></dd>
        </div>
    </dl>

    <!-- Hidden details section that appears on click -->
    <div x-show="showDetails"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="mt-4 pt-4 border-t border-gray-200"
        :id="'job-details-' + job.id">

        <dl>
            <div class="mb-4">
                <dt class="sr-only">Description</dt>
                <dd class="text-gray-600"><span class="font-bold">Description: </span><span x-text="job.description"></span></dd>
            </div>

            <div class="mb-2">
                <dt class="sr-only">Salary</dt>
                <dd class="text-gray-600"><span class="font-bold">Salary: </span><span x-text="job.salary"></span></dd>
            </div>
        </dl>
    </div>

    <!-- Toggle button -->
    <button @click="showDetails = !showDetails"
        :aria-expanded="showDetails ? 'true' : 'false'"
        :aria-controls="'job-details-' + job.id"
        class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <span x-text="showDetails ? 'Show Less' : 'More Details'"></span>
        <svg class="ml-2 h-4 w-4 transition-transform"
            :class="{ 'transform rotate-180': showDetails }"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
</article>
