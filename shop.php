<?php
// Include database configuration
include 'db_config.php';

// Get data
$items = getItems($pdo);
$vehicles = getVehicles($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unturned Shop - Items & Vehicles</title>
    <meta name="description"
        content="Browse our extensive collection of in-game items and vehicles. Find the best deals on weapons, equipment, and transportation.">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">Unturned Portal</div>
            <nav id="main-nav">
                <ul>
                    <li><a href="index.html" class="nav-link">Home</a></li>
                    <li><a href="news.html" class="nav-link">News</a></li>
                    <li><a href="shop.php" class="nav-link active">Shop</a></li>
                    <li><a href="leaderboard.php" class="nav-link">Leaderboard</a></li>
                </ul>
            </nav>
            <button class="mobile-nav-toggle" id="mobile-nav-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <main>
        <!-- Shop Header -->
        <section id="shop-header" class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title fade-in-up">Game Shop</h1>
                    <p class="hero-subtitle slide-in-left">Browse our extensive collection of in-game items and
                        vehicles. Find the best deals to enhance your gameplay experience.</p>
                    <div class="hero-buttons">
                        <a href="#items" class="btn btn-primary">Browse Items</a>
                        <a href="#vehicles" class="btn btn-secondary">View Vehicles</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Shop Navigation -->
        <section id="shop-nav" class="shop-navigation">
            <div class="container">
                <div class="shop-nav-tabs">
                    <a href="#items" class="shop-tab active" data-target="items">Items</a>
                    <a href="#vehicles" class="shop-tab" data-target="vehicles">Vehicles</a>
                </div>
            </div>
        </section>

        <!-- Shop Items -->
        <div id="items" class="section bg-grey2">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point">
                            <h2>🛒 Shop Items | PVP Server</h2>
                            <p class="section-description">Browse our collection of weapons, equipment, and supplies to
                                enhance your survival experience.</p>

                            <!-- Search Controls -->
                            <div class="table-controls">
                                <input type="text" class="table-search" placeholder="Search items..." id="itemSearch">
                            </div>

                            <table class="table table-stripped table-hover datatab" id="itemsTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item</th>
                                        <th>Cost</th>
                                        <th>Buyback</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item): ?>
                                    <tr>
                                        <td data-label="ID"><?php echo htmlspecialchars($item['id']); ?></td>
                                        <td data-label="Item"><?php echo htmlspecialchars($item['itemname']); ?></td>
                                        <td data-label="Cost"><?php echo number_format($item['cost']); ?></td>
                                        <td data-label="Buyback"><?php echo number_format($item['buyback']); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shop Vehicles -->
        <div id="vehicles" class="section pvp">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point">
                            <h2>🚗 Shop Vehicles | PVP Server</h2>
                            <p class="section-description">Choose from our selection of vehicles to enhance your
                                mobility and transportation needs.</p>

                            <!-- Search Controls -->
                            <div class="table-controls">
                                <input type="text" class="table-search" placeholder="Search vehicles..."
                                    id="vehicleSearch">
                            </div>

                            <table class="table table-stripped table-hover datatab" id="vehiclesTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Vehicle</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($vehicles as $vehicle): ?>
                                    <tr>
                                        <td data-label="ID"><?php echo htmlspecialchars($vehicle['id']); ?></td>
                                        <td data-label="Vehicle"><?php echo htmlspecialchars($vehicle['vehiclename']); ?></td>
                                        <td data-label="Cost"><?php echo number_format($vehicle['cost']); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shop Info Section -->
        <section class="shop-info-section">
            <div class="container">
                <h2>💡 Shop Information</h2>
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-icon">💰</div>
                        <h3>Pricing</h3>
                        <p>All prices are in-game currency. Buy prices are fixed, while sell prices may vary based on market conditions.</p>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">🚚</div>
                        <h3>Delivery</h3>
                        <p>Items and vehicles are delivered instantly to your inventory upon purchase. No waiting time required.</p>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">🔄</div>
                        <h3>Returns</h3>
                        <p>You can sell items back to the shop at the listed sell price. No questions asked policy.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="footer-section">
                <div class="footer-logo">Unturned Portal</div>
                <p class="footer-description">Your ultimate destination for the best Unturned gaming experience. Join
                    our community today!</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <div class="footer-links">
                                    <a href="index.html">Home</a>
                <a href="news.html">News</a>
                <a href="shop.php">Shop</a>
                <a href="leaderboard.php">Leaderboard</a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Connect With Us</h4>
                <div class="footer-social">
                    <a href="#" aria-label="Facebook"><img
                            src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg"
                            alt="Facebook" class="icon"></a>
                    <a href="#" aria-label="Twitter"><img
                            src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter"
                            class="icon"></a>
                    <a href="#" aria-label="Discord"><img
                            src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/discord.svg" alt="Discord"
                            class="icon"></a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Legal</h4>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Contact</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2024 Unturned Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="shop_sorting.js"></script>
    <script>
        // Mobile Navigation Toggle
        const mobileNavToggle = document.getElementById('mobile-nav-toggle');
        const mainNav = document.getElementById('main-nav');

        mobileNavToggle.addEventListener('click', () => {
            mainNav.classList.toggle('active');
            mobileNavToggle.classList.toggle('active');
        });

        // Close mobile nav when clicking on a link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                mainNav.classList.remove('active');
                mobileNavToggle.classList.remove('active');
            });
        });

        // Shop Tab Navigation
        const shopTabs = document.querySelectorAll('.shop-tab');
        const sections = document.querySelectorAll('.section');

        shopTabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Remove active class from all tabs
                shopTabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked tab
                tab.classList.add('active');
                
                // Show corresponding section
                const target = tab.getAttribute('data-target');
                sections.forEach(section => {
                    if (section.id === target) {
                        section.style.display = 'block';
                        section.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        section.style.display = 'none';
                    }
                });
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.fade-in-up, .slide-in-left').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
            observer.observe(el);
        });

        // Add hover effects to table rows
        document.querySelectorAll('.table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', () => {
                row.style.transform = 'scale(1.01)';
            });
            
            row.addEventListener('mouseleave', () => {
                row.style.transform = 'scale(1)';
            });
        });

        // Add click effects to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Initialize: Show items section by default
        document.getElementById('vehicles').style.display = 'none';
    </script>
</body>

</html> 