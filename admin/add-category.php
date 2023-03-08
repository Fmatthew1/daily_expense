<?php


session_start();



error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['admin_logged_in']) == 0) {
  header('location:logout.php');
} else {
  if(isset($_POST['submit'])) {
   // $ID = $_SESSION['admin_logged_in'];
    $categoryName = $_POST['categoryName'];
    
// Get the max serial number from the database
$result = mysqli_query($con, "SELECT MAX(category_id) as max_serial FROM tblcategory");
$row = mysqli_fetch_array($result);
$max_serial = $row['max_serial'];

// Increment the max serial number by 1
$new_serial = $max_serial + 1;

// Insert the new serial number into the database
//$sql = "INSERT INTO table_name (admin_id) VALUES ($new_serial)";
//if (!mysqli_query($con, $sql)) {
//  echo "Error: " . $sql . "<br>" . mysqli_error($con);
//}







    $stmt = $con->prepare("INSERT INTO tblcategory(category_id, categoryName) VALUES (?, ?)");
    $stmt->bind_param("ss",$new_serial , $categoryName);
    
    if ($stmt->execute()) {
      echo "<script>alert('A New Category has been added');</script>";
      echo "<script>window.location.href='view-category.php'</script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
    }
  }
}








?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || Add Category</title>
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
				<li class="active">Category</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Category</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
							
							<form role="form" method="post" action="">
								
								<div class="form-group">
									<label>Category Name</label>
									<input type="text" class="form-control" name="categoryName" value="" required="true">
								</div>
															
																
								<div class="form-group has-success">
									<button type="submit" class="btn btn-success" name="submit">Add</button>
								</div>
								
								
								</div>
								
							</form>
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
