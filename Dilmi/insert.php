<?php

//host
$host = "localhost";
//user name
$username = "root";
//database password
$pwd = "";
//database name.
$db = "travels";

$con=mysqli_connect($host,$username,$pwd,$db) or die("Unable to Connect");
 // $bustype1 = $_POST['bustype1'];
 $bustype = $_POST['bustype'];
 $from = $_POST['from_station'];
 $date = $_POST['journey_date'];
  $time = $_POST['journey_time'];
   $to = $_POST['to_station'];
    $people = $_POST['people'];
     $day = $_POST['day'];
      $price = $_POST['price'];
       $emailAddress = $_POST['emailAddress'];

 $Sql_Query = "insert into reservation (bustype,from_station,journey_date,journey_time,to_station,people,day,price,emailAddress) 
 values ('$bustype','$from','$date','$time','$to','$people','$day','$price','$emailAddress')";
 
// $Sql_Query = "insert into reservation (bustype,from_station,journey_date,journey_time,to_station,people,day,price) 
//  values ('Non-Ac','from','2019-06-14','17:00:00','to','55','5','60000')";
 
 if(mysqli_query($con,$Sql_Query)){
 
 echo 'Data Inserted Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>
