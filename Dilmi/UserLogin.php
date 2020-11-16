<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 include 'DatabaseConfig.php';
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 $email = $_POST['email'];
 $password = $_POST['password'];
 
 $Sql_Query = "select * from user where emailAddress = '$email' and user_password = '$password' ";


        $Q2 =mysqli_query($con,$Sql_Query);
        
      
         $row = mysqli_fetch_array($Q2);
          $type=$row['user_level'];
        
      // $count=mysqli_num_rows($result);
     // $isexist=mysqli_query($con,"select * from customer where username='$UN' and password='$Pwd' and status='1'");
      $check_user=mysqli_num_rows($Q2);
 

 $check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));
 
  if ($check_user==1) {
   if($type=="cus"){
 echo "Data Matched";
}
else{
	echo "Data Ok";
}
 }
 else{
 echo "Invalid Username or Password Please Try Again";
 }
 
 }else{
 echo "Check Again";
 }
mysqli_close($con);

?>
