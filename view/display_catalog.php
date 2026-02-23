<?php
    require_once('../controller/cataloginfo_controller.php');
    $carts_arr = get_catalogs();
?>
<html>
    <head>
        <title>Shopping Catalog - Francis Hampton</title>
    </head>
    <body>
        <h2>Current Catalog:</h2>
        <table>
            <tr style="font-size: large;">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Cost</th>
            </tr>
            <?php foreach($carts_arr as $cart):;?>
                <tr>
                    <td><?php echo $cart["product_id"];?></td>
                    <td><?php echo $cart["product_name"];?></td>
                    <td><?php echo $cart["product_desc"];?></td>
                    <td><?php echo $cart["product_cost"];?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </body> 
</html>