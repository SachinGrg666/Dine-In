<?php
include 'header.php';
?>
<div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                        <h4 class="page-title">Booking Details</h4>
                    </div>
                <div class="col-sm-8 col-9 text-right m-b-20">						
                    <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
        <div class="table-responsive">        
        <table class="datatable table table-striped">
            <thead>
                <tr>
                    <th>Booking No.</th>
                    <th>Name</th>
                    <th>Phone No.</th>
                    <th>Booking Date</th>				
                    <th>Booking Time</th>				
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `tbl_booking` order by created_at desc";
                    $result = mysqli_query($conn, $sql);
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $bookingId = $row['booking_id'];
                        $name = $row['name'];
                        $mobile = $row['mobile'];
                        $booking_date = $row['booking_date'];
                        $booking_time = date('h:i a', strtotime($row['booking_time']));
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
                        
                        $counter++;
                        
                        echo '<tr>
                                <td>' . $bookingId . '</td>
                                <td>' . $name . '</td>
                                <td>' . $mobile . '</td>
                                <td>' . $booking_date . '</td>
                                <td>' . $booking_time . '</td>
                                <td>' . $bookStatus . '</td>
                                <td><div class="row mx-auto" style="width:127px"><a class="btn btn-sm btn-success" href="view-details.php?bookDetails='.$bookingId.'">View</a>
                                <form action="partials/_bookingStatusModal.php" method="POST">
                                                <button name="removeBooking" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                <input type="hidden" name="bookId" value="'.$bookingId. '">
                                            </form></div>
                                </td>
                            </tr>';
                    }
                    if($counter==0) {
                        ?><script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Request!	</div>';</script> <?php
                    } 
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php 
    include 'partials/_bookingStatusModal.php';
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    .tooltip.show {
        top: -62px !important;
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
        background: #4b5366;		
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
        /* background-color: #fcfcfc; */
    }
    table.table-striped.table-hover tbody tr:hover {
        /* background: #f5f5f5; */
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td a {
/*        font-weight: bold;*/
/*        color: #566787;*/
        display: inline-block;
        text-decoration: none;
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

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
    

</style>
<?php
include 'footer.php'; 
?>