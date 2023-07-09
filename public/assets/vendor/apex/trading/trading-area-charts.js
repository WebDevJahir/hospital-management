var options = {
	chart: {
		height: 180,
		type: 'area',
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		curve: 'smooth'
	},
	series: [{
		name: "Desktops",
		data: [10, 41, 39, 43, 45, 58, 38]
	}],
	colors: ['#1f91d9', '#e83e8c', '#dc3545', '#fd7e14', '#ffc107', '#28a745', '#20c997', '#17a2b8'],
	grid: {
		row: {
			colors: ['#f1f2fb', 'transparent'], // takes an array which will be repeated on columns
			opacity: 0.5
		},
	},
	xaxis: {
		categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
	},
	yaxis: {
		show: false
	}
}

var chart = new ApexCharts(
	document.querySelector("#trading-area1"),
	options
);

chart.render();















var options = {
	chart: {
		height: 180,
		type: 'area',
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		curve: 'smooth'
	},
	series: [{
		name: "Desktops",
		data: [35, 58, 28, 20, 45, 38, 49]
	}],
	colors: ['#e83e8c', '#dc3545', '#fd7e14', '#ffc107', '#28a745', '#20c997', '#17a2b8', '#1f91d9'],
	grid: {
		row: {
			colors: ['#f1f2fb', 'transparent'], // takes an array which will be repeated on columns
			opacity: 0.5
		},
	},
	xaxis: {
		categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
	},
	yaxis: {
		show: false
	}
}

var chart = new ApexCharts(
	document.querySelector("#trading-area2"),
	options
);

chart.render();











var options = {
	chart: {
		height: 180,
		type: 'area',
		toolbar: {
			show: false,
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		curve: 'smooth'
	},
	series: [{
		name: "Desktops",
		data: [42, 65, 42, 61, 45, 72, 89]
	}],
	colors: ['#fd7e14', '#ffc107', '#28a745', '#20c997', '#17a2b8', '#1f91d9', '#e83e8c', '#dc3545'],
	grid: {
		row: {
			colors: ['#f1f2fb', 'transparent'], // takes an array which will be repeated on columns
			opacity: 0.5
		},
	},
	xaxis: {
		categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
	},
	yaxis: {
		show: false
	}
}

var chart = new ApexCharts(
	document.querySelector("#trading-area3"),
	options
);

chart.render();

