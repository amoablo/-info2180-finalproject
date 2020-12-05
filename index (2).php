<!DOCTYPE html>
<html>

    <!-- version: 1.5 -->
    <!-- date: 2020-12-4 -->
	<head>
		<meta charset="utf-8">
		<title>Final Project</title>
				
		<link href="styles.css" type="text/css" rel="stylesheet" />
		<script src="scripts/loginScript.js" type="text/javascript"></script>
	</head>
    <body>
            <div id="maindiv">
                <header>
                    <div id="topOfPage">
                        <!--add bug icon and display flex-->
                        <img src="bug.png" id="headericon">
                        <div id="toptext"> BugMe Issue Tracker </div>
                    </div>
                </header>
                <main>
                    <div id="displayside"> 
                        <div id="leftside">
                            <div id="alllinks">
                                <div class="options">   
                                    <!--Add icon then display flex-->
                                    <img src="home icon.png" class="icon">
                                    <a href="#" id="home">Home</a>
                                </div>
                                <div class="options">
                                    <!--Add icon then display flex-->
                                    <img src="Add user.png" class="icon">
                                    <a href="#" id="add">Add User</a>
                                </div>
                                <div class="options">
                                    <!--Add icon then display flex-->
                                    <img src="issue.svg" class="icon">
                                    <a href="#" id="issue">New Issue</a>
                                </div>
                                <div class="options">
                                    <!--Add icon then display flex-->
                                    <img src="logout.svg" class="icon">
                                    <a href="#" id="logout">Logout</a>
                                </div>
                            </div>
                        </div>
                        <div id="rightside">
                            <div id="rightsideleft">
                                <?php include('pages/login.php');?>
                            </div>
                            <!--<div id="rightsideright">
                            </div>-->
                            
                        </div>
                    </div>
                    </div>
                </main>
            </div>
        </body>
</html>