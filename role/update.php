<?php

   
    //MySQL Database Connect
    include '../config.php';

        $sql = "UPDATE role SET name = :newname WHERE id = :id";

		$stmt = $bdd->prepare($sql);

		$stmt->execute(array(
			
			':newname' => $_POST['name'],
			 
			':id' => $_GET['id'] 
			));

		header('location:index.php');
?>