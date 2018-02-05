<!DOCTYPE html>
<html>
<head>
<title>北京游泳馆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="panel.css" />
<style>
#contentbody {
  padding: 15px;
  height: 80%;
  width: 80%;
  margin-left: auto ;
  margin-right: auto ;
  background-color: #f3f3f3;
  border: 1px solid black;

}
</style>

</head>
<body>
  <!-- Navigation Bar -->
  <nav class="nav--top">
      <ul>
          <li><a class="active" href="login.html">主页</a></li>
          <li><a href="#contact">最新</a></li>
          <li><a href="register.html">注册</a></li>
          <li><a href="aboutme.html">关于我们</a></li>
          <li style="float:right;"><a class="active" href="logout.php">退出登陆</a></li>
          <li style="float:right;"><a class="active" href="panel.php">个人主页</a></li>
      </ul>
  </nav>

  <div id="contentbody">
    <p style="font-weight: bold; font-size: 18px;">
      <img src="user.png" width="30" height="30">
      选择分类查看运动员信息:
    </p>
    <br>
    <form name="sort_form" action = "adminpanel.php" method = "post">
      <input type="radio" name="radiosort" value="name" checked>姓名
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" name="radiosort" value="gender">性别
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" name="radiosort" value="age">年龄
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" name="radiosort" value="subject">项目
      <input style="margin-left:70px;" class="w3-btn w3-teal" type = "submit" value = "提交" />
    </form>
    
    <?php 
      // check for database connection
      $conn=mysqli_connect("localhost","root","root","swim_registration");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      if ($_POST["radiosort"] == "name"){
        echo "name";
      } else if ($_POST["radiosort"] == "gender"){
        echo "gender";
      } else if ($_POST["radiosort"] == "age"){
        echo "age";
      } else if ($_POST["radiosort"] == "subject"){
        echo "subject";
      }
    ?>
  </div>
</body>
</html>