<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Claim - User Dashboard</title>
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
                color: #4A6FDC;
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
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>View Claim</h1>
                <p>Detailed information about your claim</p>
            </header>

            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php?controller=UserClaim&action=index">My Claims</a>
                <a href="index.php?controller=UserClaim&action=create">Submit New Claim</a>
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

                <div class="btn-group">
                    <a href="index.php?controller=UserClaim&action=index" class="btn btn-back">Back to Claims</a>
                    <a href="index.php?controller=UserClaim&action=edit&id=<?= $claim['id'] ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?controller=UserClaim&action=delete&id=<?= $claim['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this claim?')">Delete</a>
                </div>
            </div>

            <div class="responses-section">
                <h2>Responses</h2>

                <?php if (empty($responses)): ?>
                    <div class="no-responses">
                        <p>No responses yet for this claim.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($responses as $response): ?>
                        <div class="response-card">
                            <div class="response-header">
                                <div class="response-from">From: Administrator</div>
                                <div class="response-date"><?= date('F j, Y', strtotime($response['created_at'])) ?></div>
                            </div>
                            <div class="response-content">
                                <p><?= nl2br(htmlspecialchars($response['content'])) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>
