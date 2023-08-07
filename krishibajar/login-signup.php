
<link rel="stylesheet" href="style/style.css">

<?php include "../krishibajar/bootstrap/unsplashimage.php"?>
<div id="homepage" class="homepage button">Homepage</div>
<div class="buttonsparent">
    
<div id="signupbtn" class="button" onclick="togglefunctionsignup()">signup</div>
<div id="loginbtn" class = "button"onclick ="togglefunctionlogin()">login</div>
</div>
<?php
 class LoginSignup{
    function login(){
        $loginform=require_once "loginform.php";
        
      
    }
function signup(){
   $signupform= require_once "signupform.php";
}

 }



 $loginsignup = new LoginSignup;
 

?>
<div id="bothcontainer" class ="bothcontainer">
    <div class="container1 center">
        <?php
        $loginsignup->signup();
        ?>
    </div>
<div class="container2 center">
<?php

$loginsignup->login();
?>
</div>
</div>
<style>
    *{margin:0;padding:0;box-sizing: border-box;}
.center{
    display:flex;flex-direction: column;
    justify-content: center;
    align-items: center;
    
  
  
}
    .bothcontainer{
       margin:1% 0;
    }
    #signupformcontainer{

        display:none;
    }
    .formparent{
        align-items: center;
        justify-content: center;
    }

  
   form{
    
        display: flex;
        flex-direction: column;
    align-items: center;
    justify-content: center;
    width:inherit;

    text-shadow: 2px 2px 2px 2px black;
    border-radius: 2rem;
   
    
    
    }
    form input{
        width:20em;
        height:4em;
        box-shadow:7px 8px 14px 4px black;
    text-shadow: 2px 2px 2px darkslategrey;
    border-radius: 1rem;
    background:  #00000070;
    color:white;
    
    }
form input::placeholder{
    color:white;
}
  
    .buttonsparent{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .button{
        cursor:pointer;
        width:8em;
        text-align: center;
        font-size: larger;
        background-color: whitesmoke;
    }

    .button:hover{
        border-radius: 1em;
        background:greenyellow;
        color:white;
        transition:0.5s ease-out;

    }

</style>

<?php

require_once"database.php";
$connection = new Database();
if($connection!=mysqli_connect_error()){
    echo"connection success";
    echo $connection->servername;
}

?>
<script>


let signup = document.getElementById("signupbtn");
let login = document.getElementById("loginbtn");
let formlogin = document.getElementById("loginformcontainer");
let formsignup = document.getElementById("signupformcontainer");
let homepage = document.getElementById("homepage");

        homepage.addEventListener("click",function(){
            window.location.href = "index.php";
        });


        function togglefunctionlogin(){
        
            formlogin.style.display = "block";
            formsignup.style.display = "none";
        }
        function togglefunctionsignup(){
            formlogin.style.display = "none";
            formsignup.style.display = "block";
        }

</script>

