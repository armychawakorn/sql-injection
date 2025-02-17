<?php
require_once '../connection.php';

if (!isset($_POST['name']) || !isset($_POST['email'])) {
    echo "Name and email are required";
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')";
$pdo->exec($sql);

echo "User created successfully";
// show all data as a table
$sql = "SELECT * FROM users";
$users = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
foreach ($users as $user) {
    echo "<tr>";
    echo "<td>" . $user['id'] . "</td>";
    echo "<td>" . $user['name'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "</tr>";
}
