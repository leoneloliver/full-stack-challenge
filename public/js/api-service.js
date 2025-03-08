// api-service.js
const ApiService = {
  fetchJobListings() {
    // Use a relative URL - this will work in both environments
    return fetch('/joblists')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      });
  }
};
