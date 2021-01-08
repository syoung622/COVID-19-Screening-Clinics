<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>선별진료소 찾기</title>
  </head>
  <body>
    <?php

    $mysqli=mysqli_connect("localhost","team25","team25","team25");
    if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
    }

    else{
      $sql="SELECT 시도, COUNT('의료기관명') as cnt, rank() over(order by cnt desc) rk
      FROM `선별진료소`
      GROUP BY 시도 ";

      $res=mysqli_query($mysqli,$sql);

      if($res){
        echo "<<최근 3일간 확진자수>><br>";
        while ($row=mysqli_fetch_array($res)){
          $city=$row[0];
          $total=$row[1];
          $rank=$row[2];

          echo "".$city." ".$total."명 ".$rank." 위<br>";
        }
      }
      else{
        printf("Could not select rows: %s\n", mysqli_error($mysqli));
      }
      mysqli_close($mysqli);
    }
    ?>
  </body>
</html>
