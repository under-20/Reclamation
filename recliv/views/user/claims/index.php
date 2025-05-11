<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Claims - User Dashboard</title>
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
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table th,
            table td {
                padding: 12px 15px;
                text-align: left;
                border-bottom: 1px solid #718882;
            }
            table th {
                background-color: #EFE9D5;
                font-weight: 600;
            }
            tr:hover {
                background-color: #FBFBFB;
            }
            .status {
                display: inline-block;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
            }
            .status.open {
                background-color: #EFE9D5;
                color: #497074;
            }
            .status.closed {
                background-color: #FBFBFB;
                color: #718882;
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
                background-color: #497074;
            }
            .btn-view:hover {
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
                background-color: #497074;
            }
            .btn-new {
                margin-bottom: 20px;
                padding: 10px 15px;
                background-color: #497074;
                font-size: 16px;
            }
            .btn-new:hover {
                background-color: #718882;
            }
            .alert {
                padding: 15px;
                margin-bottom: 20px;
                border-radius: 4px;
                border: 1px solid;
            }
            .alert-success {
                background-color: #EFE9D5;
                color: #497074;
                border-color: #497074;
            }
            .alert-error {
                background-color: #FBFBFB;
                color: #718882;
                border-color: #718882;
            }
            .empty-state {
                text-align: center;
                padding: 40px 0;
                color: #718882;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>My Claims</h1>
                <p>View and manage your submitted claims</p>
            </header>

            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php?controller=UserClaim&action=index">My Claims</a>
                <a href="index.php?controller=UserClaim&action=create">Submit New Claim</a>
            </div>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error"><?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <a href="index.php?controller=UserClaim&action=create" class="btn btn-new">Create New Claim</a>

            <?php if (empty($claims)): ?>
                <div class="empty-state">
                    <h3>No claims found</h3>
                    <p>You haven't submitted any claims yet. Click the button above to create your first claim.</p>
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
                                    <a href="index.php?controller=UserClaim&action=show&id=<?= $claim['id'] ?>" class="btn btn-view">View</a>
                                    <a href="index.php?controller=UserClaim&action=edit&id=<?= $claim['id'] ?>" class="btn btn-edit">Edit</a>
                                    <a href="index.php?controller=UserClaim&action=delete&id=<?= $claim['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this claim?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </body>
</html>