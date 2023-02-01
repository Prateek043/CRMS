<?php
include('../main/connect.php');
include('navbar.php');   
// $sql="select * from fir f,crime c where f.firid=c.firid";
// $queryexec=mysqli_query($con,$sql);
// $row=mysqli_num_rows($queryexec);
// while($result=mysqli_fetch_assoc($queryexec)){
 
?>

<div class="container">
	<div class="row">
		<div class="col-6 md-12">
		<h1 class="text-danger">Take Action</h1>
		<table class="table table-striped table-hover">
							<thead class="thead-dark">
								<th>Fir Id</th>
								<th>FirType</th>
								<th>Fir Date</th>
								<th>Location</th>
								<th>Fir Desc</th>
                                <th>crime details</th>
                                <!-- <th>Criminal Data</th> -->
                                
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM fir where approve='0' order by firid";
									$que = mysqli_query($con,$sql);		
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
									 <td><?php echo $result['firid'];?></td>
							 		<td><?php echo $result['firtype']; ?></td>
							 		<td><?php echo $result['firdate']; ?></td>
							 		<td><?php echo $result['location']; ?></td>
							 		<td><?php echo $result['firdesc']; ?></td>
                            <td>
                          <a href="crime.php?id=<?=$result['firid']?>" class="btn btn-sm btn-success mt-2 ">Fill Crime Details
						</a>
							 	</tr>
									
								 <?php
									}
						?>
							 </tbody>
						</table>
		</div>
		<div class="col-6 md-12">
		<h1 class="text-success">Approved Cases</h1>
		<table class="table table-striped table-hover">
							<thead class="thead-dark">
								<th>Fir Id</th>
								<th>FirType</th>
								<th>Fir Date</th>
								<th>Location</th>
								<th>Fir Desc</th>
                                <th>See Info</th>
                                <!-- <th>Criminal Data</th> -->
                                <th>status</th>
                                
							</thead>
							 <tbody>
							 	<?php 
									$sql = "select * from fir f,punishment p where f.firid=p.firid";
									$que = mysqli_query($con,$sql);		
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
									 <td><?php echo $result['firid'];?></td>
							 		<td><?php echo $result['firtype']; ?></td>
							 		<td><?php echo $result['firdate']; ?></td>
							 		<td><?php echo $result['location']; ?></td>
							 		<td><?php echo $result['firdesc']; ?></td>
                            <td>
                          <a href="showallparticular.php?id=<?=$result['firid']?>" class="btn btn-sm btn-info mt-2 ">Info
						</a>
							 		<td>
							 			<?php 
							 			if ($result['state'] == 0 ) {
											echo "<span class='badge badge-warning'>Pending</span>";
							 			}
							 			else{
											echo "<span class='badge badge-success'>Approved</span>";
							 			}
                           	}
							 		 ?>
							 		</td>
							 	</tr>
							 </tbody>
						</table>
		</div>
	</div>
</div>		
						
<?php
include('footer.php');
 
?>

