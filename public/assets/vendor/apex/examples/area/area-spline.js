var options = {
	chart: {
		height: 320,
		type: 'area',
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		curve: 'smooth',
		width: 3
	},
	series: [{
		name: 'Bluemoon Sales',
		data: [600, 4000, 2800, 2100, 4200, 1090, 5000]
	}, {
		name: 'Bluemoon Analytics',
		data: [1100, 3200, 4500, 3200, 3400, 5200, 2100]
	}],
	grid: {
		row: {
			colors: ['#ffffff'], // takes an array which will be repeated on columns
			opacity: 0.5
		},
	},
	xaxis: {
		type: 'datetime',
		categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],                
	},
	theme: {
		monochrome: {
			enabled: true,
			colors: ['#2698e2', '#53ade8', '#80c3ee', '#63686f', '#868a90'],
			shadeIntensity: 0.1
		},
	},
	markers: {
		size: 0,
		opacity: 0.2,
		colors: ['#2698e2', '#53ade8', '#80c3ee', '#63686f', '#868a90'],
		strokeColor: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7,
		}
	},
	tooltip: {
		x: {
			format: 'dd/MM/yy'
		},
	}
}

var chart = new ApexCharts(
	document.querySelector("#basic-area-spline-graph"),
	options
);

chart.render();
