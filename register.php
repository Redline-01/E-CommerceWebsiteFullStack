<?php
 
	include_once('config.php');

	if(isset($_POST['submit']))
	{

		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$username = $_POST['username'];
		$email = $_POST['email'];

		$tempPass = isset($_POST['password']) ? $_POST['password'] : '';
		$tempConfirm = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';

		// Only hash after validation
		if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($tempPass) || empty($tempConfirm))
		{
			header("Location: signup.php?error=emptyfields");
			exit();
		}
		// Check for existing email
		$checkEmailSql = "SELECT COUNT(*) FROM login WHERE email = :email";
		$checkEmailStmt = $conn->prepare($checkEmailSql);
		$checkEmailStmt->bindParam(':email', $email);
		$checkEmailStmt->execute();
		$emailExists = $checkEmailStmt->fetchColumn();

		if ($emailExists) {
			header("Location: signup.php?error=emailexists");
			exit();
		}
		else if (strlen($tempPass) < 8) {
			header("Location: signup.php?error=min8chars");
			exit();
		}
		else if ($tempPass !== $tempConfirm) {
			header("Location: signup.php?error=passwordmismatch");
			exit();
		}
		else
		{
			// Hash after validation
			$password = password_hash($tempPass, PASSWORD_DEFAULT);
			$confirmpassword = password_hash($tempConfirm, PASSWORD_DEFAULT);


			$sql = "INSERT INTO login(name,surname,username,email,password, confirmpassword, isadmin) VALUES (:name, :surname, :username, :email, :password, :confirmpassword, 0)";

			$insertSql = $conn->prepare($sql);
			

			$insertSql->bindParam(':name', $name);
			$insertSql->bindParam(':surname', $surname);
			$insertSql->bindParam(':username', $username);
			$insertSql->bindParam(':email', $email);
			$insertSql->bindParam(':password', $password);
			$insertSql->bindParam(':confirmpassword', $confirmpassword);

			$insertSql->execute();

			header("Location:login.php?success=1");
			exit();

		}



	}


?>