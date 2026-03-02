<?php
require_once('../model/cataloginfo_db.php');

function get_catalogs()
{
    $catalog_rows = get_all_catalogs();
    $catalogs = array();

    if ($catalog_rows) {
        $index = 0;
        //If query was sucessfull, fill the catalogs array
        while($row = mysqli_fetch_array($catalog_rows)) {
            $catalogs[$index]["product_id"] = $row["product_id"];
            $catalogs[$index]["product_name"] = $row["product_name"];
            $catalogs[$index]["product_desc"] = $row["product_desc"];
            $catalogs[$index]["product_cost"] = $row["product_cost"];
            $index++;
        }
    }
    return $catalogs;
}

function get_product_name($catalog_no)
{
    $product = get_catalogs($product_no);

    if ($product && $product->num_rows === 1)
    {
        $product_info = mysqli_fetch_assoc($product);
        return $product_info["Name"];
    }
    else
    {
        return "No such product or multiple catalogs found.";
    }
}
?>