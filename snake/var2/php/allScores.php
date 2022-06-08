<?php
require "./db.php";

$selectStatement = "SELECT max(score),playerId FROM `game` group by playerId limit 20"; 

if ($_res = $conn->query($selectStatement)) {
    $out = $_res->fetch_assoc();
    var_dump($out);
}else{
    echo "Sorry something went wrong";
}
?>