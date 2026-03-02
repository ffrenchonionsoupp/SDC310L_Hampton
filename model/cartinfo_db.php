<?php
require_once('database.php');


function get_all_carts() {
    $conn = get_db_conn();
    $sql  = "SELECT id, session_id, product_id, quantity, added_at
             FROM cart_items
             ORDER BY id DESC";
    return mysqli_query($conn, $sql); // mysqli_result|false
}

function get_cart_with_products_by_session(string $sessionId) {
    $conn = get_db_conn();
    $sql  = "SELECT c.id, c.session_id, c.product_id, c.quantity, c.added_at,
                    p.product_name, p.product_cost
             FROM cart_items c
             JOIN catalog p ON p.product_id = c.product_id
             WHERE c.session_id = ?
             ORDER BY c.id DESC";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) return false;

    mysqli_stmt_bind_param($stmt, 's', $sessionId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

?>