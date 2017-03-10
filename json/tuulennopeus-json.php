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

    $sql = "SELECT date_time, wind_speed1, wind_speed2 FROM weather_a ORDER BY id desc LIMIT 1";
    $taul = array();
    $result = mysqli_query($conn, $sql);
    $taul['cols'][] = array("label"=>"Wind speed", "type"=>"string");
    $taul['cols'][] = array("label"=>"Wind 1", "type"=>"number");
    $taul['cols'][] = array("label"=>"Wind 2", "type"=>"number");
    while ($row = mysqli_fetch_assoc($result)) {
        $x = $row['wind_speed1'];
        $y = $row['wind_speed2'];
        settype($x, "float");
        settype($y, "float");
        $taul['rows'][] = array("c" => array(array("v"=>"m/s"),array("v"=>$x),array("v"=>$y)));
    }
    $json_data = json_encode($taul, JSON_PRETTY_PRINT);
    echo $json_data;
    mysqli_close($conn);
?>