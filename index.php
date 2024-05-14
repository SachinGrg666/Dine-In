<?php 
include 'header.php';    
if($adminloggedin) {
?>
<body> 
    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from tbl_booking"); 
                            $booking = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $booking[0]; ?></h3>
                                <span class="widget-title1">All Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-bar-chart"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from tbl_booking where date(created_at)=CURDATE()"); 
                            $today_booking = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $today_booking[0]; ?></h3>
                                <span class="widget-title2">Today Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-bar-chart" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from tbl_booking where DATE(created_at)=CURDATE()-1"); 
                            $yesterday_booking = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $yesterday_booking[0]; ?></h3>
                                <span class="widget-title3">Yesterday Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-bar-chart" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from tbl_booking where week(DATE(created_at))=week(now())"); 
                            $week_booking = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $week_booking[0]; ?></h3>
                                <span class="widget-title3">Last Week Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-handshake-o" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from tbl_booking where booking_status=1"); 
                            $accept_booking = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $accept_booking[0]; ?></h3>
                                <span class="widget-title4">Accepted Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg5"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <?php
                            $fetch_query = mysqli_query($conn, "select count(*) as total from tbl_booking where booking_status=2"); 
                            $cancel_booking = mysqli_fetch_row($fetch_query);
                            ?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $cancel_booking[0]; ?></h3>
                                <span class="widget-title5">Cancelled Bookings <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                       <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Booking Details </h4> <a href="booking.php" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table mb-0 new-patient-table">
                                        <thead>
                                            <tr>
                                        <th>Id</th>
                                        <th>Booking No.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `tbl_booking` order by created_at desc limit 5"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $booking_id = $row['booking_id'];
                                $name = $row['name'];
                                $mobile = $row['mobile'];
                                $booking_status = $row['booking_status'];
                        if($booking_status == 0) {
                            $bookStatus = "<span class='badge badge-primary'>New Booking</span>";
                        }
                        else if($booking_status == 1){
                            $bookStatus = "<span class='badge badge-success'>Confirmed</span>";
                        }
                        else
                        {
                            $bookStatus = "<span class='badge badge-danger'>Rejected</span>";
                        }
                                
                                         ?>
                                            <tr>
                                                
                                                <td><?php echo $Id; ?></td>
                                                <td><?php echo $booking_id; ?></td>
                                              <td><?php echo $name; ?></td> <td><?php echo $mobile; ?></td> 
                                                <td><?php echo $bookStatus; ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Table List</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                            <?php 
                            $sql = "SELECT * FROM `tbl_table`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                            $table_no = $row['table_no'];
                            ?>
                                    <li>
                                        <div class="contact-cont">
                                            
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><?php echo $table_no; ?></span>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

<?php
    }
    else{
        header("location: /table-booking-system/admin/login.php");
    }
?>
<?php 
 include 'footer.php';
?>