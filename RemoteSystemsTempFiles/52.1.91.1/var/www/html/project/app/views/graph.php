<script type="text/javascript"
	src="http://52.1.91.1/project/assets/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript"
	src="http://52.1.91.1/project/assets/js/highcharts.js"></script>


<script type="text/javascript">
this.setChartSize = function() {
    chart.setSize($(chart.container).parent().width(), $(chart.container).parent().height());
    return false;
};
var chart;
$(document).ready(function() {
    var options = {
            chart: {
                type: 'spline',
                renderTo: 'chart',
                defaultSeriesType: 'line',
                marginRight: 10,
                marginBottom: 25
            },
            title: {
                text: 'Graph Values',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                type: 'datetime',
                tickInterval: 3600 * 1000, // one hour
                tickWidth: 0,
                gridLineWidth: 1,
                labels: {
                    align: 'center',
                    x: -3,
                    y: 20,
                    formatter: function() {
                        return Highcharts.dateFormat('%l%p', this.value);
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Value'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                    return Highcharts.dateFormat('%l%p', this.x - (1000 * 3600)) + '-' + Highcharts.dateFormat('%l%p', this.x) + ': <b>' + this.y + '</b>';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
            },
            series: [{
                name: 'Values',
                showInLegend: false

            }]
        }
        // Load data asynchronously using jQuery. On success, add the data
        // to the options and initiate the chart.
        // This data is obtained by exporting a GA custom report to TSV.
        // http://api.jquery.com/jQuery.get/
    jQuery.get('http://52.1.91.1/project/devices/get_history/<?php echo $data[0];?>', null, function(tsv) {
        var lines = [];
        traffic = [];
        try {
            // split the data return into lines and parse them
            tsv = tsv.split(/\n/g);
            jQuery.each(tsv, function(i, line) {
                line = line.split(/\t/);
                date = Date.parse(line[0] + ' UTC');
                traffic.push([
                    date,
                    parseInt(line[1].replace(',', ''), 10)
                ]);
            });
        } catch (e) {}
        options.series[0].data = traffic;
        chart = new Highcharts.Chart(options);
    });
});
</script>
<section class="panel">
	<header class="panel-heading"> Chart </header>
	<div class="panel-body text-center">
		<div id="chart"></div>

	</div>
</section>
