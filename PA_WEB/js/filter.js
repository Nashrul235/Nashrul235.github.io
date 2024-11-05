// js/filter.js

async function fetchMenuData() {
    try {
        const response = await fetch('index.php');
        const menuItems = await response.json();
        displayMenu(menuItems);
    } catch (error) {
        console.error('Error fetching menu data:', error);
    }
}

function displayMenu(menuItems) {
    const menuContainer = document.getElementById('menuContainer');
    menuContainer.innerHTML = '';
    menuItems.forEach(item => {
        const menuCard = `
            <div class="menu-card">
                <img src="${item.image}" alt="${item.title}" class="menu-card-img">
                <h3 class="menu-card-title">- ${item.title} -</h3>
                <p class="menu-card-price">IDR ${item.price.toLocaleString('id-ID')}</p>
                <div class="hover-overlay">Beli Sekarang</div>
            </div>
        `;
        menuContainer.innerHTML += menuCard;
    });
}

function sortMenu(order) {
    const menuContainer = document.getElementById("menuContainer");
    const menuCards = Array.from(menuContainer.getElementsByClassName("menu-card"));

    // Sort menuCards based on price
    menuCards.sort((a, b) => {
        const priceA = parseInt(a.getAttribute("data-price"));
        const priceB = parseInt(b.getAttribute("data-price"));
        
        return order === "asc" ? priceA - priceB : priceB - priceA;
    });

    // Clear the container and re-append sorted cards
    menuContainer.innerHTML = "";
    menuCards.forEach(card => menuContainer.appendChild(card));

    // Highlight the lowest or highest priced item with a different image
    if (menuCards.length > 0) {
        const highlightedCard = order === "asc" ? menuCards[0] : menuCards[menuCards.length - 1];
        const imageElement = highlightedCard.querySelector(".menu-card-img");
        
        // Change image src based on the sorting order
        imageElement.src = order === "asc" ? "img/gelato_lowest.jpg" : "img/gelato_highest.jpg";
    }
}

