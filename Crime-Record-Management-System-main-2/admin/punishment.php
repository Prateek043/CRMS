<?php
ob_start();
include('../main/connect.php');
include('navbar.php');
$id=$_GET['id'];
if(empty($id)){
    header('location:punishmentcopy.php');
}
// $state=$_GET['status'];
$sqlchecking="SELECT * FROM criminal c,crime f WHERE c.caseid=f.caseid and criminalid='$id'";
$sqlqueryexecute=mysqli_query($con,$sqlchecking);
$update=mysqli_fetch_assoc($sqlqueryexecute);
?>
<div class="container">
        <div class="row">
            <div class="col-md-5 m-auto bg-info text-white p-4">
                <form action="" method='POST'>
                    <p class="text-center font-weight-bold" style="font-size:26px;">Punishment</p>
                    <div class="mb-3">
                <label for="">Criminal id</label>
                    <input type="text" name="criminalid" placeholder="Criminal Id" class="form-control" required value=<?=$update['criminalid']?>>
                </div>
                    <div class="mb-3">
                        <label for="">Crime Type</label>
                        <input type="text" name="crimetype" placeholder="Crime Type" class="form-control" required value=<?=$update['crimetype']?>>
                </div>
                <div class="mb-3">
                <label for="">Section</label>
                    <input type="text" name="section" placeholder="Section" class="form-control" required value=<?=$update['section']?> >
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Punishment Given</label>
                    <textarea class="form-control" name="punishment" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                    <div class="mb-3">
                    <input type="submit" name="punish" class="btn btn-dark" value="submit">
                    </div>
                </form>
            </div>
        </div>
</div>
<?php 
include('footer.php');
// $statussql="update punishment set status=$state where punishmentid=$firid";
// $statussql=mysqli_query($con,$statussql);
// if($statussql){
// echo "success";
// }
echo $_GET['id1'];;
if(isset($_POST['punish'])){
    $criminalid=$_POST['criminalid'];
    $firid=$_GET['id1'];
    $crimetype=$_POST['crimetype'];
    $section=$_POST['section'];
    $punishment=$_POST['punishment'];
    $check="select * from punishment where criminalid=$criminalid";
    $checkrun=mysqli_query($con,$check);
    $rows=mysqli_num_rows($checkrun);
    if($rows){
        $msg=['Punishment alredy given','alert-info'];
        $_SESSION['msg']=$msg;
        header("location:newfir.php");
    }else{
    $sql1="insert into punishment(criminalid,firid,crimetype,section,punishment,status)values('$criminalid','$firid','$crimetype','$section','$punishment',1)";
    $query1=mysqli_query($con,$sql1);
    if($query1){
        $idq=$_GET['id'];
        $sqlapprove="UPDATE fir f,punishment p set approve='1' where f.firid=p.punishmentid or criminalid='$idq'";
        $abc=mysqli_query($con,$sqlapprove);
        if($abc){
        $msg=['Punishment Given successfully','alert-info'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
        }
    }else{
        $msg=['Try again','alert-info'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
}
}
else{
    die(mysqli_error(die));
}
?>