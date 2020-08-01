<?php 

	include('../models/Connection.php');

	$connect = Connection::OpenConnection();

	if($connect) {
		$sql = "SELECT `date` FROM `date`";
		$dates = [];

		$query = $connect->prepare($sql);
		$query->execute();
		$arrayDate = $query->fetchAll(PDO::FETCH_NUM);
		$connect = null;

		for ($i=0; $i < count($arrayDate); $i++) { 
			for ($j=0; $j < count($arrayDate[$i]); $j++) { 
				$dates[] = json_decode($arrayDate[$i][$j]);
			}
		}
	}
		echo $dates = json_encode($dates);