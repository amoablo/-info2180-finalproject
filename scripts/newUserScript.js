window.onload = function(){
    var btn = document.getElementById("submit");

    btn.addEventListener("click",function(el){
        el.preventDefault();
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("mail").value;
        var pword = document.getElementById("pword").value;
        var f = document.getElementById("fname");
        var l = document.getElementById("lname");
        var e = document.getElementById("mail");
        var p = document.getElementById("pword");

        empty(fname,el,f);
        empty(lname,el,l);

        empty(email,el,e);
        validMail(email,el,e);

        empty(pword,el,p);
        validPassword(pword,el,p);
        var content = document.getElementsByClassName("page")[0];
        var httpRequest = new XMLHttpRequest();
        var url = "scripts/schema.php";
        httpRequest.open('POST',url);
        httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpRequest.send("fname="+fname+"&lname="+lname+"&mail="+email+"&pword="+pword);
        httpRequest.onreadystatechange = function(){   
            if (this.readyState == this.DONE && this.status == 200){
            var response = this.responseText;
            console.log(response);
                if (response === "success"){
                    alert("New User Added");
                    content.load("dashboard.php");
                }
                else{
                    alert("error");
                    }

                    return;
            }else{
                var ms = this.status;
                console.log(ms);} };
        
        

    });
}

function getMsg() {
 
}


function color(el,x){
    el.preventDefault(); 
    x.style.backgroundColor = "red";
    
}


function validPassword(word,el,x){ 
    let pp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{10,}$/;
    if(word.length >= 10){
        if(pp.test(word) != true){
            color(el,x);
        }
    }else{
        alert("Password needs to be at least 10 characters");
        color(el,x);
    }
}

function validMail(value,el,x){
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i;
        if ((pattern.test(value)) == false){
            color(el,x);
            alert("Email address is invalid");
        }
    }


function color(el,x){
    el.preventDefault(); 
    x.style.backgroundColor = "red";   
    }

function empty(val,el,x){
    if(val == ""){
        color(el,x);
    }
}


