<?php

session_start();

require("./php/db.php");

if($_SESSION['logout'] ==1){
    session_destroy();
    session_start();
}

if(isset($_SESSION["username"])){
    $sUsername = $_SESSION["username"];
    $selectUser = "SELECT playerid FROM player where name='$sUsername'";

        if($_res = $conn->query($selectUser)){
            $out = $_res->fetch_assoc();
            $_userId = $out["playerid"];
            $_res->close();
        }
    $_SESSION["userid"] = $_userId;
    header ("Location: ./index.php");                  //wechsel zu Index weil eingeloggt
}else{
    if(isset($_POST['signin'])){
        $_loginName = $conn->real_escape_string($_POST["loginName"]);
        $_loginPass = $conn->real_escape_string($_POST["loginPass"]);
        $_loginPass = "mySnakeGame" . $_loginPass;

        var_dump($_loginName,$_loginPass);

        $selectStatement = "SELECT count(*) FROM player where name='$_loginName' or mail='$_loginPass' and password=md5('$_passwort')";
        $selectUser = "SELECT playerid FROM player where name='$_loginName'";

        if($_res = $conn->query($selectUser)){
            $out = $_res->fetch_assoc();
            $_userId = $out["playerid"];

            if ($_res = $conn->query($selectStatement)) {
                $out = $_res->fetch_assoc();
                if($out["count(*)"] > 0){
                    $_SESSION["username"] = $_loginName;
                    $_SESSION["userid"] = $_userId;
                    header ("Location: ./index.php");
                }else{
                    echo "Die Logindaten sind nicht korrekt.";
                }
                $_res->close();
            }
        }
        


    }
    if(isset($_POST["signup"])){
        $_username = $conn->real_escape_string($_POST["createName"]);
        $_passwort = $conn->real_escape_string($_POST["createPass"]);
        $_mail = $conn->real_escape_string($_POST["createMail"]);
        $_passwort = "mySnakeGame" . $_passwort;

        $insertStatement = "INSERT INTO player (designId,name,password,mail) VALUES (null,'$_username',md5('$_passwort'),'$_mail')";
        if ($_res = $conn->query($insertStatement)) {
            $_SESSION["username"] = $_username;
            header ("Location: ./index.php");          //wechsel zu Index nach SignUp
        } else {
            echo "<br>NO insertion. User could not be added. Maybe user $_username already exists.";
            include("index.html");
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>SNAKE - login</title>
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/form-style.css">
    <script defer src="./js/form-script.js"></script>

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="snake-form.php">
                <h1>Create Account</h1>
                <!-- <span>or use your email for registration</span> -->
                <input name="createName" type="text" placeholder="Name" />
                <input name="createMail" type="email" placeholder="Email" />
                <input name="createPass" type="password" placeholder="Password" />
                <a href="./index.php">Continue without registration</a>
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" action="snake-form.php">
                <h1>Sign in</h1>
                <input name="loginName" type="text" placeholder="Email" />
                <input name="loginPass" type="password" placeholder="Password" />
                <a href="./index.php">Continue without registration</a>
                <button type="submit" name="signin">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Show them who you are and beat all the other records</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Stranger!</h1>
                    <p>Want to be a part of the community? </p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>