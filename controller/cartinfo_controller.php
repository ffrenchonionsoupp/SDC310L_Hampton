<?php
require_once('../model/cartinfo_db.php');

function get_carts()
{
    $cart_rows = get_all_carts();
    $carts = array();

    if ($cart_rows) {
        $index = 0;
        //If query was sucessfull, fill the carts array
        while($row = mysqli_fetch_array($cart_rows)) {
            $carts[$index]["product_id"] = $row["product_id"];
            $carts[$index]["product_name"] = $row["product_name"];
            $carts[$index]["product_desc"] = $row["product_desc"];
            $carts[$index]["product_cost"] = $row["product_cost"];
            $index++;
        }
    }
    return $carts;
}

function get_shopper_name($cart_no)
{
    $shopper = get_carts($cart_no);

    if ($carts && $carts->num_rows === 1)
    {
        $cart_info = mysqli_fetch_assoc($carts);
        return $cart_info["FirstName"] . " " . $user_info["LastName"];
    }
    else
    {
        return "No such shopper or multiple carts found.";
    }
}
?>