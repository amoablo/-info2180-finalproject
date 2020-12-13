<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="loginPrimaryPage.php">
<head>
    <title>User Log In</title>
    <link rel="stylesheet" type="text/css" href="styles/loginPrimaryPage.css"/>

</head>
<body>

<?php

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
else{
    $message = "";
}
echo $alert = !empty($message) ? $message : "";

 ?>
    <div class="container">
        <form action="scripts/confirmLogin.php" method="post">
            <h1>Login Page</h1>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" class= "form-control" id="email" name="email" placeholder="Please enter your email address" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class= "form-control" id="password" name="password" placeholder="Please enter your password" autocomplete="off" required>
            </div>
            <input type="submit" id="submit" value="Login">

        </form>

    </div>

 </body>
 </html>