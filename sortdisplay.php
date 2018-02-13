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
          <li style="float:right;"><a class="active" href="adminpanel.php">个人主页</a></li>
      </ul>
  </nav>

  <div id="contentbody">
    <p style="font-weight: bold; font-size: 18px;">
      <img src="user.png" width="30" height="30">
      选择分类查看运动员信息:
    </p>
    <br>
    <form name="sort_form" action = "sortdisplay.php" method = "post">
      <input type="radio" name="radiosort" value="name" checked>姓名
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" name="radiosort" value="gender">性别
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" name="radiosort" value="age">年龄
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" name="radiosort" value="subject">项目
      <select>
        <option value="w50">蛙泳50米</option>
        <option value="saab">蛙泳100米</option>
        <option value="opel">蛙泳2000米</option>
        <option value="audi">蝶泳50米</option>
        <option value="audi">蝶泳100米</option>
        <option value="audi">蝶泳200米</option>
        <option value="audi">仰泳50米</option>
        <option value="audi">仰泳100米</option>
        <option value="audi">仰泳200米</option>
        <option value="audi">自由泳50米</option>
        <option value="audi">自由泳100米</option>
        <option value="audi">自由泳200米</option>
        <option value="audi">自由泳400米</option>
        <option value="audi">混合泳200米</option>
      </select>
      
      <input style="margin-left:70px;" class="w3-btn w3-teal" type = "submit" value = "提交" />
    </form>
    
    <?php 
      session_start();
      if (isset($_SESSION['isloggedin']) && $_SESSION["isloggedin"] == true){
        // connect to database
        include 'connect.php';
        
        if ($_POST["radiosort"] == "name"){
          $sql = "select * from Person where id = (select id from subject) order by name";
          $query = mysqli_query($conn, $sql);
          if($query) {
            while ($row = mysqli_fetch_assoc($query)){
              echo "{$row["name"]}";
            }
          }
        } else if ($_POST["radiosort"] == "gender"){
          echo "gender";
        } else if ($_POST["radiosort"] == "age"){
          echo "age";
        } else if ($_POST["radiosort"] == "subject"){
          echo "subject";
        }
      } else {
        echo "请先登录";
      }
      
    ?>
  </div>
</body>
</html>