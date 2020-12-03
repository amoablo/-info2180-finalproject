<?php

$host = 'localhost';
$username = 'finalproject_user';
$password = 'password123';
$dbname = 'BugDB';

    //sanitize and escape information form input fields
    $email = filter_var(addslashes($_REQUEST['mail']), FILTER_SANITIZE_EMAIL);
    $password = filter_var($_REQUEST['pword'],  FILTER_SANITIZE_STRING);

    $data = [$email,$password]

    //check to ensure that no field is empty
    foreach ($data as $field){
        if(empty($field)){
            exit("Could not connect to the database, field is empty" );
        }
    }

    //check to ensure that numbers arent entered for email
    if(is_numeric($email)){
        exit("Could not connect to the database, field contains none integr type:");
    }
    
    //connect to database
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        echo "Connected to $dbname database at $host successfully.";
        
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    //retrive the desired information from the mysql database
    $stmt= $conn->query("SELECT email, password FROM users table");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //check to ensure user was found and password matches
    if((sizeof($results)) < 1){
        echo "User not found";
    }else{
            if (password_verify($password,$result["password"])) {
                session_start();
                $_SESSION['user'] = $result['email'];
                $_SESSION['time'] = time();
                echo "Valid_User";
            }
            else{
                echo "Invalid_password"
            }
        }
       
  