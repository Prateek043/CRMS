<?php
ob_start();
include('../main/connect.php');
include('navbar.php');
$firid=$_GET['id'];
// $state=$_GET['status'];
$sql="select * from `fir` where firid='$firid'";
$query=mysqli_query($con,$sql);
$update=mysqli_fetch_assoc($query);
?>
<div class="container">
        <div class="row">
            <div class="col-md-5 m-auto bg-info text-white p-4">
                <form action="#" method="POST">
                    <p class="text-center font-weight-bold" style="font-size:26px;">Crime Details</p>
                    <div class="mb-3">
                <label for="">Case id</label>
                    <input type="text" name="caseid" placeholder="Case Id" class="form-control" required>
                </div>
                    <div class="mb-3">
                <label for="">Fir id</label>
                    <input type="text" name="firid" placeholder="Fir Id" class="form-control" required value=<?=$update['firid']?>>
                </div>
                    <div class="mb-3">
                        <label for="">Crime Type</label>
                        <input type="text" name="crimetype" placeholder="Fir Type" class="form-control" required value=<?=$update['firtype']?>>
                </div>
                <div class="mb-3">
                <label for="">Date Of Crime</label>
                    <input type="date" name="dateofcrime" placeholder="Date of Crime" class="form-control" required>
                </div>
                <div class="mb-3">
                <label for="">Section</label>
                    <input type="text" name="section" placeholder="Section" class="form-control" required >
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Crime Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                    <div class="mb-3">
                    <input type="submit" name="addcrime" class="btn btn-dark" value="submit">
                    </div>
                </form>
            </div>
        </div>
</div>
<h1 class="text-center text-white bg-dark m-3">Your Entered Data:</h1>
    <br>
    <table class="table table-bordered  text-center">
  <thead>
    <tr>
    <th scope="col">Case Id</th>
      <th scope="col">Firid</th>
      <th scope="col">Crime Type</th>
      <th scope="col">Date of Crime</th>
      <th scope="col">Section</th>
      <th scope="col">Details of Crime</th>
      <th scope="col">Add Criminal Details</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php
                $displayquery="select * from crime";
                $querydisplay=mysqli_query($con,$displayquery);
                while($result=mysqli_fetch_array($querydisplay)){
                    ?>
                    <tr>
                        <td><?php echo $result['caseid'];?></td>
                        <td><?php echo $result['firid'];?></td>
                        <td><?php echo $result['crimetype'];?></td>
                        <td><?php echo $result['dateofcrime'];?></td>
                        <td><?php echo $result['section'];?></td>
                        <td><?php echo $result['description'];?></td>
                        <td><a href="criminal.php?id=<?=$result['caseid']?>&id1=<?=$firid?>" class="btn btn-sm btn-success mt-2">Add Criminal</a></td>
                    </tr>
                <?php
                }

  ?>
  </tbody>
            </table>
<?php include('footer.php');

// $statussql="update punishment set status=$state where punishmentid=$firid";
// $statussql=mysqli_query($con,$statussql);
// if($statussql){
// echo "success";
// }
if(isset($_POST['addcrime'])){
    $caseid=$_POST['caseid'];
    $firid=$_POST['firid'];
    $crimetype=$_POST['crimetype'];
    $dateofcrime=$_POST['dateofcrime'];
    $section=$_POST['section'];
    $description=$_POST['description'];
    $check="select * from crime where caseid=$caseid";
    $checkrun=mysqli_query($con,$check);
    $rows=mysqli_num_rows($checkrun);
    if($rows){
        $msg=['Case Details alredy Added','alert-info'];
        $_SESSION['msg']=$msg;
        header("location:action.php");
    }else{
  $sql1="insert into crime (caseid,firid,crimetype,dateofcrime,section,description)values('$caseid','$firid','$crimetype','$dateofcrime','$section','$description')";
   $query1=mysqli_query($con,$sql1);
   if($query1){
    $msg=['Case Details added Successfully','alert-info'];
    $_SESSION['msg']=$msg;
    header("location:action.php");
   }
   else{
    $msg=['Try again','alert-info'];
    $_SESSION['msg']=$msg;
    header("location:index.php");
   }
}
}
?>