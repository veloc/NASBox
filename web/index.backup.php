<?php
    $servername = "localhost";
    $username = "test";
    $password = "test";  //your database password
    $dbname = "test";  //your database name

    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    else
    {
    //echo ("Connect Successfully");
    }
    $query = "SELECT time, temperatur, humidity FROM Sensor WHERE time >= ( DATE_SUB(NOW(),INTERVAL 12 HOUR))"; // select column
    $aresult = $con->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>eVel Tec</title>
    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
    var data = new google.visualization.DataTable();
    var data = google.visualization.arrayToDataTable([
    ['time','temperatur','humidity'],
    <?php
    while($row = mysqli_fetch_assoc($aresult)){
        echo "['".$row["time"]."', ".$row["temperatur"].", ".$row["humidity"]."],";
    }
    ?>
   ]);

    var options = {
    title: 'Temperatur der NAS-Box über die letzten 12 Stunden',
    curveType: 'function',
    legend: { position: 'bottom' }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('areachart'));
    chart.draw(data, options);
    }

    </script>
</head>
<body>
 <div id="areachart" style="width: 900px; height: 400px"></div>
</body>
</html>
