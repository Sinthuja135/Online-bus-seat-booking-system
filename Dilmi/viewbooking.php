<?php

session_start();
 if(!isset($_SESSION['id'])){
  header("location:login.php");
 }

if(isset($_POST['search']))
{
   $valueToSearch = $_POST['valueToSearch'];
   $valueToSearch1 = $_POST['valueToSearch1'] ;
    $valueToSearch2 = $_POST['valueToSearch2'] ;
   
   $query = '';
   if(!empty($valueToSearch) && !empty($valueToSearch1)&& !empty($valueToSearch2) ):

      $query = "SELECT * FROM user INNER JOIN seatreserve ON user.emailAddress = seatreserve.emailAddress WHERE  seatreserve.fromDestination LIKE '%".$valueToSearch1."%' and seatreserve.bookedDate LIKE '%".$valueToSearch."%' and seatreserve.bustype LIKE '%".$valueToSearch2."%'  ";

   elseif(!empty($valueToSearch)):
      $query = "SELECT * FROM user INNER JOIN seatreserve ON user.emailAddress = seatreserve.emailAddress WHERE  seatreserve.bookedDate LIKE '%".$valueToSearch."%'  ";

   elseif(!empty($valueToSearch1)):
      $query = "SELECT * FROM user INNER JOIN seatreserve ON user.emailAddress = seatreserve.emailAddress WHERE  seatreserve.fromDestination LIKE '%".$valueToSearch1."%'  ";

  elseif(!empty($valueToSearch2)):
      $query = "SELECT * FROM user INNER JOIN seatreserve ON user.emailAddress = seatreserve.emailAddress WHERE  seatreserve.bustype LIKE '%".$valueToSearch2."%'  ";
   
   else:
      $query = "SELECT * FROM user INNER JOIN seatreserve ON user.emailAddress = seatreserve.emailAddress"; 
   endif;
   $search_result = !empty($query)? filterTable($query) : null;

}
 else {
    $query = "SELECT * FROM user INNER JOIN seatreserve ON user.emailAddress = seatreserve.emailAddress"; 
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "travels");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>



<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<?php include ("link.php"); ?>
  </head>
  

  <body class="hold-transition skin-red sidebar-mini">
    <?php include ("header.php"); ?>  
    <div class="wrapper">
       <?php include ("nav.php"); ?> 
     
<div class="content-wrapper">
  
   <section class="content-header">
      <h1>
        View Seat Booking Details
      </h1>
      <ol class="breadcrumb" style="font-size:16px">
         <li><a href="#"><i class="fa fa-book"></i>Home</a></li>
         <li><a href="#">Staff </a></li>
         <li class="active">View Seat Booking Details</li>
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
                  <h3 class="box-title">View Seat Booking Details </h3>
               </div>
             
               <div class="box-body">
                <form action="viewbooking.php" method="post">
              <br/>
              <input type="date" name="valueToSearch" placeholder="Booked Date"> &nbsp &nbsp &nbsp
               <select type="text" name="valueToSearch1" placeholder="From Station">
               <option>From Station</option>
                <option>Jaffna</option>
                <option>Badulla</option>
               </select> &nbsp &nbsp &nbsp
               <select type="text" name="valueToSearch2" placeholder="Bus Type">
              <option>Bus Type </option>
               <option>NON A/C </option>
               <option>A/C </option>
             </select>&nbsp &nbsp &nbsp
              <input type="submit" name="search" value="Search"  class="btn btn-primary" style="background-color: #0345af;padding-right: 80px"><br><br>
        <table class="table table-bordered table-striped datatable">

                         <tr>  
                              <th width="30">Booking Id</th> 
                              <th width="">Seat No</th>
                                <th width=""> Booked Date</th>
                              <th width="">From Station</th>
                              <th width="">To Station</th> 
                             <th width="">First Name</th> 
                              <th width="">NIC</th>  
                              <th width="">Phone</th>
                              <th width="">Bus Type</th>
                             
                              
                               
                          </tr>  
                          <?php while($row = mysqli_fetch_array($search_result)):?>
                          <tr>  
                              

                               <td><?php echo $row["booking_id"]; ?></td>
                               <td><?php echo $row["booked"]; ?></td>
                               <td><?php echo $row["bookedDate"]; ?></td>
                               <td><?php echo $row["fromDestination"]; ?></td>
                               <td><?php echo $row["toDestination"]; ?></td>
                               <td><?php echo $row["first_name"]; ?></td>
                               <td><?php echo $row["nic"]; ?></td>
                               <td><?php echo $row["phone"]; ?></td>
                               <td><?php echo $row["bustype"]; ?></td>
                               
                               
                              
                            
                
                          
                          <?php endwhile;?>
                          </tr> 
                     </table> 
                   </form>
                 </div>
               </div>
             </div>
           </div>
         </section>
                   
                    
</div>
                   


<div class="modal fade modal-wide" id="popup-bookingpointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
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
    
  
</body>

</html>





