<?php
header("Access-Control-Allow-Origin: *");
$host = 'localhost';
$username = 'finalproject_user';
$password = 'password123';
$dbname = 'BugDB';

    //sanitize and escape information form input fields
    $pword = filter_var($_REQUEST['pword'],  FILTER_SANITIZE_STRING);
    $email = filter_var(addslashes($_REQUEST['mail']), FILTER_SANITIZE_EMAIL);


    //check to ensure that no field is empty
    if(empty($email) || empty($pword)){
        exit("Could not connect to the database, field is empty" );
    }

    //check to ensure that numbers arent entered for email
    if(is_numeric($email)){
        exit("Could not connect to the database, field contains none integr type:");
    }
    
    //connect to database
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        
        
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    //retrive the desired information from the mysql database
    /*
    $stmt= $conn->query("SELECT * FROM users WHERE password = pword AND email= email");
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);*/

    $stmt = $conn->prepare("SELECT * FROM Users WHERE email LIKE :email");
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $result= $stmt -> fetchall();

    $val = false;
    //check to ensure user was found and password matches
   
    
    foreach($result as $row){

        if (password_verify($pword,$row['password']) == true && $email == $row['email']) {
            session_start();
            $_SESSION['user'] = $row['firstname'];
            $_SESSION['time'] = time();
            echo "Valid_User";
            
                }else{
                    echo "Invalid_password";
                } 
        }
       
?>