<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png" Type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
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
        form {
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
            font-size: 16px;
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
            font-size: 16px;
        }
        .button:hover {
            background-color: #6a1b9a;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
        }
        .signup-link a {
            color: blue;
            text-decoration: none;
            font-size: 14px;

        }
        .signup-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
        #skip {
            width: fit-content;
            background: none;
            border: none;
            color: purple;
            cursor: pointer;
            font-size: 14px;
            text-decoration: underline;
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <form id="signup" method="POST" action="signup.php">
        <h2>Signup for Collab-de-restro</h2>
        <input name="Name" class="input" type="text" required placeholder="Enter your Full name"><br>
        <input name="email" class="input" type="email" required placeholder="Enter your email"><br>
        <input minlength="5" name="password" id="password" class="input" required type="password" placeholder="Make a password"><br>
        <input name="Cpassword" id="Cpassword" class="input" required type="password" placeholder="Confirm password"><br>
        <button class="button">Sign up</button>
        <div class="signup-link">
            <span>If you already have an account, <a href="login.php">Login here</a>.</span>
        </div>
    </form>
</body>
</html>


<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["Name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $Cpassword = $_POST["Cpassword"];

    // Check if the email already exists
    $checkQuery = "SELECT * FROM loginpage WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo '<script>alert("Email already exists. Please choose a different email.");</script>';
    } else {
        // Proceed with the insertion
        if ($password === $Cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO loginpage (email, password, Name, is_verified) VALUES ('$email', '$hash', '$Name', '1')"; 

            try {
                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("Sign up successful!");
                    window.location.href="login.php";</script>';
                } else {
                    throw new Exception(mysqli_error($conn));
                }
            } catch (mysqli_sql_exception $e) {
                echo '<script>alert("Error: Unable to sign up. Please try again later.");</script>';
            }
        } else {
            echo '<script>alert("Password and Confirm Password do not match");</script>';
        }
    }
}

mysqli_close($conn);
?>

