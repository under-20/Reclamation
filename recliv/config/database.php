<?php
$host = 'localhost';
$dbname = 'recliv';
$user = 'root';
$pass = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db; // <-- Ajouter cette ligne
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>