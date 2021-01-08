<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome-로그인 완료</title>
    <style>
      h1{
        text-align: center;
      }
      h3{
        text-align: center;
      }
      p{
        text-align: center;
      }
    </style>
  </head>
  <body>

    <?php
    $uname="admin";
    $pwd="admin";

    session_start();

    if(isset($_SESSION['uname'])){
        echo "<h1>Welcome</h1>";
        echo "<h3>아래 선별진료소 안내 링크를 클릭하세요.</h3>";
        echo "<p><a href='main.php'><b>선별진료소안내</b></a><br></p>";
        echo "<p><br><a href='logout.php'><input type=button value=logout name=logout></a></p>";
    }
    else{
        if($_POST['uname']==$uname && $_POST['pwd']==$pwd){
            $_SESSION['uname']=$uname;
            echo"<script>location.href='welcome.php'</script>";

        }
        else{
            echo "<script>alert('username or password incorrect!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
    ?>
  </body>
</html>
