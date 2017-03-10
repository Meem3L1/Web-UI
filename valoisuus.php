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
    <?php require_once('json/valoisuus-json.php'); ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = new google.visualization.DataTable(<?=$json_data?>);

                var dateFormatter = new google.visualization.DateFormat({
                    pattern: 'dd.MM.yyyy HH:mm:ss'
                });
                dateFormatter.format(data, 0);

                var options = {
                    title: 'Valoisuus',
                    curveType: 'function',
                    hAxis: {
                        title: 'Time of Day',
                        format: "dd.MM.yyyy HH:mm:ss",
                        minorGridlines: {
                            count: 11,
                        }
                    },
                    legend: {
                        position: 'bottom'
                    },
                    vAxis: {
                        title: 'Celsius',
                        minorGridlines: {
                            count: 1,
                        },
                        viewWindow: {
                            min: 0,
                        }
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
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
                <h1>Valoisuus</h1>
            </div>
            <div id="curve_chart" style="width: 100%; height: 500px"></div>
            <button onclick="myFunction()" style="border: none; width: 250px; height: 40px; font-weight: bold; margin-bottom: 10px;">Näytä / piilota JSON</button>
            <pre id="xHide" style="display: none;"><?php echo $json_data; ?></pre>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
        </div>
</body>

</html>