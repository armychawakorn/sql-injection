<?php
$host = 'db';
$dbname = 'mydatabase';
$username = 'myuser';
$password = 'mypassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully to MySQL database!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>