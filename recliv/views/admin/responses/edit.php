<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Response - Admin Dashboard</title>
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
                background-color: #2C3E50;
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
            .admin-badge {
                background-color: #e74c3c;
                color: white;
                padding: 3px 8px;
                border-radius: 3px;
                font-size: 14px;
                margin-left: 10px;
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
                color: #2C3E50;
                text-decoration: none;
                padding: 8px 12px;
                border-radius: 4px;
            }
            .nav-links a:hover {
                background-color: #e1e8fd;
            }
            form {
                background-color: #f9f9f9;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }
            .form-group {
                margin-bottom: 20px;
            }
            label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: #2c3e50;
            }
            textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px;
                height: 150px;
                resize: vertical;
            }
            .btn {
                display: inline-block;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }
            .btn-primary {
                background-color: #2C3E50;
            }
            .btn-primary:hover {
                background-color: #1a252f;
            }
            .btn-cancel {
                background-color: #6c757d;
                margin-right: 10px;
            }
            .btn-cancel:hover {
                background-color: #5a6268;
            }
            .form-actions {
                margin-top: 30px;
            }
            .alert {
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 4px;
            }
            .alert-error {
                background-color: #f8d7da;
                color: #721c24;
            }
            .response-meta {
                color: #777;
                font-size: 0.9em;
                margin-bottom: 15px;
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
                <h1>Edit Response
                    <span class="admin-badge">Admin</span>
                </h1>
                <p>Modify your existing response</p>
            </header>

            <div class="nav-links">
                <a href="index.php?controller=AdminClaim">Admin Home</a>
                <a href="index.php?controller=AdminClaim&action=index">Manage Claims</a>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div
                    class="alert alert-error"><?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="response-meta">
                Original response date:
                <?= date('F j, Y', strtotime($response['created_at'])) ?>
            </div>

            <form action="index.php?controller=AdminClaim&action=updateResponse" method="post">
                <input type="hidden" name="id" value="<?= $response['id'] ?>">
                <input type="hidden" name="claim_id" value="<?= $response['claim_id'] ?>">

                <div class="form-group">
                    <label for="content">Response Content:</label>
                    <textarea name="content" id="content" required><?= htmlspecialchars($response['content']) ?></textarea>
                </div>

                <div class="form-actions">
                    <a href="index.php?controller=AdminClaim&action=show&id=<?= $response['claim_id'] ?>" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Response</button>
                </div>
            </form>
        </div>
    </body>
</html>
