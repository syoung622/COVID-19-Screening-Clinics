<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>선별진료소 찾기</title>
    <style>
      h3{
        text-align: center;
      }
      p{
        text-align:center;
        margin-top: 0px;
        margin-bottom: 0px;
      }
      form{
        text-align: center;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <h3>검색사항</h3>
    <?php
    $district1=$_POST['district1'];
    $district2=$_POST['district2'];
    $way=$_POST['way'];
    $day=$_POST['day'];

    echo "<p>주소: " .$district1." ".$district2. "</p>";

    $mysqli=mysqli_connect("localhost","team25","team25","team25");
    if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
    }

    else{
      if($way === 'general'){ //일반검진
        echo "<p>검진방식: 일반검진</p>";
        if($day==='weekday'){
          echo "<p>검진요일: 평일</p>";
          $sql="select i.의료기관명, i.운영시간_평일, i.전화번호
          from 선별진료소 as n
          inner join 선별진료소_정보 as i on n.의료기관명 = i.의료기관명
          where 시도='$district1' and 시군구='$district2'
          and i.운영시간_평일 not in ('미운영','-')";
        }
        else if($day==='saturday'){
          echo "<p>검진요일: 토요일</p>";
          $sql="select i.의료기관명, 운영시간_토요일, 전화번호
          from 선별진료소 as n
          inner join 선별진료소_정보 as i on n.의료기관명 = i.의료기관명
          where 시도='$district1' and 시군구='$district2'
          and 운영시간_토요일 not in ('미운영','-')";
        }
        else{
          echo "<p>검진요일: 일요일/공휴일</p>";
          $sql="select i.의료기관명, 운영시간_일요일_공휴일, 전화번호
          from 선별진료소 as n
          inner join 선별진료소_정보 as i on n.의료기관명 = i.의료기관명
          where 시도='$district1' and 시군구='$district2'
          and 운영시간_일요일_공휴일 not in ('미운영','-')";
        }
      }
      else{ //승차검진
        echo "<p>검진방식: 승차검진</p>";
        if($day==='weekday'){
          echo "<p>검진요일: 평일</p>";
          $sql="select i.의료기관명, i.운영시간_평일, i.전화번호
          from 선별진료소_승차검진 as n
          inner join 선별진료소_승차검진_정보 as i on n.의료기관명 = i.의료기관명
          where 시도='$district1' and 시군구='$district2'
          and i.운영시간_평일 not in ('미운영','-')";
        }
        else if($day==='saturday'){
          echo "<p>검진요일: 토요일</p>";
          $sql="select i.의료기관명, 운영시간_토요일, 전화번호
          from 선별진료소_승차검진 as n
          inner join 선별진료소_승차검진_정보 as i on n.의료기관명 = i.의료기관명
          where 시도='$district1' and 시군구='$district2'
          and 운영시간_토요일 not in ('미운영','-')";
        }
        else{
          echo "<p>검진요일: 일요일/공휴일</p>";
          $sql="select i.의료기관명, 운영시간_일요일_공휴일, 전화번호
          from 선별진료소_승차검진 as n
          inner join 선별진료소_승차검진_정보 as i on n.의료기관명 = i.의료기관명
          where 시도='$district1' and 시군구='$district2'
          and 운영시간_일요일_공휴일 not in ('미운영','-')";
        }
        //해당 주소와 가까운 의료기관명 select
      }
      echo "<h3>검색결과</h3>";

      $res=mysqli_query($mysqli,$sql);

      if($res){
        while ($row=mysqli_fetch_array($res)){
          $hospital=$row[0];
          $time=$row[1];
          $phone=$row[2];

          echo "<p>의료기관: ".$hospital."</p>";
          echo "<p>시간: ".$time."</p>";
          echo "<p>전화번호: ".$phone."</p><br>";
        }
        $count=mysqli_num_rows($res);
        echo "<p>검사 가능한 진료소는 총 ".$count."곳 입니다.</p>";
      }
      else{
        printf("Could not select rows: %s\n", mysqli_error($mysqli));
      }

      mysqli_close($mysqli);
    }
    ?>

    <form type="submit" action="main.php">
      <input type="submit" name="" value="메인홈페이지로 돌아가기">
    </form>

  </body>
</html>
