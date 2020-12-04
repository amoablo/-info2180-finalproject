window.onload = function(){
    var httpRequest = new XMLHttpRequest();
    var button = document.getElementById("submit");
    

    button.addEventListener("click",function(el){
        el.preventDefault();
        var url = "scripts/serverLogin.php";
        var email = document.getElementById("mail").value;
        var pword = document.getElementById("pword").value;
        var e = document.getElementById("mail");
        var p = document.getElementById("pword")

        if(email == ""){
            color(el,e);
            httpRequest.abort();
        }
        else if(pword == ""){
            color(el,p);
        }
        validMail(email,el,p)

        httpRequest.open('POST',url+"?email="+email+"&password="+pword);
        httpRequest.send();
        httpRequest.onreadystatechange = getMsg();
        

    });

function getMsg() {
    if (httpRequest.readyState == this.DONE){
        if (httpRequest.status == 200) {
            var response = httpRequest.responseText;
            console.log(response);
            if (response == "Valid_User"){
                alert("Welcome");
                mainContent.load("pages/dashboard.php");
            }
            else{
                alert("error");
                }
            } 
        } 
    }

    function color(el,x){
        el.preventDefault(); 
        x.style.backgroundColor = "red";
        
    }

    function validMail(value,el,x){
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
    if ((pattern.test(value)) == false){
        color(el,x);
    }
    }
}