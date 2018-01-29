<?php

// check for database connection
$conn=mysqli_connect("localhost","root","root","swim_registration");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
// get user inputs

$username = $_POST['username'];
$id = $_POST['id'];
$ageyear = $_POST['ageyear'];
$agemonth = $_POST['agemonth'];
$ageday = $_POST['ageday'];
$school = $_POST['school'];
$password = $_POST['pass'];
$age = (string)$ageyear . ' ' . (string)$agemonth . ' ' . (string)$ageday;

// check if user exists
$check = "SELECT * FROM Person WHERE id = $id";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 1) {
  echo "<script>
    alert('此用户已经注册');
    window.location.href='register.html';
    </script>";
}
else {
  // insert into mysql database
  $sql = "INSERT INTO Person (id, name, age, school) VALUES ('$id', '$username', '$age', '$school', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
      alert('注册成功');
      window.location.href='panel.html';
      </script>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
