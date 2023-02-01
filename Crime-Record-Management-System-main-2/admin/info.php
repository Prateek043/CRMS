<?php 
include('../main/connect.php');
include('navbar.php');
$firid=$_GET['id'];
?>
<table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
								<th>Fir id</th>
								<th>FirType</th>
								<th>Fir Date</th>
								<th>Location</th>
								<th>Fir Desc</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th>Punishment</th>
                        <th scope="col">Image</th>
							</thead>
							 <tbody>
							 	<?php 
									 $sql="SELECT * from fir f,criminal c,punishment p where f.firid=p.firid and p.criminalid=c.criminalid and f.firid=$firid";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
									 <td><?php echo $result['firid'];?></td>
							 		<td><?php echo $result['firtype']; ?></td>
							 		<td><?php echo $result['firdate']; ?></td>
							 		<td><?php echo $result['location']; ?></td>
							 		<td><?php echo $result['firdesc']; ?></td>
                            <td><?php echo $result['fname'];?></td>
                            <td><?php echo $result['lname'];?></td>
							 		<td><?php echo $result['punishment']; ?></td>
                            <td><img src="<?php echo $result['image'];?>"height="100px" width="100px"></td>
							 	</tr>
                        <?php
                           }
                           ?>
							 </tbody>
						</table>

<?php
include('footer.php');
?>