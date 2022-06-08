<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>SNAKE - Statistics</title>
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/snake-style.css">
    <link defer rel="stylesheet" href="./css/scoreTable.css">
    <script type="text/javascript">
    var username='<?php echo $_SESSION["username"];?>';
    var userid='<?php echo $_SESSION["userid"];?>';
    </script>
    <script src="../../node_modules/chart.js/dist/chart.js"></script>
    <script defer src="./js/charts.js"></script>
</head>

<body>
    <div class="big-box">
        <h1>Scoreboard: </h1>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Points</th>
                </tr>
            </thead>
            <?php session_start();
            

            require "./php/db.php";
            
            $selectStatement = "SELECT max(score),playerId,name FROM `game` natural join player group by playerId,name order by 1 DESC limit 20"; 
            
            if ($_result = $conn->query($selectStatement)) {
                echo '<tbody>';
                while($row = $_result->fetch_assoc()) {
                    if($_SESSION["username"] == $row["name"]){
                        echo '<tr class="active-row">';
                    }else{
                        echo "<tr>";
                    }
                    echo "<td>" . $row["name"]. "</td><td>" . $row["max(score)"] . "</td></tr>";
                  }
                echo `
                    </tbody>
                `;
            }else{
                echo "Sorry something went wrong";
            }
            ?>
        </table>
        <div id="bottom-bt">
            <h1 id="bt-play" onclick="location.href = 'index.php';">Play</h1>
        </div>
    </div>
    <div class="right">
        <!-- <div >

            <?php

            $_userid = $_SESSION['userid'];
            $selectStatement = "SELECT score FROM `game` where playerId=$_userid limit 20";
            
            if ($_result = $conn->query($selectStatement)) {
                $i = 0;
                while($row = $_result->fetch_assoc()) {
                //echo $row['score'] . "</br>";
                   $arr[$i] = $row['score'];   
                   $i++; 
                }
                var_dump($arr);
            }
            
            
            ?>
        </div> -->
        <div>
        <canvas class="myCharts"></canvas>
        </div>
        <h1 id="statsCommingSoon">Comming Soon</h1>
    </div>

</body>

</html>