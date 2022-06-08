<?php
$_db_host = "localhost";
$_db_datenbank = "webprojekt";
$_db_username = "web";
$_db_passwort = "abcdefgh";

$conn = new mysqli($_db_host, $_db_username, $_db_passwort, $_db_datenbank);

if ($conn->connect_error) {
    echo "error";
    die("Connection failed: " . $conn->connect_error);
}
?>