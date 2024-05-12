<?php
include 'header.php';
?>
<div class="page-wrapper">
        <div class="content">
    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col-md-4">
                <form action="partials/_tableManage.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header" style="background-color: rgb(111 202 203);">
                            Add New Table
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Table Number: </label>
                                <input type="text" class="form-control" name="tableNo" required>
                            </div>
                            </div>  
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="createTable" class="btn btn-sm btn-primary col-sm-3 offset-md-4"> Create </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- FORM Panel -->
    
            <!-- Table Panel -->
            <div class="col-md-8 mb-3">
                    <table class="table table-bordered table-hover mb-0">
                        <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Table Number</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sql = "SELECT * FROM `tbl_table`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $Id = $row['id'];
                                $tableNo = $row['table_no'];
                                
                                echo '<tr>
                                        <td class="text-center">' .$Id. '</td>
                                        <td>'.$tableNo.'</td>
                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:112px">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateTable' .$Id. '">Edit</button>
                                            <form action="partials/_tableManage.php" method="POST">
                                                <button name="removeTable" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                                                <input type="hidden" name="tableId" value="'.$Id. '">
                                            </form></div>
                                        </td>
                                    </tr>';
                            }
                        ?> 
                        </tbody>
                    </table>
            </div>
            <!-- Table Panel -->
        </div>
    </div>	    
</div>


<?php 
    $tablesql = "SELECT * FROM `tbl_table`";
    $tableResult = mysqli_query($conn, $tablesql);
    while($tableRow = mysqli_fetch_assoc($tableResult)){
        $tableId = $tableRow['id'];
        $table_no = $tableRow['table_no'];
?>

<!-- Modal -->
<div class="modal fade" id="updateTable<?php echo $tableId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateTable<?php echo $tableId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateTable<?php echo $tableId; ?>">Edit Table Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_tableManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Table Number:</label></b>
                <input class="form-control" id="table_no" name="table_no" value="<?php echo $table_no; ?>" type="text" required>
            </div>
            <input type="hidden" id="tableId" name="tableId" value="<?php echo $tableId; ?>">
            <button type="submit" class="btn btn-success" name="updateTable">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php
    }
?>
<?php
include 'footer.php'; 
?>