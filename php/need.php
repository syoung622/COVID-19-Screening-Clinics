<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>선별진료소 필요 지역 안내</title>
    <style>
      h2{
        text-align: center;
      }
      h3{
        text-align: center;
      }
      h4{
        text-align: center;
      }
      p{
        text-align: center;
        margin-top: 0px;
        margin-bottom: 0px;
      }
      form{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h2>최근 등록된 선별진료소</h2>
    <?php
    $mysqli=mysqli_connect("localhost","team25","team25","team25");
    if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
    }

    else{
      $sql="select 시도, 시군구, sum(등록)
      from 선별진료소
      group by 시도, 시군구
      with rollup";

      $sql2="select 시도, 시군구, sum(등록)
      from 선별진료소_승차검진
      group by 시도, 시군구
      with rollup";

      $res=mysqli_query($mysqli,$sql);

      echo "<p>일반검진</p><br>";
      if($res){
        while ($row=mysqli_fetch_array($res)){
          $district1=$row[0];
          $district2=$row[1];
          $num=$row[2];

          if($num > 0 and $district2!=""){
            echo "<p>".$district1." ".$district2.": ".$num."곳</p>";
          }

        }
        $res2=mysqli_query($mysqli,$sql2);

        echo "<br><p>승차검진</p><br>";
        if($res2){
          while ($row=mysqli_fetch_array($res2)){
            $district1=$row[0];
            $district2=$row[1];
            $num=$row[2];

            if($num > 0 and $district2!=""){
              echo "<p>".$district1." ".$district2.": ".$num."곳</p>";
            }

          }
      }
      else{
        printf("Could not select rows: %s\n", mysqli_error($mysqli));
      }

      mysqli_close($mysqli);
    }
  }
    ?>
    <h3>선별진료소 추가 설치가 필요한 지역</h3>
    <?php
    $mysqli=mysqli_connect("localhost","team25","team25","team25");
    if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
    }
    else{
      $sql="select 연령,
      10월사망자수/10월확진자수 as 10월,
      dense_rank() over (order by 10월 desc) as rank
      from 연령별_월별_현황";

      $res=mysqli_query($mysqli,$sql);

      echo "<p>지난달 연령별 확진자수 대비 사망자수</p>";
      if($res){
        while ($row=mysqli_fetch_array($res)){
          $age=$row[0];
          $die=$row[1];
          $rank=$row[2];

          if($rank<4){
              echo "<p>".$rank."위 ".$age." : ".$die."</p> ";
          }

        }

        }
    }
     ?>

     <?php
     $mysqli=mysqli_connect("localhost","team25","team25","team25");
     if(mysqli_connect_errno()){
       printf("<p>Connect failed: %s\n</p>", mysqli_connect_errno());
       exit();
     }
     else{
       $sql="select 지역, 80세이상/전체 as 80세이상비율,
       rank() over(order by 80세이상비율 desc) as rank
       from 연령별인구현황";

       $res=mysqli_query($mysqli,$sql);
       echo "<br><p>80세이상 인구비율이 높은 지역</p>";

       if($res){
         while ($row=mysqli_fetch_array($res)){
           $district=$row[0];
           $eighty=$row[1];
           $rank=$row[2];

           if($rank<4){
              echo "<p>".$rank."위 ".$district." : ".$eighty."</p> ";
           }
         }
       }
     }
      ?>

      <h4>코로나로 인한 사망률이 높은 고령화 지역에
      추가적인 선별진료소 설치가 필요함.</h4>

      <form type="submit" action="main.php">
        <input type="submit" name="" value="메인홈페이지로 돌아가기">
      </form>
  </body>
</html>
