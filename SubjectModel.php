<?php
class SubjectModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSubjects() {
        $stmt = $this->db->query("SELECT * FROM recliv_subjects"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createSubject($title, $description) {
        $stmt = $this->db->prepare("INSERT INTO recliv_subjects (title, description) VALUES (?, ?)"); // Changement de table
        return $stmt->execute([$title, $description]);
    }
}
?>