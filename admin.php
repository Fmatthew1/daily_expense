<?php
// session_start();
// error_reporting(0);
// require_once("includes/dbconnection.php");
//     header('location:dashboard.php');


// class Admin extends Db{ -->
    
   // public function login($email, $password){
        
        // if($this->check_if_admin_exist($email) > 0){
        //     return "success";
        // }
        //sql command
        
    //for checking if a admin email exist in database
    // public function check_if_admin_exist($email,$password){
    //     //sql statement
    //     $sql= "SELECT * FROM `admin` WHERE `email` =  ? AND `password` = ?";
    //     //prepare 
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$email, $password]);
    //     $admin =$stmt->execute([$email, $password]);
    //     return $admin;
    //     if($admin){
    //         echo "logged in";
    //     }else{
    //         echo "false";
    //     }
       
    //     exit();
    // }
    //for login as a admin
//    public function admin($email, $password){
        
//         $sql="SELECT * FROM `admin` WHERE `password` = ?";
//         $stmt = $this->connect()->prepare($sql);
//         $stmt->execute([$email]);
//         $adminrCount = $stmt->rowCount();
//         if($userCount < 1){
//             return "Either Email or Password is wrong";
//             exit();
//         }
//         $admin = $stmt->fetch(PDO::FETCH_ASSOC);
//         $password = $admin["password"];

        //testing if password is not correct
        // if(!password_verify($password, $password)){
        //     //fail
        //     return "Either Email or Password is wrong";
        //     exit();
        // }
        //if password is right... it continues
        //set session
//         $_SESSION["is_logged_in"] = true;
//         $_SESSION["email"] = $admin["email"];
//         $_SESSION["password"] = $admin["password"];
    
//         return "success";



       
//     }






    

// }





// $new = new Admin();
// $pi = $new->check_if_admin_exist('mattez@gmail.com', 'mattez123');
// echo $pi;




// ?>