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

if(!empty($_POST['signin'])){
    echo "Sign In";

}  

if(isset($_POST['signup'])){
    echo "Sign Up";

    $_username = $conn->real_escape_string($_POST["createName"]);
    $_passwort = $conn->real_escape_string($_POST["createPass"]);
    $_mail = $conn->real_escape_string($_POST["createMail"]);

    $_passwort = $_mail . $_passwort;

    $insertStatement = "INSERT INTO player (designId,name,password,mail) VALUES (null,'$_username',md5('$_passwort'),'$_mail')";

    if ($_res = $conn->query($insertStatement)) {
        echo "<br>User $_username has been added to the database.<br>Try to log in.";
        //header ("index.html");
        var_dump($insertStatement);
        unset($_passwort,$_username,$_mail,$insertStatement);
        //header ("Location: ./index.html");
    } else {
        echo "<br>NO insertion. User could not be added. Maybe user $_username already exists.";
        include("index.html");
    }
} else {
    include("snake-form.html");
}

$conn->close();

?>