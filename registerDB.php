<?php
session_start();
// check for database connection
$conn=mysqli_connect("localhost","root","root","swim_registration");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
// get user inputs

$username = $_POST['username'];
$id = $_POST['id'];
$gender = $_POST['gender'];
$ageyear = $_POST['ageyear'];
$agemonth = $_POST['agemonth'];
$ageday = $_POST['ageday'];
$school = $_POST['school'];
$password = $_POST['pass'];
$age = (string)$ageyear . ' ' . (string)$agemonth . ' ' . (string)$ageday;
$agenum = date("Y") - $ageyear;
// global values for display at the panel
$_SESSION["username"] = $username;
$_SESSION["id"] = $id;
$_SESSION["school"] = $school;
$_SESSION["age"] = $age;
$_SESSION['gender'] = $gender;
$_SESSION["agenum"] = $agenum;

// check if user exists
$check = "SELECT * from Person WHERE id='".$id."' ";
$rs = mysqli_query($conn,$check);
if(mysqli_num_rows($rs) > 0) {
  echo "<script>
    alert('此用户已经注册');
    window.location.href='register.html';
    </script>";
    exit();
}
else {
  
  // insert into mysql database
  $sql = "INSERT INTO Person (name, age, agenum, gender, id, school, password) VALUES ('$username', '$age', '$agenum', '$gender', '$id', '$school', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
      alert('注册成功!');
      window.location.href='panel.php';
      </script>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
