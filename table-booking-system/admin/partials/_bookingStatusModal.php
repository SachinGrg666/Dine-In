<?php 
include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['removeBooking'])) {
        $bookId = $_POST["bookId"];
        
        $sql = "DELETE FROM `tbl_booking` WHERE `booking_id`='$bookId'"; 
        $sql2 = "DELETE FROM `tbl_booking_status` WHERE `booking_id`='$bookId'";  
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        if ($result && $result2){
            
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
}    
?>

<!-- Modal -->
<div class="modal fade" id="bookingStatus" tabindex="-1" role="dialog" aria-labelledby="bookingStatus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="bookingStatus">Booking Status </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $book_status_Sql = "SELECT * FROM `tbl_booking_status` where booking_id='$bookingid'";
        $bookstatusResult = mysqli_query($conn, $book_status_Sql);
        $bookstatusRow = mysqli_fetch_assoc($bookstatusResult);
        ?>
        <form action="partials/_bookingManage.php" method="post" >
                <div class="text-left my-2">    
                <b><label for="name">Booking Status:</label></b>
                <div class="row mx-2">
                    <select class="form-control col-md-12" id="bookStatus" name="status" required>
                    <option value="">Select Status</option>
                    <?php
                     if($bookstatusRow['booking_status']==1){ 
                    ?>
                    <option value="1" selected>Booking Confirmed</option>
                    <option value="2">Booking Cancelled</option>
                <?php }
                else if($bookstatusRow['booking_status']==2){ ?>
                    <option value="1">Booking Confirmed</option>
                    <option value="2" selected>Booking Cancelled</option>
              <?php  } else {?>
                <option value="1">Booking Confirmed</option>
                <option value="2">Booking Cancelled</option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="text-left my-2" id="tableNo">    
                <b><label for="name">Table Number:</label></b>
                <div class="row mx-2">
                <select class="form-control col-md-12" id="tableValue" name="table_no" required>
                    <option value="">Select Table Number</option>
                <?php
                 $tableSql = "SELECT * FROM `tbl_table` where table_no not in (select table_no from tbl_booking_status)";
                 $tableResult = mysqli_query($conn, $tableSql);
                 while($tableRow = mysqli_fetch_assoc($tableResult)){
                    
                ?>
                <option <?php if($tableRow['table_no']==$bookstatusRow['table_no']){ echo "selected"; }?>><?php echo $tableRow['table_no']; ?></option>
            <?php } ?>
                </select>   
                </div>
            </div>
            <div class="text-left my-2">    
                <b><label for="name">Remarks:</label></b>
                <div class="row mx-2">
                <textarea class="form-control col-md-12" id="remarks" name="remarks" required ><?php echo $bookstatusRow['remarks'];?></textarea> </div>
            </div>
            </div>
            <input type="hidden" id="bookId" name="bookId" value="<?php echo $bookingid; ?>">
            <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
        </form>
        </div>
    </div>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>

<script type="text/javascript">
    $('#tableNo').hide();
    $(document).ready(function(){
    $('#bookStatus').change(function(){
   if($('#bookStatus').val()==1)
  {
     $('#tableNo').show();
     $('#tableValue').prop('required',true);
  }
  else
  {
    $('#tableNo').hide();
    $('#tableValue').val('');
    $('#tableValue').removeAttr('required',false);
  }
})
})
</script>
