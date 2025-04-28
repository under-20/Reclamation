<?php
class SubjectController {
    // Define properties (e.g., $subjectModel) in the class
    protected $subjectModel;

    public function __construct($subjectModel) {
        $this->subjectModel = $subjectModel;
    }

    public function index() {
        // Corrected method logic
        $subjects = $this->subjectModel->getAllSubjects();
        include('../views/subjects/index.php');
    }

    // Other methods (e.g., for claims)
    public function showClaims() {
        // Récupérer l'ID depuis l'URL
        $subjectId = $_GET['id'] ?? null; 
        $sclaims = $this->subjectModel->getClaimsBySubject($subjectId);
        $this->view('claims/show', ['sclaims' => $sclaims]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->subjectModel->createSubject($_POST['title'], $_POST['description']);
            header("Location: /subjects");
        }
    }
}
?>