<?php session_start();

require "./php/db.php";

if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $_sql = "SELECT playerid FROM player where name='$username'";
    
if ($_res = $conn->query($_sql)) {
    if ($_res->num_rows > 0) {
        $sel = $_res->fetch_assoc();
        $_SESSION["userid"] = $sel["playerid"];
        
    }
    $_res->close();
}
}

?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>SNAKE</title>
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main-style.css">
    <script type="text/javascript">
    var username='<?php echo $_SESSION["username"];?>';
    var userid='<?php echo $_SESSION["userid"];?>';
    </script>
    <script defer src="./js/script.js"></script>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container noselect">
        <div class="wrapper">
            <button id="replay">
                <i class="fas fa-play"></i>
                RESTART
            </button>
            <div id="canvas">

            </div>
        </div>
        <div id="bottom-bt">
            <!-- <div class="carouselTicker carouselTicker-start">
                <ul class="carouselTicker__list">
                    <li class="carouselTicker__item"><span class="stock-label">ATX </span>3.500,22 <span class="stock-percent-n">-6.8%</span></h1>
                        <li class="carouselTicker__item"><span class="stock-label">TSLA </span>612.52 <span class="stock-percent">+2.23%</span></h1>
                            <li class="carouselTicker__item"><span class="stock-label">AMC </span>43.32 <span class="stock-percent-n">-12.20%</span></h1>
                                <li class="carouselTicker__item"><span class="stock-label">AMZN </span>3,331.27 <span class="stock-percent">+1.53%</span></h1>
                                    <li class="carouselTicker__item"><span class="stock-label">AAPL </span>126.26 <span class="stock-percent-n">-0.68%</span></h1>
                                        <li class="carouselTicker__item"><span class="stock-label">MSFT </span>256.54 <span class="stock-percent">+1.17%</span></h1>
                                            <li class="carouselTicker__item"><span class="stock-label">NVDA </span>698.00 <span class="stock-percent">+0.53%</span></h1>
                                                <li class="carouselTicker__item"><span class="stock-label">GME </span>224.08 <span class="stock-percent-n">-26.33%</span></h1>
                                                    <li class="carouselTicker__item"><span class="stock-label">FB </span>332.51 <span class="stock-percent">+0.69%</span></h1>
                                                        <li class="carouselTicker__item"><span class="stock-label">BA </span>249.66 <span class="stock-percent">+0.65%</span></h1>
                                                            <li class="carouselTicker__item"><span class="stock-label">NFLX </span>487.63 <span class="stock-percent">+0.37%</span></h1>
                                                                <li class="carouselTicker__item"><span class="stock-label">DIS </span>177.04 <span class="stock-percent">+0.57%</span></h1>
                                                                    <li class="carouselTicker__item"><span class="stock-label">NKE </span>130.87 <span class="stock-percent-n">-0.74%</span></h1>
                                                                        <li class="carouselTicker__item"><span class="stock-label">AAL </span>23.53 <span class="stock-percent-n">-1.34%</span></h1>
                </ul>
            </div> -->
            <h1>Running Hall of Fame</h1>
        </div>
    </div>
    <div class="profile-container">
        <p id="user-name" onclick="location.href = 'profile.php';"><?php echo $_SESSION["username"] ?></p>
    </div>
    <div class="black-container " id="r-container" onclick="window.location.replace('statistics.php')">
        <h1>Highscore</h1>
        <span id="highscore"></span>
    </div>
    <div class="black-container " id="l-container">
        <h1>Score</h1>
        <span id="score">000</span>
    </div>
</body>

</html>