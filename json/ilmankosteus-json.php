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

    $sql = "SELECT date_time, humidity_out, humidity_in FROM weather_a ORDER BY id desc LIMIT 100";
    $taul = array();
    $result = mysqli_query($conn, $sql);
    $taul['cols'][] = array("label"=>"Time", "type"=>"datetime");
    $taul['cols'][] = array("label"=>"Humidity OUT", "type"=>"number");
    $taul['cols'][] = array("label"=>"Humidity IN", "type"=>"number");
    while ($row = mysqli_fetch_assoc($result)) {
        $x = $row['humidity_out'];
        $y = $row['humidity_in'];
        settype($x, "float");
        settype($y, "float");
        //
        $pvm_raw = $row['date_time'];
        $pvm = "Date(" . substr($pvm_raw, 0, 4) . ", " . (substr($pvm_raw, 5, 2) - 1) . ", " . substr($pvm_raw, 8, 2) . ", " . substr($pvm_raw, 11, 2) . ", " . substr($pvm_raw, 14, 2) . ", " . substr($pvm_raw, 17, 2) . ", 0)";
        //
        $taul['rows'][] = array("c" => array(array("v"=>$pvm),array("v"=>$x),array("v"=>$y)));
        //$taul['rows'][] = array("c" => array(array("v"=>$row['date_time']),array("v"=>$x),array("v"=>$y)));
    }
    $json_data = json_encode($taul, JSON_PRETTY_PRINT);
    echo $json_data;
    mysqli_close($conn);
?>