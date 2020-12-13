 window.onload = function () {
    homePage();

}

function launchIssue(event) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "scripts/issues_Content.php?q=" + e, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4){
			if(this.status == 200){
				document.getElementById("results").innerHTML = this.responseText;
			}
        }
    };
    //console.log(event);
}

function updateStatus(id, mode) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "scripts/logIssue.php?q=" + mode + "&i=" + id, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4){ 
			if(this.status == 200) {
				document.getElementById("Update").innerHTML = this.responseText;
			}
        }
    };


}


function homePage() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "scripts/issuesScreen.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            

			   document.getElementById("all").classList.add("activeButton");
			   document.getElementById("open").classList.add("passiveButton");
			   document.getElementById("my_tickets").classList.add("passiveButton");
			   var xhttp = new XMLHttpRequest();


			   xhttp.open("GET", "scripts/issuesScreen.php?q=all", true);
			   xhttp.send();

			   document.getElementById("all").addEventListener("click", () => {
			   xhttp.open("GET", "scripts/issuesScreen.php?q=all", true);
			   xhttp.send();
			   
			   });

				document.getElementById("open").addEventListener("click", () => {
					xhttp.open("GET", "issuesScreen.php?q=open", true);
					xhttp.send();

				});

				document.getElementById("my_tickets").addEventListener("click", () => {
					xhttp.open("GET", "scripts/issuesScreen.php?q=my_tickets", true);
					xhttp.send();

				});
			
				xhttp.onreadystatechange = function () {
					if (this.readyState == 4 && this.status == 200){
						document.getElementById("table").innerHTML = this.responseText;
					}
				}
		}
    };

}

function userAddition(user) {
    if (user != "1") {
        return;
    }
	
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "scripts/newUser.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;

        }
    };
}

function issueAddition(){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "scripts/newIssue.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;

        }
    };
}

function logout() {
    

}

function submitIssue() {
    var results = new Formresults();
    results.append("Title", document.getElementsByName("Title")[0].value);
    results.append("Description", document.getElementsByName("Description")[0].value);
    results.append("Type", document.getElementsByName("Type")[0].value);
    results.append("Priority", document.getElementsByName("Priority")[0].value);
    results.append("Assigned", document.getElementsByName("Assigned")[0].value);
	
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "scripts/linkIssue-php.php");
	
    xhr.onload = function (){
        document.getElementById("results").innerHTML = this.responseText;
        
    };
    xhr.send(results);

    return false;
}

function doLogin(){
	
	var xhr = new XMLHttpRequest();
    var results = new FormData();
    results.append("firstname", document.getElementsByName("firstname")[0].value);
    results.append("lastname", document.getElementsByName("lastname")[0].value);
    results.append("password", document.getElementsByName("password")[0].value);
    results.append("email", document.getElementsByName("email")[0].value);

    xhr.open("POST", "scripts/validation.php");
	xhr.onload = function (){
		if(this.responseText == "Administrator added a new user."){
			userAddition("1");
        }
        alert(this.response);
    };
    xhr.send(results);

    return false;
	
}

function setActive(button){
    
    var btn = document.getElementsByClassName("activeButton")[0];
    btn.classList.remove("activeButton");
    btn.classList.add("passiveButton");
    document.getElementById(button).classList.remove("passiveButton");
    document.getElementById(button).classList.add("activeButton");
	
}