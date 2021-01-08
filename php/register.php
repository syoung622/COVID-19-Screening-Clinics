<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SUBMIT</title>
<style>
  h1{
    text-align: center;
  }
  form{
    text-align: center;
  }
  table{
    width:60%;
    height:100%;
    margin: auto;
    text-align: center;
  }
  tr{
    text-align: center;
  }
</style>
</head>
<body>
  <h1>선별진료소 등록</h1>

<form action= "registerresult.php" method="post">
<table style="border: 0px;">
<tr style="background: #cccccc;">
<td style="width: 200px; text-align: center;;">목록</td>
<td style="width: 250px; text-align: center;;"></td>
</tr>
<tr>
<td>선별진료소 타입</td>
<td><select name = "hospital">
<option value="a">일반</option>
<option value="b">승차검진</option>
</select></td>
</tr>
<tr>
<td>시도</td>
<td><input type="text" name="city" size="40" maxlength="10" />
</td>
</tr>
<tr>
<td>시군구</td>
<td><input type="text" name="district" size="40" maxlength="10" /></td>
</tr>
<tr>
<td>의료기관명</td>
<td><input type="text" name="name" size="40" maxlength="50" /></td>
</tr>
<tr>
<td>주소</td>
<td><input type="text" name="adress" size="40" maxlength="10" /></td>
</tr>
<tr>
<td>평일 운영시간</td>
<td><input type="text" name="weekday" size="40" maxlength="10" /></td>
</tr>
<tr>
<td>토요일 운영시간</td>
<td><input type="text" name="saturday" size="40" maxlength="10" /></td>
</tr>
<tr>
<td>일요일/공휴일 운영시간</td>
<td><input type="text" name="sunday" size="40" maxlength="10" /></td>
</tr>
<tr>
<td>대표 전화번호</td>
<td><input type="text" name="number" size="40" maxlength="10" /></td>
</tr>
<tr>
<td colspan="2" style="text-align: center;"><input type="submit" value="Submit" /></td>
</tr>
</table>
</form>

<form action= "recent.php" method="post">
<select name="type">
          <option value="day">일별 확진자 수</option>
          <option value="month">월별 확진자 수</option>
</select>
<input type="submit" value="코로나 확진 현황 보러가기">

</form>

<form action= "recent2.php" method="post">
<select name="hos">
          <option value="center">선별진료소</option>
          <option value="car">승차검진 선별진료소</option>
</select>
<input type="submit" value="진료소 현황 보러가기">
</form>

</body>
</html>
