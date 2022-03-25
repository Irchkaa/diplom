<!DOCTYPE html>
<html lang="ru">
	<head>
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Главная</title>
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
			    <li class="active">Предметная база</li>
			
				<li><a href="index.php">Главная</a></li>

				<li><a href="history.php">Проектная документация</li>
	
			<li><a href="virt.php">Литературные источники</a></li>
				
<li><a href="events.php">Календарь событий</a></li>
 
				<li><a href="video.php">Видео</a></li>

				<li><a href="link.php">Электронные ссылки</a></li>
			</ul>
		</nav>
<div id="heading">
			<h1>Предметная база</h1>
		</div>



<section2>
		
		
		<p></p>

		<?php
		require_once 'dbconnect.php';
// Установка кодировки соединения
mysqli_query($connect,"SET NAMES UTF8");
		$query = "SELECT nazv_predmeta,tema FROM predmet";
		$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));  

	if($result)
{
	$numrows = mysqli_num_rows($result);
				echo ("<p align=center><font face=verdana><b>Найденные</b>
<table border=1 align=center width=90% cellpadding=5>
<tr bgcolor=#ffffcc>
<td>Название предмета</td>
<td>Тема</td>
</tr>");

//Печатаем содержимое таблицы
while ($a=mysqli_fetch_array($result))
{
$id=$a['id'];
$nazv_predmeta=$a['nazv_predmeta'];
$tema=$a['tema'];
 
echo ("<tr>
<td>$nazv_predmeta</td>
<td>$tema</td>
</tr>");
}
echo ("</table>");
	
	
 mysqli_free_result($result);
 } 
mysqli_close($connect);

?>

			<br><br><br><br><br>
		</section2>
 
		
			
</div>
	<footer>
		<div id="footer">
			<div id="sitemap">
				<h3>Разделы</h3>
                    <div>				
					<a href="link.php">Ссылки</a>
					<a href="events.php">Календарь событий</a>
					<a href="virt.php">Проэктная документация</a>
					<a href="video.php">Видео</a>
					</div>
			</div>
			
				<div>
			<div id="social">
				<h3>Социальные сети</h3>
				<a href="http://twitter.com/" class="social-icon twitter"></a>
				<a href="http://facebook.com/" class="social-icon facebook"></a>
				<a href="http://plus.google.com/" class="social-icon google-plus"></a>
				<a href="http://vimeo.com/" class="social-icon-small vimeo"></a>
				<a href="http://youtube.com/" class="social-icon-small youtube"></a>
				<a href="http://flickr.com/" class="social-icon-small flickr"></a>
				<a href="http://instagram.com/" class="social-icon-small instagram"></a>
				<a href="/rss/" class="social-icon-small rss"></a>
			</div>
			<div id="footer-logo">

			</div>
		</div>
	</footer>
	
	
	
	

</body>
</html>