// admin-login.js
function adminLoginModal() {
    return {
      isOpen: false,
      username: '',
      password: '',
      error: '',

      openModal() {
        this.isOpen = true;
        this.error = '';
        setTimeout(() => {
          document.getElementById('username').focus();
        }, 100);
      },

      closeModal() {
        this.isOpen = false;
        this.error = '';
        this.username = '';
        this.password = '';
      },

      login() {
        if (this.username === 'admin' && this.password === 'admin') {
          this.isOpen = false;
          localStorage.setItem('isAdminLoggedIn', 'true');
          window.location.href = '/admin';
        } else {
          this.error = 'Invalid username or password';
        }
      }
    };
  }
