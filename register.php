<?php
 
	include_once('config.php');

	if(isset($_POST['submit']))
	{

		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$username = $_POST['username'];
		$email = $_POST['email'];

		$tempPass = $_POST['password'];
		$password = password_hash($tempPass, PASSWORD_DEFAULT);



		$tempConfirm = $_POST['confirm_password'];
		$confirmpassword = password_hash($tempConfirm, PASSWORD_DEFAULT);


		if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($password) || empty($confirmpassword))
		{
			echo "You have not filled in all the fields.";
		}
		else
		{

			$sql = "INSERT INTO login (name,surname,username,email,password, confirmpassword) VALUES (:name, :surname, :username, :email, :password, :confirmpassword)";

			$insertSql = $conn->prepare($sql);
			

			$insertSql->bindParam(':name', $name);
			$insertSql->bindParam(':surname', $surname);
			$insertSql->bindParam(':username', $username);
			$insertSql->bindParam(':email', $email);
			$insertSql->bindParam(':password', $password);
			$insertSql->bindParam(':confirmpassword', $confirmpassword);

			$insertSql->execute();

			header("Location: login.php");


		}



	}


?>