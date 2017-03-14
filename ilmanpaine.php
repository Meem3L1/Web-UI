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
    <script src="js/ilmanpaine.js"></script>
    <script src="js/xHide.js"></script>
    
</head>

<body>
    <?php require_once('php/navbar.php'); ?>
        <div class="container">
            <div class="well">
                <h1>Ilmanpaine</h1>
            </div>
            <div id="curve_chart" style="width: 100%; height: 600px"></div>
            <button onclick="showHideJSON()" style="border: none; width: 250px; height: 40px; font-weight: bold; margin-bottom: 10px;">Näytä / piilota JSON</button>
            <pre id="xHide" style="display: none;"><?php require_once('json/ilmanpaine-json.php'); ?></pre>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
        </div>
</body>

</html>