// Job listings functionality
function initJobListings() {
  return {
    jobs: [],
    allJobs: [],
    companies: [],
    searchTerm: '',
    filters: {
      positionType: '',
      minSalary: '',
      maxSalary: '',
      companyId: '',
      location: '',
    },
    init() {
      this.fetchJobs();
    },
    fetchJobs() {
      fetch('http://127.0.0.1:8000/joblists')
        .then((response) => response.json())
        .then((data) => {
          this.companies = data.companies;
          this.allJobs = data.companies.flatMap((company) => company.joblists);

          // Debug: Check the format of position_type in the first few jobs
          // console.log('Job data sample:', this.allJobs.slice(0, 3));

          this.jobs = [...this.allJobs];
        })
        .catch((error) => {
          console.error('Error fetching data:', error);
        });
    },
    getCompanyName(companyId) {
      const company = this.companies.find((c) => c.id === companyId);
      return company ? company.name : 'No company info';
    },
    formatDate(dateString) {
      if (!dateString) return '';
      const options = { year: 'numeric', month: 'short', day: 'numeric' };
      return new Date(dateString).toLocaleDateString(undefined, options);
    },

    get uniqueLocations() {
      return [...new Set(this.allJobs.map((job) => job.location))]
        .filter(Boolean)
        .sort();
    },
    applyFilters() {
      // console.log('Filtering by position type:', this.filters.positionType); // Debug logging

      this.jobs = this.allJobs.filter((job) => {
        // Filter by search term
        if (
          this.searchTerm &&
          !job.title.toLowerCase().includes(this.searchTerm.toLowerCase())
        ) {
          return false;
        }
        if (this.filters.positionType) {
          const jobType = job.position_type
            ? job.position_type.toLowerCase()
            : '';
          const filterType = this.filters.positionType.toLowerCase();

          if (!jobType.includes(filterType)) {
            return false;
          }
        }
        if (job.salary) {
          const salaryText = job.salary.toString();
          const salaryNumber = parseFloat(salaryText.replace(/[^0-9.-]+/g, ''));

          if (
            this.filters.minSalary &&
            !isNaN(parseFloat(this.filters.minSalary)) &&
            salaryNumber < parseFloat(this.filters.minSalary)
          ) {
            return false;
          }

          if (
            this.filters.maxSalary &&
            !isNaN(parseFloat(this.filters.maxSalary)) &&
            salaryNumber > parseFloat(this.filters.maxSalary)
          ) {
            return false;
          }
        }
        if (
          this.filters.companyId &&
          job.company_id != this.filters.companyId
        ) {
          return false;
        }
        if (this.filters.location && job.location !== this.filters.location) {
          return false;
        }

        return true;
      });
    },
    resetFilters() {
      this.filters = {
        positionType: '',
        minSalary: '',
        maxSalary: '',
        companyId: '',
        location: '',
      };
      this.searchTerm = '';
      this.jobs = [...this.allJobs];
    },
    // Add debounce function
    debounce(func, wait) {
      let timeout;
      return function () {
        const context = this;
        const args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
      };
    },

    init() {
      this.fetchJobs();
      // Debounce the applyFilters function
      this.debouncedApplyFilters = this.debounce(this.applyFilters, 1000);
    },
  };
}
