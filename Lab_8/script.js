

// fetching data from dummy json data website
const fetchData = async () => {
    const URL = "https://dummyjson.com/posts";
    try {
        const response = await fetch(URL);
        if (!response.ok) {
            throw new Error(`Error! status: ${response.status}`);
        }
        const data = await response.json();
        console.log("data: ", data.posts)
        return data.posts;
    } catch (error) {
        console.error("Failed to fetch data:", error);
        return [];
    }
};

// Generating random color
const randomColor = () => {
    let random1 = Math.floor(Math.random() * 256);
    let random2 = Math.floor(Math.random() * 256);
    let random3 = Math.floor(Math.random() * 256);
    return `rgb(${random1}, ${random2}, ${random3})`;
}

const generateCard = (post) => {
    // Generate random colors for this card
    const borderColor = randomColor();
    const titleColor = randomColor();
    const heartColor = randomColor();

    // Generate random badges for tags using same randomColor function
    const tags = post.tags;
    const tagBadges = tags.map(tag => {
        const badgeColor = randomColor();
        return `<span class="badge" style="background-color: ${badgeColor}; color: white;">${tag}</span>`;
    }).join('');

    return `<div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="card shadow h-100 rounded-3 card-hover" style="border: 3px solid ${borderColor}; transition: transform 0.2s;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title" style="color: ${titleColor};">${post.title}</h5>
                <p class="card-text mb-3">${post.body}</p>
                <!-- Tags -->
                <div class="d-flex flex-wrap gap-2 mb-3">
                    ${tagBadges}
                </div>
                <!-- Reactions -->
                <div class="d-flex flex-column flex-sm-row gap-3 mb-3">
                    <span class="text-success"><i class="fas fa-thumbs-up"></i> ${post.reactions?.likes || Math.floor(Math.random() * 200)}</span>
                    <span class="text-danger"><i class="fas fa-thumbs-down"></i> ${post.reactions?.dislikes || Math.floor(Math.random() * 50)}</span>
                    <span style="color: ${heartColor};"><i class="fas fa-heart"></i> ${Math.floor(Math.random() * 100)}</span>
                </div>
                <!-- Info -->
                <div class="d-flex flex-column flex-sm-row gap-3 mt-auto">
                    <span class="text-muted"><i class="fas fa-id-badge"></i> ID: ${post.id}</span>
                    <span class="text-muted"><i class="fas fa-user"></i> User: ${post.userId}</span>
                    <span class="text-muted"><i class="fas fa-eye"></i> ${post.views || Math.floor(Math.random() * 500)}</span>
                </div>
            </div>
        </div>
    </div>
    <style>
    .card-hover:hover {
        transform: scale(1.05);
        z-index: 2;
    }
    </style>`;
}

const createLayout = () => {
    const headingColor = randomColor();
    const paragraphColor = randomColor();
    const refreshColor = randomColor();

    return `
        <div class="col-12 mb-5">
            <div class="text-center">
                <h1 class="display-4 mb-3 fw-bold" style="color: ${headingColor};">Blog Posts</h1>
                <p class="lead fw-bold" style="color: ${paragraphColor};">Discover amazing stories and insights from our community</p>
                <p class="lead fw-bold" style="color: ${refreshColor};"><small>Refresh to change color</small></p>
            </div>
        </div>
    `;
}

// Main Module to call all functions
const mainModule = async () => {

    try {
        const posts = await fetchData();
        const container = document.getElementById('blog-container');

        if (!container) {
            console.error('Blog container not found!');
            return;
        }

        // creating layout
        container.innerHTML = createLayout();

        // displaying cards
        posts.forEach(post => {
            const card = generateCard(post);
            container.innerHTML += card;
        });

        console.log('Posts loaded:', posts.length);
    } catch (error) {
        console.error('Error in main module:', error);
    }
};

// Entry point
document.addEventListener('DOMContentLoaded', mainModule);