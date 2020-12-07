<?php
session_start();
require_once "scriptsfunctions.php";
require_once "login_dbconfig.php";

$insert_mysqli = "INSERT INTO users(firstname, lastname, password, email, date_joined) VALUES (?, ?, ?, ?, ?) ";
$insert_mysqli_stmt = mysqli_prepare($con,$insert_mysqli);


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password= $_POST["password"];
    $email = $_POST["email"];
    date_default_timezone_set("America/Jamaica");
    $date_joined = date_format( new DateTime(),"Y-m-d H:i:s");
    $validName = "/^[A-Z][a-z]+$/";
    $validPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    $check = true;

    if ($firstname === "" || $lastname === "" || $password === "" || $email === ""){
		$check = false;
		setMessage("Please check fields that are empty.");
	}else if((is_numeric($firstname) || is_numeric($lastname) || is_numeric($password) || is_numeric($email))){
		$check = false;
        setMessage("These fields cannot contain only numerical values.");
    }
    else if(!preg_match($validName,$firstname)){
        $check = false;
        setMessage("Please double check your first name.");
    }
    else if(!preg_match($validName,$lastname)){
        $check = false;
        setMessage("Please double check your last name.");
    }
    else if(!preg_match($validPassword,$password)){
        $check = false;
        setMessage("Please double check your password.");
    }

    if($check){
        $x = 'sssss';
        $password = md5($password);
        mysqli_stmt_bind_param($insert_mysqli_stmt, $x, $firstname, $lastname, $password, $email, $date_joined);
        if(mysqli_stmt_execute($insert_mysqli_stmt))
            setMessage("Administrator added a new user.");
        else
          setMessage("User already exists.");  
    }
    echo $_SESSION["message"];

}
 ?>