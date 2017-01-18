<?php

	include '../config.php';
	
	$id = $_POST['id'];

	$name = $_POST['name'];

	$sql = "INSERT into role(id,name) values(:id,:name)";

	$stmt = $bdd->prepare($sql);

	$stmt->execute(array(

		"id" => $id,

		"name" => $name
	));

	header('Location:index.php');
?>