 <?php

 class ViewUser extends User{
 	
      public function showAllUsers()  
      {  

       echo'<div class="row" style="padding: 20px">';
    echo' <div class="hidden-sm hidden-xs col-xs-12">';
        echo'<div id="languages-grid" class="grid-view">';
       echo' <table class="table table-striped table-hover data-table table-bordered">';
            echo'<thead> ';
              echo' <tr class="sort-link"> ' ;
                echo' <th width="10%">User Id</th>' ;
                 echo'<th width="10%">Firstname</th>';
                 echo'<th width="10%">Lastname</th>';
                 echo'<th width="10%">Email</th>';
                 echo'<th width="10%">Phone</th>';
                 echo'<th width="10%">View</th>' ;
                echo' <th width="10%">Delete</th>';
              echo '</tr>';
           echo' <thead>';
          
                  $datas= $this->getAllUsers();
                  foreach ($datas as $data) {
                    echo"<tbody>";
                     echo " <tr> ";
                      echo " <td> ". $data["id"]. "</td>";
                    echo" <td> "  . $data["first_name"]."</td>";
                     echo" <td> ".  $data["last_name"]. "</td>";
                      echo" <td> ". $data["user_email"]. "</td>";
                      echo" <td> " . $data["nic"]. "</td>";
                      echo "<td><a href=viewuser.php?id=" . $data['id'] . " >View</a></td>";  
                      echo "<td><a href=Usercopy.php?id=" . $data['id'] . ">Delete</a></td>"; 
                                 
              
                      echo "</tr>";
                

                  }
                  echo"</tbody>";
                  echo"</table>";

          }

        
      }
      
  
?>