<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['admin_logged_in']) == 0) {
    header('location:logout.php');
} //else {
   // if (isset($_POST['submit'])) {
       // $email = $_POST['email'];
        //$fullname = $_POST['fullname'];
        //$mobno = $_POST['contactnumber'];
    //}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daily Expense Tracker || Edit User</title>
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
        <?php include_once('includes/admin-header.php'); ?>
        <?php include_once('includes/sidebar-admin.php'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                    <li class="active">Edit User</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit User</div>
                        <div class="panel-body">
                            <?php
                                // Get the user ID from the URL parameter
                                $id = $_GET["id"];
                                
                                // Check if the form was submitted
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Get the updated user information from the form
                                    $name = $_POST["name"];
                                    $email = $_POST["email"];
                                    $phoneno = $_POST["mobile"];
                                    $regdate = $_POST["regdate"];
                                
                                    // Update the user in the database
                                    $sql = "UPDATE tbluser SET FullName='$name', Email='$email', MobileNumber='$phoneno' WHERE ID='$id'";
                                    if (mysqli_query($con, $sql)) {
                                        $msg = "User updated successfully.";
                                    } else {
                                        $msg = "Error updating user: " . mysqli_error($con);
                                    }
                                }
                                
                                // Retrieve the user information from the database
                                $sql = "SELECT * FROM tbluser WHERE ID='$id'";
                                $result = mysqli_query($con, $sql);
                                
                               
// Display the user information in a form for editing
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<form method='post' class=form-group>";
    echo "Name: <input class=form-control type='text'  name='name' value='" . $row["FullName"] . "'><br>";
    echo "Email: <input class=form-control type='text' name='email' readonly='true' value='" . $row["Email"] . "'><br>";
	echo "Mobile Number: <input class=form-control type='text' maxlength=11 pattern='[0-9]{10}' name='mobile' value='" . $row["MobileNumber"] . "'><br>";
    echo "Registration Date: <input class= form-control readonly='true' type='text' name='regdate' value='" . $row["RegDate"] . "'><br>";
    
    echo "<button type='submit' class=btn btn-primary name=submit value='Update'>Update </button>";
    echo "</form>";
} else {
    echo "User not found.";
}

?>




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

