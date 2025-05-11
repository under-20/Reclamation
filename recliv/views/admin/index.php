<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard - Claims Management</title>
        <link rel="stylesheet" href="../ssets/css/reset.css">
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
            .card {
                background-color: #FBFBFB;
                border-left: 4px solid #497074;
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
                background-color: #497074;
                color: #FBFBFB;
                padding: 8px 15px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                font-size: 15px;
                transition: background-color 0.3s;
            }
            .btn:hover {
                background-color: #718882;
            }
            .btn-group {
                margin-top: 20px;
                display: flex;
                gap: 10px;
            }
            .panel {
                padding: 20px;
                border-radius: 8px;
                background-color: #EFE9D5;
                margin-bottom: 20px;
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
            .portal-links {
                display: flex;
                justify-content: center;
                padding: 15px;
                background-color: #27445D;
                margin-bottom: 20px;
                border-radius: 4px;
            }
            .portal-links a {
                color: #FBFBFB;
                text-decoration: none;
                padding: 10px 20px;
                margin: 0 10px;
                border-radius: 4px;
                background-color: #497074;
            }
            .portal-links a.active {
                background-color: #718882;
                font-weight: bold;
            }
            .portal-links a:hover {
                background-color: #718882;
            }
            .admin-badge {
                background-color: #497074;
                color: #FBFBFB;
                padding: 3px 8px;
                border-radius: 3px;
                font-size: 14px;
                margin-left: 10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            table th,
            table td {
                padding: 10px 15px;
                text-align: left;
                border-bottom: 1px solid #EFE9D5;
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
            .recent-claims {
                margin-top: 30px;
            }
            .empty-state {
                text-align: center;
                padding: 30px;
                color: #718882;
                background-color: #FBFBFB;
                border-radius: 4px;
            }
            .widget-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
            }
            .widget-title {
                font-size: 1.2rem;
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Admin Dashboard
                    <span class="admin-badge">Admin</span>
                </h1>
                <p>Claims Management System Administration</p>
            </header>

            <div class="portal-links">
                <a href="index.php">User Portal</a>
                <a href="index.php?controller=AdminClaim" class="active">Admin Portal</a>
            </div>

            <div class="nav-links">
                <a href="index.php?controller=AdminClaim">Admin Home</a>
                <a href="index.php?controller=AdminClaim&action=index">Manage Claims</a>
                <a href="index.php?controller=AdminClaim&action=stats">Claims Statistics</a>
            </div>

            <section class="panel">
                <h2>Administration Panel</h2>
                <p>Use this dashboard to manage all claims and provide responses to users.</p>

                <div class="card">
                    <h3>Manage Claims</h3>
                    <p>View all submitted claims, update their status, and provide responses.</p>
                    <a href="index.php?controller=AdminClaim&action=index" class="btn">View All Claims</a>
                </div>
            </section>

            <section class="recent-claims">
                <div class="widget-header">
                    <h2 class="widget-title">Recent Claims</h2>
                    <a href="index.php?controller=AdminClaim&action=index" class="btn">View All</a>
                </div>

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
                                        <a href="index.php?controller=AdminClaim&action=show&id=<?= $claim['id'] ?>" class="btn">View & Respond</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </section>
        </div>
    </body>
</html>