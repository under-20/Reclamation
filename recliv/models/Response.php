<?php
class Response
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all responses for a specific claim
    public function getAllForClaim($claim_id)
    {
        $query = "SELECT * FROM responses WHERE claim_id = :claim_id ORDER BY created_at ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':claim_id', $claim_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single response by ID
    public function getById($id)
    {
        $query = "SELECT * FROM responses WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new response
    public function create($claim_id, $content)
    {
        $query = "INSERT INTO responses (claim_id, content) VALUES (:claim_id, :content)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':claim_id', $claim_id);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    // Update an existing response
    public function update($id, $content)
    {
        $query = "UPDATE responses SET content = :content WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete a response
    public function delete($id)
    {
        $query = "DELETE FROM responses WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
