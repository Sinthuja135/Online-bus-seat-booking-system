
<?php 

class Notification extends databaseconnect{


 public function saveNotifications($tbName,$title,$descripe,$photo)
 {
 $con=$this->connect();
 mysqli_query($con,"insert into $tbName values('','".$title."','".$descripe."','".$photo."')");

 }



 public function displayall($tbName)
{
$con=$this->connect();
 
 echo'<div class="row" style="padding: 20px">';
    echo' <div class="hidden-sm hidden-xs col-xs-12">';
        echo'<div id="languages-grid" class="grid-view">';
       echo' <table class="table table-striped table-hover data-table table-bordered">';

echo '<tbody>';

echo '<thead>'; 
echo "<tr ><th> Id</th><th>Title</th><th>Description</th><th>Photo</th><th>Edit/Delete</th></tr>";
 
$quer=mysqli_query($con,"select * from $tbName");
 
while($res=mysqli_fetch_array($quer))
{
echo "<tr>";
echo "<td>".$res['id']."</td>";
echo "<td>".$res['title']."</td>";
echo "<td>".$res['descripe']."</td>";
echo "<td>".$res['photo']."</td>";

  echo "<td><a href=\"editnotifications.php?id=$res[id]\">Edit</a> | <a href=\"notifications.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}
echo "</table>";
} 


 public function delete($id, $table) 
    { 
        $query = "DELETE FROM $table WHERE id = $id";
        
        $result = $this->connect()->query($query);
    
        if ($result == false) {
            echo 'cannot delete id ' . $id . ' from table ' . $table;
            return false;
        } else {
            return true;
        }
    }
  public function escape_string($id)
    {
        return $this->connect()->real_escape_string($id);
    }

    public function getData($query)
    {        
        $result = $this->connect()->query($query);
        
        if ($result == false) {
            return false;
        } 
        
        $rows = array();
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }


      public function execute($query) 
    {
        $result = $this->connect()->query($query);
        
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }        
    }
   } 
   ?>