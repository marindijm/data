// JavaScript Document
jQuery.noConflict();
(function($){ // encapsulate jQuery
$(document).ready(function() {
						  
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'pie',
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
		},
		title: {
			text: 'Dispensers Installed As Of Today'
		},
		tooltip: {
			formatter: function() {
				return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					color: '#000000',
					connectorColor: '#000000',
					formatter: function() {
						return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
					}
				}
			}
		},
		series: [{
			type: 'pie',
			name: 'Dispenser Installation',
			data: [
				['School(MOE)',  11.0],
				['Health Center(MPH)',  Math.round(7,1)],
				{
					name: 'Agricultural Bundling(OAF)',
					y: 60.0,
					sliced: true,
					selected: true
				},
				['Research(WASH,PMI,CFD,Sendhil)',    17.0],
				['Expansion(Tanathi)',     1.0],
				['Local Government(BCC,BMC,LVN,MMC)',   4.0]
			]
		}]
	});
});


})(jQuery);
