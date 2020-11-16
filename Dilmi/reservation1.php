<?php  
session_start();
 if(!isset($_SESSION['id'])){
  header("location:login.php");
 }
 $connect = mysqli_connect("localhost", "root", "", "travels");  
 $sql = "SELECT * FROM user INNER JOIN reservation ON user.emailAddress = reservation.emailAddress"; 
 
 $result = mysqli_query($connect, $sql);  
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
        View Reservation Details
      </h1>
      <ol class="breadcrumb" style="font-size:20px">
         <li><a href="#"><i class="fa fa-book"></i>Home</a></li>
         <li><a href="#">Reservation </a></li>
         <li class="active">View Reservation Details</li>
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
                  <h3 class="box-title">View Reservations Details</h3>
               </div>
             
               <div class="box-body">
        <table class="table table-bordered table-striped datatable">

                         <tr>  
                                <th width="">Reservation Id</th> 
                                <th width="">Bus Type</th> 
                                <th width=""> From station</th> 
                                <th width="">Journey Date</th>
                                <th width=""> Journey Time</th>
                                <th width="">To Station</th> 
                                <th width=""> No of People</th>  
                                <th width="">No of Days</th>  
                                <th width="">Price</th>
                                 <th width="">First Name</th>
                                <!--<th width="">NIC</th>-->
                                <!--<th width="">Email</th>-->
                                 <th width="">Telephone Number</th>
                                  
                                <th width="">View</th>
                                <th width="">Confirm</th>
                                <th width="">Reject</th> 
    
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                                $rd=$row['phone'];
                          ?>  
                          <tr>  
                              

                               <td><?php echo $row["reservation_id"]; ?></td>
                               <td><?php echo $row["bustype"]; ?></td> 
                               <td><?php echo $row["from_station"]; ?></td> 
                              <td><?php echo $row["journey_date"]; ?></td>  
                               <td><?php echo $row["journey_time"]; ?></td>
                               <td><?php echo $row["to_station"]; ?></td> 
                               <td><?php echo $row["people"]; ?></td> 
                               <td><?php echo $row["day"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><?php echo $row["first_name"]; ?></td>
                               <!--<td><?php echo $row["nic"]; ?></td>-->
                               <!--<td><?php echo $row["emailAddress"]; ?></td>-->
                            
                 <td><?php echo $rd ; ?></td> 
                        

                    <td><a class='btn btn-sm bg-olive show-busgetdetails' href="viewreservation.php?view=1&reservation_id=<?php echo $row["reservation_id"]?>" > <i class='fa fa-fw fa-eye'></i>View</a></td>  
                    
                          <td><?php echo" <form action='' method='post'> 
                          <div>
                          
                         
                          <input type ='submit' class='btn btn-success'  name='confirm'  value='Confirm'> 
                          </div>
                          </form>"?></td>
                      
                    <td><?php echo" <form action='' method='post'> 
                          <div>
                          
                         
                          <input type ='submit' class='btn btn-danger'  name='cancel'  value='Reject'> 
                          </div>
                          </form>"?></td>
                             <?php }
                           }
                             ?>    
                          </tr> 
                     </table>  
 <?php
 if (isset($_POST["confirm"])) {
include "NexmoMessage.php";
            /**
             * To send a text message.
             *
             */
            // Step 1: Declare new NexmoMessage.
echo $rd;

            $nexmo_sms = new NexmoMessage('b72bf1a8', '0d295EgvDLaYs0d6');
            // Step 2: Use sendText( $to, $from, $message ) method to send a message.
            $info = $nexmo_sms->sendText("+94$rd", 'MyApp', "Your Reservation is conformed");
            // Step 3: Display an overview of the message
            echo $nexmo_sms->displayOverview($info);
}

?> 
 
 <?php
 if (isset($_POST["cancel"])) {
include "NexmoMessage.php";
            /**
             * To send a text message.
             *
             */
            // Step 1: Declare new NexmoMessage.
echo $rd;

            $nexmo_sms = new NexmoMessage('b72bf1a8', '0d295EgvDLaYs0d6');
            // Step 2: Use sendText( $to, $from, $message ) method to send a message.
            $info = $nexmo_sms->sendText("+94$rd", 'MyApp', "Sorry, We are not able to accept your bus reservation due to unavailability ");
            // Step 3: Display an overview of the message
            echo $nexmo_sms->displayOverview($info);
}

?> 
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
</div>
</body>

</html>





