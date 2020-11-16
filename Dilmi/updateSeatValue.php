<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 	$selectedID = $_POST['selectedID'];
	$pieces = explode(",", $selectedID);
 	$selectedDate = $_POST['date'];
 	$from = $_POST['from'];
 	$ac=$_POST['ac'];
 	$emailAddress = $_POST['emailAddress'];
	

 	// $CheckSQL = "SELECT * FROM seatReserve WHERE bookedDate='$selectedDate'";

if($from == 'Jaffna'){

		foreach($pieces as $key=>$value){
      $Sql_Query = "INSERT INTO seatReserve (booked, bookedDate, id, emailAddress, fromDestination, toDestination,bustype) VALUES ($value, '$selectedDate','0', '$emailAddress', 'Jaffna', 'Badulla','$ac')";
      print "$Sql_Query \n";
      $res = mysqli_query($con, $Sql_Query);
	}
} else if($from == 'Badulla'){

			foreach($pieces as $key=>$value){
      $Sql_Query = "INSERT INTO seatReserve (booked, bookedDate, id, emailAddress, fromDestination, toDestination,bustype) VALUES ($value, '$selectedDate', '1', '$emailAddress', 'Badulla', 'Jaffna','$ac')";
      print "$Sql_Query \n";
      $res = mysqli_query($con, $Sql_Query);
	}

}






 if($res)
{
 echo 'Selected Seats Updated Successfully';
}
else
{
 echo 'Something went wrong in database side';
 }
}
 mysqli_close($con);
?>
