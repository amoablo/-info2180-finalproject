<link rel="stylesheet" type="text/css" href="../styles/issuesScreen.css">
<script src="scripts.js" type="text/javascript"></script>
<div id = "heading">
<h1 id = "title">Issues</h1>
<button id = "new_issue" onClick="issueAddition()">Create New Issue</button>
</div>

<div id = "filters">
<p>Filter by:</p>
<button id = "all" onClick="setActive('all')" >ALL</button>
<button id = "open" onClick="setActive('open')">OPEN</button>
<button id = "my_tickets" onClick="setActive('my_tickets')">MY TICKETS</button>
</div>

<div id = 'table'>

</div>