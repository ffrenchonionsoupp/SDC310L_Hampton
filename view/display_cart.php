<?php

// how to debug
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require_once('../model/database.php');

$conn = get_db_conn();

// Use the same session key as add_to_cart.php
$session_id = $_SESSION['cart_session'] ?? session_id();

$sql = "SELECT c.product_id, c.quantity, p.product_name, p.product_cost
        FROM cart_items c
        JOIN catalog p ON p.product_id = c.product_id
        WHERE c.session_id = '$session_id'
        ORDER BY c.id DESC";

$result = mysqli_query($conn, $sql);

// Compute subtotal
$subtotal = 0.0;
$rows = [];
if ($result) {
    while ($r = mysqli_fetch_assoc($result)) {
        $line = ((float)$r['product_cost']) * ((int)$r['quantity']);
        $subtotal += $line;
        $r['line_total'] = $line;
        $rows[] = $r;
    }
}
?>

<style>
    table {
        border-spacing: 5px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        text-align: center;
    }
    th {
        background-color: lightskyblue;
    }
    tr:nth-child(even) {
        background-color: whitesmoke;
    }
    tr:nth-child(odd) {
        background-color: lightgray;
    }
    .icon {
        width: 40px;       
        height: 40px;       
        object-fit: contain; 
        vertical-align: middle;
        margin-right: 6px;
    }
</style>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Your Cart</title>

</head>
<body>
  <h2>Your Cart</h2>

  <?php if (empty($rows)): ?>
    <p>Your cart is empty.</p>
    <p>
        <h2 style="text-align: center;"><a href="display_catalog.php">Go to Catalog</a></h2>
    </p>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th class="num">Price</th>
          <th class="num">Qty</th>
          <th class="num">Line Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $r): ?>
          <tr>
            <td><?= htmlspecialchars($r['product_name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td class="num">$<?= number_format((float)$r['product_cost'], 2) ?></td>
            <td class="num"><?= (int)$r['quantity'] ?></td>
            <td class="num">$<?= number_format((float)$r['line_total'], 2) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="num">Subtotal</td>
          <td class="num">$<?= number_format($subtotal, 2) ?></td>
        </tr>
      </tfoot>
    </table>
    <p>
        <h2 style="text-align: center;"><a href="display_catalog.php">Go to Catalog</a></h2>
    </p>
  <?php endif; ?>
</body>
</html>