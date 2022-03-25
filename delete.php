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


<?php
if(isset($_POST["id"]))
{
    $conn = mysqli_connect('localhost','root','','chat');
	mysqli_set_charset($connect, 'utf8');
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql = "DELETE FROM messages WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
         
        header("Location: chat.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);    
}
?>



</body>
</html>