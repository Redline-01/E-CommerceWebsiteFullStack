<?php
include_once('config.php');
session_start();

// Validate session and input
if (empty($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_POST['client']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['country']) || empty($_POST['city']) || empty($_POST['zip'])) {
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
        INSERT INTO orders (userid, client, email, address, country, city, zip, productname, price, approve) 
        VALUES (:userid, :client, :email, :address, :country, :city, :zip, :productname, :price, 'Pending Approval')
    ");
    
    $stmt->execute([
        ':userid' => $_SESSION['id'],
        ':client' => $_POST['client'],
        ':email' => $_POST['email'],
        ':address' => $_POST['address'],
        ':country' => $_POST['country'],
        ':city' => $_POST['city'],
        ':zip' => $_POST['zip'],
        ':productname' => implode(', ', $productNames), // Combine product names
        ':price' => $total
    ]);

    $conn->commit();

    // Clear the cart and redirect using JS after order is processed
    echo "<script>
        localStorage.removeItem('cart');
        setTimeout(function() { window.location.href = 'ordersList.php'; }, 300);
    </script>";
    exit();

} catch (PDOException $e) {
    $conn->rollBack();
    die("Error processing order: " . $e->getMessage());
}