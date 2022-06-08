<?php 
require "./db.php";

$_userid = $_POST["userid"];
$selectStatement = "SELECT max(score) as maximum FROM `game` WHERE playerID = $_userid group by playerId"; 
//$selectStatement = "SELECT max(score) as maximum FROM `game` WHERE playerID = 38 group by playerId"; 

if ($_res = $conn->query($selectStatement)) {
    $out = $_res->fetch_assoc();
    $_score = $out["maximum"];
    echo $_score;
}else{
    echo "You have to be logged in";
}
?>