<?php

$host = 'localhost';
$username = 'finalproject_user';
$password = 'password123';
$dbname = 'schema';

    
     //store information from form in variables
     
     $fname = filter_var(addslashes($_REQUEST['fname']),  FILTER_SANITIZE_STRING);
     $lname = filter_var(addslashes($_REQUEST['lname']),  FILTER_SANITIZE_STRING);
     $password = filter_var($_REQUEST['pword'],  FILTER_SANITIZE_STRING);
     $email = filter_var(addslashes($_REQUEST['mail']), FILTER_SANITIZE_EMAIL);
 
     
         // There is at least one upper      // There is at least one number   // There is at least one regular letter  // Length of string is ay least 8
     if(preg_match('/[A-Z]/', $password) && preg_match('/[0-9]/', $password) && preg_match('/[a-z]/', $password) && strlen($password) >= 8 ){
         $hash = password_hash($password,PASSWORD_DEFAULT);
         
     }



    //connect to database
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        echo "Connected to $dbname at $host successfully.";
        
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>