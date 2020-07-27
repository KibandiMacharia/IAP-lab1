<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','btc3205');
    define('PORT','3306');
    define('CHARSET','utf8mb4');

  class DBConnector{
      public $conn;
      function __construct(){
        $this->conn=mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die ("Error:".mysqli_error());
        //if the connection is unsuccessful, there will be an error message
          mysqli_select_db($this->conn,DB_NAME);
      }
    
      public function closeDatabase(){
          $this->conn->close();
      }
  }
?>
