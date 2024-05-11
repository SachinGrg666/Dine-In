<?php
    include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createTable'])) {
        $tableNo = $_POST["tableNo"];

        $sql = "INSERT INTO `tbl_table` set table_no='$tableNo'";   
        $result = mysqli_query($conn, $sql);

        if($result) {
            
                    echo "<script>alert('Success.');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('Failed.');
                            window.location=document.referrer;
                        </script>";
                }
           }
    }
    if(isset($_POST['removeTable'])) {
        $tableId = $_POST["tableId"];
        
        $sql = "DELETE FROM `tbl_table` WHERE `id`='$tableId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            
            echo "<script>alert('Removed.');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Failed.');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateTable'])) {
        $tableId = $_POST["tableId"];
        $table_no = $_POST["table_no"];

        $sql = "UPDATE `tbl_table` SET `table_no`='$table_no' WHERE `id`='$tableId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Update.');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Failed.');
                window.location=document.referrer;
                </script>";
        }
    }
?>