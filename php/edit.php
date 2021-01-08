<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>선별진료소 정보수정</title>
<style media="screen">
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
<h1>선별진료소 정보 수정</h1>
<form action= "editresult.php" method="post">
<table style="border: 0px;">
<tr style="background: #cccccc;">
<td style="width: 200px; text-align: left;">목록</td>
<td style="width: 250px; text-align: left;"></td>
</tr>
<tr>
<td>선별진료소 타입</td>
<td><select name = "type">
<option value="a">일반검진</option>
<option value="b">승차검진</option>
</select></td>
</tr>
<tr>
<td>의료기관명</td>
<td><input type="text" name="name" size="40" maxlength="50" /></td>
</tr>
<tr>
<td>평일 운영시간</td>
<td><input type="text" name="weekday" size="40" maxlength="50" /></td>
</tr>
<tr>
<td>토요일 운영시간</td>
<td><input type="text" name="saturday" size="40" maxlength="50" /></td>
</tr>
<tr>
<td>일요일/공휴일 운영시간</td>
<td><input type="text" name="holiday" size="40" maxlength="50" /></td>
</tr>
<tr>
<td colspan="2" style="text-align: center;"><input type="submit" value="수정" /></td>
</tr>
</table>

</form>
</body>
</html>
