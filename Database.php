<?php
  $servername = "localhost"; 
  $username = "root"; 
  $password = "";
  $dbname = "hoopsync"; 

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  else {
    echo "Successfully Connected to Database<br/><br/>";
  }

  mysqli_close($conn); // Corrected function name here
?>
