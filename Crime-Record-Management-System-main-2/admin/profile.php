<?php include('../main/connect.php');
include('navbar.php');
?>
<!-- <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Personal details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"> -->
      <TABLE class="table table-hover">
<TR VALIGN=TOP>
    <h1 class="text-center">Personal Detail<h1>
   <?php
   $sql="select * from users where id=$id";
   $query=mysqli_query($con,$sql);
   $row=mysqli_num_rows($query);
   if($row){
      while($result=mysqli_fetch_assoc($query)){
         ?>
         <TR>
<TH>UserName</TH>
<TD><?=$result['username'];?></TD>
      </TR>
<TR>
<TH>Email</TH>
<TD><?=$result['email'];?></TD>
</TR>
<TR>
<TH>First Name</TH>
<TD><?=$result['fname'];?></TD>
</TR>
<TR>
<TH>Last Name</TH>
<TD><?=$result['lname'];?></TD>
</TR>
<TR>
<TH>Phone No</TH>
<TD><?=$result['number'];?></TD>
</TR>
         <?php
   }
   }
   ?>
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button> -->
      <a href="pdetails.php"><button class="btn btn-success">Update</button></a>
      </div>

</TABLE>
      </div>
     