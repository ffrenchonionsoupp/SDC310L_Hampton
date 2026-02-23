<?php
require_once('database.php');

//Get all entries in the carts table
function get_all_carts()
{
    //Query for all carts
    $conn = get_db_conn();
    $query = "SELECT * FROM cart";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>