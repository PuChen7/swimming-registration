<!DOCTYPE html>
<html>
<head>
<title>北京游泳馆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="panel.css" />
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

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
      </ul>
  </nav>

  <div id="contentbody">
    <p style="font-weight: bold; font-size: 15px;">
      <img src="user.png" width="30" height="30">
      个人信息:
    </p>
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
      else if ($_SESSION["gender"] === "female"){echo "女";}
      else {echo "";}
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
    <br>

    <p style="font-weight: bold; font-size: 15px;">
      <img src="swim.png" width="30" height="30">
      已报项目:
    </p>

    <?php
      session_start();
      // check for database connection
      $conn=mysqli_connect("localhost","root","root","swim_registration");

      if(!$conn)
      {
      die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * from Sport WHERE id = any (
        select sportID from Subject where id = '".$_SESSION["id"]."' )";

      $query = mysqli_query($conn, $sql);

      if($query) {
        echo "<table>";
        echo "<tr>
          <th>项目</th>
          <th>米数</th>
          <th>比赛日期</th>
          <th></th>
          </tr>";
        while ($row = mysqli_fetch_assoc($query)){
          echo "<tr>";
          echo "<td>{$row["sportname"]}</td>";
          echo "<td>{$row["meter"]} 米</td>";
          echo "<td>{$row["date"]}</td>";
          echo "<td><a href='deletemajor.php?id=".$row['id']."'><button class='w3-btn w3-teal' type='button'>删除</button></a></td>";
          echo "</tr>";
        }
        echo "</table>";
      }else {
        echo "空";
      }
    ?>
    <script>
      function changewindow(){
        window.open("changewindow.php", "_blank", "width=600,height=500");
      }
    </script>
    <br>
    
    <p style="font-weight: bold; font-size: 15px;">
      <img src="swim.png" width="30" height="30">
      可注册的项目:
    </p>
    
    <?php
    session_start();
    // check for database connection
    $conn=mysqli_connect("localhost","root","root","swim_registration");

    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }

    // 可注册的内容
    $sql = "SELECT * from Sport WHERE not id = any (
      select sportID from Subject where id = '".$_SESSION["id"]."')";

    $query = mysqli_query($conn, $sql);

    if($query) {
      echo "<table>";
      echo "<tr>
        <th>项目</th>
        <th>米数</th>
        <th>比赛日期</th>
        <th></th>
        </tr>";
      while ($row = mysqli_fetch_assoc($query)){
        echo "<tr>";
        echo "<td>{$row["sportname"]}</td>";
        echo "<td>{$row["meter"]} 米</td>";
        echo "<td>{$row["date"]}</td>";
        echo "<td><a href='addmajor.php?id=".$row['id']."'><button class='w3-btn w3-teal' type='button'>添加</button></a></td>";
        echo "</tr>";
      }
      echo "</table>";
    }else {
      echo "空";
    }
    ?>
  </div>
</body>
</html>