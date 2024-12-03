<?php	

	include_once('config.php');


	if(isset($_POST['submit']))
	{

		$product_name = $_POST['nameProducts'];
		$product_price = $_POST['price'];
		$product_image = $_POST['imageProducts'];
		

		$sql = "INSERT INTO shopproducts(nameProducts, price, imageProducts) VALUES (:nameProducts, :price, :imageProducts)";

		$insertProduct = $conn->prepare($sql);
			

		$insertProduct->bindParam(':nameProducts', $product_name);
		$insertProduct->bindParam(':price', $product_price);
		$insertProduct->bindParam(':imageProducts', $product_image);
		
		$insertProduct->execute();

		header("Location: shop.php");


	}




?>