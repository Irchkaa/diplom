<!DOCTYPE html>
<html>
	<head>
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Главная</title>
		<link rel="stylesheet" href="style.css" type="text/css" />	
		<link rel="stylesheet" href="css/styles.css" type="text/css">
		
<style>
.chat {
	border:1px solid #333;
	margin:15px;
	width:40%;
	height:70%;
	background:#555;
	color:#fff;
}

.chat-messages {
	min-height:93%;
	max-height:93%;
	overflow:auto;
}

.chat-messages__content {
	padding:1px;
}

.chat__message {
	border-left:3px solid #333;
	margin-top:2px;
	padding:2px;
}

.chat__message_black {
	border-color:#000;
}

.chat__message_blue {
	border-color:blue;
}

.chat__message_green {
	border-color:green;
}

.chat__message_red {
	border-color:red;
}

.chat-input {
	min-height:6%;
}
input {
	font-family:arial;
	font-size:16px;
	vertical-align:middle;
	background:#333;
	color:#fff;
	border:0;
	display:inline-block;
	margin:1px;
	height:30px;
}

.chat-form__input {
	width:79%;
}

.chat-form__submit {
	width:18%;
}
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
	<form action="chat.php" method="post" name="l_form" >
<div class='chat'>
	<div class='chat-messages'>
		<div class='chat-messages__content' id='messages'>
			Загрузка...
		</div>
	</div>
	<div class='chat-input'>
		<form method='post' id='chat-form'>
			<input type='text' id='message-text' class='chat-form__input' placeholder='Введите сообщение'> <input type='submit' class='chat-form__submit' value='=>'>
		</form>
	</div>
</div>

<script>

var messages__container = document.getElementById('messages'); 
//Контейнер сообщений — скрипт будет добавлять в него сообщения

var interval = null; //Переменная с интервалом подгрузки сообщений

var sendForm = document.getElementById('chat-form'); //Форма отправки
var messageInput = document.getElementById('message-text'); //Инпут для текста сообщения


function send_request(act, login = null, password = null) {//Основная функция
	//Переменные, которые будут отправляться
	var var1 = null;
	var var2 = null;
	
	if(act == 'auth') {
		//Если нужно авторизоваться, получаем логин и пароль, которые были переданы в функцию
		var1 = login;
		var2 = password;
	} else if(act == 'send') {
//Если нужно отправить сообщение, то получаем текст из поля ввода
		var1 = messageInput.value;
	}
	
	$.post('includes/chat.php',{ //Отправляем переменные
		act: act,
		var1: var1,
		var2: var2
	}).done(function (data) { 
		//Заносим в контейнер ответ от сервера
		messages__container.innerHTML = data;
		if(act == 'send') {
			//Если нужно было отправить сообщение, очищаем поле ввода
			messageInput.value = '';
		}
	});
}


function update() {
	send_request('load');
}
interval = setInterval(update,500);


sendForm.onsubmit = function () {
	send_request('send');
	return false; //Возвращаем ложь, чтобы остановить классическую отправку формы
};
</script>
<?php
session_start();//Подключение должно быть на первой строчке в коде, иначе появится ошибка
$db = require_once 'dbconnect.php';
//$db = mysqli_connect("localhost","login","password"); 
mysqli_select_db($db,"chat");
//Заносим данные админа в сессию
$_SESSION['login'] = 'admin';
$_SESSION['password'] = 'admin';
$_SESSION['id'] = 1;

function auth($db,$login,$pass) {
	//Находим совпадение в базе данных
	$result = mysqli_query($db,"SELECT * FROM userlist WHERE login='$login' AND password='$pass'");
	if($result) {
		if(mysqli_num_rows($result) == 1) {//Проверяем, одно ли совпадение
			$user = mysqli_fetch_array($result); //Получаем данные пользователя и заносим их в сессию
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $pass;
			$_SESSION['id'] = $user['id'];
			return true; //Возвращаем true, потому что авторизация успешна
		} else {
			unset($_SESSION); //Удаляем все данные из сессии и возвращаем false, если совпадений нет или их больше 1
			return false;
		}
	} else {
		return false; //Возвращаем ложь, если произошла ошибка
	}
}

function load($db) {
	$echo = "";
	if(auth($db,$_SESSION['login'],$_SESSION['password'])) {//Проверяем успешность авторизации
		$result = mysqli_query($db,"SELECT * FROM messages"); //Запрашиваем сообщения из базы
		if($result) {
			if(mysqli_num_rows($result) >= 1) {
				while($array = mysqli_fetch_array($result)) {//Выводим их с помощью цикла
					$user_result = mysqli_query($db,"SELECT * FROM userlist WHERE id='$array[user_id]'");//Получаем данные об авторе сообщения
					if(mysqli_num_rows($user_result) == 1) {
						$user = mysqli_fetch_array($user_result);
						$echo .= "<div class='chat__message chat__message_$user[nick_color]'><b>$user[login]:</b> $array[message]</div>"; //Добавляем сообщения в переменную $echo
					}
				}
			
			} else {
				$echo = "Нет сообщений!";//В базе ноль записей
			}
		}
	} else {
		$echo = "Проблема авторизации";//Авторизация не удалась
	}
	
	return $echo;//Возвращаем результат работы функции
	
function send($db,$message) {
	if(auth($db,$_SESSION['login'],$_SESSION['password'])) {//Если авторизация удачна
		$message = htmlspecialchars($message);//Заменяем символы ‘<’ и ‘>’на ASCII-код
		$message = trim($message); //Удаляем лишние пробелы
		$message = addslashes($message); //Экранируем запрещенные символы
		$result = mysqli_query($db,"INSERT INTO messages (user_id,message) VALUES ('$_SESSION[id]','$message')");//Заносим сообщение в базу данных
	}
	return load($db); //Вызываем функцию загрузки сообщений
}

if(isset($_POST['act'])) {$act = $_POST['act'];}
if(isset($_POST['var1'])) {$var1 = $_POST['var1'];}
if(isset($_POST['var2'])) {$var2 = $_POST['var2'];}

switch($_POST['act']) {//В зависимости от значения act вызываем разные функции
	case 'load': 
		$echo = load($db); //Загружаем сообщения
	break;
	
	case 'send': 
		if(isset($var1)) {
			$echo = send($db,$var1); //Отправляем сообщение
		}
	break;
	
	case 'auth': 
		if(isset($var1) && isset($var2)) {//Авторизуемся
			if(auth($db,$var1,$var2)) {
				$echo = load($db);
			}
		}
	break;
}

echo $echo;//Выводим результат работы кода
?>
</form>
</center>
</body>
</html>
