<?php 
	
	include_once('config.php');

	$id = $_GET['id'];
	$sql = "UPDATE `orders` SET `approve` = 'Ne Procesim' WHERE id=:id";
	$prep = $conn->prepare($sql);
	$prep->bindParam(':id',$id);
	$prep->execute();

	header("Location: ordersList.php");
 ?>
 