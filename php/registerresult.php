<html>
<head>
<meta charset="utf-8">
<title>선별진료소 등록하기</title>
<style>
  p{
    text-align: center;
  }
  form{
    text-align: center;
  }
</style>
</head>
<body>
<?php
$hospital = $_POST[ 'hospital'];
$city = $_POST[ 'city'];
$district = $_POST[ 'district'];
$name = $_POST[ 'name' ];
$adress = $_POST[ 'adress' ];
$weekday = $_POST[ 'weekday' ];
$saturday = $_POST[ 'saturday' ];
$sunday = $_POST[ 'sunday' ];
$number = $_POST[ 'number' ];
$mysqli = mysqli_connect("127.0.0.1","team25","team25","team25");
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n",mysqli_connect_error());
exit();
}
else {
    if($hospital ==='a'){
        $sql = "INSERT INTO 선별진료소_정보(의료기관명,주소, 운영시간_평일, 운영시간_토요일, 운영시간_일요일_공휴일, 전화번호) VALUES ('$name', '$adress', '$weekday', '$saturday', '$sunday', '$number');";
        $sql2 = "INSERT INTO 선별진료소(시도, 시군구, 의료기관명) VALUES ('$city', '$district','$name');";
        $sql3="update 선별진료소 set 등록=등록+1
        where 의료기관명='$name'";
        $res = mysqli_query($mysqli, $sql);
        $res2 = mysqli_query($mysqli, $sql2);
        $res3 = mysqli_query($mysqli, $sql3);
        if ($res === TRUE && $res2 ===true) {
            echo "<p>선별진료소 정보가 입력되었습니다.</p>";
        } else {
            printf("Could not insert record: %s\n",mysqli_error($mysqli));
        }
    }
    else {
        $sql = "INSERT INTO 선별진료소_승차검진_정보(의료기관명,주소, 운영시간_평일, 운영시간_토요일, 운영시간_일요일_공휴일, 전화번호) VALUES ('$name', '$adress', '$weekday', '$saturday', '$sunday', '$number');";
        $sql2 = "INSERT INTO 선별진료소_승차검진(시도, 시군구, 의료기관명) VALUES ('$city', '$district','$name');";
        $sql3="update 선별진료소_승차검진 set 등록=등록+1
        where 의료기관명='$name'";
        $res = mysqli_query($mysqli, $sql);
        if ($res === TRUE ) {
            echo "선별진료소 정보가 입력되었습니다.";
        } else {
            printf("<p>Could not insert record: %s\n</p>",mysqli_error($mysqli));
        }
    }
    mysqli_close($mysqli);
}
?>

<form type="submit" action="main.php">
  <input type="submit" name="" value="메인홈페이지로 돌아가기">
</form>
</body>
</html>
