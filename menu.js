// Sample data for menu items with background images
const menuItemsWithImages = {
    appetizers: [
        { name: 'Chhoila', price: 'Rs. 350', image: 'path/to/caprese-salad.jpg' },
        { name: 'Chatamari', price: 'Rs. 325', image: 'path/to/garlic-bread.jpg' },
        { name: 'Mo:Mo', price: 'Rs. 290', image: 'path/to/bruschetta.jpg' }
    ],
    mainCourses: [
        { name: 'Thakali Khana Set', price: 'Rs. 550', image: 'path/to/spaghetti-carbonara.jpg' },
        { name: 'Chicken Parmesan', price: '$14.99', image: 'path/to/chicken-parmesan.jpg' },
        { name: 'Steak Florentine', price: '$19.99', image: 'path/to/steak-florentine.jpg' }
    ],
    desserts: [
        { name: 'Tiramisu', price: '$7.99', image: 'path/to/tiramisu.jpg' },
        { name: 'Cheesecake', price: '$6.99', image: 'path/to/cheesecake.jpg' },
        { name: 'Gelato', price: '$5.99', image: 'path/to/gelato.jpg' }
    ]
};

// Populate menu items with background images on the page
document.addEventListener('DOMContentLoaded', () => {
    const appetizersContainer = document.querySelector('#appetizers .items');
    const mainCoursesContainer = document.querySelector('#main-courses .items');
    const dessertsContainer = document.querySelector('#desserts .items');

    function renderItemsWithImages(container, items) {
        items.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.classList.add('item');
            itemElement.style.backgroundImage = `url(${item.image})`; // Set background image
            itemElement.innerHTML = `
                <div class="item-content">
                    <p>${item.name}</p>
                    <p>${item.price}</p>
                </div>
            `;
            container.appendChild(itemElement);
        });
    }

    renderItemsWithImages(appetizersContainer, menuItemsWithImages.appetizers);
    renderItemsWithImages(mainCoursesContainer, menuItemsWithImages.mainCourses);
    renderItemsWithImages(dessertsContainer, menuItemsWithImages.desserts);
});
