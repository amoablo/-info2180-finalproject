<?php session_start();
require_once "scripts/scriptsfunctions.php";?>
<!DOCTYPE html>
<html lang="en" dir="index.php">

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <script src="scripts/scripts.js" type="text/javascript"></script>
</head>

<header>
    <img src="images/bug.png" alt="Main Bug Issue Icon" />
    <h2>BugMe Issue Tracker</h2>
</header>

<div id="option-form">
    <section id="options">
        <div onClick="homePage()">
            <img src="images/home icon.png" alt="Home Icon" />
            <h3>Home</h3>
        </div>
        <div onClick="userAddition(<?php echo $_SESSION["id"]?>)">
            <img src="images/Add user.png" alt="Addition of a User - Icon" />
            <h3>Add User</h3>
        </div>
        <div onClick="issueAddition()">
            <img src="images/issue.svg" alt="New Issue - Icon" />
            <h3>New Issue</h3>
        </div>
		<a href="scripts/logout.php" style="color: black; text-decoration: none;">
        <div>
            <img src="images/logout.svg" alt="Primary Logout - Icon" />
            <h3>Logout</h3>
        </div></a>

    </section>
    <section id="results">

    </section>
</div>