<?php
require_once('../model/cartinfo_db.php');

function get_carts() : array
{
    $rows  = get_all_carts();
    $carts = [];

    if ($rows instanceof mysqli_result) {
        while ($row = mysqli_fetch_assoc($rows)) {
            $carts[] = [
                'id'         => isset($row['id']) ? (int)$row['id'] : null,
                'session_id' => $row['session_id'] ?? null,
                // product_id is VARCHAR 
                'product_id' => isset($row['product_id']) ? (string)$row['product_id'] : null,
                'quantity'   => isset($row['quantity']) ? (int)$row['quantity'] : 0,
                'added_at'   => $row['added_at'] ?? null,
            ];
        }
        mysqli_free_result($rows);
    }

    return $carts;
}

//Return active session's cart (cart_items only).
function get_active_cart() : array
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // Note to self: make sure this is the same key your add_to_cart.php uses
    $sessionId = $_SESSION['cart_session'] ?? session_id();

    $cart   = [];
    $result = get_cart_by_session($sessionId);

    if ($result instanceof mysqli_result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cart[] = [
                'id'         => isset($row['id']) ? (int)$row['id'] : null,
                'session_id' => $row['session_id'] ?? $sessionId,
                'product_id' => isset($row['product_id']) ? (string)$row['product_id'] : null,
                'quantity'   => isset($row['quantity']) ? (int)$row['quantity'] : 0,
                'added_at'   => $row['added_at'] ?? null,
            ];
        }
        mysqli_free_result($result);
    }

    return $cart;
}

//Return active session's cart joined with catalog (name, cost).
 */
function get_active_cart_with_products() : array
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $sessionId = $_SESSION['cart_session'] ?? session_id();

    $items  = [];
    $result = get_cart_with_products_by_session($sessionId);

    if ($result instanceof mysqli_result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = [
                'id'           => (int)$row['id'],
                'session_id'   => $row['session_id'],
                'product_id'   => (string)$row['product_id'],
                'quantity'     => (int)$row['quantity'],
                'product_name' => $row['product_name'],
                'product_cost' => (float)$row['product_cost'],
            ];
        }
        mysqli_free_result($result);
    }

    return $items;
}