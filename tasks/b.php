<?php
require_once '../connection.php';

if (!isset($_GET['id'])) {
    echo "No ID provided";
    exit;
}

$id = $_GET['id'];
// $id = intval($id); // คำตอบ

$sql = "SELECT * FROM users WHERE id = $id"; // Still vulnerable!
$user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

echo "<h1>User Details</h1>";
echo "<p>ID: " . $user['id'] . "</p>";
echo "<p>Name: " . $user['username'] . "</p>";
echo "<p>Email: " . $user['email'] . "</p>";
