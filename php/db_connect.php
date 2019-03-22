<?php
    $username = 'root';
    $password = '';
    $servername = 'localhost';
    $dbname = 'agro';

    $connect = mysqli_connect($servername, $username, $password, $dbname);

    if(!$connect){
        die(mysql_error());
    }

?>