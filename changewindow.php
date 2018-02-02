<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>北京游泳馆</title>

<script>
function validateForm() {
    // username validate
    var username = document.forms["register_form"]["username"].value;
    if (username == "" || isNaN(username) === false) {
        alert("姓名为空或格式错误");
        return false;
    }
    // age validate
    var ageyear = document.forms["register_form"]["ageyear"].value;
    var agemonth = document.forms["register_form"]["agemonth"].value;
    var ageday = document.forms["register_form"]["ageday"].value;
    if (ageday == "" || agemonth == "" || ageyear == "" || isNaN(ageyear) || isNaN(ageday) || isNaN(agemonth) || ageyear > 2018 || ageyear.length < 4 || ageday > 31 || ageday < 1 || agemonth > 12 || agemonth < 1) {
        alert("出生年月格式错误");
        return false;
    }
    // id validate
    var id = document.forms["register_form"]["id"].value;
    if (id == "" || isNaN(id) || id.toString().length < 18) {
        alert("身份证号格式错误");
        return false;
    }
    // school validate
    var school = document.forms["register_form"]["school"].value;
    if (school == "") {
        alert("学校名称不能为空");
        return false;
    }
    // password validate
    var password = document.forms["register_form"]["pass"].value;
    if (password.length < 6 || password.length > 14) {
        alert("密码长度有误，请输入6至14位");
        return false;
    }
    // repassword validate
    var repassword = document.forms["register_form"]["repassword"].value;
    if (repassword !== password) {
        alert("密码前后不一致");
        return false;
    }
}
</script>
</head>
<body>
  <div id="contentbody">
    <p class="zc-title">修改个人资料</p>
    <div class = "form">
    	<!-- register -->
    	<form name="chnge_form" action = "personal_change.php" onsubmit="return validateForm()" method = "post">
    		  姓名<br>
          <input type = "text" name = "username" placeholder="姓名"/>
          
    	    <br>
          性别<br>
          <input type="radio" name="gender" value="male" checked>男
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="gender" value="female">女<br>
          出生年月<br>
          <input type = "text" name = "ageyear" placeholder="年" size="5"/>
          <input type = "text" name = "agemonth" placeholder="月" size="3"/>
          <input type = "text" name = "ageday" placeholder="日" size="3"/>
    	    <br>
          身份证号<br>
          <input type = "text" name = "id" placeholder="身份证号"/>
    	    <br>
          学校<br>
          <input type = "text" name = "school" placeholder="学校"/>
    	    <br>
          密码 (长度 6 - 14 位)<br>
    	    <input type = "password" name = "pass" placeholder="密码"/>
          <br>
          重新输入密码<br>
    	    <input type = "password" name = "repassword" placeholder="密码"/>
    	    <br>
          <br>
    	    <input style="margin-left:70px;" class="w3-btn w3-teal" type = "submit" value = "注册" />
    	</form>
    	<br>
    </div>
  </div>
</body>
</html>

<?php 
  session_start();
  echo "请选择需要更改的信息:";
  echo $_SESSION["username"];
  echo "<br>";
  echo "性别:";
  if ($_SESSION["gender"] === "male"){echo "男";}
  else if ($_SESSION["gender"] === "female"){echo "女";}
  else {echo "";}
  echo "<br>";
  echo "出生年月:";
  echo $_SESSION["age"];
  echo "<br>";
  echo "身份证号:";
  echo $_SESSION["id"];
  echo "<br>";
  echo "学校:";
  echo $_SESSION["school"];
?>