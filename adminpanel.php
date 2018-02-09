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
      
      $sql = "";
      // 分别排列显示
      if ($_POST["radiosort"] == "name" || $_POST["radiosort"] == "gender" || $_POST["radiosort"] == "age"){
        // 按姓名排列显示
        if ($_POST["radiosort"] == "name"){
          echo "<strong>按姓名排列显示全部注册运动员：</strong>";
          $sql = "select * from Person where id in (select distinct id from Subject) order by name";
        }
        // 按性别排列显示
        else if ($_POST["radiosort"] == "gender"){
          echo "<strong>按性别排列显示全部注册运动员：</strong>";
          $sql = "select * from Person where id in (select distinct id from Subject) order by gender";
        }
        // 按年龄排列显示
        else if ($_POST["radiosort"] == "age"){
          echo "<strong>按年龄排列显示全部注册运动员：</strong>";
          $sql = "select * from Person where id in (select distinct id from Subject) order by agenum";
        }
        
        echo "<table>";
        echo "<tr>
          <th>姓名</th>
          <th>出生年月</th>
          <th>年龄</th>
          <th>性别</th>
          <th>身份证</th>
          <th>学校</th>
          </tr>";
        
        $query = mysqli_query($conn, $sql);
        if($query) {
          while ($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>{$row["name"]}</td>";
            echo "<td>{$row["age"]}</td>";
            echo "<td>{$row["agenum"]}</td>";
            if ($row["gender"] == "male"){
              echo "<td>男</td>";
            } else if ($row["gender"] == "female"){
              echo "<td>女</td>";
            }else{
              echo "<td>空</td>";
            }
            echo "<td>{$row["id"]}</td>";
            echo "<td>{$row["school"]}</td>";
            echo "</tr>";
          }
          echo "</table>";
        }
      } 
      else if ($_POST["radiosort"] == "subject"){
        echo "subject";
      }
    ?>
  </div>
</body>
</html>