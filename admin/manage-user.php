<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['admin_logged_in']==0)) {
  header('location:logout.php');
  } else{

//code deletion
if (isset($_GET['id'])) {
    // Get the user ID from the query string
    $id = $_GET['id'];
    
    // Delete the user from the database
    $sql = "DELETE FROM tbluser WHERE ID='$id'";
    if (mysqli_query($con, $sql)) {
        $msg = "User deleted successfully.";
    } else {
        $msg = "Error deleting user: " . mysqli_error($con);
    }
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || Manage Users</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once('includes/admin-header.php');?>
	<?php include_once('includes/sidebar-admin.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Users</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Users</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
							
							<div class="table-responsive">
            


			  <?php
			// Select all users from the database
$sql = "SELECT * FROM tbluser";
$cnt=1;
$result = mysqli_query($con, $sql);

// Check if any users were found
if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table class=table table-bordered mg-b-0>";
    // Output the table header row
    echo "<tr><th>ID</th><th>FullName</th><th>MobileNumber</th><th>Email</th><th>Edit</th><th>Delete</th></tr>";
    // Loop through each user and display their information
    while ($row = mysqli_fetch_assoc($result)) {
        // Output a table row with table data cells for each field
        echo "<tr>";
		echo "<td>" . $cnt . "</td>";
        echo "<td>" . $row["FullName"] . "</td>";
        echo "<td>" . $row["MobileNumber"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td><a href='edit_user.php?id=" . $row["ID"] . "'>Edit</a></td>";
		echo '<td><a href="manage-user.php?id=' . $row['ID'] . '" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</a></td>';

        echo "</tr>";


		$cnt=$cnt+1;
    }
    // End the table
    echo "</table>";
} else {
    echo "No users found.";
}


?>








          </div>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php }  ?>