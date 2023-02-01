<?php
ob_start();
include('../main/connect.php');
include('navbar.php');
$id=$_GET['id'];
if(empty($id)){
    header("location:index.php");
}
$sql="select * from `criminal` where caseid='$id'";
$query=mysqli_query($con,$sql);
$update=mysqli_fetch_assoc($query);
?>
        <div class="card">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary mt-2">Edit Criminal Record</h6>
            </div>
            <div class="card-body">
            <div class="container">
        <div class="row">
        <div class="col-md-5 m-auto bg-info text-white p-4">
            <form action="" method="POST" enctype="multipart/form-data">
                    <p class="text-center font-weight-bold" style="font-size:26px;">Criminal Details</p>
                    <div class="mb-3">
                        <label for="">Criminal Id</label>
                    <input type="text" name="criminalid" class="form-control" required value=<?=$update['criminalid']?> disabled>
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
</div>
                </form>
                </div>
        </div>
            </div>   
        </div>
    </div>
<?php include('footer.php');
if(isset($_POST['add'])){
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
    $sql2="UPDATE `criminal` SET `caseid`='$caseid',`fname`='$fname',`lname`='$lname',`gender`='$gender',`age`='$age',`image`='$destination' WHERE caseid=$caseid";
    $query2=mysqli_query($con,$sql2);
    if($query2){
        $msg=['Criminal Record has been Updated successfully','alert-success'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
    else{
        $msg=['Failed to Update Please Try Again','alert-success'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
}
}
?>
