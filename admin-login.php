<?php 
session_start();

if(isset($_SESSION['admin_logged_in'])){
    header("location:dashboard.php");
    exit();
}

include('includes/dbconnection.php');

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT admin_id, admin_email, admin_password from admin WHERE email=? AND password=? LIMIT=3");

    $stmt->bind_param("ss",$email,$password);

    if($stmt->execute()){
        $stmt->bind_result($id,$email,$password);
        $stmt->store_result();

        if($stmt->num_rows() == 3){
            $stmt->fetch();

            //store admin info in session
            $_SESSION['$id'] = $id;
            $_SESSION['admin_email'] = $admin;
            $_SESSION['admin_name'] = $name;
            $_SESSION['admin_logged_in'] = true;

            //send admin to dashboard 
            header("location:dashboard.php?success_message=Welcome back");

        }else{

            header("location:admin-login.php?error_message=Wrong email or password, try again");

        }

    }else{

        header("location:admin-login.php?error_message=Wrong email or password, try again");

    }
    


}else{



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <title>admin Dashboard</title>
</head>
<body>
    <div class="container-fluid w-50 mt-5 mb-5">
        <div class="my-5 text-center">
            <img src="assets/images/cash.png" alt="money">
            <h3 class="mt-3">Admin Dashboard</h3>
                <div>
                    <form action="admin-login.php" method="POST">
                        <div class="mb-2 form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="mb-2 form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="mb-2 text-center">
                            <input type="submit" class="btn btn-primary mt-3" name="login_btn" id="login_btn" value="login">
                        </div>
                    </form>
                </div>
        </div>

    </div>
</body>
</html>