<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>선별진료소 안내 - MAIN</title>
    <style>
      h1{
        text-align: center;
      }
      h2{
        text-align: center;
      }
      form{
        text-align: center;
      }
      h3{
        text-align: center;
        margin-top: 5px;
      }
      p{
        text-align: center;
        margin-bottom: 0px;
        margin-top: 0px;
      }
    </style>
  </head>
  <body>
    <h1>선별진료소 정보 안내</h1>

    <h2>메뉴를 선택해주세요</h2>

    <script>
      function menu1(){
        return true;
      }
      function menu2(frm){
        frm.action='register.php';
        frm.submit();
        return true;
      }
      function menu3(frm){
        frm.action='edit.php';
        frm.submit();
        return true;
      }

    </script>
    <form name="mainmenu" method="POST" action="find.php" onsubmit="return menu1()">
      <input type="submit" value="선별진료소 찾기">
      <input type="submit" value="선별진료소 등록" onclick="return menu2(this.form);">
      <input type="submit" value="선별진료소 정보 수정" onclick="return menu3(this.form);">
    </form>
    <br>
    <h3>최근 3일간 확진자 현황</h3>
    <?php

    $mysqli=mysqli_connect("localhost","team25","team25","team25");
    if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
    }

    else{

      $sql="select 지역, 15일+16일+17일 total, rank() over(order by total desc) rk
      from 지역별_일별_확진자수";
      $res=mysqli_query($mysqli,$sql);


      if($res){
        while ($row=mysqli_fetch_array($res)){
          $city=$row[0];
          $total=$row[1];
          $rank=$row[2];

          if($rank<=5){
              echo "<p>".$rank."위 ".$city." ".$total."명<br></p>";
          }
        }
        echo "<br>";

      }
      else{
        printf("Could not select rows: %s\n", mysqli_error($mysqli));
      }

      $ssql="SELECT 지역, 10월, NTILE(3)
      OVER (ORDER BY 10월 DESC) AS N_TILE
      FROM 지역별_월별_확진자수";
      $rres=mysqli_query($mysqli,$ssql);

      echo " <h3>지난달 코로나 발생률 높은 지역</h3>";
      if($rres){
        while ($row=mysqli_fetch_array($rres)){
          $city=$row[0];
          $rank=$row[2];

          if($rank==='1'){
            echo "<p>".$city."</p>";
          }

        }
      }
      else{
        printf("Could not select rows: %s\n", mysqli_error($mysqli));
      }


      mysqli_close($mysqli);
    }
    ?>
    <br>
    <br>
    <form action="need.php" method="post">
        <input type="submit" name="need" value="선별진료소 필요지역 보기">
    </form>

  </body>
</html>
