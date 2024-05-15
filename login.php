<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/background-lg.jpg'); 
            background-size: cover;
            
        }
        .login-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }
        h2 {
            color: purple;
            margin-bottom: 20px;
            text-align: center;
        }
        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .button {
            width: 100%;
            padding: 10px;
            background-color: purple;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #6a1b9a;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
        }
        .signup-link a {
            color: black;
            text-decoration: none;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login for Collab-De-Restro</h2>
        <form method="post" action="login.php">
            <input name="email" class="input" type="email" placeholder="Enter your email" required><br>
            <input name="password" id="password" class="input" required type="password" placeholder="Enter your password"><br>
            <button class="button" id="loginButton" name="login">Log in</button><br>
            <div class="signup-link">
                <a href="signup.php">Sign up</a>
            </div>
            <div class="error-message">
                <?php
                if (isset($_POST["login"])) {
                    // PHP login validation code with error messages
                }
                ?>
            </div>
        </form>
    </div>
</body>
</html>


<?php
include 'connect.php';
session_start();


if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM loginpage WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            $resultpassword = $row["password"];
            if ($row['is_verified'] == 1) {
                // Compare the user-provided password with the stored hashed password
                if (password_verify($password, $resultpassword)) {
                    // Passwords match, user is authenticated
                    $_SESSION["SN"] = $row["SN"];
                    $_SESSION["Name"] = $row["Name"];
                    header("location: index.php");
                    exit();
                } else {
                    echo '<script>alert("Login error, incorrect password or email");</script>';
                }
            } else {
                echo '<script>alert("The email is not verified");</script>';
            }
        } else {
            echo '<script>alert("User not found, please click on signup");</script>';
        }
    } else {
        echo '<script>alert("Query failed");</script>';
    }
}
?>

