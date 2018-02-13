<?php
  session_start();
  include 'connect.php';

  $id = $_GET["id"];

  $sql = "INSERT INTO Subject (id, sportID) VALUES ('".$_SESSION["id"]."', '".$id."')";
  if ($conn->query($sql) === TRUE) {
    header('Location: panel.php');
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  ?>