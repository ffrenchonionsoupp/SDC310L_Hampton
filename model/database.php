<?php
    function get_db_conn()
    {
        //Connect to Database
        $hostname = "localhost";
        $dbname = "sdc310L_courseproject";
        return mysqli_connect($hostname, $dbname);
    }
?>