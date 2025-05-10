<?php
include_once('config.php');
session_start();

// Validate session and input
if (empty($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_POST['client']) || empty($_POST['email']) || empty($_POST['address'])) {
    die("Error: Required fields are missing.");
}

// Get cart data from localStorage via hidden form field
$cartData = json_decode($_POST['cart_data'], true);
if (json_last_error() !== JSON_ERROR_NONE || !is_array($cartData)) {
    die("Error: Invalid cart data.");
}

try {
    $conn->beginTransaction();

    // Calculate total price
    $total = 0;
    $productNames = [];
    foreach ($cartData as $item) {
    $productNames[] = $item['name'] . ' (Qty: ' . $item['quantity'] . ')';
    $total += $item['price'] * $item['quantity'];
}


    // Insert into orders table
    $stmt = $conn->prepare("
        INSERT INTO orders (userid, client, email, address, productname, price, approve) 
        VALUES (:userid, :client, :email, :address, :productname, :price, 'false')
    ");
    
    $stmt->execute([
        ':userid' => $_SESSION['id'],
        ':client' => $_POST['client'],
        ':email' => $_POST['email'],
        ':address' => $_POST['address'],
        ':productname' => implode(', ', $productNames), // Combine product names
        ':price' => $total
    ]);

    $conn->commit();

    // Clear the cart
    echo "<script>
        localStorage.removeItem('cart');
        window.location.href = 'ordersList.php';
    </script>";
    exit();

} catch (PDOException $e) {
    $conn->rollBack();
    die("Error processing order: " . $e->getMessage());
}