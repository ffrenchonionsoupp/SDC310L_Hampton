<?php
    require_once('../controller/cartinfo_controller.php');
    $carts_arr = get_carts();
?>
<html>
    <head>
        <title>Shopping Cart - Francis Hampton</title>
    </head>
    <body>
        <h2>Current carts:</h2>
        <table>
            <tr style="font-size: large;">
                <th>Cart ID</th>
                <th>Shopper ID</th>
                <th>Status</th>
                <th>Cart Created</th>
                <th>Cart Updated</th>
            </tr>
            <?php foreach($carts_arr as $cart):;?>
                <tr>
                    <td><?php echo $cart["cart_id"];?></td>
                    <td><?php echo $cart["shopper_id"];?></td>
                    <td><?php echo $cart["status"];?></td>
                    <td><?php echo $cart["created_at"];?></td>
                    <td><?php echo $cart["updated_at"];?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </body> 
</html>