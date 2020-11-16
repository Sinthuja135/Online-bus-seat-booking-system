<?php 
session_start();
 if(!isset($_SESSION['id'])){
  header("location:login.php");
 }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dilmi Travels</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php include ("link.php"); ?>
  </head>
  

  <body class="hold-transition skin-red sidebar-mini">
    <?php include ("header.php"); ?>  
    <div class="wrapper">
     
  <?php include ("nav.php"); ?> 
  <!-- Left side column. contains the logo and sidebar -->
      


<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add New Staff
      </h1>
      <ol class="breadcrumb" style="font-size:16px">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Staff Details</a></li>
         <li class="active">Add New Staff</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-12">
                     </div>
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-warning">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Staff Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
          <form   method="post" action="createstaff.php" >
                       <div class="box-body">                 
                     <div class="col-md-6">
                     
                        <script>
function lettersOnly(input) {
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex, "");
}
</script>
                         <div class="form-group">
                        <label class="control-label">Firstname</label>
                        
                   <input type="text" class="form-control" name="firstname"  maxlength="50"   onkeyup="lettersOnly(this)"   required /> 
                        </div>                  
                        <div class="form-group has-feedback">
                           <label class="control-label">Lastname</label>
                   <input type="text" class="form-control" name="lastname"  maxlength="50" onkeyup="lettersOnly(this)"  required /> 
                        </div>
                
<div class="form-group has-feedback">
                          <label class="control-label">Nic</label>
                    <input type="text" class="form-control" name="nic"  maxlength="10"   pattern="[0-9]+V" /> 
                        </div>
                       
                          
                    
                          
                                                     
                        
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <input type="submit" class="btn btn-primary" name="add" value="Create new" />   
                  </div>
                   </div>
                   <div class="col-md-6">
                   
                       <div class="form-group">
 <label class="control-label">Email</label>
                   <input type="email" class="form-control" name="email" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" /> 
                       </div> 
                        <div class="form-group has-feedback">
                               <label class="control-label">Telephone No</label>
                   <input type="tel" pattern="[0-9]{10}" class="form-control" name="phone" maxlength="10"  /> 
                        </div>
                  
                     <div class="form-group has-feedback">
                               <label class="control-label">Address</label>
                   <input type="text"  class="form-control" name="address" maxlength="50" required /> 
                        </div>
 
 <?php
 $connect = mysqli_connect("localhost", "root", "", "travels");
      
if(isset($_POST['add'])) {
             $firstname = $_POST['firstname'];
             $lastname = $_POST['lastname'];
             $nic = $_POST['nic'];
             $email = $_POST['email'];
             $phone = $_POST['phone'];
             $address= $_POST['address'];
             
             $sql = "INSERT INTO staff(firstname,lastname, nic,email ,phone,address) VALUES('$firstname','$lastname','$nic','$email','$phone','$address')";
 
 
 if(!mysqli_query($connect, $sql)){
     echo'Not Inserted';
 }
 else{
    echo'Inserted Successfully'; 
 }

     
}
 ?>
                   </div>
                   
                  </div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
     </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>






<div class="modal fade modal-wide" id="popup-bookingpointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Booking Details</h4>
         </div>
         <div class="modal-bookingbody">
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

     
      
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>edilmi@gmail.com</b>
        </div>
        <strong>Copyright &copy;E-Dilmi Travels <a href="#"> </a>.</strong> All rights reserved.
      </footer>
    
    </div>
    
    
    </div>
    

  
  
  
  
  </body>
</html>
