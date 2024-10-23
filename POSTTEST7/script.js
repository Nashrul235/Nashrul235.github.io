const searchResults = document.getElementById('searchResults');
const helmData = [
    { brand: 'KYT', price: 'Rp.750.000', img: 'KYT GALAXY FLAT VSR WHT 1-550x550.png' },
    { brand: 'GM', price: 'Rp.640.000', img: 'image-removebg-preview.png' },
    { brand: 'MLA', price: 'Rp.520.000', img: 'mla.png' },
    { brand: 'Cargloss', price: 'Rp.370.000', img: 'cargloss.png' },
    { brand: 'NHK', price: 'Rp.540.000', img: 'nhk.png' },
    { brand: 'Jitsu', price: 'Rp.1.340.000', img: 'jitsu.png' },
];

function searchHelm() {
    const query = document.getElementById('searchInput').value.toLowerCase();
    const results = helmData.filter(helm => helm.brand.toLowerCase().includes(query));
    displaySearchResults(results);
}

function displaySearchResults(results) {
    searchResults.innerHTML = '';
    if (results.length > 0) {
        const ul = document.createElement('ul');
        results.forEach(helm => {
            const li = document.createElement('li');
            li.innerHTML = `<img src="${helm.img}" alt="${helm.brand}" style="width: 50px;"/> ${helm.brand} - ${helm.price}`;
            ul.appendChild(li);
        });
        searchResults.appendChild(ul);
    } else {
        searchResults.innerHTML = '<p>Tidak ada hasil ditemukan.</p>';
    }
}

function toggleLoginModal() {
    const modal = document.getElementById('loginModal');
    modal.style.display = modal.style.display === 'block' ? 'none' : 'block';
}

window.onclick = function(event) {
    const modal = document.getElementById('loginModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    if (username === '' || password === '') {
        if (username === '') {
            document.getElementById('usernameError').innerText = 'Username tidak boleh kosong';
        }
        if (password === '') {
            document.getElementById('passwordError').innerText = 'Password tidak boleh kosong';
        }
    } else {
        // Simulasi proses login
        document.getElementById('usernameDisplay').innerText = username;
        toggleLoginModal();
        document.getElementById('loginForm').reset();
        clearErrorMessages();
    }
});

function clearErrorMessages() {
    document.getElementById('usernameError').innerText = '';
    document.getElementById('passwordError').innerText = '';
}

function logout() {
    document.getElementById('usernameDisplay').innerText = 'Username';
    alert('Anda telah logout');
}

function toggleTheme() {
    const body = document.body;
    const themeIcon = document.getElementById('themeIcon');
    body.classList.toggle('dark-mode');
    themeIcon.innerText = body.classList.contains('dark-mode') ? 'light_mode' : 'dark_mode';
}

function showHelmPopup(helm) {
    alert(`Anda memilih helm ${helm}.`);
}

function toggleMenu() {
    const navbar = document.getElementById('navbar');
    navbar.classList.toggle('show');
}

function showLogout() {
    const logout = document.getElementById('logout');
    logout.style.display = logout.style.display === 'block' ? 'none' : 'block';
}
