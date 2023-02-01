<?php
ob_start();
include('../main/connect.php');
include('navbar.php');
?>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#myModal">
  Approved Fir
</button>

<!-- The Modal -->
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
									$sql = "SELECT * FROM fir ORDER BY firid";
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
                           <a href="punishment.php?id=<?=$result['firid']?>"class="btn btn-sm btn-success">Punishment</a>
                        </td>
                        <td>
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
<div class="container-fluid">
<div class="card shadow">
<div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Fir Type</th>
                     <th>Fir Date</th>
                     <th>Fir Description</th>
                     <th colspan="4">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     $sql="select * from fir where state=0";
                     $query=mysqli_query($con,$sql);
                     $rows=mysqli_num_rows($query);
                     $count=0;
                     if($rows){
                          while($result=mysqli_fetch_assoc($query)){
                              ?>
                                 <tr>
                                    <td><?php echo ++$count ?></td>
                                    <td><?php echo $result['firtype']?></td>
                                    <td><?php echo $result['firdate']?></td>
                                    <td><?php echo $result['firdesc']?></td>
                                    <td>
                                      
                                     <form action="#" method="POST"  onsubmit="return confirm('Are you sure you want to Accept?')">
                                       <input type="hidden" name="firid" value="<?php echo $result["firid"]?>">
                                         <input type="submit" name="acceptfir" value="Accept" class="btn btn-sm btn-primary">
                                       </form>
                          </td><td>
                                    <form action="#"method="POST"  onsubmit="return confirm('Are you sure you want to Reject?')">
                                       <input type="hidden" name="firid" value="<?php echo $result["firid"]?>">
                                         <input type="submit" name="rejectfir" value="Reject" class="btn btn-sm btn-danger">
                                       </form>
                                      
                                    </td>
                                 </tr>
                              <?php
                           }
                       }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
      </div>
      </div>
<?php include('footer.php');
if(isset($_POST['acceptfir'])){
    $id=$_POST['firid'];
    $state=1;
    $sql2="update fir set state='$state' where firid='$id'";
    $queryexecuted=mysqli_query($con,$sql2);
    if($queryexecuted){
        $msg=['Fir has been Accepted','alert-success',1];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
    else{
        $msg=['Try again','alert-info'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
}
if(isset($_POST['rejectfir'])){
    $id=$_POST['firid'];
    $state=0;
    $sql2="update fir set state='$state' where firid='$id'";
    $queryexecuted=mysqli_query($con,$sql2);
    if($queryexecuted){
        $msg=['Fir has been Rejected','alert-success',0];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
    else{
        $msg=['Try again','alert-info'];
        $_SESSION['msg']=$msg;
        header("location:index.php");
    }
}
?>