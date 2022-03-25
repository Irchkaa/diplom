<!DOCTYPE html>
<html>
	<head>
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
	<li class="active"><a href="max.php">Предметная база</a></li>
	<li><a href=""></a></li>
				<li><a href="p1.php"></a>Запрос</li>
				<li><a href="history.php">Проектная документация</a></li>
				<li><a href="virt.php">Конспекты</a></li>
				<li><a href="events.php">Календарь событий</a></li> 
				<li><a href="video.php">Эл. журнал</a></li>
				<li><a href="link.php">Электронные ссылки</a></li>
			</ul>
		</nav>
<div id="heading">
	<h1>Вход</h1>
</div>
<center>

<! форма для ввода данных !>
<form action="max.php" method="post" name="l_form" >
  <table>
   <tr>
    <td> Предмет </td>
    <td> <input type="text" name="l_c3" required=" " /> </td>
   </tr>
   <tr>
    <td colspan="2"> <input type="submit" name="l_send" value="Ввод" /> </td>
   </tr>
  </table>

<?php
require_once("dbconnect.php");
$result = mysqli_query($connect, "SELECT * FROM predmet WHERE kod_predmeta = (SELECT MAX(kod_predmeta) FROM predmet)") or die ( "Error : ".mysqli_error() ); 
//Печатаем содержимое таблицы
while ($a=mysqli_fetch_array($result))
$b = $a['kod_predmeta']+1;


if(isset($_POST["l_c3"])){ $l_c3 = $_POST["l_c3"]; }
if(isset($_POST["l_send"])){ $l_send = $_POST["l_send"]; }
if(isset($l_send)){
$result1 = mysqli_query($connect, "SELECT * FROM predmet WHERE nazv_predmeta like '%$l_c3%'") or die ( "Error : ".mysqli_error() ); 
//Печатаем содержимое таблицы
if(mysqli_num_rows($result1)<1)
{echo"Нет данных";}
else{
$_SESSION['nazv_predmeta'] = $l_c3;
echo"Результаты запроса";
}
	if($result1)
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
}
}else{echo"Нет данных для обработки";
}
?>
   </form>
<form action="max.php" method="post" name="l_form" >
  <table>
   
   <tr>
    <td> Предмет</td>
    <td> <input type="text" name="d" value=' ' required=" " /> </td>
   </tr>
   
<tr>
    <td> Ссылка </td>
    <td> <input type="text" name="s" value='' required=" " /> </td>
   </tr>

<tr>
    <td> Раздел </td>
    <td> <input type="text" name="r" value='' required=" " /> </td>
   </tr>

<tr>
    <td> Тема </td>
    <td> <input type="text" name="t" value='' required=" " /> </td>
   </tr>

   <tr>
    <td colspan="2"> <input type="submit" name="send" value="Зарегистрироватся!" /> </td>
   </tr>
  </table>
 
   <?php
require_once("dbconnect.php");   
//оператор выполнения приложения if
			if(isset($_POST["b"])){ $b = $_POST["b"]; }
			if(isset($_POST["d"])){ $d = $_POST["d"]; }	
            if(isset($_POST["s"])){ $s = $_POST["s"]; }
			if(isset($_POST["r"])){ $r = $_POST["r"]; }
			if(isset($_POST["t"])){ $t = $_POST["t"]; }
			if(isset($_POST["send"])){ $send = $_POST["send"]; }	
			if(isset($send)){

$result_select3 = mysqli_query($connect,"INSERT INTO predmet (kod_predmeta, nazv_predmeta, inf_resurs, razdel, tema) VALUES ('$b', '$d', '$s', '$r', '$t')") or die ("Error : " .mysqli_error() );
if($result_select3)	
				{
echo"Регистрация прошла успешно!";
exit();
				}
			}else{
			echo"нет данных для обработки";	
			}
			?>	

   
   </form>

</center>
</body>
</html>