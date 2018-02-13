<?php
$conn=mysqli_connect("localhost","root","root","swim_registration");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>