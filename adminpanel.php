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
      <input type="radio" id = "name" name="radiosort" value="name">姓名
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" id = "gender" name="radiosort" value="gender">性别
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="radio" id = "age" name="radiosort" value="age">年龄
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      项目
      <select id = "subjectSelect">
        <option value="">选择需要查看的项目</option>
        <option value="0">蛙泳50米</option>
        <option value="1">蛙泳100米</option>
        <option value="2">蛙泳200米</option>
        <option value="3">蝶泳50米</option>
        <option value="4">蝶泳100米</option>
        <option value="5">蝶泳200米</option>
        <option value="6">仰泳50米</option>
        <option value="7">仰泳100米</option>
        <option value="8">仰泳200米</option>
        <option value="9">自由泳50米</option>
        <option value="10">自由泳100米</option>
        <option value="11">自由泳200米</option>
        <option value="12">自由泳400米</option>
        <option value="13">混合泳200米</option>
      </select>
    </form>
    <br>
    <div id="responsecontainer" align="center"></div>
    
  </div>
</body>

<!-- JQuery for dealing with display -->
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>
<script type="text/javascript">
$(document).ready(function() {
  $("input").click(function() {                
     var selected = $('input[name=radiosort]:checked').val();
     $.ajax({   
       type: "POST",
       url: "adminDB.php",
       async: false,
       data: {
         "type": selected
       },          
       success: function(response){
         $("#responsecontainer").html(response); 
       }

      });
    });
    
    $("select").click(function() {                
      var dropdown = $('#subjectSelect').find(":selected").val();
      $.ajax({   
        type: "POST",
        url: "adminDB.php",
        async: false,
        data: {
          "select": dropdown
        },          
        success: function(response){
          $("#responsecontainer").html(response); 
        }
    });
 });  
});

</script>

</html>