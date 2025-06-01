<?php
include_once('config.php');

if (empty($_GET['orderid'])) {
    die('Order ID missing.');
}

$orderid = intval($_GET['orderid']);
$stmt = $conn->prepare("SELECT orders.*, login.username, login.email as user_email FROM orders INNER JOIN login ON orders.userid = login.id WHERE orders.id = :orderid");
$stmt->bindParam(':orderid', $orderid);
$stmt->execute();
$order = $stmt->fetch();

if (!$order) {
    die('Order not found.');
}

// Prepare product details
$names = preg_split('/\r?\n/', $order['productname']);
$ids = [];
if (!empty($order['productids'])) {
    $raw = $order['productids'];
    if ($raw[0] === '[') {
        $ids = json_decode($raw, true);
    } else {
        $ids = explode(',', $raw);
    }
}

// If ?send_email=1 is set, send the invoice as HTML email to the client
if (isset($_GET['send_email']) && $_GET['send_email'] == '1') {
    $to = $order['email']; 
    $subject = "Your Invoice for Order #$orderid";
    ob_start();
    ?>
    <div class="invoice-title" style="font-size:32px;font-weight:bold;margin-bottom:20px;">Invoice</div>
    <div><strong>Order ID:</strong> <?= $order['id'] ?></div>
    <div><strong>Client:</strong> <?= htmlspecialchars($order['client']) ?></div>
    <div><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></div>
    <div><strong>Country:</strong> <?= htmlspecialchars($order['country']) ?></div>
    <div><strong>City:</strong> <?= htmlspecialchars($order['city']) ?></div>
    <div><strong>Zip:</strong> <?= htmlspecialchars($order['zip']) ?></div>
    <div><strong>Address:</strong> <?= htmlspecialchars($order['address']) ?></div>
    <div><strong>Confirmation:</strong> <?= htmlspecialchars($order['approve']) ?></div>
    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;width:100%;margin-top:20px;">
        <thead>
            <tr><th>Product Name & Quantity</th></tr>
        </thead>
        <tbody>
        <?php foreach ($names as $name): ?>
            <tr><td><?= htmlspecialchars($name) ?></td></tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div style="margin-top:20px;"><strong>Total Price:</strong> <?= htmlspecialchars($order['price']) ?> &euro;</div>
    <?php
    $message = ob_get_clean();
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@hyperx.com\r\n";
  $mailResult = @mail($to, $subject, $message, $headers);
  if ($mailResult) {
    echo '<div class="alert alert-success">Invoice sent to ' . htmlspecialchars($to) . '.</div>';
  } else {
    echo '<div class="alert alert-warning">Email sending is not configured on this server. No email was sent, but the invoice is shown below.</div>';
  }
}
?><!DOCTYPE html>
<html>
<head>
    <title>Invoice #<?= $orderid ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background: #fff;
            font-size: 16px;
            line-height: 24px;
        }
        .invoice-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table th, .table td { vertical-align: middle; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <div class="invoice-title">Invoice</div>
    <div class="mb-3"><strong>Order ID:</strong> <?= $order['id'] ?></div>
    <div class="mb-3"><strong>Client:</strong> <?= htmlspecialchars($order['client']) ?></div>
    <div class="mb-3"><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></div>
    <div class="mb-3"><strong>Country:</strong> <?= htmlspecialchars($order['country']) ?></div>
    <div class="mb-3"><strong>City:</strong> <?= htmlspecialchars($order['city']) ?></div>
    <div class="mb-3"><strong>Zip:</strong> <?= htmlspecialchars($order['zip']) ?></div>
    <div class="mb-3"><strong>Address:</strong> <?= htmlspecialchars($order['address']) ?></div>
    <div class="mb-3"><strong>Confirmation:</strong> <?= htmlspecialchars($order['approve']) ?></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name & Quantity</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($names as $name): ?>
            <tr>
                <td><?= htmlspecialchars($name) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mb-3"><strong>Total Price:</strong> <?= htmlspecialchars($order['price']) ?> &euro;</div>
    <button class="btn btn-primary no-print" onclick="window.print()">Print Invoice</button>
    <a href="ordersList.php" class="btn btn-secondary no-print">Back to Orders</a>
</div>
</body>
</html>
