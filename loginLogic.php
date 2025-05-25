<?php


   include_once('config.php');

   if(isset($_POST['submit']))
	{
		$username = $_POST['username'];

		$password = $_POST['password'];

		if (empty($username) || empty($password)) {
			header("Location: login.php?error=emptyfields");
			exit();
		}
		else{

			
			$sql = "SELECT id, name, surname, username, email, password, isadmin FROM login WHERE username=:username";

			
			$selectUser = $conn->prepare($sql);

		

			$selectUser->bindParam(":username", $username);

		

			$selectUser->execute();

			

			$data = $selectUser->fetch();

		
			if ($data == false) {
					// User does not exist
					header("Location: login.php?error=nouser");
					exit();
				}else{

					if (password_verify($password, $data['password'])) {
						// Successful login
						$_SESSION['id'] = $data['id'];
                        $_SESSION['name'] = $data['name'];
                        $_SESSION['surname'] = $data['surname'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['email'] = $data['email'];
						$_SESSION['isadmin'] = $data['isadmin'];

						header('Location: login.php?success=1');
						exit();
					}
					else{
						// Incorrect password
						header("Location: login.php?error=wrongpass");
						exit();
					}

				}

		}


	}





?>
