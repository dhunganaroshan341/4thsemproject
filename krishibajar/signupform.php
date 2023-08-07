<div id="signupformcontainer" class="signupform formparent">
    <form action="login-signup.php" id = "signupformform" method ="get">
        <input type="text" name = "name" placeholder=" full name" required><br>
        <input type="text" name = "address" placeholder=" address" required><br>
        
        <input type="text" name = "username" placeholder=" create usrname" required><br>
        <input type="phone" name = "phone" placeholder="phone number Eg:9861787862" required><br>
        <input type="text" name = "email" placeholder=" Email:eg sth@gmail.com" required><br>
        <input type="password" name = "createpassword" placeholder=" new password" id = "createpassword" required><br>
        <input type="password" name = "confirmpassword" placeholder=" confirm password" id = "confirmpassword" required><br>
        <span id="passwordMatchMessage" name></span>
        <input type="submit" value = "submit">
    </form>
</div>
<script>

    let newPasswordInput  =document.getElementById("createpassword");
    
    let confirmPasswordInput  =document.getElementById("confirmpassword");
    let  passwordMatchMessage=document.getElementById('passwordMatchMessage');
    let  passwordForm=document.getElementById("signupformform");
   

  

confirmPasswordInput.addEventListener('input', () => {
   newPassword = newPasswordInput.value;
  confirmPassword = confirmPasswordInput.value;

  if (newPassword === confirmPassword) {
    passwordMatchMessage.textContent = 'Passwords match.';
    passwordMatchMessage.style.color = 'green';
    passwordMatchMessage.style.background = "white";
  } else {
    passwordMatchMessage.textContent = 'Passwords do not match.';
    passwordMatchMessage.style.color = 'red';
    passwordMatchMessage.style.background = "white";
  }
});

passwordForm.addEventListener('submit', (event) => {
  newPassword = newPasswordInput.value;
  confirmPassword = confirmPasswordInput.value;

  if (newPassword !== confirmPassword) {
    event.preventDefault();
    passwordMatchMessage.textContent = 'Passwords do not match.';
    passwordMatchMessage.style.color = 'red';
  }
});


    



</script>


<?php
include "database.php";
$database = new Database;
$conn = $database->getConnection();


// differentfile.php
$name = "";
$address = "";
$createPassword = "";
$phone = "";
$email = "";
$username = ""; // Initialize username
$confirmPassword = ""; // Initialize confirmPassword


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $name = $_GET['name'];
    $username = $_GET['username'];
   $address = $_GET['address'];
   $phone = $_GET['phone'];
   $email = $_GET['email'];
    if (isset($_GET['createpassword']) && isset($_GET['confirmpassword'])) {
        $createPassword = $_GET['createpassword'];
        $confirmPassword = $_GET['confirmpassword'];
    
        // Check and validate passwords here
    }
   
    

    // Process the form data or perform actions as needed   $hashedPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
    // For example, you can validate the passwords and update your database
}
$hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, address, username, phone, email, password_hash)
            VALUES ('$name', '$address', '$username', '$phone', '$email', '$hashedPassword')";

    
$existinguserquery = "SELECT username FROM user";
$existingusername =array();
$result=$conn->query($existinguserquery);
while($row =$result->fetch_assoc()){
  $existingusername[]=$row['username'];
}
$new_username = ".'$username'.";
if(in_array($new_username,$existingusername)){
echo"user already exists";
}
if(!in_array($new_username,$existingusername)){
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>