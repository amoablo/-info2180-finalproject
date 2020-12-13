<?php

header("Access-Control-Allow-Origin: *");
$host = 'localhost';
$username = 'finalproject_user';
$pword = 'password123';
$dbname = 'BugDB';


     //sanitize and escape information form input fields
     $fname = filter_var(addslashes($_REQUEST['fname']),  FILTER_SANITIZE_STRING);
     $lname = filter_var(addslashes($_REQUEST['lname']),  FILTER_SANITIZE_STRING);
     $password = filter_var($_REQUEST['pword'],  FILTER_SANITIZE_STRING);
     $email = filter_var(addslashes($_REQUEST['mail']), FILTER_SANITIZE_EMAIL);
 
     $data = [$fname,$lname,$password,$email];

    //check to ensure that no field is empty
    foreach ($data as $field){
        if(empty($field)){
            exit("Could not connect to the database, field is empty:" );
        }
    }

     //validate email
     $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    if (!preg_match($regex, $email)) {
        exit("Could not connect to the database, email address is not valid.");
    }

    //check if numbers are used in the name fields
    if(is_numeric($fname) || is_numeric($lname)){
        exit("Could not connect to the database, invalid type use in name field.");
    }
     
    // There is at least one uppercase      // There is at least one number   // There is at least one lowercase  // Length of string is ay least 8
     if(preg_match('/[A-Z]/', $password) && preg_match('/[0-9]/', $password) && preg_match('/[a-z]/', $password) && strlen($password) >= 8 ){
         
        $data = [$fname,$lname,password_hash($password,PASSWORD_DEFAULT),$email];
     }else{
        exit("Invalid password");
     }
    
    //connect to database
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $pword);
        
        
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    //specifying the fields and the table which the information will be inserted
    $sql = "INSERT INTO users (firstname, lastname, password, email) VALUES (?,?,?,?)";

    //execution of insertion
    $stmt= $conn->prepare($sql);
    $stmt->execute($data);
    echo "success";
?>