
            <?php
            include('../main/connect.php');
            include('navbar.php');
            if(!isset($_SESSION['user_data'])){
               header('location:../main/index.php');
           }
            if(isset($_SESSION['user_data'])){
               $id=$_SESSION['user_data']['0'];
               $username=$_SESSION['user_data']['1'];
               $email=$_SESSION['user_data']['2'];
            }
            ?>
            <style>
               thead{
                  background-color:black;
                  color:white;
               }
               </style>
            <!-- End header -->
               <!-- Begin Page Content -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  <h5 class="mb-2 text-gray-800">CRIME RECORD DATABASE MANAGEMENT SYSTEM</h5>
                  <!-- DataTales Example -->
                  <div class="card shadow">
                     <div class="card-header py-3 d-flex justify-content-between">
                     <?php 
            if(isset($_SESSION['user_data'])){
               $name=$_SESSION['user_data']['1'];
                  $admin=$_SESSION['user_data']['3'];
            }
                        if($admin==0){
                        ?>
                       <h1>Welcome <?=$name?></h1>
                       <?php }
                       else{
                        ?>
                        <h1>Welcome Admin</h1>
                        <?php
  if(isset($_GET['keyword'])){
    $keyword=$_GET['keyword'];
  }
  else{
    $keyword="";
  }
    ?>
    <form action="search.php" method="GET"class="form-inline my-2 my-lg-0 ">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" required maxlength="70" autocomplete="off" value="<?=$keyword?>">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
                       </div>
                        <div class="card-body">
                     <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#myModal">Total Fir
                     </button>
                     <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#myModalcrime">Total crime
                     </button>
                     <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#myModalcriminal">Criminal Details
                     </button>
                     <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#myModalpunishment">Punishment Details
                     </button>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- ------------------------------------------------------------------ -->
          <!-- Approved fir -->
            <div class="modal h-100" id="myModal">
  <div class="modal-dialog">
  <div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Total Approved</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table-responsive table-bordered table-hover ">
							<thead>
								<th>Fir Id</th>
								<th>FirType</th>
								<th>Fir Date</th>
								<th>Location</th>
								<th>Fir Desc</th>
                        <th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM fir where state='1'";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
									 <td><?php echo $result['firid'];?></td>
							 		<td><?php echo $result['firtype']; ?></td>
							 		<td><?php echo $result['firdate']; ?></td>
							 		<td><?php echo $result['location']; ?></td>
							 		<td><?php echo $result['firdesc']; ?></td>
                        <!-- <td>
                        <a href="criminal.php?id=<?=$result['firid']?>"class="btn btn-sm btn-success">Criminal Details</a>
                           </td> -->
							 		<td>
							 			<?php 
							 			if ($result['state'] == 0) {
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
</div>
<!-- ---------------------------------------------------------------------------------- -->
                              <!-- Total crime -->
<div class="modal h-100" id="myModalcrime">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Total Crime</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table-responsive table-bordered table-hover ">
							<thead>
                     <th scope="col">Case Id</th>
                     <th scope="col">Firid</th>
                     <th scope="col">Crime Type</th>
                     <th scope="col">Date of Crime</th>
                     <th scope="col">Section</th>
                     <th scope="col">Details of Crime</th>
                     <th scope="col">Edit</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM crime ORDER BY caseid";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
                         <td><?php echo $result['caseid'];?></td>
                        <td><?php echo $result['firid'];?></td>
                        <td><?php echo $result['crimetype'];?></td>
                        <td><?php echo $result['dateofcrime'];?></td>
                        <td><?php echo $result['section'];?></td>
                        <td><?php echo $result['description'];?></td>
                        <td>
                           <a href="editcrime.php?id=<?=$result['firid']?>"class="btn btn-sm btn-success">Edit&Update</a>
                        </td>
							 	</tr>
                        <?php
                           }
                           ?>
							 </tbody>
						</table>
				</div>
				
			</div>
  </div>
</div>

                              <!-- Total criminal -->
 <div class="modal h-100" id="myModalcriminal">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Total Criminal</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover ">
							<thead>
                     <th scope="col">Criminal Id</th>
                     <th scope="col">Case Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Profile Pic</th>
                        <th scope="col">Edit</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM criminal ORDER BY caseid";
									$que = mysqli_query($con,$sql);
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
                         <td><?php echo $result['criminalid'];?></td>
                        <td><?php echo $result['caseid'];?></td>
                        <td><?php echo $result['fname'];?></td>
                        <td><?php echo $result['lname'];?></td>
                        <td><?php echo $result['gender'];?></td>
                        <td><?php echo $result['age'];?></td>
                        <td><img src="<?php echo $result['image'];?>"height="100px" width="100px"></td>
                        <td>
                           <a href="editcriminal.php?id=<?=$result['caseid']?>"class="btn btn-sm btn-success">Edit&Update</a>
                        </td>
							 	</tr>
                        <?php
                           }
                           ?>
							 </tbody>
						</table>
				</div>
				
			</div>
  </div>
</div>             

                               <!-- Total Punishment -->   
   <div class="modal h-100" id="myModalpunishment">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Total Punishment</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table-responsive table-bordered table-hover ">
							<thead class="thead-dark">
                     <th scope="col">Criminal Id</th>
                     <th scope="col">Crime Type</th>
                        <th scope="col">Section</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Punishment</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql3 = "select c.crimetype,c.section,cc.criminalid,cc.fname,cc.lname,cc.image,p.punishment from crime c,criminal cc,punishment p where c.caseid=cc.caseid and cc.criminalid=p.criminalid";
									$que3 = mysqli_query($con,$sql3);
									while ($result3 = mysqli_fetch_assoc($que3)) {
									?>
							 	<tr>
                         <td><?php echo $result3['criminalid'];?></td>
                        <td><?php echo $result3['crimetype'];?></td>
                        <td><?php echo $result3['section'];?></td>
                        <td><?php echo $result3['fname'];?></td>
                        <td><?php echo $result3['lname'];?></td>
                        <td><?php echo $result3['punishment'];?></td>
                        <td><img src="<?php echo $result3['image'];?>"height="100px" width="100px"></td>
                        <td>
                           <a href="editpunishment.php?id=<?=$result3['criminalid']?>"class="btn btn-sm btn-success">Edit&Update</a>
                        </td>
							 	</tr>
                        <?php
                           }
                           ?>
							 </tbody>
						</table>
				</div>
				
			</div>
  </div>
</div>       
                        <?php
                       }
                       ?>
                     </div>
                                            
            <!-- Footer -->
   <?php include('footer.php');?>