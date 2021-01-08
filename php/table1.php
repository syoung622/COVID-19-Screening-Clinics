<?php
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
  printf("Connect failed: %s\n", mysqli_connect_errno());
  exit();
}
else{
  $sql1="create table 지역별_월별_확진자수(지역 VARCHAR(50) NOT NULL PRIMARY KEY,
  8월 INT NOT NULL,
  9월 INT NOT NULL,
  10월 INT NOT NULL,
  INDEX (지역)
  )";

  $res=mysqli_query($mysqli,$sql1);
  if($res===TRUE){
    echo "Table testTable successfully created.";
  }
  else{
    printf("Could not create table: %s\n", mysqli_error($mysqli));
  }

  $sql2="create table 지역별_일별_확진자수(지역 VARCHAR(50) NOT NULL PRIMARY KEY,
  15일 INT NOT NULL,
  16일 INT NOT NULL,
  17일 INT NOT NULL,
  INDEX (지역)
  )";

  $res=mysqli_query($mysqli,$sql2);
  if($res===TRUE){
    echo "Table testTable successfully created.";
  }
  else{
    printf("Could not create table: %s\n", mysqli_error($mysqli));
  }

  $sql3="create table 선별진료소_정보(의료기관명 VARCHAR(50) NOT NULL PRIMARY KEY,
  주소 VARCHAR(50) NOT NULL,
  운영시간_평일 VARCHAR(50) NOT NULL,
  운영시간_토요일 VARCHAR(50) NOT NULL,
  운영시간_일요일_공휴일 VARCHAR(50) NOT NULL,
  전화번호 VARCHAR(50) NOT NULL,
  INDEX (의료기관명))";

  $res=mysqli_query($mysqli,$sql3);
  if($res===TRUE){
    echo "Table testTable successfully created.";
  }
  else{
    printf("Could not create table: %s\n", mysqli_error($mysqli));
  }

  $sql4="create table 선별진료소_승차검진_정보(의료기관명 VARCHAR(50) NOT NULL PRIMARY KEY,
  주소 VARCHAR(50) NOT NULL,
  운영시간_평일 VARCHAR(50) NOT NULL,
  운영시간_토요일 VARCHAR(50) NOT NULL,
  운영시간_일요일_공휴일 VARCHAR(50) NOT NULL,
  전화번호 VARCHAR(50) NOT NULL,
  INDEX (의료기관명))";

  $res=mysqli_query($mysqli,$sql4);
  if($res===TRUE){
    echo "Table testTable successfully created.";
  }
  else{
    printf("Could not create table: %s\n", mysqli_error($mysqli));
  }


  mysqli_close($mysqli);
}
?>
