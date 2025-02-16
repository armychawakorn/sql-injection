<?php

try {
    // Database connection
    $host = 'db';
    $dbname = 'mydatabase';
    $username = 'myuser';
    $password = 'mypassword';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table
    $createTableSQL = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($createTableSQL);
    echo "Users table created successfully!\n";

    // Insert mock data
    $mockUsers = [
        [
            'username' => 'john_doe',
            'email' => 'john@example.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT)
        ],
        [
            'username' => 'jane_smith',
            'email' => 'jane@example.com',
            'password' => password_hash('password456', PASSWORD_DEFAULT)
        ],
        [
            'username' => 'mike_wilson',
            'email' => 'mike@example.com',
            'password' => password_hash('password789', PASSWORD_DEFAULT)
        ]
    ];

    $insertSQL = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($insertSQL);

    foreach ($mockUsers as $user) {
        $stmt->execute($user);
    }

    echo "Mock data inserted successfully!\n";

    // show all data as a table
    $selectSQL = "SELECT * FROM users";
    $stmt = $pdo->prepare($selectSQL);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th><th>Created At</th></tr>";
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['username'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>" . $user['password'] . "</td>";
        echo "<td>" . $user['created_at'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
