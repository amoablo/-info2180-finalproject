<?php

require_once "./scriptsfunctions.php";
session_start();

if(isset($_SESSION['id'])){
	session_unset();
    session_destroy();
    session_start();
}

redirect("../pages/loginPrimarypage.php");

 ?>