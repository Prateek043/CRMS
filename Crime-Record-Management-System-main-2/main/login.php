<?php
$fail=0;
include('connect.php');
if((isset($_POST['login']))){
      $email=$_POST['email'];
      $password=$_POST['password'];
      $role=$_POST['role'];
    $sql="select * from  `users` where email='$email' and password='$password' and role='$role'";
    $queryexecute=mysqli_query($con,$sql);
    if($queryexecute){
        $num=mysqli_num_rows($queryexecute);
        if($num>0){
          $result=mysqli_fetch_assoc($queryexecute);
          $user_data=array($result['id'],$result['username'],$result['email'],$result['role']);
          if(($_POST['email'] == $email) &&
          ($_POST['password'] == $password)) {
              session_start();
              $_SESSION['user_data']=$user_data;
              header('location: ../admin/index.php');
        }else{
            header('location:main/index.php');
        }
    }
    else{
     $fail=1;
    }
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
    <title>Login</title>
</head>
<body>
<section class="vh-80" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
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
                  if($fail==1){
                echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>Ooops!</strong>Invalid credentials
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
                  }?>
                <form action="#" method="POST">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">SignIn</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                  <div class="form-outline mb-4">
                  <?php
                  session_start();
                     if(isset($_SESSION['msg'])){
                        $message=$_SESSION['msg']['0'];
                        $bs_class=$_SESSION['msg']['1'];
                        ?>
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>Hurray!</strong> You are successfully Registered
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                        <?php
                        unset($_SESSION['msg']);
                     }
                  ?>
                    <input type="email"name="email"id="form2Example17" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>
                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example27">Choose Your Role</label><br>
                  <select class="form-select" name="role" aria-label="Default select example">
                        <option selected>Role</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                    </div>
                  <div class="pt-1 mb-4">
                   <button type="submit" name="login"  value="SignIn" class="btn btn-dark btn-lg btn-block">Login</button> 
                  </div>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="signup.php"
                      style="color: #393f81;">Register here</a></p>
                </form>
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