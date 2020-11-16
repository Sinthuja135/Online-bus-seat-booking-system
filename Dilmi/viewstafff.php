<?php 
 include 'DbConfig.php';
include 'Crud.php';
//  if(!isset($_SESSION['id'])){
//   header("location:login.php");
//  }

$viewstaff = new Crud();
 
//getting id from url
$id = $viewstaff->escape_string($_GET['id']);
 
//selecting data associated with this particular id
$result = $viewstaff->getData("SELECT * FROM staff WHERE id=$id");
 
foreach ($result as $res) {
   $id = $res['id'];
    $firstname = $res['firstname'];
    $lastname = $res['lastname'];
    $email = $res['email'];
    $nic = $res['nic'];
    $phone = $res['phone'];
    $address = $res['address'];
    
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
         Staffs
      </h1>
      <ol class="breadcrumb" style="font-size:16px">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Staffs</a></li>
         <li class="active">View Staff Details</li>
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
                  <h3 class="box-title">View Staff Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
          <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group " >
                           <label>Staff Id</label>  
                          <input type="text" readonly name="id" value="<?php echo $id;?>" class="form-control" />
                            
                           
                        </div>         
            
             <div class="form-group">
                          <label class="control-label">Firstname</label>
                          <input type="text"  readonly name="firstname" value="<?php echo $firstname;?>" class="form-control" />  
                                     
                       </div>
            <div class="form-group ">
                          <label>Last Name</label>  
                          <input type="text"  readonly name="lastname" value="<?php echo $lastname;?>" class="form-control" />
                        
                        </div>



            
              



                        <div class="form-group">
               <label >Nic</label> 
                          <input type="Email" readonly name="nic" value="<?php echo $nic;?>" class="form-control" /> 
                
                </div>                 
                   
              </div>
              
               
              
              
          <div class="col-md-6">
                  
                        <div class="form-group">
                          <label class="control-label">Email</label> 
                          <input type="email" readonly name="email" value="<?php echo $email;?>" class  ="form-control" />  
                        </div>

                        <div class="form-group has-feedback">
                          <label class="control-label">Telephone Number</label> 
                          <input type="text" readonly name="phoneno" value="<?php echo $phone;?>" class="form-control" /> 
                        </div>
                        
                        <div class="form-group has-feedback">
                          <label class="control-label">Address</label> 
                          <input type="text" readonly name="address" value="<?php echo $address;?>" class="form-control" /> 
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
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="#">Techware Solution</a>.</strong> All rights reserved.
      </footer>
    
    </div>
    

  
  
  
  
  </body>
</html>
