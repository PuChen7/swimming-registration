<?php 
  /* Display database info by selecting radio buttons */
  session_start();
  if (isset($_SESSION['isAdmin']) && $_SESSION["isAdmin"] == true){    
    
    include 'connect.php';
    
    $sql = "";
    // 分别排列显示
    if ($_POST["type"] == "name" || $_POST["type"] == "gender" || $_POST["type"] == "age"){
      // 按姓名排列显示
      if ($_POST["type"] == "name"){
        echo "<strong>按姓名排列显示全部注册运动员：</strong>";
        $sql = "select * from Person where id in (select distinct id from Subject) order by name";
      }
      // 按性别排列显示
      else if ($_POST["type"] == "gender"){
        echo "<strong>按性别排列显示全部注册运动员：</strong>";
        $sql = "select * from Person where id in (select distinct id from Subject) order by gender";
      }
      // 按年龄排列显示
      else if ($_POST["type"] == "age"){
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
    } else if (isset($_POST['select'])){
        $selected_val = $_POST["select"];
        $title_sql = "select * from Sport where id = " .$selected_val;
        $title_query = mysqli_query($conn, $title_sql);
        if($title_query) {
          $row = mysqli_fetch_assoc($title_query);
          
          
          $person_sql = "select * from Person where id in (select id from Subject where sportID = " .$selected_val. ")";
          
          $person_query = mysqli_query($conn, $person_sql);
          if($person_query) {
            // output title
            echo "<strong>全部注册 {$row["sportname"]}{$row["meter"]}米 运动员：</strong>";
            // output ta
            echo "<table>";
            echo "<tr>
              <th>姓名</th>
              <th>出生年月</th>
              <th>年龄</th>
              <th>性别</th>
              <th>身份证</th>
              <th>学校</th>
              </tr>";
            while ($row = mysqli_fetch_assoc($person_query)){
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
          } else if ($person_query === FALSE){
            die("something went wrong");
          }
          echo "</table>";
        } else {
          echo "";
        } 
    }
  } else {
    echo "请先登录";
  }
?>