<?php
$host = 'localhost';
$dbname = 'zjdlpcmy_life_admin';
$username = 'zjdlpcmy_root';
$password = 'Sunnah6000';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>
