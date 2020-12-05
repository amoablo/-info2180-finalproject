<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO2180 Project 2</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <header>
        <div class="container">
            <nav>
                <p>BugMe Issue Tracker</p>
                <p> User Login </p>
            </nav>
        </div>
    </header>

    <section class="sidenav">
        <a href="#Home">Home</a>
        <a href="#add">Add User</a>
        <a href="#issue">New Issue</a>
        <a href="#out">Logout</a>
    </section>

    <div class="page">
    <?php include('pages/login.php');?>
    </div>
</body>

</html>