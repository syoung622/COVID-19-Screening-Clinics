<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>선별진료소 찾기</title>
    <style>
      h1{
        text-align: center;
      }
      p{
        text-align: center;
      }
      form{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>선별진료소 찾기</h1>
      <form action="findresult.php" method="post">
        <p>시/도를 입력하세요.</p>
        <input type="text" name="district1"><br>
        <p>시/군/구를 입력하세요</p>
        <input type="text" name="district2"><br>
        <p>검진 방식 선택</p>
        <select name="way">
          <option value="general">일반 검진</option>
          <option value="car">승차 검진</option>
        </select>
        <p>방문할 요일 선택</p>
        <select name="day">
          <option value="weekday">평일</option>
          <option value="saturday">토요일</option>
          <option value="sunday">일요일,공휴일</option>
        </select>

      <input type="submit" value="확인">
    </form>




  </body>
</html>
