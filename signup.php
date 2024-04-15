<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="image/logo.png" Type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KothaBadha.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form id="signup" style="height:400px;" method="POST" action="signup.php">
        <div>
            <h2 style="color:purple;">signup form</h2>
        <span ><input name="Name"class="input" type="text" required placeholder="Enter your Full name"></span><br>
        <span ><input name="email"class="input" type="email" required placeholder="Enter your email"></span><br>
        <span > <input minlength="5" name="password" id="password" class="input" required type="password"placeholder="Make a password"></span><br>
        <span > <input name="Cpassword" id="Cpassword" class="input" required type="password"placeholder="Confirm password"></span><br>

        <button class="button" >Sign up</button>
        <h4>Click on sign up after filling data</h4>


        

        </div>
    </form>
    <a href="index1.php"> <button  style="width:fit-content;" id="skip"><i class="fa fa-arrow-circle-left"></i> Login page</button></a>

    
    
</body>
</html>
<?php
include 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email,$v_code){
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sherpapasang2004@gmail.com';                     //SMTP username
        $mail->Password   = 'ngqt kfqb vbja mhjy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('sherpapasang2004@gmail.com', 'kothabhada.com');
        $mail->addAddress($email);     //Add a recipient
       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verification for kothabhada.com';
        $mail->Body = "Thanks for registration. you need to verify your email for safety purposes , hope you understand.<br> Click on the link below to verify the E-mail address.<br><br>
        <button><a href='https://testingkothabadha.great-site.net/verify.php?email=" . urlencode($email) . "&v_code=$v_code'> Verify Email </a></button>";
        $mail->send();
        return true;
        } catch (Exception $e) {
        return false; 
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["Name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $Cpassword = $_POST["Cpassword"];
    $v_code= bin2hex(random_bytes(8));

    // Check if the email already exists
    $checkQuery = "SELECT * FROM loginpage WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo '<script>alert("Email already exists. Please choose a different email.");</script>';
    } else {
        // Proceed with the insertion
        if ($password === $Cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO loginpage (email, password, Name, verification_code, is_verified) VALUES ('$email', '$hash', '$Name', '$v_code', '0')";

            try {
                if (mysqli_query($conn, $sql) && sendmail($email,$v_code)) {
                    echo '<script>alert("Verification link sent in email. Please verify your email.");
                    window.location.href="index1.php";</script>';
                } else {
                    throw new Exception(mysqli_error($conn));
                }
            } catch (mysqli_sql_exception $e) {
                echo '<script>alert("Error: Email already exists. Please choose a different email.");</script>';
            }
        } else {
            echo '<script>alert("Password and Confirm Password do not match");</script>';
        }
    }
}

mysqli_close($conn);
?>
