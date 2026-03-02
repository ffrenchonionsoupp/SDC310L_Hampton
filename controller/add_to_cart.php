<?php

// how to debug
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require_once('../model/database.php');

$conn = get_db_conn();                 // <-- create the mysqli connection

$product_id = $_POST['product_id'] ?? null;
$quantity   = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
if ($quantity < 1) $quantity = 1;  // simple guard

if (!$product_id) {
    header('Location: ../view/display_catalog.php');
    exit;
}

// use one consistent session key
if (!isset($_SESSION['cart_session'])) {
    $_SESSION['cart_session'] = session_id();
}
$session_id = $_SESSION['cart_session'];

//Insert the requested quantity, or increment if it already exists.
$sql = "INSERT INTO cart_items (session_id, product_id, quantity)
        VALUES ('$session_id', '$product_id', $quantity)
        ON DUPLICATE KEY UPDATE quantity = quantity + $quantity";

mysqli_query($conn, $sql);

//Redirects back to catalog for continuous shopping
header('Location: ../view/display_catalog.php');
exit;