<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>北京游泳馆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="panel.css" />
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="nav--top">
      <ul>
          <li><a class="active" href="login.html">主页</a></li>
          <li><a href="#contact">最新</a></li>
          <li><a href="register.html">注册</a></li>
          <li><a href="aboutme.html">关于我们</a></li>
      </ul>
  </nav>

  <div id="contentbody">
    <p style="font-weight: bold; font-size: 15px;">个人信息:</p>
    <p>
    姓名:
    <?php
      session_start();
      echo $_SESSION["username"];
    ?>
    <br>
    性别:
    <?php
      session_start();
      if ($_SESSION["gender"] === "male"){echo "男";}
      else {echo "女";}
    ?>
    <br>
    出生年月:
    <?php
      session_start();
      echo $_SESSION["age"];
    ?>
    <br>
    身份证号:
    <?php
      session_start();
      echo $_SESSION["id"];
    ?>
    <br>
    学校:
    <?php
      session_start();
      echo $_SESSION["school"];
    ?>
    </p>
  </div>
</body>
</html>
