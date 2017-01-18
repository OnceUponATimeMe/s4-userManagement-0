<?php

	include '../config.php';
	
	$id = $_GET['id'];

	$sql = "DELETE from role where id = :id";

	$stmt = $bdd->prepare($sql);

	$stmt->execute(array(

		"id" => $id
	));

	header('Location:index.php');
?>