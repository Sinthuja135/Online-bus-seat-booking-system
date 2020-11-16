<?php
ob_start();
// including the database connection file
include_once("Crud.php");
include_once("Validation.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['update']))
{    
    $id = $crud->escape_string($_POST['id']);
        $firstname = $crud->escape_string($_POST['firstname']);
      $lastname = $crud->escape_string($_POST['lastname']);
    $nic = $crud->escape_string($_POST['nic']);
    $email = $crud->escape_string($_POST['email']);
    $phone = $crud->escape_string($_POST['phone']);
     $address =$crud->escape_string($_POST['address']);


    $msg = $validation->check_empty($_POST, array('firstname','lastname', 'nic', 'email','phone','address'));
    // $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);
    
    // checking empty fields
    if($msg) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    // } elseif (!$check_age) {
    //     echo 'Please provide proper age.';
    } elseif (!$check_email) {
        echo 'Please provide proper email.';    
    } else {    
        //updating the table
        $result = $crud->execute("UPDATE staff SET firstname='$firstname',lastname='$lastname',nic='$nic',email='$email',phone='$phone',address='$address' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:stafff.php");
    }
}
?>
