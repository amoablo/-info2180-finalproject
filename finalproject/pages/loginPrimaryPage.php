<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="pages/loginPrimarypage.php">
<head>
    <title>User Log In</title>
    <link rel="stylesheet" typez="text/css" href="../styles/loginPrimarypage.css"/>
	<script src="../scripts/scripts.js" type="text/javascript"></script>
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
        <form action="../scripts/confirmLogin.php" method="post">
            <h1>Login Page</h1>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" class= "form-control" name="email" value="" placeholder="Please enter your email address" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class= "form-control" name="password" value="" placeholder="Please enter your password" autocomplete="off" required>
            </div>
            <input type="submit" class="btn" value="Login">

        </form>

    </div>

 </body>
 </html>