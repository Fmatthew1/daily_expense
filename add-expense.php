<?php
session_start();

error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['detsuid']) == 0) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $userid = mysqli_real_escape_string($con, $_SESSION['detsuid']);
    $dateexpense = mysqli_real_escape_string($con, $_POST['dateexpense']);
    $item = mysqli_real_escape_string($con, $_POST['item']);
    $costitem = mysqli_real_escape_string($con, $_POST['costitem']);
	$categoryName = mysqli_real_escape_string($con, $_POST['categoryName']);


    if (empty($dateexpense) || empty($item) || empty($costitem)) {
      echo "<script>alert('Please fill in all the required fields');</script>";
    } else {
      $query = mysqli_query($con, "INSERT INTO tblexpense (UserId, categoryName, ExpenseDate, ExpenseItem, ExpenseCost) 
        VALUES ('$userid', '$categoryName', '$dateexpense', '$item', '$costitem')");
      
      if ($query) {
        echo "<script>alert('Expense has been added');</script>";
        echo "<script>window.location.href='manage-expense.php'</script>";
      } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || Add Expense</title>
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
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Expense</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Expense</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
							
							<form role="form" method="post" action="">
								<div class="form-group">
									<label>Date of Expense</label>
									<input class="form-control" type="date" value="" name="dateexpense" required="true">
								</div>
								<div class="form-group">
									<label>Item</label>
									<input type="text" class="form-control" name="item" value="" required="true">
								</div>
								
								<div class="form-group">
									<label>Cost of Item</label>
									<input class="form-control" type="text" value="" required="true" name="costitem">
								</div>

								<div class="form-group">
									<label>Category</label>
									<?php
//write the query to retrieve the data
$query = "SELECT * FROM tblcategory";

//run the query and store the result in a variable
$result = mysqli_query($con, $query);

//create the select element
echo "<select class=form-control name=categoryName id= categoryName>";

//loop through the result and create the options
while($row = mysqli_fetch_assoc($result)) {
    //get the value you want to use as the option value
    $value = $row['categoryName'];
    
    //get the value you want to display as the option text
    $text = $row['categoryName'];
    
    //check if this is the selected value and add the selected attribute if it is
    if ($value == $selectedValue) {
        echo "<option value='$value' selected>$text</option>";
    } else {
        echo "<option value='$value'>$text</option>";
    }
}

//close the select element
echo "</select>";


?>
								</div>
















																
								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Add</button>
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