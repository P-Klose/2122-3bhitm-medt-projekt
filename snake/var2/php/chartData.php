<?php 
header('Content-Type: application/json');   
require "./db.php";

$_userid = $_POST["userid"];
$selectStatement = "SELECT score FROM `game` where playerId=39 limit 20";
//$selectStatement = "SELECT score FROM `game` where playerId=$_userid limit 20";
            
            if ($_result = $conn->query($selectStatement)) {
                $i = 0;
                while($row = $_result->fetch_assoc()) {
                //echo $row['score'] . "</br>";
                   $arr[$i] = $row['score'];   
                   $i++; 
                }
                echo(json_encode($arr));
            }
?>