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

		if($_POST['submit_requisition']){
			$last_name = htmlspecialchars(substr($_POST['last_name'],0,25)); #Фамилия
			$first_name = htmlspecialchars(substr($_POST['first_name'],0,15)); #Имя
			$middle_name = htmlspecialchars(substr($_POST['middle_name'],0,25)); #Отчество
			$happy_birthday = htmlspecialchars(substr($_POST['happy_birthday'],0,15));#Дата рождения
			$gender = htmlspecialchars(substr($_POST['gender'],0,15));#Пол
			$country = htmlspecialchars(substr($_POST['country'],0,40)); #Страна
			$region = htmlspecialchars(substr($_POST['region'],0,40)); #Область (регион)
			$city = htmlspecialchars(substr($_POST['city'],0,40)); #Город
			$phone_number = htmlspecialchars(substr($_POST['phone_number'],0,12));#Телефон
			$status = htmlspecialchars(substr($_POST['status'],0,20)); #Звание
			$command = htmlspecialchars(substr($_POST['command'],0,30)); #Команда
			$sport_achievement = htmlspecialchars(substr($_POST['sport_achievement'],0,200)); #Спортивные достижения
			$coach = htmlspecialchars(substr($_POST['coach'],0,40)); #Тренер
			$sport = htmlspecialchars(substr($_POST['sport'],0,25)); #Вид спорта

			$mail = htmlspecialchars(substr($_POST['email_address'],0,40)); #Электронная почта
			$pattern_mail ="/^[a-z0-9_-]+@[a-z0-9]+\.[a-z]{2,6}$/i"; #шаблон для проверки почты

			#Проверяем заполнены ли поля формы

			if(empty($last_name)){exit('Поле "Фамилия" не заполнено!');}
			if(empty($first_name)){exit('Поле "Имя" не заполнено!');}
			if(empty($middle_name)){exit('Поле "Отчество" не заполнено!');}
			if(empty($happy_birthday)){exit('Поле "Дата рождения" не заполнено!');}
			if(empty($gender)){exit('Поле "Пол" не заполнено!');}
			if(empty($country)){exit('Поле "Страна" не заполнено!');}
			if(empty($region)){exit('Поле "Область (регион)" не заполнено!');}
			if(empty($city)){exit('Поле "Город" не заполнено!');}
			if(empty($phone_number)){exit('Поле "Телефон" не заполнено!');}
			if(empty($status)){exit('Поле "Звание" не заполнено!');}
			if(empty($command)){exit('Поле "Команда" не заполнено!');}
			if(empty($sport_achievement)){exit('Поле "Спортивные достижения" не заполнено!');}
			if(empty($coach)){exit('Поле "Тренер" не заполнено!');}
			if(empty($sport)){exit('Поле "Вид спорта" не заполнено!');}

			if(empty($mail)){exit('Поле "Электронная почта" не заполнено!');}
			if(!empty($mail) and !preg_match($pattern_mail,$mail)){exit("Вы ввели некорректный E-mail адрес!");}

			#Формируем сообщение

			$to = 'Sannikov1994@mail.ru'; #Кому отправлять
			$subject = 'Онлайн-заявка (приложение)'; #Тема сообщения

			$message = '<table width="100%">
							<tr>
								<td>Фамилия:</td>
								<td>'.$last_name.'</td>
							</tr>
							<tr>
								<td>Имя:</td>
								<td>'.$first_name.'</td>
							</tr>
							<tr>
								<td>Отчество:</td>
								<td>'.$middle_name.'</td>
							</tr>
							<tr>
								<td>Дата рождения:</td>
								<td>'.$happy_birthday.'</td>
							</tr>
							<tr>
								<td>Пол:</td>
								<td>'.$gender.'</td>
							</tr>
							<tr>
								<td>Страна:</td>
								<td>'.$country.'</td>
							</tr>
							<tr>
								<td>Область (регион):</td>
								<td>'.$region.'</td>
							</tr>
							<tr>
								<td>Город:</td>
								<td>'.$city.'</td>
							</tr>
							<tr>
								<td>Телефон:</td>
								<td>'.$phone_number.'</td>
							</tr>
							<tr>
								<td>Электронная почта:</td>
								<td>'.$mail.'</td>
							</tr>
							<tr>
								<td>Звание:</td>
								<td>'.$status.'</td>
							</tr>
							<tr>
								<td>Команда:</td>
								<td>'.$command.'</td>
							</tr>
							<tr>
								<td>Спортивные достижения:</td>
								<td>'.$sport_achievement.'</td>
							</tr>
							<tr>
								<td>Тренер:</td>
								<td>'.$coach.'</td>
							</tr>
							<tr>
								<td>Вид спорта:</td>
								<td>'.$sport.'</td>
							</tr>
						</table'; #Формирование сообщения

			$headers = "From: app@streetlifting.ru\r\n"; #от кого
			$headers .= "Content-type: text/html; charset=utf-8\r\n";#кодировка

			if(mail($to, $subject, $message, $headers)){
				echo '<p>'.$first_name.' '.$middle_name.', ваша заявка была отправлена.</p>'; 
			}else{
				echo '<p>Произошла ошибка. Попробуйте еще раз!</p>';
			}
		}else{
			echo "<p>Произошла ошибка!</p>";
			exit();
		}

	?>
	</div>

</div>

