function drawChart() {

    var dateFormatter = new google.visualization.DateFormat({
        pattern: 'dd.MM.yyyy HH:mm:ss'
    });

    var options = {
        title: 'Ilmanpaine',
        curveType: 'none',
        hAxis: {
            title: 'Time of Day',
            format: "dd.MM.yyyy HH:mm:ss",
            minorGridlines: {
                count: 11,
            }
        },
        vAxis: {
            title: 'Pressure',
            minorGridlines: {
                count: 5,
            },
            viewWindow: {
                min: 500,
            }
        },
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    function refreshData() {
        var json = $.ajax({
            url: 'json/ilmanpaine-json.php',
            dataType: 'json',
            async: false
        }).responseText;

        data = new google.visualization.DataTable(json);
        dateFormatter.format(data, 0);
        chart.draw(data, options);
    }
    refreshData();
}

google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);