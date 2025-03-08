// api-service.js
const baseUrl = process.env.NODE_ENV === 'production'
  ? 'https://full-stack-challenge-3ljc.onrender.com'
  : 'http://127.0.0.1:8000';

const ApiService = {
  fetchJobListings() {
    return fetch(`${baseUrl}/joblists`)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      });
  }
};
