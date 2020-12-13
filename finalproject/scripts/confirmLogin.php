<?php

session_start();

require_once "scriptsfunctions.php";
require_once "login_dbconfig.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = filter_var(addslashes($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = md5(filter_var($_POST['password'],  FILTER_SANITIZE_STRING));
    $sql = " SELECT * FROM users WHERE email = ? AND password = ? ";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $num_row = mysqli_num_rows($result);
        if($num_row == 1){
            echo "Admin Login - SUCCESSFUL.";
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            echo "Valid_User";
        }else{
			$_SESSION['message'] = "Error. Please check your login credentials or consult a system adminsitrator.";
            echo "Error";
        }

}

?>