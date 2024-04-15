<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png" Type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KothaBadha.com</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="index1.php">
        <div>
            <h2 style="color:purple;">Login form</h2>
            <span><input name="email" class="input" type="email" placeholder="Enter your email" required></span><br>
            <span><input name="password" id="password" class="input" required type="password" placeholder="Enter your password"></span><br>
            <button class="button" id="loginButton" name="login">Log in</button>
            <button class="button" id="signupButton"><a id="signupLink" style="color:black;" href="signup.php">Sign up</a></button><br>
            <span style="text-align:right; text-decoration:underline; "><a href="forgotpassword.php ">Forgot password?</a></span>
            <h4>If you are new here, click on sign up.</h4>

            
        </div>
        <button class="button" style="width:fit-content;"><a style="color:black;"  href="index.php">Skip Login</a></button>


    </form>





</body>
</html>

<?php
include 'connection.php';
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
                    header("location: index.html");
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

