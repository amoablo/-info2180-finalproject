window.onload = function(){
    var httpRequest = new XMLHttpRequest();
    var button = document.getElementById("submit");
    

    button.addEventListener("click",function(el){
        el.preventDefault();
        var url = "scripts/serverLogin.php";
        var email = document.getElementById("mail").value;
        var pword = document.getElementById("pword")
        isEmpty(email,el);
        isEmpty(pword,el)
        validMail(email,el)

        httpRequest.open('POST',url+"?email="+email+"&password="+pword);
        httpRequest.send();
        httpRequest.onreadystatechange = getMsg();
        

    });

function getMsg() {
    if (httpRequest.readyState == XMLHttpRequest.DONE){
        if (httpRequest.status == 200) {
            var response = httpRequest.responseText;
            console.log(response);
            if (response == "Valid_User"){
                alert("Welcome");
                mainContent.load("dashboard.php");
            }
            else{
                alert("error");
                }
            } 
        } 
    }

    function isEmpty(val, el){
        if (val == ""){
            color(val,el);
        }
    }

    function color(val,el){
        val.style.backgroundColor = "red";
            el.preventDefault(); 
    }

    function validMail(value,el){
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
    if ((pattern.test(value)) == false){
        color(val,el);
    }
    }
}