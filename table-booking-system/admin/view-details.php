<?php
include 'header.php';

$bookid = $_GET['bookDetails'];
$bookdetailSql = "SELECT * FROM `tbl_booking` where booking_id='$bookid'";
    $bookdetailsResult = mysqli_query($conn, $bookdetailSql);
    $bookdetailsRow = mysqli_fetch_assoc($bookdetailsResult);
      $bookingid = $bookdetailsRow['booking_id'];
      $name = $bookdetailsRow['name'];
      $email = $bookdetailsRow['emailid'];
      $mobile = $bookdetailsRow['mobile'];
      $booking_date = $bookdetailsRow['booking_date'];
      $booking_time = date('h:i a', strtotime($bookdetailsRow['booking_time']));
      $adults = $bookdetailsRow['adults'];
      $childrens = $bookdetailsRow['childrens'];
      $booking_status = $bookdetailsRow['booking_status'];
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
<div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                        <h4 class="page-title">Booking Details</h4>
                    </div>
                <div class="col-sm-8 col-9 text-right m-b-20">						
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
          <div class="row">
                    <div class="table-responsive">
                                  <table id="zctb" class="table table-striped table-bordered no-wrap"><tbody>
                                  <tr>
                                              <td colspan="8"><b>Date & Time of Registration : <?php echo $bookdetailsRow['created_at'];?></b></td>
                                              
                                          </tr>

                                          <tr>
                                          <td><b>Booking Number :</b></td>
                                          <td><?php echo $bookingid;?></td>
                                          <td><b>Full Name :</b></td>
                                          <td><?php echo $name; ?></td>
                                          <td><b>Email Address :</b></td>
                                          <td><?php echo $email;?></td>
                                          <td><b>Contact Number :</b></td>
                                          <td><?php echo $mobile;?></td>
                                          </tr>


                                          <tr>
                                          
                                          
                                          <td><b>Booking Date :</b></td>
                                          <td><?php echo $booking_date;?></td>
                                          <td><b>Booking Time :</b></td>
                                          <td><?php echo $booking_time;?></td>
                                          <td><b>Number of Adults :</b></td>
                                          <td><?php echo $adults;?></td>
                                          <td><b>Number of Childrens :</b></td>
                                          <td><?php echo $childrens;?></td>
                                          </tr>
                                          <tr>
                                          <td colspan="4"><b>Status : 
                                          <?php 
                                          echo $bookStatus;    ?></b>

                                      </td>
<?php
$remarkSql = "SELECT * FROM `tbl_booking_status` where booking_id='$bookid'";
$remarkResult = mysqli_query($conn, $remarkSql);
$remarkRow = mysqli_fetch_assoc($remarkResult);
if($remarkRow>0){
    if($remarkRow['booking_status']==1){
?>                                      
                          <td colspan="2"><b>Table Number : 
                          <?php 
                          echo $remarkRow['table_no'];    ?></b></td>                 
                          <td colspan="2"><b>Remarks : 
                          <?php 
                          echo $remarkRow['remarks'];?></b></td>
                      <?php } 
                      else
                      {?>
                       <td colspan="4"><b>Remarks : 
                          <?php 
                          echo $remarkRow['remarks'];?></b></td>
                   <?php   }
                  }?>

                          </tr>


                                      </tbody>
                                  </table>
                                 </div>
                              </div>
                              <?php
                              if($booking_status == 0){?>
                              <center><button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#bookingStatus" class="btn btn-success">Action</button></center>
                          <?php } ?>
    </div>
    </div> 
<?php 
    include 'partials/_bookingStatusModal.php';

    include 'footer.php';
?>