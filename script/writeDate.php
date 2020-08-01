<?php 
	
	include('../models/Connection.php');

	$connect = Connection::OpenConnection();

	$date = json_encode($_POST['date_bron']);
	$phone = $_POST['phone'];/**/

	if($connect) {
		$sql = "INSERT INTO `date`(`id`, `date`, `date_at`, `phone`) VALUES (NULL, :date_bron, NULL, :phone)";
		$query = $connect->prepare($sql);
		$query->bindParam(':date_bron', $date, PDO::PARAM_STR);
		$query->bindParam(':phone', $phone, PDO::PARAM_STR);
		$result = $query->execute();

		$connect = null;
	} 
