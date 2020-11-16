<?php 
 include 'DbConfig.php';
include 'Crud.php';
 // if(!isset($_SESSION['id'])){
 //  header("location:login.php");
 // }

$viewnoti = new Crud();
 
//getting id from url
$id = $viewnoti->escape_string($_GET['id']);
 
//selecting data associated with this particular id
$result = $viewnoti->getData("SELECT * FROM news WHERE id=$id");
 
foreach ($result as $res) {
  $id = $res['id'];
    $title = $res['title'];
    $descripe = $res['descripe'];
    $photo = $res['photo'];
   
      // $user_level = $res['user_level'];
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
      <ol class="breadcrumb" style="font-size:16px">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Notifications</a></li>
         <li class="active">View Notifications</li>
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
                  <h3 class="box-title">View Notifications</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
          <form role="form" action="" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-6">
                        <div class="form-group has-feedback" >
                          <label>Notification Id</label>  
                          <input type="text" name="id" readonly value="<?php echo $id;?>" class="form-control" />  
                          <br /> 
                            
                           
                        </div>         
            
             <div class="form-group">
                         <label>Title</label>  
                          <input type="text" name="title" readonly value="<?php echo $title;?>" class="form-control" />   
                                     
                       </div>
            <div class="form-group has-feedback">
                           <label>Description</label>  
                          <input type="text" name="descripe" readonly value="<?php echo $descripe;?>" class="form-control" />  
                        
                        </div>
           <div class="form-group">
                        <label>photo</label>  
                          <input type="text" name="photo" readonly value="<?php echo $photo;?>" class="form-control" />  
                       </div>

            
              <div class="box-footer">
                    <!--  <button  tabindex="10" type="submit" class="btn btn-primary" >Submit</button> -->
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                  </div>             
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
