// Check if admin is logged in
document.addEventListener('DOMContentLoaded', function () {
  const isLoggedIn = localStorage.getItem('isAdminLoggedIn');
  if (isLoggedIn !== 'true') {
    window.location.href = '/';
  }
});

function companyManagement() {
  return {
    companies: [],
    searchTerm: '',
    loading: true,
    error: null,

    init() {
      this.fetchCompanies();
    },

    fetchCompanies() {
      this.loading = true;
      this.error = null;

      ApiService.fetchJobListings()
        .then((data) => {
          // Process the companies from your API
          this.companies = data.companies.map((company) => ({
            id: company.id,
            name: company.name,
            jobCount: company.joblists ? company.joblists.length : 0,
          }));
          this.loading = false;
        })
        .catch((error) => {
          console.error('Error fetching companies:', error);
          this.error = 'Failed to load companies. Please try again.';
          this.loading = false;
        });
    },

    get filteredCompanies() {
      if (!this.searchTerm) return this.companies;

      const term = this.searchTerm.toLowerCase();
      return this.companies.filter((company) =>
        company.name.toLowerCase().includes(term)
      );
    },
  };
}
