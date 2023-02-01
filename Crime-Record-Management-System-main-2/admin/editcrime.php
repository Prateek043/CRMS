<?php
ob_start();
include('../main/connect.php');
include('navbar.php');
$id=$_GET['id'];
if(empty($id)){
    header("location:index.php");
}
$sql="select * from `crime` where firid='$id'";
$query=mysqli_query($con,$sql);
$update=mysqli_fetch_assoc($query);
?>
        <div class="card">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary mt-2">Edit Crime</h6>
            </div>
            <div class="card-body">
            <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto bg-info text-white p-4">
                <form action="" method="POST">
                    <p class="text-center font-weight-bold" style="font-size:26px;">Crime Details</p>
                    <div class="mb-3">
                <label for="">Case id</label>
                    <input type="text" name="caseid" placeholder="Case Id" class="form-control" required value=<?=$update['caseid']?> >
                </div>
                    <div class="mb-3">
                <label for="">Fir id</label>
                    <input type="text" name="firid" placeholder="Fir Id" class="form-control" required value=<?=$update['firid']?> >
                </div>
                    <div class="mb-3">
                        <label for="">Crime Type</label>
                        <input type="text" name="crimetype" placeholder="Fir Type" class="form-control " required value=<?=$update['crimetype']?> >
                </div>
                <div class="mb-3">
                <label for="">Section</label>
                    <input type="text" name="section" placeholder="Section" class="form-control" required value=<?=$update['section']?> >
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Crime Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" ></textarea>
                </div>
                <div class="mb-3">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
                </form>
            </div>
        </div>
            </div>   
        </div>
    </div>
<?php include('footer.php');
if(isset($_POST['update'])){
    $caseid=$_POST['caseid'];
    $firid=$_POST['firid'];
    $crimetype=$_POST['crimetype'];
    $section=$_POST['section'];
    $description=$_POST['description'];
    $sql2="UPDATE `crime` SET `caseid`=$caseid,`firid`=$firid,`crimetype`='$crimetype',`section`=$section,`description`='$description' WHERE caseid=$caseid";
    $query2=mysqli_query($con,$sql2);
    if($query2){
        $msg=['crime has been Updated successfully','alert-success'];
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
