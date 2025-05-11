<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Response - Admin Dashboard</title>
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
                color: #FBFBFB;
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
            .admin-badge {
                background-color: #497074;
                color: #FBFBFB;
                padding: 3px 8px;
                border-radius: 3px;
                font-size: 14px;
                margin-left: 10px;
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
                color: #27445D;
            }
            textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #718882;
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
            .response-meta {
                color: #718882;
                font-size: 0.9em;
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>
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
                <div class="alert alert-error"><?php
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