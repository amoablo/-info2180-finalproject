<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin@project2.com');
define('DB_PASSWORD', 'password123');
define('DB_NAME', 'schema');


$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($con === true){
	die("Error with connection." . mysqli_connect_error());  
}

?>