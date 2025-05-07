<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Claim - Admin Dashboard</title>
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
            .claim-card {
                background-color: #f9f9f9;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                margin-bottom: 20px;
            }
            .claim-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
                padding-bottom: 10px;
            }
            .claim-subject {
                font-weight: 600;
                color: #2C3E50;
            }
            .claim-date {
                color: #777;
                font-size: 0.9em;
            }
            .claim-content {
                margin-bottom: 20px;
                line-height: 1.7;
            }
            .claim-status {
                display: inline-block;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
                margin-bottom: 15px;
            }
            .claim-status.open {
                background-color: #e1f5fe;
                color: #0288d1;
            }
            .claim-status.closed {
                background-color: #e8f5e9;
                color: #388e3c;
            }
            .status-form {
                margin: 20px 0;
                padding: 15px;
                background-color: #f1f5fd;
                border-radius: 8px;
            }
            .status-form label {
                margin-right: 10px;
                font-weight: 600;
            }
            .btn {
                display: inline-block;
                color: white;
                padding: 8px 15px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                font-size: 14px;
                transition: background-color 0.3s;
            }
            .btn-back {
                background-color: #6c757d;
                margin-right: 10px;
            }
            .btn-back:hover {
                background-color: #5a6268;
            }
            .btn-respond {
                background-color: #2C3E50;
            }
            .btn-respond:hover {
                background-color: #1a252f;
            }
            .btn-status {
                background-color: #4A6FDC;
                margin-left: 10px;
            }
            .btn-status:hover {
                background-color: #345BBD;
            }
            .btn-edit {
                background-color: #FFA000;
            }
            .btn-edit:hover {
                background-color: #FF8F00;
            }
            .btn-delete {
                background-color: #F44336;
            }
            .btn-delete:hover {
                background-color: #D32F2F;
            }
            .btn-group {
                margin-top: 20px;
                margin-bottom: 30px;
            }
            .responses-section {
                margin-top: 40px;
            }
            .response-card {
                background-color: #f0f4f8;
                border-left: 4px solid #2C3E50;
                padding: 15px;
                margin-bottom: 15px;
                border-radius: 4px;
            }
            .response-header {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
            }
            .response-date {
                color: #777;
                font-size: 0.9em;
            }
            .response-content {
                line-height: 1.6;
                margin-bottom: 10px;
            }
            .response-actions {
                display: flex;
                justify-content: flex-end;
                gap: 8px;
                margin-top: 10px;
            }
            .no-responses {
                text-align: center;
                padding: 20px;
                background-color: #f0f4f8;
                border-radius: 4px;
                color: #777;
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
                <h1>View Claim
                    <span class="admin-badge">Admin</span>
                </h1>
                <p>Detailed information and responses</p>
            </header>

            <div class="nav-links">
                <a href="index.php?controller=AdminClaim">Admin Home</a>
                <a href="index.php?controller=AdminClaim&action=index">Manage Claims</a>
            </div>

            <?php if (isset($_SESSION['success'])): ?>
                <div
                    class="alert alert-success"><?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="claim-card">
                <div class="claim-header">
                    <div class="claim-subject"><?= htmlspecialchars($claim['subject_title']) ?></div>
                    <div class="claim-date">Submitted:
                        <?= date('F j, Y', strtotime($claim['created_at'])) ?>
                    </div>
                </div>

                <div class="claim-status <?= $claim['status'] ?>"><?= ucfirst($claim['status']) ?></div>

                <div class="claim-content">
                    <p><?= nl2br(htmlspecialchars($claim['content'])) ?></p>
                </div>

                <div class="status-form">
                    <form action="index.php?controller=AdminClaim&action=updateStatus" method="post">
                        <input type="hidden" name="id" value="<?= $claim['id'] ?>">
                        <label for="status">Update Status:</label>
                        <select name="status" id="status">
                            <option value="open" <?= $claim['status'] == 'open' ? 'selected' : '' ?>>Open</option>
                            <option value="closed" <?= $claim['status'] == 'closed' ? 'selected' : '' ?>>Closed</option>
                        </select>
                        <button type="submit" class="btn btn-status">Update Status</button>
                    </form>
                </div>

                <div class="btn-group">
                    <a href="index.php?controller=AdminClaim&action=index" class="btn btn-back">Back to Claims</a>
                    <a href="index.php?controller=AdminClaim&action=addResponse&claim_id=<?= $claim['id'] ?>" class="btn btn-respond">Add Response</a>
                </div>
            </div>

            <div class="responses-section">
                <h2>Responses</h2>

                <?php if (empty($responses)): ?>
                    <div class="no-responses">
                        <p>No responses have been added to this claim yet.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($responses as $response): ?>
                        <div class="response-card">
                            <div class="response-header">
                                <div class="response-from">Admin Response</div>
                                <div class="response-date"><?= date('F j, Y', strtotime($response['created_at'])) ?></div>
                            </div>
                            <div class="response-content">
                                <p><?= nl2br(htmlspecialchars($response['content'])) ?></p>
                            </div>
                            <div class="response-actions">
                                <a href="index.php?controller=AdminClaim&action=editResponse&id=<?= $response['id'] ?>" class="btn btn-edit">Edit</a>
                                <a href="index.php?controller=AdminClaim&action=deleteResponse&id=<?= $response['id'] ?>&claim_id=<?= $claim['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this response?')">Delete</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="user-link">
                <a href="index.php">Back to User Panel</a>
            </div>
        </div>
    </body>
</html>
