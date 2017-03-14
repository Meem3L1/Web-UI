function drawBasic() {

    /*var dateFormatter = new google.visualization.DateFormat({
        pattern: "dd.MM.yyyy '@ 'HH:mm"
    });
    dateFormatter.format(data, 0);*/

    var options = {
        title: 'Temperature',
        height: 550,
        bar: {
            groupWidth: "90%"
        },
        hAxis: {
            title: 'Time of Day',
        },
        vAxis: {
            title: 'Celsius',
            gridlines: {
                count: 8,
            },
            viewWindow: {
                min: -40,
            }
        },
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

    function refreshData() {
        var json = $.ajax({
            url: 'json/lampotila-json.php',
            dataType: 'json',
            async: false
        }).responseText;

        data = new google.visualization.DataTable(json);
        chart.draw(data, options);
    }
    refreshData();
}

google.charts.load('current', {
    packages: ['corechart', 'bar']
});
google.charts.setOnLoadCallback(drawBasic);