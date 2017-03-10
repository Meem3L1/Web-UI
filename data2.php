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
</head>

<body>
    <?php require_once('php/navbar.php'); ?>
        <div class="container">
            <div class="well">
                <h1>Data 2</h1>
            </div>
            <?php
            require_once('/home/study03/e5epirin/public_html/ict_web_2017/php/conf.php');
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $conn->set_charset("utf8");

            // Check connection
            if (!$conn) {
                die("Virhe yhteydessä: " . mysqli_connect_error());
            }
            // echo "Yhteys ok! </br></br>";

            $sql = "SELECT date_time, wind_speed1 FROM weather_a ORDER BY id desc LIMIT 1";
            $taul = array();
            $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    //echo $row['date_time']. " " . $row['humidity_out']. " ";
                    $taul[] = $row;
                }
            echo "<pre>" . json_encode($taul, JSON_PRETTY_PRINT) . "</pre>";
            mysqli_close($conn);
            ?>

                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
        </div>
</body>

</html>