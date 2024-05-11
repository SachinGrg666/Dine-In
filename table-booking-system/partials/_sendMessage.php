<?php 
include '../connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['sendMessage'])) {
        $name = $_POST["fullname"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        
        $sql = "insert into `tbl_contact` set name='$name', email='$email', subject='$subject', message='$message'"; 
        $result = mysqli_query($connection, $sql);
        
        if ($result){
            
            echo "<script>alert('Success.');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Failed.');
                window.location=document.referrer;
                </script>";
        }
    }
}    
?>