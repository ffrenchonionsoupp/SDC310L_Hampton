<?php
    require_once('../model/db_connect.php');
    
    $session_id = $_SESSION['cart_session'] ?? session_id();

    $sql = "SELECT c.product_id, c.quantity, p.product_name, p.product_cost
            FROM cart_items c
            JOIN products p ON c.product_id = p.product_id
            WHERE c.session_id = '$session_id'";

    $result = mysqli_query($conn, $sql);
?>
<html>
    <head>
        <title>Shopping Cart - Francis Hampton</title>
    </head>
    <body>
        <h2>Current Cart:</h2>
        <table>
            <tr style="font-size: large;">
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Cost</th>
            </tr>
            <?php foreach($cartRows as $cart):;?>
                <tr>
                    <td><?php echo $cart["product_id"];?></td>
                    <td><?php echo $cart["quantity"];?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </body> 
</html>