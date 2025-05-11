<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Claim - Admin Dashboard</title>
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
            .claim-card {
                background-color: #FBFBFB;
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
                border-bottom: 1px solid #718882;
                padding-bottom: 10px;
            }
            .claim-subject {
                font-weight: 600;
                color: #27445D;
            }
            .claim-date {
                color: #718882;
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
                background-color: #EFE9D5;
                color: #497074;
            }
            .claim-status.closed {
                background-color: #FBFBFB;
                color: #718882;
            }
            .status-form {
                margin: 20px 0;
                padding: 15px;
                background-color: #EFE9D5;
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
                background-color: #718882;
                margin-right: 10px;
            }
            .btn-back:hover {
                background-color: #497074;
            }
            .btn-respond {
                background-color: #497074;
            }
            .btn-respond:hover {
                background-color: #718882;
            }
            .btn-status {
                background-color: #497074;
                margin-left: 10px;
            }
            .btn-status:hover {
                background-color: #718882;
            }
            .btn-edit {
                background-color: #718882;
            }
            .btn-edit:hover {
                background-color: #497074;
            }
            .btn-delete {
                background-color: #27445D;
            }
            .btn-delete:hover {
                background-color: #1a2f3d;
            }
            .btn-group {
                margin-top: 20px;
                margin-bottom: 30px;
            }
            .responses-section {
                margin-top: 40px;
            }
            .response-card {
                background-color: #EFE9D5;
                border-left: 4px solid #497074;
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
                color: #718882;
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
                background-color: #FBFBFB;
                border-radius: 4px;
                color: #718882;
            }
            .alert {
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 4px;
            }
            .alert-success {
                background-color: #EFE9D5;
                color: #497074;
                border: 1px solid #497074;
            }
            .user-link {
                margin-top: 30px;
                text-align: right;
            }
            .user-link a {
                color: #718882;
                text-decoration: none;
            }
            .user-link a:hover {
                text-decoration: underline;
                color: #497074;
            }
        </style>
    </head>
    <body>
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
                <div class="alert alert-success"><?php
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