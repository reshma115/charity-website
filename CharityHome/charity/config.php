<?php
 $conn = new PDO("mysql:host=localhost;dbname=charity", "root", "");
 // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
 
?>
