<?php
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
  printf("Connect failed: %s\n", mysqli_connect_errno());
  exit();
}
else{
  $sql1="create table 연령별인구현황(지역 VARCHAR(50) NOT NULL PRIMARY KEY,
  9세이하 INT(50) NOT NULL,
  10세이상19세이하 INT(50) NOT NULL,
  20세이상29세이하 INT(50) NOT NULL,
  30세이상39세이하 INT(50) NOT NULL,
  40세이상49세이하 INT(50) NOT NULL,
  50세이상59세이하 INT(50) NOT NULL,
  60세이상69세이하 INT(50) NOT NULL,
  70세이상79세이하 INT(50) NOT NULL,
  80세이상89세이하 INT(50) NOT NULL,
  90세이상99세이하 INT(50) NOT NULL,
  100세이상 INT NOT NULL,
  INDEX (지역)
  )";

  $res=mysqli_query($mysqli,$sql1);
  if($res===TRUE){
    echo "Table testTable successfully created.";
  }
  else{
    printf("Could not create table: %s\n", mysqli_error($mysqli));
  }
  mysqli_close($mysqli);
}
?>
