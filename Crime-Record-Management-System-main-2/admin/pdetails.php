<?php 
ob_start();
include('../main/connect.php');
include('navbar.php');
if(isset($_SESSION['user_data'])){
    $id=$_SESSION['user_data']['0'];
    $username=$_SESSION['user_data']['1'];
}
if(isset($_POST['add_details'])){
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $number=mysqli_real_escape_string($con,$_POST['number']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $date=mysqli_real_escape_string($con,$_POST['date']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    
            $sql2="update  users set fname='$fname',lname='$lname',number='$number',email='$email',date='$date',address='$address' where id='$id'";
            $query2=mysqli_query($con,$sql2);
            if($query2){
                $msg=['Details has been Updated','alert-success'];
                $_SESSION['msg']=$msg;
                header("location:index.php");
            }
            else{
                $error="Failed,please try again";
            }
        }
?>
<div class="container">
        <div class="row">
            <div class="col-md-5 m-auto bg-info p-4">
                <?php
                    if(!empty($error)){
                        echo "<p class='bg-danger text-white p-2'>".$error."</p>";
                    }
                ?>
                <form action="" method="post">
                    <p class="text-center font-weight-bold">Update Personal Details</p>
                <div class="mb-3">
                    <input type="text" name="fname" placeholder="First Name" class="form-control" required >
                </div>
                <div class="mb-3">
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="integer" name="number" placeholder="Mob No" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" class="form-control" value=<?=$email?> required>
                </div>
                <div class="mb-3">
                    <input type="date" name="date" placeholder="D.O.B" class="form-control"required >
                </div>
                <div class="mb-3">
                    <input type="text" name="address" placeholder="address" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="add_details" class="btn btn-dark" value="Update">
                </div>
                </form>
            </div>
        </div>
</div>
<br>
<?php include('footer.php')?>
