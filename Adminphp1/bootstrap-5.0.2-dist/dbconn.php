<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "db_drinkdelight";


   try {
      $conn = new PDO("mysql:host=$servername; dbname=$dbname;", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
      // echo "Connected successfully";
   }
   catch(PDOException $e) {
      // echo "Connection failed: " . $e->getMessage();
   }
?>