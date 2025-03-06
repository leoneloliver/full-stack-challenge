// api-service.js
const ApiService = {

    fetchJobListings() {
      return fetch(`http://127.0.0.1:8000/joblists`)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        });
    }
  };
