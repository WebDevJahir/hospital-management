var options = {
	chart: {
		height: 195,
		type: 'line',
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		width: [3],
		curve: 'straight',
		dashArray: [5]
	},
	series: [{
			name: "Value",
			data: [21, 35, 21, 35, 21, 35, 21]
		}
	],
	markers: {
		size: 0,
		hover: {
			sizeOffset: 6
		}
	},
	colors: ['#2698e2', '#53ade8', '#80c3ee', '#63686f', '#868a90'],
	xaxis: {
		categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
	},
	yaxis: {
		show: false,
	},
	grid: {
		borderColor: '#ffffff',
	}
}

var chart = new ApexCharts(
	document.querySelector("#dashed-line-chart"),
	options
);

chart.render();	