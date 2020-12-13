<?php

$host = 'localhost';
$username = 'admin@project2.com';
$password = 'password123';
$dbname = 'schema';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>