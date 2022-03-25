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
<a href="/"><img src="images/logo.jpg" width="960" height="300" alt="logo"></a>
</header>
<nav>
	<ul class="top-menu">
	<li class="active"><a href="p3.php">Запрос</a></li>
	<li><a href=""></a></li>
	<li><a href=""></a></li>
	<li><a href=""></a></li>
			</ul>
		</nav>
<div id="heading">
			<h1>Чат</h1>
		</div>

<form  action="p3.php"  method="post" name="c_form" class="chat chats">
<div class="chat chats">
   
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
echo " ";
}

if($result)
	{
	//$numrows = mysqli_num_rows($result);
						
	//for ($i=0; $i<$numrows; ++$i)
{	
	$row = mysqli_fetch_array($result);
				echo "<br>";
				echo "{$vopros}"; 
				echo "<br>";
				echo "<br>";
				echo "{$row["otvet"]}";
				echo "<br>";
				
				
				
}

				
// очищаем результат
   // mysqli_free_result($result);
}
 
//mysqli_close($connect);
}else{
	echo"Нет данных";
} 

       
?> <br><br>
<input name="vopros" type="text" required=" " />
       <input type="submit" name="send" value="Ввод" /> 
	   </div>
</form>

</div>
</body>
</html>