<?php
require_once "dbconfig.php";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);



$stmt = $conn->query("SELECT users.firstname, users.lastname, users.id FROM `users` ");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
array_shift($results);
array_splice($results, 0, 1);


?>


<link rel="stylesheet" type="text/css" href="../styles/newIssue.css">
<script src="scripts.js" type="text/javascript"></script>
<h1>Create Issue</h1>
<form id = "issue" onsubmit="return submitIssue()">
    <div>
    <label for="Title">Title</label></br>
    <input type="text"name = "Title"></br>
    </div>

    <div>
    <label for="Description">Description</label></br>
    
    <textarea id="Description" name="Description"   class="field field-message"></textarea></br>
    </div>

    <div>
    <label for="Assigned">Assigned to</label></br>
    <select name="Assigned" id=""></br>
     <?php foreach ($results as $row): ?>
    
      <option value=<?= $row['id']?>> <?= $row['firstname'] . " " . $row['lastname']; ?></option>
    <?php endforeach; ?>
    </select>
    </div>

    <div>    
    <label for="Type">Type</label></br>
    <select name = "Type">
        <option value="Bug">Bug</option>
        <option value="Proposal">Proposal</option>
        <option value="Task">Task</option>
    </select>
    </div>

    <div>
    <label for="Priority">Priority</label></br>
    <select name="Priority" id="">
        <option value="Minor">Minor</option>
        <option value="Major">Major</option>
        <option value="Critical">Critical</option>
    </select>
    </div>
    <div>
    <button type="submit" id = "submit">Submit</button>
    </div>
</form>

<div id = "response"></div>