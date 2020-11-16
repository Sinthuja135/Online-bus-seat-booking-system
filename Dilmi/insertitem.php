
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
 
 $name = $_POST['name'];
 $subject = $_POST['subject'];
 $feedback = $_POST['feedback'];

 
  // $ratingg = $_POST['rating'];
 $Sql_Query = "insert into feedback (name,feedback) values ('$name','$feedback')";
 
 if(mysqli_query($con,$Sql_Query)){
 
 echo 'Data Inserted Successfully';
 
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>