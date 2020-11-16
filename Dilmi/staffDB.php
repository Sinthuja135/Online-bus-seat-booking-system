
<?php 
class staff extends databaseconnect{


 public function saveStaff($tbName,$firstname,$lastname,$nic,$email,$phoneno,$address)
 {
 $con=$this->connect();
 mysqli_query($con,"insert into $tbName values('','".$firstname."','".$lastname."','".$nic."','".$email."','".$phoneno."','".$address."')");

 }


 public function displayall($tbName)
{
$conn=$this->connect();
 
 echo'<div class="row" style="padding: 20px">';
    echo' <div class="hidden-sm hidden-xs col-xs-12">';
        echo'<div id="languages-grid" class="grid-view">';
       echo' <table class="table table-striped table-hover data-table table-bordered">';

echo '<tbody>';

echo '<thead>'; 
echo "<tr ><th>Staff Id</th><th>Firstname</th><th>Lastname</th><th>Nic</th><th>Email</th><th>Telephone Number</th><th>Address</th><th>Edit/Delete</th></tr>";
 
$quer=mysqli_query($conn,"select * from $tbName");
 
while($res=mysqli_fetch_array($quer))
{
echo "<tr>";
echo "<td>".$res['id']."</td>";
echo "<td>".$res['firstname']."</td>";
echo "<td>".$res['lastname']."</td>";
echo "<td>".$res['nic']."</td>";
echo "<td>".$res['email']."</td>";
echo "<td>".$res['phoneno']."</td>";
echo "<td>".$res['address']."</td>";
  echo "<td><a href=\"editstaff.php?id=$res[id]\">Edit</a> | <a href=\"staff.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 


 // echo "<td><a href=?id=" . $res['id'] . ">Edit</a></td>";
 // echo "<td><a href='delete.php?id=".$res['id']."'>delete</a></td>";

 


echo "</tr>";
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