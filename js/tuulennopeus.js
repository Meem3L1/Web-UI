function drawChart() {

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
}

google.charts.load('current', {
    'packages': ['gauge']
});
google.charts.setOnLoadCallback(drawChart);