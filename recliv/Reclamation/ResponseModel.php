<?php
class ResponseModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getResponsesByClaim($claimId) {
        $stmt = $this->db->prepare("SELECT * FROM recliv_responses WHERE claim_id = ?"); // Changement de table
        $stmt->execute([$claimId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function createResponse($claimId, $content) {
        $stmt = $this->db->prepare("INSERT INTO recliv_responses (claim_id, content) VALUES (?, ?)"); //  Changement de table
        return $stmt->execute([$claimId, $content]);
    }
}
?>