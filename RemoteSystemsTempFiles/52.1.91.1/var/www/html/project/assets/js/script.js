ajax_get_html("http://52.1.91.1/project/devices/get_average_history/17").done(
		function(response) {
			var json = JSON.parse(response);
			console.log(json);

			var chartjsData = [];
			for (var i = 0; i < json.length; i++) {
				chartjsData.push(parseInt(json[i].y));
			}
			var chartjsLabels = [];
			for (var i = 0; i < json.length; i++) {
				
				chartjsLabels.push(json[i].x);
			}
			var ctx = document.getElementById("myChart").getContext("2d");
			var data = {
				labels : chartjsLabels,
				datasets : [
			                {
			                    label: "My First dataset",
			                    fillColor: "rgba(220,220,220,0.2)",
			                    strokeColor: "rgba(220,220,220,1)",
			                    pointColor: "rgba(220,220,220,1)",
			                    pointStrokeColor: "#fff",
			                    pointHighlightFill: "#fff",
			                    pointHighlightStroke: "rgba(220,220,220,1)",
			                    data : chartjsData

			                }
			            ]
			}
			var myLineChart = new Chart(ctx).Line(data);

		});

// ajax_get_html("http://52.1.91.1/project/devices/get_history/17").done(
// function(response) {
//
// var plots = JSON.parse(response);
// console.log(response);
//
// console.log(plots);
// var data = {
// "label" : "Foo",
// "xScale" : "time",
// "yScale" : "linear",
// "type" : "line-dotted",
// "main" : [ {
// "className" : ".stats",
// "data" : plots
// } ]
// };
// var opts = {
// tickHintX : 9, // How many ticks to show horizontally
// "dataFormatX" : function(x) {
// return d3.time.format('%Y-%m-%d %H:%M:%S').parse(x);
// },
// "dataFormatY" : function(y) {
// return parseInt(y);
// },
// "tickFormatX" : function(x) {
// return d3.time.format('%x')(x);
// }
// };
// var myChart = new xChart('line-dotted', data, '#chart', opts);
//
// });
// $(function() {

// // Set the default dates
// var startDate = Date.create().addDays(-6), // 7 days ago
// endDate = Date.create(); // today

// var range = $('#range');

// // Show the dates in the range input
// range.val(startDate.format('{MM}/{dd}/{yyyy}') + ' - '
// + endDate.format('{MM}/{dd}/{yyyy}'));

// // Load chart

// range.daterangepicker({

// startDate : startDate,
// endDate : endDate,

// ranges : {
// 'Today' : [ 'today', 'today' ],
// 'Yesterday' : [ 'yesterday', 'yesterday' ],
// 'Last 7 Days' : [ Date.create().addDays(-6), 'today' ],
// 'Last 30 Days' : [ Date.create().addDays(-29), 'today' ]
// }
// }, function(start, end) {

// ajaxLoadChart(start, end);

// });

// // The tooltip shown over the chart
// var tt = $('<div class="ex-tooltip">').appendTo('body'), topOffset = -32;

// var data = {
// "xScale" : "time",
// "yScale" : "linear",
// "main" : [ {
// className : ".stats",
// "data" : []
// } ]
// };

// var opts = {
// paddingLeft : 50,
// paddingTop : 20,
// paddingRight : 10,
// axisPaddingLeft : 25,
// tickHintX : 9, // How many ticks to show horizontally

// dataFormatX : function(x) {

// // This turns converts the timestamps coming from
// // ajax.php into a proper JavaScript Date object

// return Date.create(x);
// },

// tickFormatX : function(x) {

// // Provide formatting for the x-axis tick labels.
// // This uses sugar's format method of the date object.

// return x.format('{MM}/{dd}');
// },

// "mouseover" : function(d, i) {
// var pos = $(this).offset();

// tt.text(d.x.format('{Month} {ord}') + ': ' + d.y).css({

// top : topOffset + pos.top,
// left : pos.left

// }).show();
// },

// "mouseout" : function(x) {
// tt.hide();
// }
// };

// // Create a new xChart instance, passing the type
// // of chart a data set and the options object

// var chart = new xChart('line-dotted', data, '#chart', opts);

// // Function for loading data via AJAX and showing it on the chart
// function ajaxLoadChart(startDate, endDate) {

// // If no data is passed (the chart was cleared)

// if (!startDate || !endDate) {
// chart.setData({
// "xScale" : "time",
// "yScale" : "linear",
// "main" : [ {
// className : ".stats",
// data : []
// } ]
// });

// return;
// }

// // Otherwise, issue an AJAX request

// $.getJSON("http://52.1.91.1/project/devices/get_history/17", {

// start : startDate.format('{yyyy}-{MM}-{dd} {hh}:{mm}:{ss}'),
// end : endDate.format('{yyyy}-{MM}-{dd} {hh}:{mm}:{ss}')

// }, function(data) {
// console.log("inside getJson function()");
// console.log(data);
// var set = [];
// $.each(data, function() {
// set.push({
// x : this.label,
// y : parseInt(this.value, 10)
// });
// });

// chart.setData({
// "xScale" : "time",
// "yScale" : "linear",
// "main" : [ {
// className : ".stats",
// data : set
// } ]
// });

// });
// }
// });
