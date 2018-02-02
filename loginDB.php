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
$password = $_POST['password'];

// check user
$checkpass = "SELECT * from Person WHERE name='".$username."' and password = '".$password."' ";
$qpass = mysqli_query($conn,$checkpass);

if(mysqli_num_rows($qpass) > 0) {

  $row = mysqli_fetch_row($qpass);

  $_SESSION["username"] = $username;
  $_SESSION["id"] = $row[3];
  $_SESSION["school"] = $row[4];
  $_SESSION["age"] = $row[1];
  $_SESSION['gender'] = $row[2];
  $_SESSION['isloggedin'] = true;

  echo "<script>
    alert('登陆成功!');
    window.location.href='panel.php';
    </script>";
}
else {
  echo "<script>
    alert('用户名或密码错误!');
    window.location.href='login.html';
    </script>";
    exit();
}

$conn->close();
?>
