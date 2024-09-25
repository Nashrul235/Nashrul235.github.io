// Toggle Dark Mode Based on Time
window.onload = function() {
  const body = document.body;
  const currentHour = new Date().getHours();

  // Jika jam antara 18:00 - 6:00, maka aktifkan dark mode
  if (currentHour >= 18 || currentHour < 6) {
      body.classList.add('dark-mode');
  } else {
      body.classList.remove('dark-mode');
  }
};

// Toggle Hamburger Menu
function toggleMenu() {
  const navbar = document.getElementById('navbar').querySelector('ul');
  navbar.classList.toggle('active');
}
