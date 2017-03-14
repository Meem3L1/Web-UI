function drawChart() {

    var dateFormatter = new google.visualization.DateFormat({
        pattern: 'dd.MM.yyyy HH:mm:ss'
    });

    var options = {
        title: 'Ilmankosteus',
        hAxis: {
            title: 'Time of Day',
            titleTextStyle: {
                color: '#333'
            },
            format: "dd.MM.yyyy HH:mm:ss",
            minorGridlines: {
                count: 11,
            }
        },
        vAxis: {
            title: 'Humidity %',
            minorGridlines: {
                count: 1,
            },
            viewWindow: {
                min: 0,
            }
        }
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));

    function refreshData() {
        var json = $.ajax({
            url: 'json/ilmankosteus-json.php',
            dataType: 'json',
            async: false
        }).responseText;

        data = new google.visualization.DataTable(json);
        dateFormatter.format(data, 0);
        chart.draw(data, options);
    }

    function tulosta_json() {
        var json = $.ajax({
            url: 'json/ilmankosteus-json.php',
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
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);