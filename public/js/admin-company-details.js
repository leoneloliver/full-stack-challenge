function companyDetailsModal() {
  return {
    isOpen: false,
    company: {},
    jobs: [],
    loading: false,

    openModal(companyData) {
      this.company = companyData;
      this.isOpen = true;
      this.loading = true;

      // Get job listings for specific company id
      this.fetchCompanyJobs(companyData.id);
    },

    closeModal() {
      this.isOpen = false;
      setTimeout(() => {
        this.company = {};
        this.jobs = [];
      }, 300);
    },

    fetchCompanyJobs(companyId) {
      fetch('http://127.0.0.1:8000/joblists')
        .then((response) => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then((data) => {
          // Find the company and get jobs
          const company = data.companies.find((c) => c.id === companyId);
          if (company) {
            this.company = {
              ...this.company,
              ...company,
              about: company.about || this.company.about,
              address: company.address || this.company.address,
            };
            this.jobs = company.joblists || [];
          } else {
            this.jobs = [];
          }
          this.loading = false;
        })
        .catch((error) => {
          console.error('Error fetching company jobs:', error);
          this.jobs = [];
          this.loading = false;
        });
    },

    formatDate(dateString) {
      if (!dateString) return 'N/A';
      const options = { year: 'numeric', month: 'short', day: 'numeric' };
      return new Date(dateString).toLocaleDateString(undefined, options);
    },

    getJobTypes() {
      const typeCount = {};
      this.jobs.forEach((job) => {
        let type = job.position_type;
        type = type.trim();
        type = type.charAt(0).toUpperCase() + type.slice(1).toLowerCase();
        typeCount[type] = (typeCount[type] || 0) + 1;
      });

      return typeCount;
    },
    deleteJob() {
      alert('Job deleted successfully');
    },
  };
}
