<?php
require_once 'config/database.php';
require_once 'models/Claim.php';
require_once 'models/Subject.php';
require_once 'models/Response.php';
require_once 'utils/Mailer.php'; // Added Mailer class

class UserClaimController
{
    private $db;
    private $claimModel;
    private $subjectModel;
    private $responseModel;
    private $mailer; // Added mailer property

    public function __construct()
    {
        $this->db = require 'config/database.php';
        $this->claimModel = new Claim($this->db);
        $this->subjectModel = new Subject($this->db);
        $this->responseModel = new Response($this->db);
        $this->mailer = new Mailer(); // Initialize the mailer
    }

    // List all claims
    public function index()
    {
        $claims = $this->claimModel->getAll();
        include 'views/user/claims/index.php';
    }

    // Show claim creation form
    public function create()
    {
        $subjects = $this->subjectModel->getAll();
        include 'views/user/claims/create.php';
    }

    // Process claim creation
    public function store()
    {
        // Validate input
        if (
            !isset($_POST['subject_id']) || !isset($_POST['content']) ||
            empty(trim($_POST['content'])) || !is_numeric($_POST['subject_id'])
        ) {
            $_SESSION['error'] = "All fields are required and must be valid.";
            header('Location: index.php?controller=UserClaim&action=create');
            return;
        }

        $subject_id = (int) $_POST['subject_id'];
        $content = trim($_POST['content']);

        // Get the new claim ID (for the email notification)
        $claim_id = $this->claimModel->createAndReturnId($subject_id, $content);

        if ($claim_id) {
            // Get subject title for the email
            $subject = $this->subjectModel->getById($subject_id);
            $subject_title = $subject ? $subject['title'] : 'Unknown Subject';

            // Send email notification - using dummy recipient email for now
            $userEmail = 'daikhi.aya@esprit.tn'; // Dummy email address
            $this->mailer->sendNewClaimNotification($userEmail, $claim_id, $subject_title, $content);

            $_SESSION['success'] = "Claim created successfully.";
            header('Location: index.php?controller=UserClaim&action=index');
        } else {
            $_SESSION['error'] = "Failed to create claim.";
            header('Location: index.php?controller=UserClaim&action=create');
        }
    }

    // Show a specific claim with its responses
    public function show()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=UserClaim&action=index');
            return;
        }

        $id = (int) $_GET['id'];
        $claim = $this->claimModel->getById($id);

        if (!$claim) {
            header('Location: index.php?controller=UserClaim&action=index');
            return;
        }

        $responses = $this->responseModel->getAllForClaim($id);
        include 'views/user/claims/show.php';
    }

    // Show claim edit form
    public function edit()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=UserClaim&action=index');
            return;
        }

        $id = (int) $_GET['id'];
        $claim = $this->claimModel->getById($id);

        if (!$claim) {
            header('Location: index.php?controller=UserClaim&action=index');
            return;
        }

        include 'views/user/claims/edit.php';
    }

    // Process claim update
    public function update()
    {
        if (
            !isset($_POST['id']) || !isset($_POST['content']) ||
            empty(trim($_POST['content'])) || !is_numeric($_POST['id'])
        ) {
            $_SESSION['error'] = "All fields are required and must be valid.";
            header('Location: index.php?controller=UserClaim&action=index');
            return;
        }

        $id = (int) $_POST['id'];
        $content = trim($_POST['content']);

        if ($this->claimModel->update($id, $content)) {
            $_SESSION['success'] = "Claim updated successfully.";
            header('Location: index.php?controller=UserClaim&action=show&id=' . $id);
        } else {
            $_SESSION['error'] = "Failed to update claim.";
            header('Location: index.php?controller=UserClaim&action=edit&id=' . $id);
        }
    }

    // Process claim deletion
    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=UserClaim&action=index');
            return;
        }

        $id = (int) $_GET['id'];

        if ($this->claimModel->delete($id)) {
            $_SESSION['success'] = "Claim deleted successfully.";
        } else {
            $_SESSION['error'] = "Failed to delete claim.";
        }

        header('Location: index.php?controller=UserClaim&action=index');
    }
}
?>

