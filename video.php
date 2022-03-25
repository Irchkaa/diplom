<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Видео</title>
	
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">


</head>
<body>
	<div id="wrapper">
		<header>
			<a href="/"><img src="images/logo1.jpg" width="960" height="300" alt="блокада"></a>
			
		</header>
		<nav>
			<ul class="top-menu">
			<li><a href="max.php">Предметная база</a></li>
			<li><a href="p1.php"></a>Запрос</li>
				<li><a href="history.php">Проектная документация</a></li>
				<li><a href="virt.php">Конспекты</a></li>
				<li><a href="events.php">Календарь событий</a></li> 
			<li class="active">Эл. журнал</a></li>
				<li><a href="link.php">Электронные ссылки</a></li>
			</ul>
		</nav>
		<div id="heading">
			<h1>Электронный журнал</h1>
		</div>
		<section2>

<?php
require_once 'dbconnect.php';
// Установка кодировки соединения
mysqli_query($connect,"SET NAMES UTF8");

$query = "select predmet.nazv_predmeta, sessiya.grade, student.FIO, groups.kod_group
FROM predmet, sessiya, student, groups
WHERE student.kod_student=sessiya.student AND prepods.kod_prepoda=sessiya.prepods ";
		$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

	if($result)
{
	$numrows = mysqli_num_rows($result);
				echo "<table align=center font face=verdana border=1 width=90% cellpadding=5>";
				echo "<thead>";
				echo "<tr bgcolor=#ffffcc><th>Предмет</th><th>Оценка</th><th>ФИО</th><th>Группа</th></tr>";
				echo "</thead>";
				echo "<tfoot>";				
	for ($i=0; $i<$numrows; ++$i)
{	
	$row = mysqli_fetch_array($result);
				echo "<tr align=center>";
				echo "<td>";
				echo "{$row["nazv_predmeta"]}";
				echo "</td>";
				
				echo "<td align=center>";
				echo "{$row["grade"]}";
				echo "</td>";
				
				echo "<td align=center>";
				echo "{$row["FIO"]}";
				echo "</td>";
				
				echo "<td align=center>";
				echo "{$row["kod_group"]}";
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

		</section2>
	</div>
	<footer>
		<div id="footer">
			<div id="sitemap">
				<h3>Разделы</h3>
                    <div>				
					<a href="p_baza.php">Предмет</a>
					<a href="events.php">календарь событий</a>
					<a href="virt.php">виртуальная эксурсия</a>
					<a href="video1.php">Видео</a>
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
				<p>Copyright &copy; 2015 Mariya creation </p>
			</div>
		</div>
	</footer>
</body>
</html>