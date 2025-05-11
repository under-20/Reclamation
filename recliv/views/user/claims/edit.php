<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Claim - User Dashboard</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                line-height: 1.6;
                margin: 0;
                padding: 0;
                background-color: #EFE9D5;
                color: #27445D;
            }
            .container {
                width: 90%;
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
                background-color: #FBFBFB;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
            header {
                background-color: #27445D;
                color: white;
                padding: 1rem;
                text-align: center;
                border-radius: 5px 5px 0 0;
                margin-bottom: 20px;
            }
            h1,
            h2,
            h3 {
                color: #27445D;
            }
            .nav-links {
                display: flex;
                justify-content: space-between;
                background-color: #FBFBFB;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .nav-links a {
                color: #27445D;
                text-decoration: none;
                padding: 8px 12px;
                border-radius: 4px;
            }
            .nav-links a:hover {
                background-color: #EFE9D5;
            }
            form {
                background-color: #FBFBFB;
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
            }
            input[type="text"],
            textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #718882;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px;
            }
            .subject-display {
                font-weight: 600;
                color: #497074;
                padding: 12px;
                background-color: #EFE9D5;
                border-radius: 4px;
                margin-bottom: 20px;
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
                background-color: #497074;
            }
            .btn-primary:hover {
                background-color: #718882;
            }
            .btn-cancel {
                background-color: #718882;
                margin-right: 10px;
            }
            .btn-cancel:hover {
                background-color: #497074;
            }
            .form-actions {
                margin-top: 30px;
            }
            .alert {
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 4px;
                border: 1px solid;
            }
            .alert-error {
                background-color: #FBFBFB;
                color: #718882;
                border-color: #718882;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Edit Claim</h1>
                <p>Modify your existing claim</p>
            </header>

            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php?controller=UserClaim&action=index">My Claims</a>
                <a href="index.php?controller=UserClaim&action=create">Submit New Claim</a>
            </div>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error"><?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <form action="index.php?controller=UserClaim&action=update" method="post">
                <input type="hidden" name="id" value="<?= $claim['id'] ?>">

                <div class="form-group">
                    <label>Subject:</label>
                    <div class="subject-display"><?= htmlspecialchars($claim['subject_title']) ?></div>
                    <p>
                        <em>Note: Subject cannot be changed once a claim is created.</em>
                    </p>
                </div>

                <div class="form-group">
                    <label for="content">Claim Details:</label>
                    <textarea name="content" id="content" required><?= htmlspecialchars($claim['content']) ?></textarea>
                </div>

                <div class="form-actions">
                    <a href="index.php?controller=UserClaim&action=show&id=<?= $claim['id'] ?>" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Claim</button>
                </div>
            </form>
        </div>
    </body>
</html>