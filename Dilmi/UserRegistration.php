<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $F_name = $_POST['f_name'];
 //$L_name = $_POST['L_name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $nic=$_POST['nic'];
 $phone=$_POST['phone'];
 $CheckSQL = "SELECT * FROM user WHERE emailAddress='$email'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));



 if(isset($check)){

 echo 'Email Already Exist';

 }
else{ 
$Sql_Query = "INSERT INTO user (first_name,emailAddress,user_password,nic,phone) values ('$F_name','$email','$password','$nic','$phone')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'Registration Successfully';
}
else
{
 echo 'Something went wrong in database side';
 }
 }
}
 mysqli_close($con);
?>
