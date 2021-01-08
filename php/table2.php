<?php
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
  printf("Connect failed: %s\n", mysqli_connect_errno());
  exit();
}
else{
  $sql1="create table 선별진료소(시도 VARCHAR(50) NOT NULL,
  시군구 VARCHAR(50) NOT NULL,
  의료기관명 VARCHAR(50) NOT NULL PRIMARY KEY,
  FOREIGN KEY (시도)
  REFERENCES 지역별_월별_확진자수(지역),
  FOREIGN KEY (의료기관명)
  REFERENCES 선별진료소_정보(의료기관명),
  INDEX (의료기관명)
  )";

  $res=mysqli_query($mysqli,$sql1);
  if($res===TRUE){
    echo "Table testTable successfully created.";
  }
  else{
    printf("Could not create table: %s\n", mysqli_error($mysqli));
  }

  $sql2="create table 선별진료소_승차검진(시도 VARCHAR(50) NOT NULL,
  시군구 VARCHAR(50) NOT NULL,
  의료기관명 VARCHAR(50) NOT NULL PRIMARY KEY,
  FOREIGN KEY (시도)
  REFERENCES 지역별_월별_확진자수(지역),
  FOREIGN KEY (의료기관명)
  REFERENCES 선별진료소_승차검진_정보(의료기관명),
  INDEX (의료기관명)
  )";


  $res=mysqli_query($mysqli,$sql2);
  if($res===TRUE){
    echo "Table testTable successfully created.";
  }
  else{
    printf("Could not create table: %s\n", mysqli_error($mysqli));
  }


  mysqli_close($mysqli);
}
?>
