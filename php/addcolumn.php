<?php
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
  printf("Connect failed: %s\n", mysqli_connect_errno());
  exit();
}
else{
  $sql1="ALTER TABLE 선별진료소 ADD COLUMN 등록 INT DEFAULT(0)";
  $sql2="ALTER TABLE 선별진료소_승차검진 ADD COLUMN 등록 INT DEFAULT(0)";

  $res=mysqli_query($mysqli,$sql1);
  if($res===TRUE){
    echo "column successfully added.";
  }
  else{
    printf("Could not add column: %s\n", mysqli_error($mysqli));
  }

  $res=mysqli_query($mysqli,$sql2);
  if($res===TRUE){
    echo "column successfully added.";
  }
  else{
    printf("Could not add column: %s\n", mysqli_error($mysqli));
  }
  mysqli_close($mysqli);
}
?>
