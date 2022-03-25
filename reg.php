<!DOCTYPE html>
<html lang="ru">
	<head>
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Вход</title>
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
			<h1>регистрация</h1>
		</div>



<center>
		
	<form action="reg.php" method="post" name="r_form">	
	<table>
	
	
	<tr>
	<td>ФИО</td>
	<td><input type-"text" name= "r_name" required="" /> </td>
	</tr>
	
	<tr>
	<td>Логин</td>
	<td><input type-"text" name= "r_login" required="" /> </td>
	</tr>
	
	<tr>
	<td>Пароль</td>
	<td><input type-"password" name= "r_password" required="" /> </td>
	</tr>
	
	<tr>
	<td colspan="2"><input type="submit" name="r_send" value="Зарегистрироваться" /> </td>
	</tr>
	</table>

		<?php
		require_once("dbconnect.php");
		
		if(isset($_POST["r_name"])){ $r_name = $_POST["r_name"];}
		if(isset($_POST["r_login"])){ $r_login = $_POST["r_login"];}
		if(isset($_POST["r_password"])){ $r_password = md5($_POST["r_password"]);}
		if(isset($_POST["r_send"])){ $r_send = $_POST["r_send"];}
		if (isset($r_send)){
			
			$result = mysqli_query($connect,"INSERT INTO user(FIO, login, password) VALUES ('$r_name','$r_login','$r_password')") or die ( "Error : " .mysqli_error() ); 
			if($result)
			{
				echo "Регистрация прошла успешно! <a href='login.php'> Вход </a>"; 
				
			}
		} else {
			echo"Нет данных!";
		}

?>

			
			</form>
		</center>

</body>
</html>