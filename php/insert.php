<?php
    require_once('conf.php');
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");

    // Check connection
    if (!$conn) {
        die("Virhe yhteydessä: " . mysqli_connect_error());
    }
    // echo "Yhteys ok! </br></br>";

    if(is_numeric($_REQUEST['temperature1'])) { $lampo1 = $_REQUEST['temperature1']; }
    else { $lampo1 = 'NULL'; }
    if(is_numeric($_REQUEST['temperature2'])) { $lampo2 = $_REQUEST['temperature2']; }
    else { $lampo2 = 'NULL'; }
    if(is_numeric($_REQUEST['wind_speed1'])) { $tuulis1 = $_REQUEST['wind_speed1']; }
    else { $tuulis1 = 'NULL'; }
    if(is_numeric($_REQUEST['wind_speed2'])) { $tuulis2 = $_REQUEST['wind_speed2']; }
    else { $tuulis2 = 'NULL'; }
    if(is_numeric($_REQUEST['wind_direction1'])) { $tuulid1 = $_REQUEST['wind_direction1']; }
    else { $tuulid1 = 'NULL'; }
    if(is_numeric($_REQUEST['wind_direction2'])) { $tuulid2 = $_REQUEST['wind_direction2']; }
    else { $tuulid2 = 'NULL'; }
    if(is_numeric($_REQUEST['pressure1'])) { $paine1 = $_REQUEST['pressure1']; }
    else { $paine1 = 'NULL'; }
    if(is_numeric($_REQUEST['pressure2'])) { $paine2 = $_REQUEST['pressure2']; }
    else { $paine2 = 'NULL'; }
    if(is_numeric($_REQUEST['humidity_in'])) { $kosteus_in = $_REQUEST['humidity_in']; }
    else { $kosteus_in = 'NULL'; }
    if(is_numeric($_REQUEST['humidity_out'])) { $kosteus_out = $_REQUEST['humidity_out']; }
    else { $kosteus_out = 'NULL'; }
    if(is_numeric($_REQUEST['light1'])) { $valo1 = $_REQUEST['light1']; }
    else { $valo1 = 'NULL'; }
    if(is_numeric($_REQUEST['light2'])) { $valo2 = $_REQUEST['light2']; }
    else { $valo2 = 'NULL'; }
    if(is_numeric($_REQUEST['rain1'])) { $sade1 = $_REQUEST['rain1']; }
    else { $sade1 = 'NULL'; }
    if(is_numeric($_REQUEST['rain2'])) { $sade2 = $_REQUEST['rain2']; }
    else { $sade2 = 'NULL'; }

    $sql = "INSERT INTO weather_a (temperature1, temperature2, wind_speed1, wind_speed2, wind_direction1, wind_direction2, pressure1, pressure2, humidity_in, humidity_out, light1, light2, rain1, rain2)
    VALUES ($lampo1, $lampo2, $tuulis1, $tuulis2, $tuulid1, $tuulid2, $paine1, $paine2, $kosteus_in, $kosteus_out, $valo1, $valo2, $sade1, $sade2)";
        if (mysqli_query($conn, $sql)) { 
            echo "Onnistui!"; 
        } else { 
            echo "Virhe: " . $sql . "<br>" . mysqli_error($conn); 
        } 
    mysqli_close($conn);
?>