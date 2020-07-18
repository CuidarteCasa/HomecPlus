$(document).ready(function(){
	
	var table;
	initPC3();
	SelectMl('/Userplanta/select','#userPlanta',"Seleccione..") 
	
	$(document).on("click","#btnauditPending",function(){
		let departure = $("#departure").val()
		Dt_auditPending(departure);
	})

	$(document).on("click","#btnuserAudit",function(){
		let user = $("#userPlanta").val();
		GetDataGraph(user);
	})
})

var GetDataGraph = function(user){
	$.ajax({
		url:'/Reports/audited/'+user,
		type:'get',
		success:function(data){
			var total = [];
			var fecha = [];
			$.each(data,function(i,item){
				total.push(item.audited);
				fecha.push(item.auditedbyfactdate);
			})
			
			
			
			
			ApexCharts.exec('audit','updateOptions',{
				xaxis: {
					categories: fecha
				}
			})
			ApexCharts.exec('audit','updateSeries',[{
				data:total
			}])
		},error:function(){

		}
	})
}

var initPC3 = function initPC3() {
    var apexChartAudit = "#chart_Audit";
    var options = {
      series: [{
        name: "Auditadas",
        data: []
      }],
      chart: {
        id:'audit',
        height: 500,
        type: 'line',
        zoom: {
          enabled: true
        }
      },
      dataLabels: {
        enabled: true
      },
      stroke: {
        curve: 'straight'
      },
      grid: {
        row: {
          colors: ['#f3f3f3', 'transparent'],
          // takes an array which will be repeated on columns
          opacity: 0.5
        }
      },
      xaxis: {
        categories: []
      },
      colors: ['#6993FF']
    };
    var chart = new ApexCharts(document.querySelector(apexChartAudit), options);
    chart.render();
  };

var Dt_auditPending = function(departure){

	table = $("#Dt_auditPending").DataTable({
		responsive: true,
		buttons: ['print', 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
		orderable : true,
        destroy : true,
		ajax: {
				url: '/Reports/auditPending/'+departure,
				type: 'get',

			},
			columns: [
				
				{data: 'order'},
				{data: 'fecha'},
				{data: 'osa'},
				{data: 'activity'},
				{data: 'tag'},
				{data: 'identificacion'},
				{data: 'name'},
				
			]
	})
}

 $('#export_print').on('click', function (e) {
      e.preventDefault();
      table.button(0).trigger();
    });
    $('#export_copy').on('click', function (e) {
      e.preventDefault();
      table.button(1).trigger();
    });
    $('#export_excel').on('click', function (e) {
      e.preventDefault();
      table.button(2).trigger();
    });
    $('#export_csv').on('click', function (e) {
      e.preventDefault();
      table.button(3).trigger();
    });
    $('#export_pdf').on('click', function (e) {
      e.preventDefault();
      table.button(4).trigger();
    });