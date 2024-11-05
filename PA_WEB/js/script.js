const navbarNav = document.querySelector
('.navbar-nav');

document.querySelector('#hamburger-menu').
onclick = () => {
    navbarNav.classList.toggle('active');
};


const hamburger = document.querySelector
('#hamburger-menu');

document.addEventListener('click', function(e) {
    if(!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});

function searchMenu() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const menuItems = document.getElementsByClassName("menu-card");

    let found = false;

    for (let i = 0; i < menuItems.length; i++) {
        const title = menuItems[i].getElementsByClassName("menu-card-title")[0].innerText.toLowerCase();
        if (title.includes(input)) {
            menuItems[i].style.display = "block";  // Tampilkan item yang cocok
            found = true;
        } else {
            menuItems[i].style.display = "none";  // Sembunyikan item yang tidak cocok
        }
    }

    // Tampilkan pesan jika tidak ada hasil
    const searchResults = document.getElementById("searchResults");
    if (!found && input !== "") {
        searchResults.innerText = "Menu tidak ditemukan.";
    } else {
        searchResults.innerText = "";
    }
}
