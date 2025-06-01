<?php
include_once('config.php');

if (empty($_SESSION['username']) || $_SESSION['isadmin'] != 'true') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userid'], $_POST['action'])) {
    $userid = (int)$_POST['userid'];
    $action = $_POST['action'];
    if ($userid > 0) {
        if ($action === 'add') {
            $sql = "UPDATE login SET isadmin = 'true' WHERE id = :userid";
        } elseif ($action === 'remove') {
            $sql = "UPDATE login SET isadmin = 'false' WHERE id = :userid";
        } else {
            header("Location: dashboard.php");
            exit();
        }
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();
    }
}
header("Location: dashboard.php");
exit();
