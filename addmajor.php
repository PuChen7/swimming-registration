<?php
  session_start();
  // check for database connection
  $conn=mysqli_connect("localhost","root","root","swim_registration");

  if(!$conn)
  {
  die("Connection failed: " . mysqli_connect_error());
  }

  $id = $_GET["id"];

  $sql = "INSERT INTO Subject (id, sportID) VALUES ('".$_SESSION["id"]."', '".$id."')";
  if ($conn->query($sql) === TRUE) {
    header('Location: panel.php');
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  ?>