<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>


<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <?php
//$uid=$_SESSION['detsuid'];

$email= $_SESSION['admin_email'];
$admin_id=$_SESSION['admin-logged-in'];


$ret=mysqli_query($con,"select admin_name from tbladmin where admin_email ='$email'");
$row=mysqli_fetch_array($ret);
$name=$row['admin_name'];

?>
                <div class="profile-usertitle-name"><?php echo $name; ?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        
        <ul class="nav menu">
            <li class="active"><a href="admin-dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            
            <br/>
            <li><a href="manage-user.php"><em class="fa fa-user">&nbsp;</em>Manage User</a></li>
<br/>
<li><a href="manage-expense.php"><em class="fa fa-clone">&nbsp;</em> Manage Expenses</a></li>




            
			<br>
			 
            <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                <em class="fa fa-navicon">&nbsp;</em>Category <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-4">
                    <li><a class="" href="add-category.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Category
                    </a></li>                 
                    <li><a class="" href="view-category.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Manage Category
                    </a></li>                 
                    
                </ul>

            </li>
			
			<br/>
           
  



            
            <li><a href="admin-profile.php"><em class="fa fa-user">&nbsp;</em>Admin Profile</a></li>
             <li><a href="change-password.php"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>

        </ul>
    </div>