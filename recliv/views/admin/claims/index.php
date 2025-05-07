<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Claims Management - Admin Dashboard</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="https://unpkg.com/lucide@latest"></script>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                line-height: 1.6;
                margin: 0;
                padding: 0;
                background-color: #fbfbfb;
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
                background-color: #27445d;
                color: white;
                padding: 1rem;
                text-align: center;
                border-radius: 5px 5px 0 0;
                margin-bottom: 20px;
            }
            h1,
            h2,
            h3 {
                color: #27445d;
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
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table th,
            table td {
                padding: 12px 15px;
                text-align: left;
                border-bottom: 1px solid #e0e0e0;
            }
            table th {
                background-color: #f1f5fd;
                font-weight: 600;
            }
            tr:hover {
                background-color: #f9f9f9;
            }
            .status {
                display: inline-block;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
            }
            .status.open {
                background-color: #e1f5fe;
                color: #0288d1;
            }
            .status.closed {
                background-color: #e8f5e9;
                color: #388e3c;
            }
            .actions {
                display: flex;
                gap: 8px;
            }
            .btn {
                display: inline-block;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                font-size: 14px;
                transition: background-color 0.3s;
            }
            .btn-view {
                background-color: #2C3E50;
            }
            .btn-view:hover {
                background-color: #1a252f;
            }
            .alert {
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 4px;
            }
            .alert-success {
                background-color: #d4edda;
                color: #155724;
            }
            .alert-error {
                background-color: #f8d7da;
                color: #721c24;
            }
            .empty-state {
                text-align: center;
                padding: 40px 0;
                color: #777;
            }
            .user-link {
                margin-top: 30px;
                text-align: right;
            }
            .user-link a {
                color: #777;
                text-decoration: none;
            }
            .user-link a:hover {
                text-decoration: underline;
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
                <h1>Claims Management
                    <span class="admin-badge">Admin</span>
                </h1>
                <p>View and respond to all submitted claims</p>
            </header>

            <div class="nav-links">
                <a href="index.php?controller=AdminClaim">Admin Home</a>
                <a href="index.php?controller=AdminClaim&action=index">Manage Claims</a>
                <a href="index.php?controller=AdminClaim&action=stats">Claims Statistics</a>
            </div>

            <?php if (isset($_SESSION['success'])): ?>
                <div
                    class="alert alert-success"><?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div
                    class="alert alert-error"><?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (empty($claims)): ?>
                <div class="empty-state">
                    <h3>No claims found</h3>
                    <p>There are no claims in the system yet.</p>
                </div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($claims as $claim): ?>
                            <tr>
                                <td><?= $claim['id'] ?></td>
                                <td><?= htmlspecialchars($claim['subject_title']) ?></td>
                                <td><?= htmlspecialchars(substr($claim['content'], 0, 50)) . (strlen($claim['content']) > 50 ? '...' : '') ?></td>
                                <td>
                                    <span class="status <?= $claim['status'] ?>"><?= ucfirst($claim['status']) ?></span>
                                </td>
                                <td><?= date('Y-m-d', strtotime($claim['created_at'])) ?></td>
                                <td class="actions">
                                    <a href="index.php?controller=AdminClaim&action=show&id=<?= $claim['id'] ?>" class="btn btn-view">View & Respond</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="user-link">
                <a href="index.php">Back to User Panel</a>
            </div>
        </div>
    </body>
</html>

