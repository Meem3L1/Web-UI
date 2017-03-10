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
    <?php require_once('php/navbar.php');
    require_once('php/conf.php');
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");

    // Check connection
    if (!$conn) {
        die("Virhe yhteydessä: " . mysqli_connect_error());
    }
    // echo "Yhteys ok! </br></br>";
    ?>
        <div class="container">
            <div class="well">
                <h1>Data 1</h1></div>
        </div>
        <h1 style="padding-left:20px;">Säätaulukko 1</h1>
        <div class="table-responsive" style="padding-left:20px;">
            <table class="table-hover" width="100%">
                <thead>
                    <th>#</th>
                    <th>Päivämäärä</th>
                    <th>Lämpötila 1</th>
                    <th>Lämpötila 2</th>
                    <th>Tuulen nopeus 1</th>
                    <th>Tuulen nopeus 2</th>
                    <th>Tuulen suunta 1</th>
                    <th>Tuulen suunta 2</th>
                    <th>Ilmanpaine 1</th>
                    <th>Ilmanpaine 2</th>
                    <th>Ilmankosteus IN</th>
                    <th>Ilmankosteus OUT</th>
                    <th>Valoisuus 1</th>
                    <th>Valoisuus 2</th>
                    <th>Sademäärä 1</th>
                    <th>Sademäärä 2</th>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM weather_a ORDER by id desc LIMIT 1000";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["id"]. " -</td><td>" . $row["date_time"]. "</td><td>" . $row["temperature1"] . "</td><td>" . $row["temperature2"] . "</td><td>" . $row["wind_speed1"] . "</td><td>" . $row["wind_speed2"] . "</td><td>" . $row["wind_direction1"] . "</td><td>" . $row["wind_direction2"] . "</td><td>" . $row["pressure1"] . "</td><td>" . $row["pressure2"] . "</td><td>" . $row["humidity_in"] . "</td><td>" .$row["humidity_out"] .  "</td><td>" .$row["light1"] .  "</td><td>" . $row["light2"] . "</td><td>" .$row["rain1"] .  "</td><td>" . $row["rain2"] . "</td></tr>";
                            }
                        } else { echo "Ei tuloksia!"; }
                        //$conn->close();
                        mysqli_close($conn);
                        ?>
                </tbody>
            </table>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
</body>

</html>