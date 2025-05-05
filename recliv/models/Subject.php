<?php
class Subject
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Get all subjects
    public function getAll()
    {
        $query = "SELECT * FROM subjects ORDER BY title";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single subject by ID
    public function getById($id)
    {
        $query = "SELECT * FROM subjects WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
