<!DOCTYPE html>
<html>
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
	<li class="active"><a href="p1.php">Запрос</a></li>
	<li><a href=""></a></li>
	<li><a href=""></a></li>
	<li><a href=""></a></li>
			</ul>
		</nav>
<div id="heading">
			<h1>Вход</h1>
		</div>
<center>
<form action="p1.php" method="post" name="c_form">
<table>
<tr>
<td>Вопрос</td>
<td><input type="text" name="vopros" required=" " /></td>
</tr>
<tr>
<td colspan="2"> <input type="submit" name="send" value="Ввод" /></td>
</tr>
</table>


<?php
		require_once 'dbconnect.php';

if (isset($_POST["vopros"])){$vopros = $_POST["vopros"];}
if (isset($_POST["send"])){$send = $_POST["send"];}
if(isset($send)){
	
		$result = mysqli_query($connect, "SELECT * FROM `org` WHERE MATCH (vopros) AGAINST ('$vopros')") or die("Ошибка " . mysqli_error()); 

	if(mysqli_num_rows($result)<1) 
	{echo "No information";}
	else
	{$_vopros['vopros'] = $vopros;
echo "Результат запроса";
}

if($result)
	{
	$numrows = mysqli_num_rows($result);
				echo "<table class='features-table'>";
				echo "<thead>";
				echo "<tr><th>Ответ</th></tr>";
				echo "</thead>";
				echo "<tfoot>";				
	for ($i=0; $i<$numrows; ++$i)
{	
	$row = mysqli_fetch_array($result);
				echo "<tr>";
				echo "<td>";
				echo "{$row["otvet"]}";
				echo "</td>";
				
				
				echo "</tr>";
}

				echo "</tfoot>";
				echo "</table>";
// очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($connect);
}else{
	echo"Нет данных";
}

?>
</form>
</center>
</div>
</body>
</html>