<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Harjoitustyö - Web-ohjelmointi</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- GOOGLE CHARTS SCRIPTS-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['gauge']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            //var data = new google.visualization.DataTable();

            var options = {
                width: 700,
                height: 350,
                max: 40,
                redFrom: 35,
                redTo: 40,
                yellowFrom: 25,
                yellowTo: 35,
                greenFrom: 0,
                greenTo: 10,
                minorTicks: 10
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

            function refreshData() {
                var json = $.ajax({
                    url: 'json/tuulennopeus-json.php',
                    dataType: 'json',
                    async: false
                }).responseText;

                data = new google.visualization.DataTable(json);

                chart.draw(data, options);
            }

            function tulosta_json() {
                var json = $.ajax({
                    url: 'json/tuulennopeus-json.php',
                    dataType: 'json',
                    async: false
                }).responseText;
                document.getElementById("xHide").innerHTML = json;
            }

            refreshData();
            setInterval(refreshData, 2000);
            tulosta_json();
            setInterval(tulosta_json, 2000);


            /*chart.draw(data, options);

            setInterval(function () {
                data.setValue(0, 1, 2);
                chart.draw(data, options);
            }, 1000);*/
        }
    </script>
</head>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById('xHide');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }
</script>

<body>
    <?php require_once('php/navbar.php'); ?>
        <div class="container">
            <div class="well">
                <h1>Tuulennopeus</h1>
            </div>
            <div id="chart_div" style="width: 350px; height: 350px; margin-bottom: 15px;"></div>
            <button onclick="myFunction()" style="border: none; width: 250px; height: 40px; font-weight: bold; margin-bottom: 10px;">Näytä / piilota JSON</button>
            <pre id="xHide" style="display: none;"><!-- JSON CODE PRINTS OUT HERE --></pre>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
        </div>
</body>

</html>