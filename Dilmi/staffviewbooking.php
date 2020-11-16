<?php 
 include 'DbConfig.php';
include 'Crud.php';

session_start();
 if(!isset($_SESSION['id'])){
  header("location:login.php");
 }
$viewreservation = new Crud();
 
//getting id from url
$reservation_id = $viewreservation->escape_string($_GET['reservation_id']);
 
//selecting data associated with this particular id
$result = $viewreservation->getData("SELECT * FROM reservation WHERE reservation_id=$reservation_id");
 
foreach ($result as $res) {
   $reservation_id = $res['reservation_id'];
   $bustype = $res['bustype'];
    $from_station = $res['from_station'];
  $to_station = $res['to_station'];
    $journey_date = $res['journey_date'];
    $journey_time = $res['journey_time'];
    
    $people = $res['people'];
    $price = $res['price'];
    // $phone = $res['phone'];
      // $user_level = $res['user_level'];
} 
?>
<!DOCTYPE html>
<html>
    <head>
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
         Reservations
      </h1>
      <ol class="breadcrumb" style="font-size:20px">
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
                        <div class="form-group has-feedback" >
                           <label>Reservation Id</label>  
                          <input type="text" readonly name="reservation_id" value="<?php echo $reservation_id;?>" class="form-control" />
                            
                           
                        </div>         
            
             <div class="form-group">
                          <label class="control-label">Bus Type</label>
                          <input type="text"  readonly name="bustype" value="<?php echo $bustype;?>" class="form-control" />  
                                     
                       </div>
            <div class="form-group has-feedback">
                          <label>Start point</label>  
                          <input type="text"  readonly name="from_station" value="<?php echo $from_station;?>" class="form-control" />
                        
                        </div>
            <div class="form-group has-feedback">
                          <label>End point</label>  
                          <input type="text"  readonly name="to_station" value="<?php echo $to_station;?>" class="form-control" />
                        
                        </div>
            
             
              <div class="box-footer">
                    <!--  <button  tabindex="10" type="submit" class="btn btn-primary" >Submit</button> -->
                     <input type="hidden" name="reservation_id" value=<?php echo $_GET['reservation_id'];?>
                  </div>             
                        </div>                   
                   
              </div>
              
              <div class="col-md-6">
              
              <div class="form-group has-feedback">
                          <label>Journey Date</label>  
                          <input type="text"  readonly name="journey_date" value="<?php echo $journey_date;?>" class="form-control" />
                        
                        </div>
            <div class="form-group has-feedback">
                          <label>Journey Time</label>  
                          <input type="text"  readonly name="journey_time" value="<?php echo $journey_time;?>" class="form-control" />
                        
                        </div>

            
           
                <div class="form-group has-feedback">
                          <label class="control-label">Number of Peoples</label> 
                          <input type="Number" readonly name="people" value="<?php echo $people;?>" class="form-control" /> 
                        </div>
                      
        <div class="form-group has-feedback">
                          <label class="control-label">Price</label> 
                          <input type="number" readonly name="price" value="<?php echo $price;?>" class="form-control" /> 
                        </div>
            
           <!--    <div class="form-group has-feedback">
                            <label class="control-label">Age</label>
                          <input type="text" readonly name="nic" value="<?php echo $nic;?>" class="form-control" /> 
                        </div> -->
                  
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
