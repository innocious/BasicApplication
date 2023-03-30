<?php

require_once DIR . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];

// Create the MySQL DSN string
$dsn = $_ENV['MYSQL_DSN'];

try{
    // Create a new PDO object and connect to the database
    $conn = new PDO($dsn, $username, $password);

    //Configure PDO error mode
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    // echo "Connected Successfuly";
}
catch ( PDOException $e ){
    echo "Failed to connect: " . $e->getMessage();
}

// Retreive db record
// $stmt = $conn->prepare("SELECT * FROM users");
// $stmt->execute();

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['column1'] . ' ' . $row['column2'] . '<br>';
// }

// Close the connection
// echo "Connection closed";
// $conn = null;