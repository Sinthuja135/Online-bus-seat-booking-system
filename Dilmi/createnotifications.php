  <?php 
include 'connection.php';
include 'notificationsDB.php';
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
        Notifications
      </h1>
      <ol class="breadcrumb"  style="font-size:16px">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Notifications</a></li>
         <li class="active">Add New Notifications</li>
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
                  <h3 class="box-title">Add New Notifications</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
          <form   method="post" >
                       <div class="box-body">                 
                     <div class="col-md-6">
                     
                        
                         <div class="form-group">
                       <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title" id="News_title" maxlength="255" required/>         
                        </div>                  
                        <div class="form-group has-feedback">
                           <label class="control-label">Description</label>
                    <textarea type="text" rows="4" class="form-control" name="descripe" id="News_description" required></textarea>    </div>
                
<div class="form-group has-feedback">
                           <label class="control-label">Photo</label>
                    <input type="file"  name="photo"><br>
                        </div>
                       
                          
                    
                          
                                                     
                        
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <input type="submit" class="btn btn-primary" name="save" value="Create new" />   
                  </div>
                   </div>
                   <div class="col-md-6">
                   
                       
             <?php  

$objnoti=new Notification();
extract($_POST);
//Saved Records Inside Database
if(isset($save))
{
//here admin is table name, $userName and $pass  entered by html form  
$objnoti->saveNotifications("news",$title,$descripe,$photo);

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
