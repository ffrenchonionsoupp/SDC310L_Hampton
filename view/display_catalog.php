<?php


    // how to debug
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);


    require_once('../controller/cataloginfo_controller.php');
    $catalog_arr = get_catalogs();
    $icons = [
        './assets/bread.png?v=2',
        './assets/cheese.png?v=2',
        './assets/mayo.png?v=2',
        './assets/tomato.png?v=2'
    ];
    $rowIndex = 0;
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

<html>
    <head>
        <title>Shopping Catalog - Francis Hampton</title>
    </head>
    <body>
        <h1>Come Shop From My Pantry!</h1>
        <h2>Pantry Store Catalog:</h2>
        <table>
            <tr style="font-size: large;">
                <th>  </th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Cost</th>
                <th>  </th>
            </tr>
            <?php foreach($catalog_arr as $cart):;?>
            
                <?php
                    // Pick the image for this row 
                    $iconSrc = $icons[$rowIndex % count($icons)];
                    $rowIndex++;
                ?>

                <tr>
                    <td><img class="icon" src="<?php echo $iconSrc ?>" alt="Product icon"></img></td>
                    <td><?php echo $cart["product_id"];?></td>
                    <td><?php echo $cart["product_name"];?></td>
                    <td><?php echo $cart["product_desc"];?></td>
                    <td><?php echo $cart["product_cost"];?></td>
                    <td>
                        <form action="../controller/add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?= $cart['product_id'] ?>">
                            <input type="number" name="quantity" value="0" min="0" step="1" style="width:64px;">
                            <input type="hidden" name="redirect" value="display_catalog.php">
                            <button type="submit">Add to Cart</button>
                        </form>
                    </td>

                </tr>
            <?php endforeach;?>
        </table>
        <p>
            <h2 style="text-align: center;"><a href="display_cart.php">Go to Cart</a></h2>
        </p>
    </body> 
</html>