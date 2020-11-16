<?php
//including the database connection file
include_once("Crud1.php");
 
$crud = new Crud();
 
//getting id of the data from url
$feedback_id = $crud->escape_string($_GET['feedback_id']);
 
//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $crud->delete($feedback_id, 'feedback');
 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:feedback.php");
}
?>