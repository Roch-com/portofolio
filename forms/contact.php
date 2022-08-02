<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "roch_portofolio_contact";

$name = $_POST["name"];
$mail = $_POST["email"];
$subject = $_POST["subject"];
$object = $_POST["object"];

if(!empty( $_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["object"]))
   {

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO contact (idContact, name, mail, subject, object) 
      VALUES (NULL, '$name', '$mail', '$subject', '$object')";
       // use exec() because no results are returned
       $conn->exec($sql);
       echo "Your message has been sent. Thank you!";
      } 

      catch(PDOException $e) {
       echo $sql . "<br>" . $e->getMessage();
      }
  
     $conn = null;
     
  }
?>
