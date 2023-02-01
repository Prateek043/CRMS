<?php
include('../main/connect.php');
include ('navbar.php'); 
//search
$keyword=$_GET['keyword'];
$sql="SELECT c.caseid,c.crimetype,c.dateofcrime,c.section,c.description,cc.criminalid,cc.fname,cc.lname,cc.gender,cc.age,cc.image,p.punishment from crime c,criminal cc,punishment p where  c.crimetype=$keyword or c.caseid=$keyword and c.caseid=cc.caseid and cc.criminalid=p.criminalid";
$run=mysqli_query($con,$sql);
$row=mysqli_num_rows($run);
?>
<br>
<div class="container mt-2 mb-2">
<h3>Search result for:<span class="text-primary">CaseNo.<?=$keyword?></span></h3>
	<div class="row">
		<div class="col-lg-8">
            <?php
                if($row){
                    while($result=mysqli_fetch_assoc($run)){
                        ?>
                 <table class="table table-bordered  text-center">
                 <thead class="thead-dark">
    <tr>
    <th scope="col">Case Id</th>
      <th scope="col">CrimeType</th>
      <th scope="col">Date Of crime</th>
      <th scope="col">Section</th>
      <th scope="col">Details of Crime</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Age</th>
      <th scope="col">Image</th>
      <th scope="col">Punishment</th>
    </tr>
  </thead>
  <tbody class="text-center">

                    <tr>
                        <td><?php echo $result['caseid'];?></td>
                        <td><?php echo $result['crimetype'];?></td>
                        <td><?php echo $result['dateofcrime'];?></td>
                        <td><?php echo $result['section'];?></td>
                        <td><?php echo $result['description'];?></td>
                        <td><?php echo $result['fname'];?></td>
                         <td><?php echo $result['lname'];?></td>
                         <td><?php echo $result['gender'];?></td>
                        <td><?php echo $result['age'];?></td>
                        <td><img src="<?php echo $result['image'];?>"height="100px" width="100px"></td>
                        <td><?php echo $result['punishment'];?></td>
                    </tr>
  </tbody>
            </table>
            <?php
                    }
                }
                else{
                    echo "<h5 class='text-danger'>No record Found</h5>";
                }
            ?>
</div>
            </div>
            </div>
<?php
include('footer.php');
?>