<?php
session_start();

$servername = "localhost";
$username = "root"; // MySQL username (default)
$password = "";     // MySQL password (default is blank)
$dbname = "user_accounts"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Retrieve user from database
    $query = "SELECT * FROM users WHERE username = '$input_username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($input_password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedin_time'] = time();
            $_SESSION['expiration'] = 5 * 60 * 60; // 5 hours in seconds

            echo "<p>Login successful! Welcome, " . $user['username'] . "!</p>";
        } else {
            echo "<p>Invalid password.</p>";
        }
    } else {
        echo "<p>User not found.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: #1a1a1a;
            font-family: 'Helvetica', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #2d2d2d;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .login-container h2 {
            color: #b30000;
            margin-bottom: 20px;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #4d4d4d;
            border-radius: 3px;
            background-color: #383838;
            color: #ccc;
        }
        .login-form button {
            background-color: #990000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #800000;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Login Form -->
        <h2>Login Form</h2>
        <form class="login-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
