<?php

session_start();

require_once "./scriptsfunctions.php";
require_once "./login_dbconfig.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
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
            redirect('../pages/index.php');
        }else{
			$_SESSION['message'] = "Error. Please check your login credentials or consult a system adminsitrator.";
          
            redirect('../pages/loginPrimaryPage.php');
        }

}

 ?>