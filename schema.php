<?php

$host = 'localhost';
$username = 'finalproject_user';
$password = 'password123';
$dbname = 'schema';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

?>