<?php

$host = 'localhost';
$username = 'admin@project2.com';
$password = 'password123';
$dbname = 'schema';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
?>