<!DOCTYPE html>
<html>
	<head>
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title></title>
		<link rel="stylesheet" href="style.css" type="text/css" />	
		<link rel="stylesheet" href="css/styles.css" type="text/css">
		<style type="text/css">
      <?php 
      include "styleNe.css" 
      ?>
  </style>
	</head>
	<body>		
<div id="wrapper">		
<header>		
<a href="/"><img src="images/logo1.jpg" width="960" height="300" alt="logo"></a>
</header>
<nav>
	<ul class="top-menu">	
	
				<li><a href="login.php">Авторизация</a></li>
				<li><a href="reg.php">Регистрация</a></li>
			</ul>
		</nav>
<div id="heading">
	<h1>Вход</h1>
</div>
	<center>
	<form action="login.php" method="post" name="l_form" >
  <table>
   <tr>
    <td> Логин: </td>
    <td> <input type="text" name="l_login" required=" " /> </td>
   </tr>
	<tr>
    <td> Пароль: </td>
    <td> <input type="text" name="l_password" required=" " /> </td>
   </tr>
   <tr>
    <td colspan="2"> <input type="submit" name="l_send" value="Войти" /> </td>
   </tr>
  </table>
<?php
require_once("dbconnect.php");
if(isset($_POST["l_login"])){ $l_login = $_POST["l_login"]; }
if(isset($_POST["l_password"])){ $l_password = md5($_POST["l_password"]); }
if(isset($_POST["l_send"])){ $l_send = $_POST["l_send"]; }
if(isset($l_send)){
$result = mysqli_query($connect, "SELECT * FROM user WHERE login = '$l_login' AND password = '$l_password'") or die ( "Error : ".mysqli_error() ); 
if(mysqli_num_rows($result)<1)
{echo"Неправильный логин или пароль";}
if(mysqli_num_rows($result)>1){
$_SESSION['login'] = $l_login;
$_SESSION['password'] = $l_password;
echo"Авторизация прошла успешно! <a href='index.php'> главная страница </a>";
exit();}

while ($a=mysqli_fetch_array($result))
{
$role=$a['role'];
echo ("$role");
}

if ($role=='prepod') {
	echo "<a href='max.php'>Предметная база</a>";
} else {
		echo "<a href='index.php'>Главная страница</a>";
}
} else {
	echo"Нет данных";
}

mysqli_close($connect);
?>
</form>
</center>
</body>
</html>