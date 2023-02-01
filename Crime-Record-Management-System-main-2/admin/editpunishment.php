<?php
ob_start();
include('../main/connect.php');
include('navbar.php');
$id=$_GET['id'];
if(empty($id)){
    header("location:index.php");
}
$sql="select * from `punishment` where criminalid='$id'";
$query=mysqli_query($con,$sql);
$update=mysqli_fetch_assoc($query);
?>
        <div class="card">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary mt-2">Edit Punishment Details</h6>
            </div>
            <div class="card-body">
            <div class="container">
        <div class="row">
        <div class="col-md-5 m-auto bg-info text-white p-4">
            <form action="" method="POST" enctype="multipart/form-data">
                    <p class="text-center font-weight-bold" style="font-size:26px;">Punishment Details</p>
                    <div class="mb-3">
                        <label for="">Criminal Id</label>
                    <input type="text" name="criminalid" class="form-control" required value=<?=$update['criminalid']?> >
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Punishment Given</label>
                    <textarea class="form-control" name="punishment" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                    <div class="mb-3">
                    <input type="submit" name="add" class="btn btn-dark" value="Update">
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
    $criminalid=$_POST['criminalid'];
    $punishment=$_POST['punishment'];
    $sql2="UPDATE `punishment` SET  `punishment`='$punishment' WHERE criminalid=$criminalid";
    $query2=mysqli_query($con,$sql2);
    if($query2){
        $msg=['Punishment has been Updated successfully','alert-success'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
    else{
        $msg=['Failed to Update Please Try Again','alert-success'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
}
?>
