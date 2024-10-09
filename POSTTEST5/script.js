// Toggle Dark Mode Based on Time
window.onload = function() {
    const body = document.body;
    const currentHour = new Date().getHours();
  
    // Jika jam antara 18:00 - 6:00, maka aktifkan dark mode
    if (currentHour >= 18 || currentHour < 6) {
      body.classList.add('dark-mode');
      document.getElementById('themeIcon').innerText = 'light_mode';
    } else {
      body.classList.add('light-mode');
      document.getElementById('themeIcon').innerText = 'dark_mode';
    }
  };
  
  // Toggle Hamburger Menu
  function toggleMenu() {
    const navbar = document.getElementById('navbar').querySelector('ul');
    navbar.classList.toggle('active');
  }
  
  // Toggle Login Modal
  function toggleLoginModal() {
    const modal = document.getElementById('loginModal');
    modal.style.display = modal.style.display === 'block' ? 'none' : 'block';
  }
  
  // Close the modal if the user clicks outside of it
  window.onclick = function(event) {
    const modal = document.getElementById('loginModal');
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };
  