<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard - Claims Management</title>    
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="https://unpkg.com/lucide@latest"></script>
    
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                line-height: 1.6;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
                color: #333;
            }
            .container {
                width: 90%;
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
            header {
                background-color: #4A6FDC;
                color: white;
                padding: 1rem;
                text-align: center;
                border-radius: 5px 5px 0 0;
                margin-bottom: 20px;
            }
            h1,
            h2,
            h3 {
                color: #2c3e50;
            }
            .card {
                background-color: #f9f9f9;
                border-left: 4px solid #4A6FDC;
                padding: 15px;
                margin-bottom: 15px;
                border-radius: 4px;
                transition: transform 0.2s ease-in-out;
            }
            .card:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .btn {
                display: inline-block;
                background-color: #4A6FDC;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }
            .btn:hover {
                background-color: #345BBD;
            }
            .btn-group {
                margin-top: 20px;
                display: flex;
                gap: 10px;
            }
            .panel {
                padding: 20px;
                border-radius: 8px;
                background-color: #e9eefa;
                margin-bottom: 20px;
            }
            .nav-links {
                display: flex;
                justify-content: space-between;
                background-color: #f1f5fd;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .nav-links a {
                color: #4A6FDC;
                text-decoration: none;
                padding: 8px 12px;
                border-radius: 4px;
            }
            .nav-links a:hover {
                background-color: #e1e8fd;
            }
            .portal-links {
                display: flex;
                justify-content: center;
                padding: 15px;
                background-color: #345BBD;
                margin-bottom: 20px;
                border-radius: 4px;
            }
            .portal-links a {
                color: white;
                text-decoration: none;
                padding: 10px 20px;
                margin: 0 10px;
                border-radius: 4px;
                background-color: #5A7FDC;
            }
            .portal-links a.active {
                background-color: #2C3E50;
                font-weight: bold;
            }
            .portal-links a:hover {
                background-color: #6A8FEC;
            }
        </style>
    </head>
    <body>

    <nav class="navbar">
        <div class="container">
            <a href="index.html" class="logo">
                <img src="alivre.png" alt="Le Alivre">
            </a>
            
            <div class="nav-links">
                <a href="#categories">Categories</a>
                <a href="#new-releases">New Releases</a>
                <a href="#bestsellers">Bestsellers</a>
                <a href="#deals">Deals</a>
            </div>

            <div class="nav-actions">
                <button class="icon-button" onclick="toggleSearch()">
                    <i data-lucide="search"></i>
                </button>
                <a href="#wishlist" class="icon-button">
                    <i data-lucide="heart"></i>
                </a>
                <a href="cart.html" class="icon-button cart-icon">
                    <i data-lucide="shopping-cart"></i>
                    <span class="cart-count">3</span>
                </a>
                <a href="admin.html" class="icon-button">
                    <i data-lucide="user"></i>
                </a>
                <button class="menu-button" onclick="toggleMenu()">
                    <i data-lucide="menu"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Search Bar -->
    <div id="searchBar" class="search-bar">
        <div class="container">
            <input type="text" placeholder="Search for books, authors, or ISBN...">
            <button><i data-lucide="search"></i></button>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <h1>Discover Your Next<br>Great Read</h1>
            <p>Explore our vast collection of books across all genres. 
               From bestsellers to rare finds, we have something for every reader.</p>
            <div class="hero-buttons">
                <button class="btn primary">
                    Browse Collection
                    <i data-lucide="chevron-right"></i>
                </button>
                <button class="btn secondary">Today's Deals</button>
            </div>
        </div>
    </section>

    <!-- Featured Books -->
<section class="featured-books">
    <div class="container">
        <div class="section-header">
            <h2>Featured Books</h2>
            <div class="filter-buttons">
                <button class="filter-btn">
                    <i data-lucide="trending-up"></i> Trending
                </button>
                <button class="filter-btn">
                    <i data-lucide="clock"></i> New Releases
                </button>
            </div>
        </div>
        <div class="books-grid">
        

        </div>
    </div>
</section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <h2>Stay Updated</h2>
            <p>Subscribe to our newsletter and get notified about new releases, exclusive deals, and reading recommendations.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email">
                <button type="submit" class="btn primary">Subscribe</button>
            </form>
        </div>
    </section>

    <script>
        function toggleSearch() {
            document.getElementById('searchBar').classList.toggle('active');
        }

        function toggleMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
        }

        // Initialize Lucide Icons
        lucide.createIcons();
    </script>

        <div class="container">
            <header>
                <h1>User Dashboard</h1>
                <p>Welcome to the Claims Management System</p>
            </header>

            <div class="portal-links">
                <a href="index.php" class="active">User Portal</a>
                <a href="index.php?controller=AdminClaim">Admin Portal</a>
            </div>

            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php?controller=UserClaim&action=index">My Claims</a>
                <a href="index.php?controller=UserClaim&action=create">Submit New Claim</a>
            </div>

            <section class="panel">
                <h2>Quick Access</h2>
                <p>Use this dashboard to manage your claims and check responses from administrators.</p>

                <div class="card">
                    <h3>My Claims</h3>
                    <p>View and manage all your submitted claims.</p>
                    <a href="index.php?controller=UserClaim&action=index" class="btn">View My Claims</a>
                </div>

                <div class="card">
                    <h3>Submit New Claim</h3>
                    <p>Create a new claim regarding any subject.</p>
                    <a href="index.php?controller=UserClaim&action=create" class="btn">Create Claim</a>
                </div>
            </section>
        </div>
    </body>
</html>

