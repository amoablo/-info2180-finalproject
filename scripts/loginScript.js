window.onload = function(){
    var httpRequest = new XMLHttpRequest();
    var button = document.getElementById("submit");
    

    button.addEventListener("click",function(el){
        el.preventDefault();
        var url = "scripts/serverLogin.php";
        var email = document.getElementById("mail").value;
        var pword = document.getElementById("pword").value;
        var e = document.getElementById("mail");
        var p = document.getElementById("pword");

        if(email == ""){
            color(el,e);
            httpRequest.abort();
        }
        if(pword == ""){
            color(el,p);
        }
        else{
            validMail(email,el,p)
        }
        
            httpRequest.open('POST',url);
            httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            httpRequest.send("mail="+email+"&pword="+pword);
            httpRequest.onreadystatechange = function(){
                if (httpRequest.readyState == this.DONE && httpRequest.status == 200){
                        var response = httpRequest.responseText;
                        console.log(response);
                        if (response === "Valid_User"){
                            alert("Welcome");
                            content.load("dashboard.php");
                        }
                        else{
                            alert("error");
                            }

                            return;
                    } 
            }
    });


    function color(el,x){
        el.preventDefault(); 
        x.style.backgroundColor = "red";
        
    }

    function validMail(value,el,x){
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
        if ((pattern.test(value)) == false){
            color(el,x);
            error+=1;
        }
    }
}
