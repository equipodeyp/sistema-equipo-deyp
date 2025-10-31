google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

	var chartData_json = document.getElementById('chartinfo').value;

	let obj = JSON.parse(chartData_json) ;
	let jsonData = obj;
	var chartData = [];

	// Add Chart data
   	var chartData = [
	  ['MUNICIPIO','TOTAL MEDIDAS',{ role: 'annotation'}],
	];

    for (var key in obj) {
	  	if (obj.hasOwnProperty(key)) {
		    var val = obj[key];

		    var city = val.ejecucion;
		    var totalusers = Number(val.totalusers);

		    // Add to Array
		    chartData.push([city,totalusers,totalusers]);

	  	}
	}

	var data = google.visualization.arrayToDataTable(chartData);

	// Options
	// var options = {
	// 	title:'Reporte por municipio',
	// 	colors: ['#4473c5'],
	// 	indexAxis: 'y',
	// 	width: 1900, // Ancho en píxeles
  //   height: 700, // Alto en píxeles
	// };
	var options = {

		indexAxis: 'y',
		width: 1230, // Ancho en píxeles
		height: 300, // Alto en píxeles
  title: {
		title:'Reporte por municipio',
		colors: ['#4473c5'],
    fontSize: 14 // Tamaño de fuente para el título
  },
  hAxis: {
    textStyle: {
      fontSize: 6 // Tamaño de fuente para el eje horizontal
    }
  },
  vAxis: {
    textStyle: {
      fontSize: 6 // Tamaño de fuente para el eje vertical
    }
  },
  legend: {
    textStyle: {
      fontSize: 6 // Tamaño de fuente para la leyenda
    }
  }
};

	// Initialize
	var chart = new google.visualization.ColumnChart(document.getElementById('ciudadChart'));
	chart.draw(data, options);

}
