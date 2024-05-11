<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Kathi - Restaurant Table Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
</head>
<style>
    
    .table-wrapper {
    background: #fff;
    padding: 20px 25px;
    margin: 30px auto;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
    .table-title .btn {     
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #fff;
        background: #F28123;        
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }   
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.view {        
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }
    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }   
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
    table {
        counter-reset: section;
    }
</style>
<body>
      <div class="container-xxl bg-white p-0">
       
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Kathi</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="contact.php" class="nav-item nav-link active">Contact</a>
                    </div>
                    
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="table-wrapper" id="empty">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Booking <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">					
                        <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Booking No.</th>
                        <th>Name</th>
                        <th>Emailid</th>
                        <th>Phone No.</th>
                        <th>Booking Date</th>				
                        <th>Booking Time</th>		
                        <th>No. of Adults</th>
                        <th>No. of Childrens</th>
                        <th>Status</th>						
                    </tr>
                </thead>
                <tbody>
                <?php
                    include 'connection.php';
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST['statusDetails'])) {
                        $booking_no = $_POST['booking_no'];
                        $fetch_details = mysqli_query($connection, "select * from tbl_booking where booking_id='$booking_no'");
                        $fetch_row = mysqli_num_rows($fetch_details);
                        if($fetch_row>0)
                        {
                        while($row = mysqli_fetch_assoc($fetch_details)){
                            $booking_id = $row['booking_id'];
                            $name = $row['name'];
                            $emailid = $row['emailid'];
                            $mobile = $row['mobile'];
                            $booking_date = $row['booking_date'];
                            $booking_time = date('h:i a', strtotime($row['booking_time']));
                            $adults = $row['adults'];
                            $childrens = $row['childrens'];
                            $booking_status = $row['booking_status'];
                            if ($booking_status == 0){ 
                                        $tstatus = "Booking Order Placed.";
                                    }
                                    elseif ($booking_status == 1) {
                                        $tstatus = "Booking Confirmed.";
                                    }
                                    else
                                    {
                                        $tstatus = "Booking Cancelled.";
                                    }
                            echo '<tr>
                                    <td>' . $booking_id . '</td>
                                    <td>' . $name.'</td>
                                    <td>' . $emailid . '</td>
                                    <td>' . $mobile . '</td>
                                    <td>' . $booking_date . '</td>
                                    <td>' . $booking_time . '</td>
                                    <td>' . $adults . '</td>
                                    <td>' . $childrens . '</td>
                                    <td>'.$tstatus.'</td>              </tr>';
                        }
                    }
                    else
                    {
                    echo "<script>alert('Please enter valid booking number');
            window.history.back(1);
            </script>";
                    }
                }
            }
            ?>
                </tbody>
            </table>
        </div>
    </div> 
</div>
<?php 
 include 'footer.php';
?> 

    
  