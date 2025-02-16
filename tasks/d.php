<?php
require_once '../connection.php';

if (!isset($_GET['table'])) {
    echo "No table name provided";
    exit;
}

$table_name = $_GET['table'];

$sql = "SELECT * FROM $table_name";
$result = $pdo->query($sql);

foreach ($result as $row) {
    echo "<p>{$row['id']} - {$row['name']} - {$row['email']}</p>";
}