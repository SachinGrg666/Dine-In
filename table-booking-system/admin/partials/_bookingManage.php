<?php
    include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['updateStatus'])) {
        $bookId = $_POST['bookId'];
        $tableNo = $_POST['table_no'];
        $status = $_POST['status'];
        $remarks = $_POST['remarks'];
        
        
        $sql = "insert into `tbl_booking_status` SET booking_id='$bookId', table_no='$tableNo', `booking_status`='$status', remarks='$remarks'"; 
        
        $sql2 = "update tbl_booking set booking_status='$status' where booking_id='$bookId'";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        if ($result && $result2){
            echo "<script>alert('Update Successfully.');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Failed');
                window.location=document.referrer;
                </script>";
        }
    }
}
?>