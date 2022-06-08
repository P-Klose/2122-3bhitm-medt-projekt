<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>SNAKE - Statistics</title>
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/profile-style.css">
    <script defer src="./js/script.js"></script>
    <style>

    </style>
</head>

<body>
    <h1 class="bg-screen-name">SETTINGS</h1>
    <h1 class="bg-screen-name-trans">SETTINGS</h1>

    <div class="main">
        <div class="settings-box"><h2 style="margin-left:10px;"><?php echo $_SESSION["username"] ?></h2></div>
        <h1>Comming soon</h1>
        <div id="bottom-bt">
            <h1 id="bt-play" onclick="location.href = 'index.php';">Back</h1>
            <h1 id="bt-out" onclick="<?php $_SESSION['logout'] = 1?>location.href = 'snake-form.php';">Logout</h1>
        </div>
    </div>

</body>

</html>