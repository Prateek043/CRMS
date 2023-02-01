<?php
ob_start();
include('../main/connect.php');
include('navbar.php');
$caseid=$_GET['id'];
$firid=$_GET['id1'];
// $sql1="select * from `crime` where caseid=$caseid";
// $query1=mysqli_query($con,$sql1);
// $update=mysqli_fetch_assoc($query1);

?>
<div class="container">
        <div class="row">
            <div class="col-md-5 m-auto bg-info text-white p-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <p class="text-center font-weight-bold" style="font-size:26px;">Criminal Details</p>
                    <div class="mb-3">
                        <label for="">Criminal Id</label>
                    <input type="text" name="criminalid" class="form-control" required  >
                </div>
                <div class="mb-3">
                        <label for="">Case Id</label>
                    <input type="text" name="caseid" class="form-control" required value=<?=$_GET['id'];?>>
                </div>
                    <div class="mb-3">
                        <label for="">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" class="form-control" required  >
                </div>
                <div class="mb-3">
                        <label for="">Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" required  >
                </div>
                <div class="mb-3">
                <label for="">Gender</label>
                    <input type="text" name="gender" placeholder="Gender" class="form-control" required >
                </div>
                <div class="mb-3">
                <label for="">Age</label>
                    <input type="text" name="age" placeholder="Age" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                    <div class="mb-3">
                    <input type="submit" name="add" class="btn btn-dark" value="submit">
                    </div>
                </form>
            </div>
        </div>
</div>
<?php
if(isset($_POST['add'])){
    $cid=$_POST['criminalid'];
    $caseid=$_POST['caseid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $image=$_FILES['image'];
    $filename=$image['name'];
    $fileerror=$image['error'];
    $filetemp=$image['tmp_name'];
    $fileextension=explode('.',$filename);
    $filecheck=strtolower(end($fileextension));
    $fileextstored=array('png','jpeg','jpg');
    if(in_array($filecheck,$fileextstored)){
        $destination='upload/'.$filename;
        move_uploaded_file($filetemp,$destination);
        $check="select * from criminal where criminalid=$cid";
        $checkrun=mysqli_query($con,$check);
        $rows=mysqli_num_rows($checkrun);
        if($rows){
            $msg=['Criminal alredy existed','alert-info'];
            $_SESSION['msg']=$msg;
            header("location:action.php");
        }
        else{
            $sql="insert into `criminal`(`criminalid`,`caseid`,`fname`,`lname`,`gender`,`age`,`image`) values ('$cid','$caseid','$fname','$lname','$gender','$age','$destination')";
            $queryexecute=mysqli_query($con,$sql);
            if($queryexecute){
            $msg=['Criminal Details has been Updated','alert-success'];
                $_SESSION['msg']=$msg;
                header("location:action.php");
        }
        else{
            $msg=['Criminal Details has been not been Updated','alert-danger'];
                $_SESSION['msg']=$msg;
                header("location:action.php");
        }
    }
}
    else{
        die(mysqli_error($con));
    }
}
?>
<h1 class="text-center text-white bg-dark m-3">Your Entered Data:</h1>
    <br>
    <table class="table table-bordered  text-center">
  <thead>
    <tr>
    <th scope="col">Criminal Id</th>
    <th scope="col">Case Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Age</th>
      <th scope="col">Profile Pic</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php
                $displayquery="select * from criminal";
                $querydisplay=mysqli_query($con,$displayquery);
                while($result=mysqli_fetch_array($querydisplay)){
                    ?>
                    <tr>
                        <td><?php echo $result['criminalid'];?></td>
                        <td><?php echo $result['caseid'];?></td>
                        <td><?php echo $result['fname'];?></td>
                        <td><?php echo $result['lname'];?></td>
                        <td><?php echo $result['gender'];?></td>
                        <td><?php echo $result['age'];?></td>
                        <td><img src="<?php echo $result['image'];?>"height="100px" width="100px"></td>
                        <td><a href="punishment.php?id=<?=$result['criminalid']?>&id1=<?=$firid?>" class="btn btn-sm btn-success mt-2">ADD Punishment</a></td>
                    </tr>
                <?php
                }

  ?>
  </tbody>
            </table>
<?php include('footer.php');?>