<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> 코로나 현황보기</title>
  </head>
<body>
<?php
$hos=$_POST['hos'];
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
}
else{
 if($hos === 'center'){
        echo "선별진료소 현황보기<br><br>";
        $sql2 = "SELECT 시도, COUNT('의료기관명') FROM `선별진료소` GROUP BY 시도";
        $res2=mysqli_query($mysqli,$sql2);
        if($res2){
           while ($row=mysqli_fetch_array($res2)){
             $region=$row[0];
             $n=$row[1];
             echo "지역: ".$region."&nbsp &nbsp";
             echo "선별진료소 수: ".$n."<br><br>";}
        }
        else{
           printf("Could not select rows: %s\n", mysqli_error($mysqli));
        }
  mysqli_close($mysqli);
  }
  else if($hos === 'car'){
        echo "승차검진 선별진료소 현황보기<br><br>";
        $sql3 = "SELECT 시도, COUNT('의료기관명') FROM `선별진료소_승차검진` GROUP BY 시도";
        $res3=mysqli_query($mysqli,$sql3);
        if($res3){
           while ($row=mysqli_fetch_array($res3)){
             $regionn=$row[0];
             $nn=$row[1];
             echo "지역: ".$regionn."&nbsp&nbsp";
             echo "승차검진 선별진료소 수: ".$nn."<br><br>";}
        }
        else{
           printf("Could not select rows: %s\n", mysqli_error($mysqli));
        }
    mysqli_close($mysqli);
   }
   else{
     echo "진료소 부족 지역 보기 <br><br>";
     $sql = "SELECT n.시도, n.의료기관수, i.확진자수, (n.의료기관수-i.확진자수)as lack
     from (SELECT 시도, COUNT(의료기관명)as 의료기관수 FROM `선별진료소` GROUP BY 시도) as n
     inner join (SELECT 지역, (15d+16d+17d)as 확진자수 FROM `지역별_일별_확진자수`) as i on n.시도 = i.지역
     ORDER BY lack ASC
     LIMIT 5";
     $res=mysqli_query($mysqli,$sql);
     if($res){
       while ($row=mysqli_fetch_array($res)){
         $region=$row[0];
         $tt1=$row[1];
         echo "지역: ".$region."<br>";
         echo "선별진료소 수: ".$n."<br>";
   }
 }
 mysqli_close($mysqli);
}
}
?>

</body>
</html>
