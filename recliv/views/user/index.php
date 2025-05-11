<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard - Claims Management</title>   
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
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                text-decoration: none;
                cursor: pointer;
                font-size: 16px;
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
                color: white;
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

            .user-badge {
                background-color: #497074;
                color: #FBFBFB;
                padding: 3px 8px;
                border-radius: 3px;
                font-size: 14px;
                margin-left: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>User Dashboard <span class="user-badge">User</span></h1>
                
                <p>Welcome to the Claims Management System</p>
                
            </header>

            <div class="portal-links">
                <a href="index.php" class="active">User Portal</a>
                <a href="index.php?controller=AdminClaim">Admin Portal</a>
            </div>

            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php?controller=UserClaim&action=index">My Claims</a>
                <a href="index.php?controller=UserClaim&action=create">Submit New Claim</a>
            </div>

            <section class="panel">
                <h2>Quick Access</h2>
                <p>Use this dashboard to manage your claims and check responses from administrators.</p>

                <div class="card">
                    <h3>My Claims</h3>
                    <p>View and manage all your submitted claims.</p>
                    <a href="index.php?controller=UserClaim&action=index" class="btn">View My Claims</a>
                </div>

                <div class="card">
                    <h3>Submit New Claim</h3>
                    <p>Create a new claim regarding any subject.</p>
                    <a href="index.php?controller=UserClaim&action=create" class="btn">Create Claim</a>
                </div>
            </section>
        </div>
    </body>
</html>