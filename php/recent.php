<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> 코로나 현황보기</title>
  </head>
<body>

<?php
$type=$_POST['type'];
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
}
else{
  if($type === 'month'){
        echo "지역별 월별 확진자 수 보기<br><br>";
        $sql = "SELECT * FROM `지역별_월별_확진자수`as u where u.지역!='전체' GROUP BY 지역";
        $res=mysqli_query($mysqli,$sql);
        if($res){
           while ($row=mysqli_fetch_array($res)){
              $region=$row[0];
              $t1=$row[1];
              $t2=$row[2];
              $t3=$row[3];
              $total=$t1+$t2+$t3;
             echo "지역: ".$region."<br>";
             echo "8월 확진자 수: ".$t1."<br>";
             echo "9월 확진자 수: ".$t2."<br>";
             echo "10월 확진자 수: ".$t3."<br>";
             echo "3개월간 총 확진자 수: ".$total."<br><br>";
          }
      }
      else{
          printf("Could not select rows: %s\n", mysqli_error($mysqli));
      }
   }
   else{
        echo "지역별 일별 확진자 수 보기<br><br>";
        $sql = "SELECT * FROM `지역별_일별_확진자수`as t where t.지역 != '전체' GROUP BY 지역";
        $res=mysqli_query($mysqli,$sql);
        if($res){
           while ($row=mysqli_fetch_array($res)){
             $region=$row[0];
             $tt1=$row[1];
             $tt2=$row[2];
             $tt3=$row[3];
             $ttotal=$tt1+$tt2+$tt3;
             echo "지역: ".$region."<br>";
             echo "15일 확진자 수: ".$tt1."<br>";
             echo "16일 확진자 수: ".$tt2."<br>";
             echo "17일 확진자 수: ".$tt3."<br>";
             echo "3일간 총 확진자 수: ".$ttotal."<br><br>";
           }
       }
       else{
          printf("Could not select rows: %s\n", mysqli_error($mysqli));
       }
    }

mysqli_close($mysqli);
}
?>
</body>
</html>
