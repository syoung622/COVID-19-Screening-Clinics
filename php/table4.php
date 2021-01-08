<?php
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
  printf("Connect failed: %s\n", mysqli_connect_errno());
  exit();
}
else{
  $sql1="create table 연령별_월별_현황(연령 VARCHAR(50) NOT NULL PRIMARY KEY,
  8월확진자수 INT NOT NULL,
  8월사망자수 INT NOT NULL,
  9월확진자수 INT NOT NULL,
  9월사망자수 INT NOT NULL,
  10월확진자수 INT NOT NULL,
  10월사망자수 INT NOT NULL,
  INDEX (연령)
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
