<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This app helps a client to keep track of his daily expenses. Every expense belongs to a category. Examples of categories are: Food, Rent, Transport, Telephone, Utilities, etc. Every expense has a narration, an amount, and a date of expenditure. The app will sum up all expenses within a month, and generate a report showing which category consumed the most of the client’s income. A similar report will be generated for a whole year">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet">
    <title>Kash Tracker App</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">kasH<span class="text-danger">Tracker</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#Home">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#About KasHTracker">About KasHTracker</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#Questions">Questions</a>
                  </li>
                </ul>
                <a button type="button" class="btn btn-light px-2 me-md-2" href="http://localhost/daily_expensedb/admin/admin-login.php" >Login</button></a>
                <a button type="button" class="btn btn-danger btn-lg me-md-2" href="http://localhost/daily_expensedb/register.php">Sign Up for Free</button></a>
              </div>
            </div>
          </div>
    </nav>
                    <!--Showcase-->
                    <section class="bg-light text-primary p-5 text-center">
          <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
              <div>
                <h1>We Keep Track Of All Your Expenses And Help You Reach Your Goals</h1>
                <p class="lead my-4 fw-bold">The Wise have wealth and luxury but the fools spend whatever they get. Let's help you keep track of your daily expenses so you can reach your financial goals...</p>
                <a button type="button" class="btn btn-danger btn-lg" href="http://localhost/daily_expensedb/register.php">Sign up for KasHTracker</button></a>
              </div>
              <img class="img-fluid w-50 d-none d-sm-block"src="assets/images/projectPhoto.png" alt="smart phone">
            </div>
          </div>
    </section>
      <!-----Boxes-->
      <h2 id="About KasHTracker" style="text-align:center">What We Do</h2>
      <section class="p-5">
        <div class="container">
          <div class="row text-center">
            <div class="col-lg-4">
              <div class="card bg-info text-light">
                <div class="card-body text-center"  id="collapse1">
                  <div class="h1 mb-3">
                    <i class="bi-laptop"></i>
                  </div>
                  <h3 class="card-title mb-3">Support</h3>
                  <p class="card-text">Welcome to the support page for KashTracker. Our goal is to provide you with the best possible experience while using our app. Here you will find answers to the most frequently asked questions.</p>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card bg-secondary text-light">
                <div class="card-body text-center"  id="collapse1">
                  <div class="h1 mb-3">
                    <i class="bi-laptop"></i>
                  </div>
                  <h3 class="card-title mb-3">Planning</h3>
                  <p class="card-text">Welcome to KashTracker, your personal finance management tool. With our app, you can easily track your income and expenses, set budgets, and plan for a financially secure future.</p>
                 
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card bg-info text-light">
                <div class="card-body text-center"  id="collapse1">
                  <div class="h1 mb-3">
                    <i class="bi-laptop"></i>
                  </div>
                  <h3 class="card-title mb-4">Budget</h3>
                  <p class="card-text">Welcome to KashTracker, the smart way to manage your finances. Let's help you plan. Our app is designed to help you take control of your budget and reach your financial goals.</p>
                
                </div>
              </div>
            </div>

            
          </div>

        </div>

      </section>


            <div class="container mob-clients" style="margin-top: -49px; ">
                <div class="col-12 text-center ">
                    <h2 class="mt-5 mb-5 font-weight-light mob-ourclients">Our clients </h2>
                    <h3 style="margin-top: -23px;" class="p-5">Trusted by more than 1000 organizations globally.</h3>
                </div>
  
                <div class="text-center p-5">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/benzlogo.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/companylogo.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/apple.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<h2 id="Questions"style="text-align:center">FREQUENTLY ASKED QUESTIONS</h2>

<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header .fs-1" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        What is the expense KasHtracker app about?
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body .fs-1 fw-bold">The expense KasHtracker app is a mobile or desktop application that helps individuals or businesses keep track of their expenses. The app can be used to track and categorize expenses, set budgets, generate reports, and provide insights into spending habits.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header .fs-1" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        How does the expense KasHtracker app work?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body .fs-1 fw-bold">The Expense KasHtracker app usually require users to manually enter their expenses, either by inputting the information manually or by scanning receipts. Some apps can also automatically categorize expenses by using data from bank accounts or credit cards. Once the expenses are entered, the app can provide insights into spending habits and help users identify areas where they can save money.
</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header .fs-1" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Is the expense KasHtracker app safe?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body .fs-1 fw-bold">Yes.The expense KasHtracker app take security seriously and use encryption to protect user data. However, it's important to read the app's privacy policy and make sure that the app does not share personal information with third parties without consent. Users should also use strong passwords and keep their devices secure to prevent unauthorized access.
</div>
    </div>
  </div>
</div>

<a class="btn btn-primary" href="#" role="button" id="Home">Back to Top</a>

  


<?php include_once('includes/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="Scripts/jquery.min.js"></script>
    <script type="text/javascript">

    </script>
  
  
</body>
</html>