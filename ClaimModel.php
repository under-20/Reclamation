<?php
class ClaimModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getClaimsBySubject($subjectId) {
        $stmt = $this->db->prepare("SELECT * FROM recliv_claims WHERE subject_id = ?"); // Changement de table
        $stmt->execute([$subjectId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function createClaim($subjectId, $content) {
        // Ajout du statut 'open' par défaut
        $stmt = $this->db->prepare("INSERT INTO recliv_claims (subject_id, content, status) VALUES (?, ?, 'open')"); //  Changement de table + statut
        return $stmt->execute([$subjectId, $content]);
    }
}
?>