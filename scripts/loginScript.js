window.onload = function(){
    hideLeft();
    var httpRequest = new XMLHttpRequest();
    var email = document.getElementById("mail").value;
    var pword = document.getElementById("pword").value;
    var login_button = document.getElementById("submit_myform");
    
    login_button.onclick = checkLogin();

    function checkLogin() {
        // el.preventDefault();
        var url = "scripts/serverLogin.php";
        //alert(pword);
        // var e = document.getElementById("mail");
        // var p = document.getElementById("pword");

        // if(email == ""){
        //     color(el,e);
        //     httpRequest.abort();
        // }
        // else if(pword == ""){
        //     color(el,p);
        // }
        // validMail(email,el,p)

        httpRequest.onreadystatechange = doLogin();
        httpRequest.open('POST',url);
        httpRequest.send("email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(pword));
        

    }

function doLogin() {
    if (httpRequest.readyState == this.DONE){
        if (httpRequest.status == 200) {
            var response = httpRequest.responseText;
            console.log(response);
            if (response){
                alert("Welcome");
                mainContent.load("dashboard.php");
            }
            else{
                alert("error");
                }
            } 
        } 
    }

    // function color(el,x){
    //     el.preventDefault(); 
    //     x.style.backgroundColor = "red";
        
    // }

    // function validMail(value,el,x){
    // var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
    // if ((pattern.test(value)) == false){
    //     color(el,x);
    // }
    // }
}

function hideLeft(){
    document.getElementById("leftside").style.display = "none";
}