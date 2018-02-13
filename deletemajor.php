<?php
  session_start();
  // connect to database
  include 'connect.php';

  $id = $_GET["id"];

  $sql = "delete from Subject where sportID = $id";
  if ($conn->query($sql) === TRUE) {
    header('Location: panel.php');
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  ?>