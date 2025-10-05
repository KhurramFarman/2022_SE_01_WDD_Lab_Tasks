// Header Navigation JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize scroll-triggered navigation container
    initializeScrollNavigation();
    
    // Initialize hover dropdowns for all dropdowns except category dropdown
    initializeHoverDropdowns();
    
    // Initialize search functionality
    initializeSearchFeatures();
    
    // Initialize responsive navigation
    initializeResponsiveNavigation();
    
    // Initialize mobile sidebar
    initializeMobileSidebar();
});

/**
 * Initialize scroll-triggered navigation container
 * Shows floating navigation at 300px scroll
 */
function initializeScrollNavigation() {
    const scrollNav = document.getElementById('scrollNav');
    const triggerPoint = 300;
    
    if (scrollNav) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset >= triggerPoint) {
                scrollNav.classList.add('show');
            } else {
                scrollNav.classList.remove('show');
            }
        });
    }
}

/**
 * Initialize hover functionality for dropdowns
 * All dropdowns open on hover except the "All Categories" dropdown which remains click-based
 */
function initializeHoverDropdowns() {
    // Get all hover dropdown elements
    const hoverDropdowns = document.querySelectorAll('.hover-dropdown');
    
    hoverDropdowns.forEach(function(dropdown) {
        let hoverTimeout;
        
        // Mouse enter event - show dropdown
        dropdown.addEventListener('mouseenter', function() {
            clearTimeout(hoverTimeout);
            const dropdownMenu = this.querySelector('.dropdown-menu');
            const dropdownToggle = this.querySelector('[data-bs-toggle="dropdown"], .dropdown-toggle, .nav-link');
            
            if (dropdownMenu) {
                dropdownMenu.classList.add('show');
            }
            
            if (dropdownToggle) {
                dropdownToggle.setAttribute('aria-expanded', 'true');
            }
        });
        
        // Mouse leave event - hide dropdown with delay
        dropdown.addEventListener('mouseleave', function() {
            const dropdownMenu = this.querySelector('.dropdown-menu');
            const dropdownToggle = this.querySelector('[data-bs-toggle="dropdown"], .dropdown-toggle, .nav-link');
            
            hoverTimeout = setTimeout(function() {
                if (dropdownMenu) {
                    dropdownMenu.classList.remove('show');
                }
                
                if (dropdownToggle) {
                    dropdownToggle.setAttribute('aria-expanded', 'false');
                }
            }, 200); // 200ms delay to prevent accidental closing
        });
    });
}

/**
 * Initialize search functionality
 * Handles search form submission and category selection
 */
function initializeSearchFeatures() {
    // Handle search form submission
    const searchForm = document.querySelector('.search-wrapper form');
    const searchInput = document.querySelector('.search-input');
    
    if (searchForm && searchInput) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = searchInput.value.trim();
            
            if (searchTerm) {
                // Perform search - replace with actual search functionality
                console.log('Searching for:', searchTerm);
                // Example: window.location.href = '/search?q=' + encodeURIComponent(searchTerm);
            }
        });
        
        // Handle Enter key in search input
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                searchForm.dispatchEvent(new Event('submit'));
            }
        });
    }
    
    // Handle category selection - Fix for All Categories dropdown
    const categoryDropdown = document.querySelector('.category-dropdown');
    if (categoryDropdown) {
        const categoryItems = categoryDropdown.querySelectorAll('.dropdown-item');
        const categoryButton = categoryDropdown.querySelector('.category-btn');
        
        categoryItems.forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const selectedCategory = this.textContent.trim();
                
                if (categoryButton) {
                    // Update button text while preserving Bootstrap dropdown functionality
                    categoryButton.innerHTML = selectedCategory + ' <span class="dropdown-toggle"></span>';
                }
                
                // Store selected category for search
                if (searchForm) {
                    searchForm.setAttribute('data-category', selectedCategory);
                }
                
                console.log('Category selected:', selectedCategory);
                
                // Close dropdown manually
                const dropdownMenu = categoryDropdown.querySelector('.dropdown-menu');
                if (dropdownMenu) {
                    dropdownMenu.classList.remove('show');
                    categoryButton.setAttribute('aria-expanded', 'false');
                }
            });
        });
        
        // Ensure Bootstrap dropdown toggle works
        const dropdownToggle = categoryButton;
        if (dropdownToggle) {
            dropdownToggle.addEventListener('click', function() {
                const dropdownMenu = categoryDropdown.querySelector('.dropdown-menu');
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                if (isExpanded) {
                    dropdownMenu.classList.remove('show');
                    this.setAttribute('aria-expanded', 'false');
                } else {
                    dropdownMenu.classList.add('show');
                    this.setAttribute('aria-expanded', 'true');
                }
            });
        }
    }
}

/**
 * Initialize responsive navigation features
 * Handles mobile menu functionality and responsive behavior
 */
function initializeResponsiveNavigation() {
    // Handle window resize for responsive adjustments
    window.addEventListener('resize', function() {
        const windowWidth = window.innerWidth;
        
        // Close all open dropdowns on mobile when resizing
        if (windowWidth < 768) {
            const openDropdowns = document.querySelectorAll('.dropdown-menu.show');
            openDropdowns.forEach(function(dropdown) {
                dropdown.classList.remove('show');
            });
        }
    });
    
    // Handle click outside dropdowns to close them
    document.addEventListener('click', function(e) {
        const dropdowns = document.querySelectorAll('.dropdown-menu.show');
        
        dropdowns.forEach(function(dropdown) {
            const parentDropdown = dropdown.closest('.dropdown');
            
            // If click is outside the dropdown, close it
            if (parentDropdown && !parentDropdown.contains(e.target)) {
                dropdown.classList.remove('show');
                const toggle = parentDropdown.querySelector('[aria-expanded="true"]');
                if (toggle) {
                    toggle.setAttribute('aria-expanded', 'false');
                }
            }
        });
    });
}

/**
 * Utility function to handle cart functionality
 * Add items to cart and update cart count
 */
function addToCart(productId, quantity = 1) {
    // Get current cart count
    const cartBadge = document.querySelector('.fa-shopping-cart + .badge');
    const currentCount = parseInt(cartBadge.textContent) || 0;
    
    // Update cart count
    cartBadge.textContent = currentCount + quantity;
    
    // Add visual feedback
    cartBadge.style.transform = 'scale(1.3)';
    setTimeout(function() {
        cartBadge.style.transform = 'scale(1)';
    }, 200);
    
    console.log('Product added to cart:', productId, 'Quantity:', quantity);
}

/**
 * Utility function to handle wishlist functionality
 * Add items to wishlist and update wishlist count
 */
function addToWishlist(productId) {
    // Get current wishlist count
    const wishlistBadge = document.querySelector('.fa-heart + .badge');
    const currentCount = parseInt(wishlistBadge.textContent) || 0;
    
    // Update wishlist count
    wishlistBadge.textContent = currentCount + 1;
    
    // Add visual feedback
    wishlistBadge.style.transform = 'scale(1.3)';
    setTimeout(function() {
        wishlistBadge.style.transform = 'scale(1)';
    }, 200);
    
    console.log('Product added to wishlist:', productId);
}

/**
 * Smooth scroll functionality for anchor links
 */
function initializeSmoothScroll() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#' && href.length > 1) {
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

/**
 * Initialize mobile sidebar functionality
 * Handles opening/closing of mobile sidebar and accordion menus
 */
function initializeMobileSidebar() {
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    // Open sidebar
    if (hamburgerBtn && mobileSidebar) {
        hamburgerBtn.addEventListener('click', function() {
            mobileSidebar.classList.add('show');
            document.body.style.overflow = 'hidden'; // Prevent background scroll
        });
    }
    
    // Close sidebar functions
    function closeSidebar() {
        if (mobileSidebar) {
            mobileSidebar.classList.remove('show');
            document.body.style.overflow = ''; // Restore background scroll
        }
    }
    
    // Close sidebar with close button
    if (sidebarClose) {
        sidebarClose.addEventListener('click', closeSidebar);
    }
    
    // Close sidebar with overlay click
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }
    
    // Close sidebar with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileSidebar && mobileSidebar.classList.contains('show')) {
            closeSidebar();
        }
    });
    
    // Handle accordion toggles in sidebar
    const accordionToggles = document.querySelectorAll('.sidebar-nav .accordion-toggle');
    accordionToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            const target = this.getAttribute('data-bs-target');
            const targetElement = document.querySelector(target);
            
            if (targetElement) {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                // Close all other accordions
                accordionToggles.forEach(function(otherToggle) {
                    if (otherToggle !== toggle) {
                        const otherTarget = otherToggle.getAttribute('data-bs-target');
                        const otherTargetElement = document.querySelector(otherTarget);
                        if (otherTargetElement) {
                            otherTargetElement.classList.remove('show');
                            otherToggle.setAttribute('aria-expanded', 'false');
                        }
                    }
                });
                
                // Toggle current accordion
                if (isExpanded) {
                    targetElement.classList.remove('show');
                    this.setAttribute('aria-expanded', 'false');
                } else {
                    targetElement.classList.add('show');
                    this.setAttribute('aria-expanded', 'true');
                }
            }
        });
    });
    
    // Handle category selection in sidebar
    const sidebarCategoryDropdown = document.querySelector('.sidebar-search-section .category-dropdown');
    if (sidebarCategoryDropdown) {
        const categoryItems = sidebarCategoryDropdown.querySelectorAll('.dropdown-item');
        const categoryButton = sidebarCategoryDropdown.querySelector('.category-btn');
        
        categoryItems.forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const selectedCategory = this.textContent.trim();
                
                if (categoryButton) {
                    categoryButton.textContent = selectedCategory;
                }
                
                console.log('Sidebar category selected:', selectedCategory);
                
                // Close dropdown
                const dropdownMenu = sidebarCategoryDropdown.querySelector('.dropdown-menu');
                if (dropdownMenu) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    }
    
    // Handle sidebar search form
    const sidebarSearchForm = document.querySelector('.sidebar-search-section form');
    const sidebarSearchInput = document.querySelector('.sidebar-search-section .search-input');
    
    if (sidebarSearchForm && sidebarSearchInput) {
        sidebarSearchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = sidebarSearchInput.value.trim();
            
            if (searchTerm) {
                console.log('Sidebar search:', searchTerm);
                // Close sidebar after search
                closeSidebar();
            }
        });
    }
    
    // Close sidebar when window is resized to desktop size
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768 && mobileSidebar && mobileSidebar.classList.contains('show')) {
            closeSidebar();
        }
    });
}

// Initialize smooth scroll when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeSmoothScroll);