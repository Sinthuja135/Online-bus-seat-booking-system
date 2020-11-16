
<?php
// including the database connection file
include_once("Crud.php");
include_once("Validation.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['update']))
{    
    $id = $crud->escape_string($_POST['id']);
        $title = $crud->escape_string($_POST['title']);
      $descripe = $crud->escape_string($_POST['descripe']);
    $photo = $crud->escape_string($_POST['photo']);
   
                 $result = $crud->execute("UPDATE news SET title='$title',descripe='$descripe',photo='$photo' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ../notifications.php");

  
}
?>
