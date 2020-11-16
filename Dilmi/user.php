<?php 
include 'DbConfig.php';
include 'Crud.php';
session_start();
//  if(!isset($_SESSION['id'])){
//   header("location:login1.php");
//  }

$user = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM user ORDER BY user_id DESC";
$result = $user->getData($query);
//echo '<pre>'; print_r($result); exit;
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
        View Customer Details
      </h1>
      <ol class="breadcrumb" style="font-size:16px" >
         <li><a href="#"><i class="fa fa-book"></i>Home</a></li>
         <li><a href="#">Customer </a></li>
         <li class="active">View Customer Details</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
                     </div>
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Customer Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">

               <table class="table table-bordered table-striped datatable">
 
  <tr >
    <th>Customer Id</th>
    <th>First Name</th>
    <th>Email</th>
    <th>Nic</th>
    <th>Telephone Number</th>
    <th>View</th>
  </tr>
  
    <?php 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
      echo "<tr>";
      echo "<td class='center' >".$res['user_id']."</td>";
      echo "<td class='center'>".$res['first_name']."</td>";
      
      echo "<td >".$res['emailAddress']."</td>";
      // echo "<td>".$res['user_password']."</td>";
      echo "<td >".$res['nic']."</td>";
      echo "<td >".$res['phone']."</td>";
        echo "<td> <a class='btn btn-sm bg-olive show-busgetdetails'  href=\"ViewUserr.php?user_id=$res[user_id]\">
                              <i class='fa fa-fw fa-eye'></i> View </a> </td>";        
    }
    ?>
    </table>

               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
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
