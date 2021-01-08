<html>
<head>
<title>results</title>
<style media="screen">
p{
  text-align:center;
  margin-top: 0px;
  margin-bottom: 0px;
}
form{
  text-align: center;
  margin-top: 10px;
}
h2{
  text-align: center;
}
</style>
</head>
<body>
<h2>선별진료소 정보 수정</h2>
<?php
header("Content-Type: text/html; charset=UTF-8");
$mysqli = mysqli_connect("localhost","team25","team25","team25");
$type = $_POST['type'];
$name = $_POST['name'];
$weekday = $_POST['weekday'];
$saturday = $_POST['saturday'];
$holiday = $_POST['holiday'];

if (mysqli_connect_errno()) {
printf("Connect failed: %s\n",mysqli_connect_error());
exit();
}
else {
  if($type==='a'){
    $sql1 = "update 선별진료소_정보
    set 의료기관명='$name', 운영시간_평일='$weekday',
    운영시간_토요일='$saturday', 운영시간_일요일_공휴일='$holiday'
    where 의료기관명='$name'";
    $res = mysqli_query($mysqli,$sql1);
  }
  else{
    $sql2 = "update 선별진료소_승차검진_정보
    set 의료기관명='$name', 운영시간_평일='$weekday',
    운영시간_토요일='$saturday', 운영시간_일요일_공휴일='$holiday'
    where 의료기관명='$name'";
    $res = mysqli_query($mysqli,$sql2);
  }
if ($res) {
echo "<p>선별진료소 정보가 수정되었습니다.</p>";
} else {
printf("<p>Could not insert record: %s\n</p>",mysqli_error($mysqli));
}
mysqli_close($mysqli);
}
?>
<form type="submit" action="main.php">
  <input type="submit" name="" value="메인홈페이지로 돌아가기">
</form>
</body>
</html>
