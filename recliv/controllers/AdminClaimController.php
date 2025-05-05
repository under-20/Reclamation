<?php
require_once 'config/database.php';
require_once 'models/Claim.php';
require_once 'models/Response.php';
require_once 'models/Subject.php';
require_once 'utils/Mailer.php'; // Added Mailer class

class AdminClaimController
{
    private $db;
    private $claimModel;
    private $responseModel;
    private $subjectModel;
    private $mailer; // Added mailer property

    public function __construct()
    {
        $this->db = require 'config/database.php';
        $this->claimModel = new Claim($this->db);
        $this->responseModel = new Response($this->db);
        $this->subjectModel = new Subject($this->db);
        $this->mailer = new Mailer(); // Initialize the mailer
    }

    // Show admin dashboard with recent claims
    public function home()
    {
        $claims = $this->claimModel->getAll(5); // Get only 5 most recent claims
        include 'views/admin/index.php';
    }

    // List all claims for admin
    public function index()
    {
        $claims = $this->claimModel->getAll();
        include 'views/admin/claims/index.php';
    }

    // Show a specific claim with its responses
    public function show()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $id = (int) $_GET['id'];
        $claim = $this->claimModel->getById($id);

        if (!$claim) {
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $responses = $this->responseModel->getAllForClaim($id);
        include 'views/admin/claims/show.php';
    }

    // Process claim status update
    public function updateStatus()
    {
        if (
            !isset($_POST['id']) || !isset($_POST['status']) || !is_numeric($_POST['id']) ||
            !in_array($_POST['status'], ['open', 'closed'])
        ) {
            $_SESSION['error'] = "Invalid request.";
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $id = (int) $_POST['id'];
        $status = $_POST['status'];

        if ($this->claimModel->updateStatus($id, $status)) {
            $_SESSION['success'] = "Claim status updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update claim status.";
        }

        header('Location: index.php?controller=AdminClaim&action=show&id=' . $id);
    }

    // Display form to add a response
    public function addResponse()
    {
        if (!isset($_GET['claim_id']) || !is_numeric($_GET['claim_id'])) {
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $claim_id = (int) $_GET['claim_id'];
        $claim = $this->claimModel->getById($claim_id);

        if (!$claim) {
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        include 'views/admin/responses/create.php';
    }

    // Process adding a new response
    public function storeResponse()
    {
        if (
            !isset($_POST['claim_id']) || !isset($_POST['content']) ||
            empty(trim($_POST['content'])) || !is_numeric($_POST['claim_id'])
        ) {
            $_SESSION['error'] = "All fields are required and must be valid.";
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $claim_id = (int) $_POST['claim_id'];
        $content = trim($_POST['content']);

        if ($this->responseModel->create($claim_id, $content)) {
            // Get the claim details for the email notification
            $claim = $this->claimModel->getById($claim_id);

            if ($claim) {
                // Send email notification - using dummy recipient email for now
                $userEmail = 'daikhi.aya@esprit.tn'; // Dummy email address
                $this->mailer->sendClaimResponseNotification(
                    $userEmail,
                    $claim_id,
                    $claim['subject_title'],
                    $content
                );
            }

            $_SESSION['success'] = "Response added successfully.";
            header('Location: index.php?controller=AdminClaim&action=show&id=' . $claim_id);
        } else {
            $_SESSION['error'] = "Failed to add response.";
            header('Location: index.php?controller=AdminClaim&action=addResponse&claim_id=' . $claim_id);
        }
    }

    // Display form to edit a response
    public function editResponse()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $id = (int) $_GET['id'];
        $response = $this->responseModel->getById($id);

        if (!$response) {
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        include 'views/admin/responses/edit.php';
    }

    // Process updating a response
    public function updateResponse()
    {
        if (
            !isset($_POST['id']) || !isset($_POST['content']) ||
            empty(trim($_POST['content'])) || !is_numeric($_POST['id']) ||
            !isset($_POST['claim_id']) || !is_numeric($_POST['claim_id'])
        ) {
            $_SESSION['error'] = "All fields are required and must be valid.";
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $id = (int) $_POST['id'];
        $claim_id = (int) $_POST['claim_id'];
        $content = trim($_POST['content']);

        if ($this->responseModel->update($id, $content)) {
            $_SESSION['success'] = "Response updated successfully.";
            header('Location: index.php?controller=AdminClaim&action=show&id=' . $claim_id);
        } else {
            $_SESSION['error'] = "Failed to update response.";
            header('Location: index.php?controller=AdminClaim&action=editResponse&id=' . $id);
        }
    }

    // Display statistics of claims by subject
    public function stats()
    {
        $subjectStats = $this->claimModel->getStatsBySubject();
        include 'views/admin/claims/stats.php';
    }

    // Process deleting a response
    public function deleteResponse()
    {
        if (
            !isset($_GET['id']) || !is_numeric($_GET['id']) ||
            !isset($_GET['claim_id']) || !is_numeric($_GET['claim_id'])
        ) {
            header('Location: index.php?controller=AdminClaim&action=index');
            return;
        }

        $id = (int) $_GET['id'];
        $claim_id = (int) $_GET['claim_id'];

        if ($this->responseModel->delete($id)) {
            $_SESSION['success'] = "Response deleted successfully.";
        } else {
            $_SESSION['error'] = "Failed to delete response.";
        }

        header('Location: index.php?controller=AdminClaim&action=show&id=' . $claim_id);
    }
}
?>

