<?php
include 'header.php';
?>

<style>
    .btn-danger-gradiant {
        background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
    }

    .btn-danger-gradiant:hover {
        background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
    }
</style>
<div class="page-wrapper">
        <div class="content">
	<div class="row">
        <div class="col-sm-4 col-3">
                        <h4 class="page-title">Message</h4>
                    </div>
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12 text-center">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>datetime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tbl_contact"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $subject = $row['subject'];
                                $message = $row['message'];
                                $created_at = $row['created_at'];
                                
                                echo '<tr>
                                        <td>' .$id. '</td>
                                        <td>' .$name. '</td>
                                        <td>' .$email. '</td>
                                        <td>' .$subject. '</td>
                                        <td>' .$message. '</td>
                                        <td>' .$created_at. '</td>
                                        </tr>';
                            }
                            
                        ?>
                        
                    </tbody>
		        </table>
			</div>
		</div>
	</div>
</div>
</div>
<?php
include 'footer.php'; 
?>   