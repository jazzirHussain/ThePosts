<?php


function db_connect(){
    $host='localhost';
    $user='root';
    $pass='root@9496';
    $db='the_post';
    $conn = new mysqli($host,$user,$pass,$db);
    return $conn;
};

?>