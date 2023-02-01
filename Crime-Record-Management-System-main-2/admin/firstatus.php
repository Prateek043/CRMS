<?php
include('../main/connect.php');
include("navbar.php");
if(isset($_SESSION['user_data'])){
   $userinfo=$_SESSION['user_data']['0'];
}
$sql2="select * from fir";
$query2=mysqli_query($con,$sql2);
$row=mysqli_num_rows($query2);
if($row){
   while($result=mysqli_fetch_assoc($query2)){
         $firid=$result['firid'];
}
}
?>
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Fir Status</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="fir.php">
               <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
            </a>
         </div>
         <div>
         </div>
      </div>
<div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Fir Type</th>
                     <th>Fir Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               <!-- left join user on blog.author_id=user.user_id -->
                  <?php
                     $sql3="SELECT * from `fir` where  firuserid=$userinfo";
                     $query=mysqli_query($con,$sql3);
                     $rows=mysqli_num_rows($query);
                     $count=0;
                     if($rows){
                          while($result=mysqli_fetch_assoc($query)){
                              ?>
                                 <tr>
                                    <td><?php echo ++$count ?></td>
                                    <td><?php echo $result['firtype']?></td>
                                    <td><?php echo $result['firdate']?></td>
                                    <td>
                                       <?php
                                       if($result['state']==1){
                                          echo "<span class='badge badge-warning'>Fir is Approved Keep checking For details</span> ";
                                        if($result['approve']==1){
                                          ?>
                                          <a href="info.php?id=<?=$result['firid']?>"class="btn btn-success">Information</a>
                                       <?php
                                        }
                                       }
                                       else{
                                          echo "<span class='badge badge-warning'>Pending</span>";
                                       }
                                       ?>
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
<!-- -------------------------------------------------------------------------------- -->
<!-- The Modal -->
<!-- <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#myModal">hello</button> -->
<div class="modal h-100" id="myModal">
  <div class="modal-dialog">
  <div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Fir Approved Information</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				
				</div>
				
			</div>
  </div>
</div>
<?php include("footer.php");
?>