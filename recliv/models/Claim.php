<?php
class Claim
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all claims with optional limit
    public function getAll($limit = null)
    {
        $query = "SELECT c.*, s.title as subject_title 
                 FROM claims c 
                 JOIN subjects s ON c.subject_id = s.id 
                 ORDER BY c.created_at DESC";

        // Add limit if specified
        if ($limit !== null && is_numeric($limit)) {
            $query .= " LIMIT :limit";
        }

        $stmt = $this->db->prepare($query);

        // Bind limit parameter if specified
        if ($limit !== null && is_numeric($limit)) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single claim by ID
    public function getById($id)
    {
        $query = "SELECT c.*, s.title as subject_title 
                 FROM claims c 
                 JOIN subjects s ON c.subject_id = s.id 
                 WHERE c.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new claim
    public function create($subject_id, $content)
    {
        $query = "INSERT INTO claims (subject_id, content) VALUES (:subject_id, :content)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':subject_id', $subject_id);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    // Create a new claim and return its ID
    public function createAndReturnId($subject_id, $content)
    {
        $query = "INSERT INTO claims (subject_id, content) VALUES (:subject_id, :content)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':subject_id', $subject_id);
        $stmt->bindParam(':content', $content);

        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    // Update an existing claim
    public function update($id, $content)
    {
        $query = "UPDATE claims SET content = :content WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete a claim
    public function delete($id)
    {
        $query = "DELETE FROM claims WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Change claim status
    public function updateStatus($id, $status)
    {
        $query = "UPDATE claims SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Get statistics of claims grouped by subject
    public function getStatsBySubject()
    {
        $query = "SELECT s.id, s.title as subject_title, 
                 COUNT(c.id) as total_claims,
                 SUM(CASE WHEN c.status = 'open' THEN 1 ELSE 0 END) as open_claims,
                 SUM(CASE WHEN c.status = 'closed' THEN 1 ELSE 0 END) as closed_claims
                 FROM subjects s
                 LEFT JOIN claims c ON s.id = c.subject_id 
                 GROUP BY s.id, s.title
                 ORDER BY total_claims DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

