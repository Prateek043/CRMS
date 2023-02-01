<?php
include('connect.php');
$success=0;
$exists=0;
$failure=0;
$invalid=0;
if(isset($_POST['signup'])){
      $username=$_POST['username'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $cpassword=$_POST['cpassword'];
      $sql="select * from  `users` where username='$username' and email='$email' and password='$password'";
      $queryexecute=mysqli_query($con,$sql);
      if($queryexecute){
        $num=mysqli_num_rows($queryexecute);
        if($num>0){
          $exists=1;
        }
        else{
          if($password==$cpassword){
          $query="INSERT INTO `users`(`username`, `email`, `password`, `cpassword`, `role`) VALUES ('$username','$email','$password','$cpassword',0)";
          $insertquery=mysqli_query($con,$query);
          if($insertquery){
                $msg=['Registered Successfully','alert-success'];
                session_start();
                $_SESSION['msg']=$msg;
                header("location:login.php");
          }else{
            $failure=1;
          }
        }else{
          $invalid=1;
        }
      }
}
else{
  die(mysqli_error($con));
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>signUp</title>
</head>
<body>
<section class="vh-100" style="background-color: #9A616D;">
<div class="container">
  <div class="row">
    <div class="col-md-1">
    <a href="index.php" style="color:lightskyblue;"><i class="fa-3x fa-solid fa-house-user m-2"></i></a>
    </div>
    <div class="col-md-12">
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./images/satya.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <?php 
                  if($success==1){
                echo '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>Hurray!</strong> You are successfully Registered
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              }
              else if($failure==1){
                echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>Ooops!</strong> Try again
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              }
              else if($invalid==1){
              echo '<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
              <strong>Info!</strong> Password not Matched
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';}
            else if($exists==1){
              echo '<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
              <strong>Ooops!</strong> Registered already 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
                  ?>
                <form method="POST" action="#">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                    <span class="h1 fw-bold mb-0">Sign Up</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create Your Account</h5>
                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example17">Name</label>
                    <input type="text" name="username" id="form2Example17" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example17">Email address</label>
                    <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example27">Password</label>
                    <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                  </div>
                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example27">Confirm Password</label>
                    <input type="password" name="cpassword" id="form2Example27" class="form-control form-control-lg" />
                  <br>
                 
                  <div class="pt-1 mb-4">
                  <button type="submit" name="signup"  value="SignUp"class="btn btn-dark btn-lg btn-block btn-lg">Submit</button>
                  </div>
                  <P class="text-center text-dark">already have an account?</P>
                  <p class="mb-5 pb-lg-2 text-center" style="color: #393f81;"><a href="login.php">Login Here</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>

  
</section>


<!-- ----------------------------------------------------------------------------------- -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>