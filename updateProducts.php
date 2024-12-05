<?php

    include_once('config.php');

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nameProducts = $_POST['nameProducts'];
        $price = $_POST['price'];
        $imageProducts = $_POST['imageProducts'];
       
        $sql = "UPDATE shopproducts SET nameProducts=:nameProducts, price=:price, imageProducts=:imageProducts WHERE id=:id";
    
        $prep = $conn->prepare($sql);
        
        $prep->bindParam(":id", $id);
        $prep->bindParam(":nameProducts", $nameProducts);
        $prep->bindParam(":price", $price);
        $prep->bindParam(":imageProducts", $imageProducts);
       

        $prep->execute();

        header("Location: editProducts.php");
        
    
    }




?>