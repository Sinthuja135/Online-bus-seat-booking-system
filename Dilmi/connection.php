 <?php

  class databaseconnect{
 		public $servsername;
 		public $username;
 		public $password;
 		public $dbname;
      public function connect()  
      {  
           $this->servsername ="localhost";
            $this->username ="root";
             $this->password ="";
              $this->dbname ="travels";
           $con = new mysqli( $this->servsername,$this->username,$this->password, $this->dbname);  
           return $con;
      }
      }
  
?>