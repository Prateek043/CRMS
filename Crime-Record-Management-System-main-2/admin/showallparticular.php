<?php
include('navbar.php');
include("../main/connect.php");
?>
<h1 class="text-center text-white bg-dark m-3">DATA:</h1>
    <br>
    <table class="table table-bordered  text-center">
  <thead class="thead-dark">
    <tr>
    <th scope="col">Case Id</th>
      <th scope="col">CrimeType</th>
      <th scope="col">Date Of crime</th>
      <th scope="col">Section</th>
      <th scope="col">Details of Crime</th>
      <th scope="col">Criminal Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Age</th>
      <th scope="col">Image</th>
      <th scope="col">Punishment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="text-center">
                <?php
                $id=$_GET['id'];
                $sql="select f.firid,c.caseid,c.crimetype,c.dateofcrime,c.section,c.description,cc.criminalid,cc.fname,cc.lname,cc.gender,cc.age,cc.image,p.punishment from fir f,crime c,criminal cc,punishment p where f.firid=c.firid and c.caseid=cc.caseid and cc.criminalid=p.criminalid and f.firid=$id";
                $querydisplay=mysqli_query($con,$sql);
                while($result=mysqli_fetch_array($querydisplay)){
                    ?>
                    <tr>
                        <td><?php echo $result['caseid'];?></td>
                        <td><?php echo $result['crimetype'];?></td>
                        <td><?php echo $result['dateofcrime'];?></td>
                        <td><?php echo $result['section'];?></td>
                        <td><?php echo $result['description'];?></td>
                        <td><?php echo $result['criminalid'];?></td>
                        <td><?php echo $result['fname'];?></td>
                        <td><?php echo $result['lname'];?></td>
                        <td><?php echo $result['gender'];?></td>
                        <td><?php echo $result['age'];?></td>
                        <td><img src="<?php echo $result['image'];?>"height="100px" width="100px"></td>
                        <td><?php echo $result['punishment'];?></td>
                        <td>
                        <form action="#"method="POST" onsubmit="return confirm('Are you sure you want to Delete?')">
                                       <input type="hidden" name="caseid" value="<?php echo $result['caseid']?>">
                                         <input type="submit" name="deleteall" value="Delete" class="btn btn-sm btn-danger">
                                       </form> </td>       
                    </tr>
                <?php
                }

  ?>
  </tbody>
            </table>
<?php
 include('footer.php');
 if(isset($_POST['deleteall'])){
  $id=$_POST['caseid'];
  $delete="DELETE from crime where caseid=$id";
  $run=mysqli_query($con,$delete);
  if($run){
     $msg=['Record has been deleted successfully','alert-success'];
     $_SESSION['msg']=$msg;
     header("location:showall.php");
  }
  else{
     $msg=['Failed,Please Try Again','alert-danger'];
     $_SESSION['msg']=$msg;
     header("location:showall.php");
  }
}
 ?>
