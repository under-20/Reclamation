<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create New Claim - User Dashboard</title>
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
            input[type="text"],
            select,
            textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px;
            }
            textarea {
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
                background-color: #4A6FDC;
            }
            .btn-primary:hover {
                background-color: #345BBD;
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
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Create New Claim</h1>
                <p>Submit a new claim for review</p>
            </header>

            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php?controller=UserClaim&action=index">My Claims</a>
                <a href="index.php?controller=UserClaim&action=create">Submit New Claim</a>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div
                    class="alert alert-error"><?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <form action="index.php?controller=UserClaim&action=store" method="post">
                <div class="form-group">
                    <label for="subject_id">Subject:</label>
                    <select name="subject_id" id="subject_id" required>
                        <option value="">-- Select a Subject --</option>
                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject['id'] ?>"><?= htmlspecialchars($subject['title']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Claim Details:</label>
                    <textarea name="content" id="content" placeholder="Enter the details of your claim..." required></textarea>
                </div>

                <div class="form-actions">
                    <a href="index.php?controller=UserClaim&action=index" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit Claim</button>
                </div>
            </form>
        </div>
    </body>
</html>
