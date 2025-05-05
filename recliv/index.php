<?php
session_start();

// Include controllers
require_once 'controllers/UserClaimController.php';
require_once 'controllers/AdminClaimController.php';

// Simple router
$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Default route for homepage (no controller specified)
if (empty($controller)) {
    // Show the user home page by default
    include 'views/user/index.php';
    exit;
}

// Instantiate the appropriate controller and call the action
try {
    switch ($controller) {
        case 'UserClaim':
            $userClaimController = new UserClaimController();
            if (method_exists($userClaimController, $action)) {
                $userClaimController->$action();
            } else {
                header('Location: index.php?controller=UserClaim&action=index');
            }
            break;

        case 'AdminClaim':
            $adminClaimController = new AdminClaimController();

            // If no action specified, use home by default
            if (empty($action)) {
                $adminClaimController->home();
            } else if (method_exists($adminClaimController, $action)) {
                $adminClaimController->$action();
            } else {
                header('Location: index.php?controller=AdminClaim');
            }
            break;

        default:
            header('Location: index.php');
            break;
    }
} catch (Exception $e) {
    // Simple error handling
    echo '<div class="error">An error occurred: ' . $e->getMessage() . '</div>';
}
?>

