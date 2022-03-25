<!doctype html>

<html>

<head>
	
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	
<title>Календарь событий</title>
	
<link rel="stylesheet" href="css/eventCalendar.css">
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">
<link href="blok.css" rel="stylesheet" type="text/css" />
	
<link rel="stylesheet" href="css/styles.css" type="text/css">
	
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
	
<script type="text/javascript" src="highslide/highslide.js"></script>
	
<script type="text/javascript">
hs.graphicsDir = 'highslide/graphics/';
hs.wrapperClassName = 'wide-border';
</script>
	
<!--[if lt IE 9]>
	
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->

</head>

<body>

<div id="wrapper">
		
<header>
			<a href="/"><img src="images/logo1.jpg" width="960" height="300" alt="Сплин логотип"></a>


			
		</header>
		
<nav>
			
<ul class="top-menu">

<li><a href="index.php">Главная</a></li>
			
<li><a href="history.php">Проектная документация</a></li>
				
<li><a href="virt.php">Конспекты</a></li>
			
<li class="active">Календарь событий</a></li> 

				
<li><a href="video.php">Эл. журнал</a></li>
<li><a href="link.php">Электронные ссылки</a></li>
			
</ul>
		
</nav>
	<div id="heading">
			<h1>Календарь событий</h1>
		</div>
<br>	

<div id="eventCalendar" style="width: 400px; margin: 50px left; float: left; "></div>
	
	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/jquery.eventCalendar.js"></script>
	<script>
	$(function(){
		var data = [
			{ "date": "2016-06-05 14:00:00", "title": "Новая точка зрения", "description": " ", "url": "images/событие 1.jpg" },
{"date": "2016-06-19 14:00:00", "title": "Новая точка зрения", "description": " ", "url": "images/событие 1.jpg" },
{"date": "2016-06-26 14:00:00", "title": "Новая точка зрения", "description": " ", "url": "images/событие 1.jpg" },
{"date": "2016-06-10 18:00:00", "title": "Париж XXI века", "description": " ", "url": "images/cобытие 2.jpg" },
{"date": "2016-06-18 18:00:00", "title": "Свободное движение", "description": " ", "url": "images/cобытие 3.jpg" },	
{"date": "2016-06-22 17:00:00", "title": "Бретская крепость", "description": " ", "url": "images/событие 4.jpg" },		
{"date": "2016-06-04 12:00:00",  "title": "Варгеймы", "description": " ", "url": "images/событие 5.jpg" },
{"date": "2016-06-11 12:00:00",  "title": "Варгеймы", "description": " ", "url": "images/событие 5.jpg" },
{"date": "2016-06-18 12:00:00",  "title": "Варгеймы", "description": " ", "url": "images/событие 5.jpg" },
{"date": "2016-06-25 12:00:00",  "title": "Варгеймы", "description": " ", "url": "images/событие 5.jpg" },
{"date": "2016-06-25 16:00:00",  "title": "Памятники, посвященные Петру I", "description": " ", "url": "images/событие 6.jpg" },
{"date": "2016-06-24 18:00:00",  "title": "Немеркнущее имя на горизонте моды и духов - Мадемуазель Шанель", "description": " ", "url": "images/событие 7.jpg" },
{"date": "2016-06-04 17:00:00",  "title": "Незнакомая Грецая: традиции и путишествия", "description": " ", "url": "images/событие 8.jpg" },
{"date": "2016-06-21 18:30:00",  "title": "Как &quot;работают&quot; принты и как они помагают в корекции фигуры и создании &quot;верного&quot; образа", "description": " ", "url": "images/событие 9.jpg" },
{"date": "2016-06-11 16:00:00",  "title": "Петербугские памятники: Коты", "description": " ", "url": "images/событие 10.jpg" },
{"date": "2016-06-09 19:00:00",  "title": "Классика русской литературы на киноэкране 1900-1910х годов", "description": " ", "url": "images/событие 11.jpg" },
		];
		$('#eventCalendar').eventCalendar({
			jsonData: data,
			
			jsonDateFormat: 'human',
			startWeekOnMonday: true,
			openEventInNewWindow: true,
			dateFormat: 'dddd DD-MM-YYYY ',
			showDescription: false,
			locales: {
				locale: "ru",
				txt_noEvents: "Нет запланированных событий",
				txt_SpecificEvents_prev: "",
				txt_SpecificEvents_after: "события:",
				txt_NextEvents: "Следующие события:",
				txt_GoToEventUrl: "Смотреть",
				moment: {
					"months" : [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
					"Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
					"monthsShort" : [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн",
					"Июл", "Авг", "Сен", "Окт", "Ноя", "Дек" ],
					"weekdays" : [ "Воскресенье", "Понедельник","Вторник","Среда","Четверг",
					"Пятница","Суббота",  ],
					"weekdaysShort" : ["Вс", "Пн","Вт","Ср","Чт",
					"Пт","Сб" ],
					"weekdaysMin" : [ "Вс", "Пн","Вт","Ср","Чт",
					"Пт","Сб" ]
				}
			}
		});
	});
	</script>
<div id="heading 2"><h1> Веб - сайты центра М-86: </h1><br>
<ul>
<li>&#8212; <a href="http://pl.spb.ru/structure/detail.php?ID=3392">офиц.сайт библиотеки  ЦГПБ им. В. В. Маяковского</a></li> <br>
<li>&#8212; <a href="http://atawaka.com">  	 путеводитель по событиям</a></li></br>
<li>&#8212; <a href="https://instagram.com/dosugcentrem86/">  instagram</a></li></br>
<li>&#8212; <a href="http://vk.com/centrem86">	сообщество  vkontakte</a></li></br>
</ul>
				</div>
		

<div id="sod">


</div>
</div>


<footer>
		<div id="footer">
			<div id="sitemap">
				<h3>Разделы</h3>
                    <div>				
					<a href="index.php">Главная</a>
					<a href="events.php">календарь событий</a>
					<a href="virt.php">виртуальная эксурсия</a>
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
				<p>Copyright &copy; 2015 Mariya creation </p>
			</div>
		</div>
	</footer>
</body>
</html>