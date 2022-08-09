google.charts.load('current', {
	packages: ['corechart', 'line']
});
google.charts.setOnLoadCallback(cartIklanMasuk);
google.charts.setOnLoadCallback(cartIklanTayang);

function cartIklanMasuk() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'X');
	data.addColumn('number', 'Jumlah Iklan');

	data.addRows(iklanMasuk);

	var options = {
		hAxis: {
			title: 'Bulan'
		},
		vAxis: {
			minValue: 0,
			title: 'Banyaknya Iklan'
		},
		series: {
			1: {
				curveType: 'function'
			}
		}
	};

	var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	chart.draw(data, options);
}

function cartIklanTayang() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'X');
	data.addColumn('number', 'Jumlah Iklan');

	data.addRows(iklanTayang);

	var options = {
		hAxis: {
			title: 'Bulan'
		},
		vAxis: {
			minValue: 0,
			title: 'Banyaknya Iklan'
		},
		series: {
			1: {
				curveType: 'function'
			}
		}
	};

	var chart = new google.visualization.LineChart(document.getElementById('chart_dov'));
	chart.draw(data, options);
}
