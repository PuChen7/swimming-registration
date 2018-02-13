<?php
session_start();
// connect to database
include 'connect.php';

// get user inputs
$username = $_POST['username'];
$password = $_POST['password'];

// check user
$checkpass = "SELECT * from Person WHERE name='".$username."' and password = '".$password."' ";
$qpass = mysqli_query($conn,$checkpass);

if(mysqli_num_rows($qpass) > 0) {  
  if ($username == "管理员" && $password == "123456"){
    header('Location: adminpanel.php');
    $_SESSION['isAdmin'] = true;
  } else {
    $row = mysqli_fetch_row($qpass);

    $_SESSION["username"] = $username;
    $_SESSION["id"] = $row[4];
    $_SESSION["school"] = $row[5];
    $_SESSION["age"] = $row[1];
    $_SESSION["agenum"] = $row[2];
    $_SESSION['gender'] = $row[3];
    $_SESSION['isloggedin'] = true;

    echo "<script>
      alert('登陆成功!');
      window.location.href='panel.php';
      </script>";
  }
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
