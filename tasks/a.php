<?php
// Include the database connection
require_once '../connection.php';

$username = $_GET['username'] ?? '';

// Use proper parameter binding
$sql = "SELECT id, username, email, created_at FROM users WHERE username = '" . $username . "'";
$users = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if (count($users) > 0) {
    // Show the data as a table with escaped output
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Created At</th></tr>";
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user['id']) . "</td>";
        echo "<td>" . htmlspecialchars($user['username']) . "</td>";
        echo "<td>" . htmlspecialchars($user['email']) . "</td>";
        echo "<td>" . htmlspecialchars($user['created_at']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No user found";
}