<?php 


	include_once('config.php');

	$id = $_SESSION['id'];
    
    $userid = $_SESSION['id'];
    $client = $_POST['client'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	// $productname = $_POST['productname'];
	// $price = $_POST['price'];

	$sql = "INSERT INTO orders(userid, client, email, address) VALUES (:userid, :client, :email, :address)";

	$insertCheckout = $conn->prepare($sql);

	$insertCheckout->bindParam(":userid", $userid);
	$insertCheckout->bindParam(":client", $client);
	$insertCheckout->bindParam(":email", $email);
	$insertCheckout->bindParam(":address", $address);
	// $insertCheckout->bindParam(":productname", $productname);
	// $insertCheckout->bindParam(":price", $price);

	$insertCheckout->execute();

	header("Location: ordersList.php");

 ?>