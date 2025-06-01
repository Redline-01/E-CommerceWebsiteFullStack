<?php
   
    include_once("config.php");

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $message = $_POST['message'];

        if(empty($email) || empty($message)){

            echo "You have not filled all the fields";
        }
        else{

        

        $sql = "INSERT INTO clientmessages(email,message) VALUES (:email, :message)";

        $insertSql = $conn->prepare($sql);

        $insertSql->bindParam(':email', $email);
        $insertSql->bindParam(':message', $message);

        $insertSql->execute();

        header("Location: checkout.php");
        } 
    }