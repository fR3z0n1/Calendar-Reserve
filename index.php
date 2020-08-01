<?php

	include('models/Connection.php');

	$connect = Connection::OpenConnection();

	if($connect) {
		$sql 	= "SELECT `date` FROM `date`";
		$dates 	= [];

		$query     = $connect->prepare($sql);
		$query->execute();
		$arrayDate = $query->fetchAll(PDO::FETCH_NUM);

		for ($i=0; $i < count($arrayDate); $i++) { 
			for ($j=0; $j < count($arrayDate[$i]); $j++) { 
				$dates[] = json_decode($arrayDate[$i][$j]);
			}
		}
	}
		$dates = json_encode($dates);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Календарь бронирования</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/Calendar.js"></script>
</head>
<body>

	<div class="calendar">
		<div class="caption_text">
			<h1 class="caption_reserve">Бронирование даты</h1>
			<p class="caption_task">Тестовое задание на должность fullstack-разработчика</p>
		</div>

		<? 
		$index  = 1;
		$months = [
			'Январь' => 'january',
			'Февраль' => 'february',
			'Март' => 'march',
			'Апрель' => 'april',
			'Май' => 'may',
			'Июнь' => 'june',
			'Июль' => 'july',
			'Август' => 'august',
			'Сентябрь' => 'september',
			'Октябрь' => 'october',
			'Ноябрь' => 'november',
			'Декабрь' => 'december',
		]; 	?>

		<? foreach($months as $month => $className) : ?>
		<div class="one_element">
			<div class="caption-month"><? echo $month; ?></div>
			<table class="block-weekdays" cellspacing="2">
				<thead>
					<tr>
						<td class="weekdays">пн</td>
						<td class="weekdays">вт</td>
						<td class="weekdays">ср</td>
						<td class="weekdays">чт</td>
						<td class="weekdays">пт</td>
						<td class="weekend">сб</td>
						<td class="weekend">вс</td>
					</tr>
					<tr class="clearfix-7"></tr>
				</thead>
				<tbody class="<? echo $className; ?>">
					<script>
						setDaysByCalendar(<? echo $index++; ?>, '<? echo $className; ?>');	
					</script>	 
				</tbody>
			</table>
		</div>
		<? endforeach;?>
		
		<p class="errors alert"></p>
		<div class="bottom_row">
			<form>
				<label for="enter_phone">Укажите телефон:</label>
				<input id="enter_phone" type="tel" name="tel" placeholder="+7 (___) ___-__-__" autocomplete="off" value="">
				
				<input type="button" class="btn send_btn" id="third" onclick="sendReserve(); " value="Забронировать">
			</form>
		</div>

	</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="js/selected-cell.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script>
	document.getElementById('enter_phone').onkeypress = onlyNumber; 
	window.onload = (event) => { readyBooked('<? echo $dates; ?>');	}
	$(document).ready(function(){  
		$("#enter_phone").mask("+7(999)-999-99-99", { placeholder: "+7(___)-___-__-___"});
	});
	
</script>
</body>
</html>

