new Chartist.Pie('.booking-source-donut', {
  series: [985, 670, 540, 435]
}, {
	donut: true,
	donutWidth: 30,
	donutSolid: true,
	startAngle: 270,
	showLabel: false,
	height: "224px",
	plugins: [
		Chartist.plugins.tooltip()
	],
	low: 0
});