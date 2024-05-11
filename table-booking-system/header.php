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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 style="color:#FEA116 !important"; class="m-0"><i class="fa fa-utensils me-3"></i>Kathi</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="#" class="nav-item nav-link" data-dismiss="modal" data-toggle="modal" data-target="#statusModal">Check Status</a>
                    </div>
                    <a data-toggle="modal" data-target="#bookingModal" class="btn btn-primary py-2 px-4">Book A Table</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                            <a data-toggle="modal" data-target="#bookingModal" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
<?php
include 'connection.php';
if(isset($_POST['submit'])){

$booking_id = mt_rand(10000000,99999999);
$name = $_POST['name'];
$emailid = $_POST['email'];
$mobile = $_POST['phone'];
$booking_date = date('Y-m-d', strtotime($_POST['bookingdate']));
$booking_time = $_POST['bookingtime'];
$adults = $_POST['adults'];
$childrens  =$_POST['childrens'];

$insert_query = mysqli_query($connection,"insert into tbl_booking set booking_id='$booking_id', name='$name', emailid='$emailid', mobile='$mobile', booking_date='$booking_date', booking_time='$booking_time', adults='$adults', childrens='$childrens'");
if($insert_query){
echo '<script>alert("Your order sent successfully. Booking number is "+"'.$booking_id.'")</script>';
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}
}
?>

          <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(249 128 27);">
            <h5 class="modal-title" id="bookingModal">Table Booking Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                  <b><label for="name">Name:</label></b>
                  <input class="form-control" id="name" name="name" placeholder="Enter your Name" type="text" required>
              </div>
              <div class="form-group">
                  <b><label for="email">Email:</label></b>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
              </div>
              <div class="form-group">
                <b><label for="phone">Phone No:</label></b>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon">+91</span>
                  </div>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                </div>
              </div>
              <div class="form-group">
                <b><label for="bookingdate">Booking Date:</label></b>
              <input type="date" class="form-control" name="bookingdate" placeholder="Choose Booking Date" min="<?php echo date("Y-m-d"); ?>" required>
          </div>
          <div class="form-group">
            <b><label for="bookingtime">Booking Time:</label></b>
              <input type="time" class="form-control" name="bookingtime" placeholder="Choose Booking Time" required>
              </div>
              <div class="text-left my-2">
                  <b><label for="adults">Number of Adults:</label></b>
                  <select name="adults" id="adults" class="custom-select browser-default" required>
                  <option hidden disabled selected value>Select Number of Adults</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
              </div>
              <div class="text-left my-2">
                  <b><label for="childrens">Number of Childrens:</label></b>
                  <select name="childrens" id="childrens" class="custom-select browser-default" required>
                  <option hidden disabled selected value>Select Number of Children</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              </select>
              </div>
              <br>
              <center><button type="submit" name="submit" class="btn btn-success">Reserve a Table</button></center>
            </form>
            <center><p class="mb-0 mt-1">Booking Order Placed? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#statusModal">Check Status</a></p></center>
          </div>
        </div>
      </div>
    </div>

<!-- Check Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: rgb(249 128 27);">
            <h5 class="modal-title" id="statusModal">Check Booking Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="status-details.php" method="post">
              <div class="text-left my-2">
                  <b><label for="bookingid">Enter Booking Number:</label></b>
                  <input class="form-control" id="booking_no" name="booking_no" placeholder="Enter your Booking Number" type="text" required>
              </div>
              <br>
              <center><button type="submit" name="statusDetails" class="btn btn-success">Check Status</button></center>
            </form>
          </div>
        </div>
      </div>
    </div>
