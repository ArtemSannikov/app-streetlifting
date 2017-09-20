<!DOCTYPE html>
<html>
<head>
	<!-- Charset -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Результат отправки заявки</title>
	<!-- Include meta tag to ensure proper rendering and touch zooming-->
	<meta name="view-port" content="width=device-width, initial-scale=1">
	<!-- Fullscreen app iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Fullscreen app Android -->
	<meta name="mobile-web-app-capable" content="yes">
	<!-- Include jQuery Mobile stylesheets -->
	<link rel="stylesheet" href="../css/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="../css/themes/my-theme.css" />
	<link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="../css/my-style.css" />
	<!-- Include the jQuery Mobile library -->
	<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	<!-- Include the jQuery Mobile library -->
	<script type="text/javascript" src="../js/jquery.mobile-1.4.5.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
	<!-- cordova js -->
	<script src="cordova.js"></script>
</head>
<body>

<!-- ################### Результат отправки заявки ################### -->
<div data-role="page" id="send-requisition" data-theme="a">

	<div data-role="header" data-back-btn-theme="a">
		<a href="../index.html#online-requisition"  data-role="button" data-icon="carat-l" data-shadow="false" data-transition="none" data-ajax="false">Назад</a>
		<h1>Онлайн заявка</h1>
	</div>

	<div data-role="main" class="ui-content">
	<?php

		$last_name = htmlspecialchars(substr($_POST['last_name'],0,25)); #Фамилия
		$first_name = htmlspecialchars(substr($_POST['first_name'],0,15)); #Имя
		$middle_name = htmlspecialchars(substr($_POST['middle_name'],0,25)); #Отчество
		$happy_birthday = htmlspecialchars(substr($_POST['happy_birthday'],0,15));#Дата рождения
		$gender = htmlspecialchars(substr($_POST['gender'],0,15));#Пол
		$geolocation = htmlspecialchars(substr($_POST['geolocation'],0,200)); #Георасположение
		$phone_number = htmlspecialchars(substr($_POST['phone_number'],0,12));#Телефон
		$status = htmlspecialchars(substr($_POST['status'],0,15)); #Звание
		$command = htmlspecialchars(substr($_POST['command'],0,20)); #Команда
		$sport_achievement = htmlspecialchars(substr($_POST['sport_achievement'],0,200)); #Спортивные достижения
		$coach = htmlspecialchars(substr($_POST['coach'],0,40)); #Тренер
		$sport = htmlspecialchars(substr($_POST['sport'],0,25)); #Вид спорта

		$mail = htmlspecialchars(substr($_POST['email_address'],0,30)); #Электронная почта
		$pattern_mail ="/^[a-z0-9_-]+@[a-z0-9]+\.[a-z]{2,6}$/i"; #шаблон для проверки почты

		#Проверяем заполнены ли поля формы

		if(empty($last_name)){exit('Поле "Фамилия"" не заполнено!');}
		if(empty($first_name)){exit('Поле "Имя"" не заполнено!');}
		if(empty($middle_name)){exit('Поле "Отчество"" не заполнено!');}

		if(empty($mail)){exit("Введите E-mail адрес!");} #Проверяем заполнено ли поле "E-mail"
		if(!empty($mail) and !preg_match($pattern_mail,$mail)){exit("Вы ввели некорректный E-mail адрес!");} //Проверяем корректно ли ввели почту

		$to = 'Sannikov1994@mail.ru'; #Кому отправлять
		$subject = "Онлайн-заявка (приложение)"; #Тема сообщения
		$message = "Имя: " . $first_name . "<br>Почта: " . $mail; #Формирование сообщения
		$headers = "From: app@streetlifting.ru\r\n"; //от кого
		$headers .= "Content-type: text/html; charset=utf-8\r\n";#кодировка
		$result = mail($to, $subject, $message, $headers ); #Результат

		if($result){
			echo $first_name." ".$middle_name,' ,ваша заявка была отправлена.'; 
		}
		else{
			echo "<p>Произошла ошибка. Попробуйте еще раз!</p>";
		}
	?>
	</div>

</div>

