<?php 
ob_start();
include('../main/connect.php');
include('navbar.php');
if(isset($_SESSION['user_data'])){
    $userid=$_SESSION['user_data']['0'];
}
?>
<div class="container">
        <div class="row">
            <div class="col-md-5 m-auto bg-info text-white p-4">
                <form action="" method="POST">
                    <p class="text-center font-weight-bold" style="font-size:26px;">FIR</p>
                    <div class="mb-3">
                        <label for="">Fir Type</label>
                   <select class="form-control mb-3" name="firtype">
                   <option selected>Select crime</option>
                    <option value="Cyber Crime">Cyber Crime</option>
                    <option value="Social Crime">Social Crime</option>
                    <option value="Domestic Violence">Domestic Violence</option>
                    <option value="Murder">Murder</option>
                    <option value="Kidnapping">Kidnapping</option>
                   </select>
                </div>
                <div class="mb-3">
                <label for="">Fir Date</label>
                    <input type="date" name="firdate" placeholder="Fir Date" class="form-control" required >
                </div>
                <div class="mb-3">
                <label for="">Crime location</label>
                    <input type="text" name="location" placeholder="Crime Location" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Fir Description</label>
                    <textarea class="form-control" name="firdesc" id="exampleFormControlTextarea1" rows="5">write the description</textarea>
                </div>
                    <div class="mb-3">
                    <input type="submit" name="fir" class="btn btn-dark" value="submit">
                    </div>
                </form>
            </div>
        </div>
</div>
<?php
include('footer.php');
if(isset($_POST['fir'])){
    $firtype=$_POST['firtype'];
    $firdate=$_POST['firdate'];
    $firdesc=$_POST['firdesc'];
    $firlocation=$_POST['location'];
    $firuserid=$_SESSION['user_data']['0'];
    $sql="insert into fir (firtype,firdate,location,firdesc,firuserid) values('$firtype','$firdate','$firlocation','$firdesc',$firuserid)";
    $query2=mysqli_query($con,$sql);

    if($query2){
        $msg=['Fir has been Reported plz check the status window for further update','alert-success'];
                $_SESSION['msg']=$msg;
                header("location:index.php");
    }
    else{
        $msg=['Try again','alert-danger'];
                $_SESSION['msg']=$msg;
                header("location:fir.php");

    }
}
else{
    die(mysqli_error($con));
}
?>