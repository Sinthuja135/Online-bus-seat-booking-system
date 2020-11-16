<?php
// including the database connection file
include_once("Crud.php");
 session_start();
 if(!isset($_SESSION['id'])){
  header("location:login.php");
 }
$crud = new Crud();
 
//getting id from url
$id = $crud->escape_string($_GET['id']);
 
//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM staff WHERE id=$id");
 
foreach ($result as $res) {
    $id = $res['id'];
    $firstname = $res['firstname'];
    $lastname = $res['lastname'];
    $nic = $res['nic'];
    $email = $res['email'];
    $phone= $res['phone'];
    $address = $res['address'];
    
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TrueBus -True Bus</title>
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
         Staffs
      </h1>
      <ol class="breadcrumb" style="font-size:16px">
         <li><a href="#"><i class="fa fa-bus"></i>Home</a></li>
         <li><a href="#">Staffs</a></li>
         <li class="active">Edit Staff Details</li>
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
                  <h3 class="box-title">Edit Staff Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
    

                    <form role="form" action="staffeditaction.php" method="post"  class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-6">
                     
                          <div class="form-group has-feedback">
                           <label>Id</label>
               <input type="text" name="id" value="<?php echo $id;?>" class="form-control" >
           
                            
                        </div> 
                        
                        
                         <div class="form-group">
                         <label>Firstame</label>
                <input type="text" name="firstname" value="<?php echo $firstname;?>"class="form-control">
                        </div>                  
                        <div class="form-group has-feedback">
                           <label>Lastname</label>
                <input type="text" name="lastname" value="<?php echo $lastname;?>"class="form-control">
                        </div>
                   
                          
                                                     
                        
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <!-- <button  tabindex="10" type="submit" class="btn btn-primary">Submit</button> -->
                     <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" class="btn btn-primary" value="Update"></td>
                  </div>
                   </div>
                   <div class="col-md-6">
                   
                   
                            <div class="form-group">
                             
                <label>Nic</label>
                <input type="text" name="nic" value="<?php echo $nic;?>"class="form-control">
                            </div><!-- /.form group -->
                        
                       <div class="form-group">
                        <label>Email</label>
                <input type="text" name="email" value="<?php echo $email;?>"class="form-control">
                       </div> 
                        <div class="form-group has-feedback">
                                   <label>Telephone Number</label>
                <input type="number" name="phone" value="<?php echo $phone;?>"class="form-control">
                        </div>
                         <div class="form-group has-feedback">
                                   <label>Address</label>
                <input type="text" name="address" value="<?php echo $address;?>"class="form-control">
                        </div>
                  
                    
                   </div>
                   
                  </div>
               </form>

</body>
</html>