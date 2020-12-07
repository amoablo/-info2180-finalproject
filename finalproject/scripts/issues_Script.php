<?php
session_start();
require_once "./dbconfig.php";

$stmt;

if($_GET["q"] == "all"){
    $stmt = $conn->query("SELECT issues.id, issues.title, issues.type,issues.status, issues.created, users.firstname, users.lastname 
        FROM issues INNER JOIN users ON issues.assigned_to = users.id ");
}else if($_GET["q"] == "open"){
    $stmt = $conn->query("SELECT issues.id, issues.title, issues.type,issues.status, issues.created, users.firstname, users.lastname 
        FROM issues INNER JOIN users ON issues.assigned_to = users.id
    WHERE issues.status = 'OPEN'");
}
else{
    $id = $_SESSION['id'];

    $stmt = $conn->query("SELECT issues.id, issues.title, issues.type,issues.status, issues.created, users.firstname, users.lastname 
        FROM issues INNER JOIN users ON issues.assigned_to = users.id 
    WHERE assigned_to= $id");
}   

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<table class="table-style-three">
<thead>
<tr>
<th>Title</th>
<th>Type</th>
<th>Status</th>
<th>Assigned To</th>
<th>Created</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $row): ?>
    <tr onClick = "OpenIssue(<?= $row['id']; ?>)">
      <td>#<?= $row['id']; ?> <?= $row['title']; ?></td>
      <td><?= $row['type']; ?></td>
      <td id = <?= $row['status']; ?>><?= $row['status']; ?></td>
      <td><?= $row["firstname"] ." ". $row["lastname"] ?></td>
      <td><?= date("Y-m-d", strtotime($row["created"])); ?></td>
  </tr>
  <?php endforeach; ?>
</tbody>
  </table>