<?php

session_start();

$_db_host = "localhost";
$_db_datenbank = "webprojekt";
$_db_username = "web";
$_db_passwort = "abcdefgh";

$conn = new mysqli($_db_host, $_db_username, $_db_passwort, $_db_datenbank);

if ($conn->connect_error) {
    echo "error";
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `player`";
$result = $conn->query($sql);
$lastId = $result->num_rows;

var_dump($result);

echo "<br>";

var_dump($lastId);

echo "<br>";

while($row = $result->fetch_assoc()) {
    echo "id: " . $row["playerId"]. " - designId: " . $row["designId"]. " " . $row["name"]. " ". $row["mail"]. "<br>";
  }





?>