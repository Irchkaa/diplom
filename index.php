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
			
				<li class="active">Главная</a></li>

				<li><a href="history.php">Проектная документация</li>
	
			<li><a href="virt.php">Конспекты</a></li>
				
<li><a href="events.php">Календарь событий</a></li>
 
				<li><a href="video.php">Эл. журнал</a></li>

				<li><a href="link.php">Электронные ссылки</a></li>
			</ul>
		</nav>
<div id="heading">
			<h1>Главная</h1>
		</div>



<section2>
		
		<p>	Текст1</p>
		<p></p>

		<?php
		require_once 'dbconnect.php';
// Установка кодировки соединения
mysqli_query($connect,"SET NAMES UTF8");
		$query = "SELECT nazv_predmeta,tema,inf_resurs FROM predmet";
		$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

	if($result)
{
	$numrows = mysqli_num_rows($result);
				echo "<table class='features-table'>";
				echo "<thead>";
				echo "<tr><th>Предмет</th><th>Название</th><th>Ссылка</th></tr>";
				echo "</thead>";
				echo "<tfoot>";				
	for ($i=0; $i<$numrows; ++$i)
{	
	$row = mysqli_fetch_array($result);
				echo "<tr>";
				echo "<td>";
				echo "{$row["nazv_predmeta"]}";
				echo "</td>";
				
				echo "<td>";
				echo "{$row["tema"]}";
				echo "</td>";
				
				echo "<td>";
				echo "<a href=\"{$row["inf_resurs"]}\">{$row["inf_resurs"]}</a>";
				echo "</td>";
				echo "</tr>";
}

				echo "</tfoot>";
				echo "</table>";
// очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($connect);


?>

		<p></p>
		<p>Текст2</p>
          
			<figure>
				<img src="" width="960" height="550" alt=""> 
				
		
				
			</figure>
		
			</div>
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
					<a href="virt.php">Конспекты</a>
					<a href="video.php">Эл. журнал</a>
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