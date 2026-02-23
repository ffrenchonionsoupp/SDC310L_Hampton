<?php
require_once('database.php');

//Get all entries in the catalog table
function get_all_catalogs()
{
    //Query for all catalogs
    $conn = get_db_conn();
    $query = "SELECT * FROM catalog";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>