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
          <li><a class="active" href="panel.php">主页</a></li>
          <li><a href="#contact">最新</a></li>
          <!-- <li><a href="register.html">注册</a></li> -->
          <li><a href="aboutme.html">关于我们</a></li>
          <li style="float:right;"><a class="active" href="logout.php">退出登陆</a></li>
          <!-- <li style="float:right;"><a class="active" href="panel.php">个人主页</a></li> -->
      </ul>
  </nav>

  <div id="contentbody">
    <p style="font-weight: bold; font-size: 18px;">
      <img src="user.png" width="30" height="30">
      个人信息:
    </p>
    
    <?php
      session_start();
      if (isset($_SESSION['isloggedin']) && $_SESSION["isloggedin"] == true){
        echo "<p>姓名:";
        session_start();
        echo $_SESSION["username"];
        echo "<br>";
        echo "性别:";
        if ($_SESSION["gender"] == "male"){echo "男";}
        else if ($_SESSION["gender"] == "female"){echo "女";}
        else {echo "";}
        echo "<br>";
        echo "出生年月:";
        echo $_SESSION["age"];
        echo "<br>";
        echo "年龄:";
        echo $_SESSION["agenum"];
        echo "<br>";
        echo "身份证号:";
        echo $_SESSION["id"];
        echo "<br>";
        echo "学校:";
        echo $_SESSION["school"];
        echo "<br><br>";
        echo '<button class="w3-btn w3-teal" style="font-size: 13px;" onclick="changewindow()">修改个人资料</button>';
        
        echo '</p>
        <br>
        <p style="font-weight: bold; font-size: 18px;">
          <img src="swim.png" width="30" height="30">
          已注册的项目:
        </p>';

        // connect to database
        include 'connect.php';

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
            echo "<td><a href='deletemajor.php?id=".$row['id']."'><button class='w3-btn w3-teal' style='font-size: 13px;' type='button'>删除</button></a></td>";
            echo "</tr>";
          }
          echo "</table>";
        }else {
          echo "空";
        }
      
      echo '
      <script>
        function changewindow(){
          window.open("changewindow.php", "popup", "resizable=0, width=600,height=500");
        }
      </script>
      <br>
      
      <p style="font-weight: bold; font-size: 18px;">
        <img src="add.png" width="30" height="30">
        可注册的项目:
      </p>
      ';

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
          echo "<td><a href='addmajor.php?id=".$row['id']."'>
          <button class='w3-btn w3-teal' style='font-size: 13px;' type='button'>添加</button></a></td>";
          echo "</tr>";
        }
        echo "</table>";
      }else {
        echo "空";
      }
    } else {
      echo "请先登录";
      header('Location: login.html');
    }
    ?>
  </div>
</body>
</html>