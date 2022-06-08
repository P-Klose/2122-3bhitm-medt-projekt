<?php 

require "./db.php";

//$_username = $_POST["username"];
$_userid = $_POST["userid"];
$_score = $_POST["score"];

$insertStatement = "INSERT INTO game (gameId, modeId, playerId, score) VALUES (NULL, '1', '$_userid', '$_score')";

if ($_res = $conn->query($insertStatement)) {
    echo "Insert erfolgreich";
}else{
    echo "Insert NICHT erfolgreich";
}
?>