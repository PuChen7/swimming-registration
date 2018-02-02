<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>北京游泳馆</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="login.css" />
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
          <th>日期</th>
          <th></th>
          </tr>";
        while ($row = mysqli_fetch_assoc($query)){
          echo '<form class="w3-container" action = "changedata.php" method = "post">';
          echo "<td>{$row["sportname"]}</td>";
          echo "<td>{$row["meter"]} 米</td>";
          echo "<td>{$row["date"]}</td>";
          echo '<td><button onclick="changewindow()" class="w3-btn w3-teal">修改</button</td>';
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
