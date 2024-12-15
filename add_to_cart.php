<?php
   include_once ('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['name'];
    $productPrice = floatval($_POST['price']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
        'name' => $productName,
        'price' => $productPrice,
    ];

    exit;
}
?>