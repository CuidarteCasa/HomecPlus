$(document).ready(function(){
	var chart ,chart2;
	initPC1();
	initPC2();
	initPC3();
  initPC3B();

	$(document).on("click","#controlPanelTool",function(){
			var data = PC1getData();
	    var data = PC1BgetData(); 
      SelectMl('/Userplanta/select','#userSgto',"Seleccione..")   
	})
  $(document).on("click","#graphicPC3",function(){
      let user=$("#userSgto").val(); 
      var data = PC3getData(user);
         
  })
})

var initPC3 = function initPC3() {
    var apexChartPC3 = "#chart_PC3";
    var options = {
      series: [{
        name: "Seguimientos",
        data: []
      }],
      chart: {
        id:'sgto',
        height: 350,
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
      colors: [primary]
    };
    var chart = new ApexCharts(document.querySelector(apexChartPC3), options);
    chart.render();
  };


var initPC1 = function(){
	var apexChartPC1 = "#chart_PC1";
    var options = {
      series: [],
      chart: {
        width: 350,
        type: 'pie'
      },
      labels: ['Total Actividades', 'Realizadas'],
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 300
          },
          legend: {
            position: 'bottom'
          }
        }
      }],
      colors: [danger, success]
    };
    chart = new ApexCharts(document.querySelector(apexChartPC1), options);
    chart.render();
}

var initPC2 = function(){
	var apexChartPC2 = "#chart_PC1B";
    var options = {
      series: [{
        name: 'Total',
        data: []
      }, {
        name: 'Realizada',
        data: []
      }],
      chart: {
      	id:'mychart',
        type: 'bar',
        height: 500,

      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '50%',
          endingShape: 'rounded'
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: []
      },
      yaxis: {
        title: {
          text: 'Actividades'
        }
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function formatter(val) {
            return val + " Actividades";
          }
        }
      },
      colors: [danger, success]
    };
    chart2 = new ApexCharts(document.querySelector(apexChartPC2), options);
    chart2.render();
}

var initPC3B = function(){
  var apexChartPC3B = "#chart_PC3B";
    var options = {
      series: [{
        name: 'Total',
        data: []
      }, {
        name: 'Realizada',
        data: []
      }],
      chart: {
        id:'sgtoDia',
        type: 'bar',
        height: 350,

      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '20%',
          endingShape: 'rounded'
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: []
      },
      yaxis: {
        title: {
          text: 'Seguimientos'
        }
      },
      fill: {
        opacity: 1
      },
      tooltip: {
        y: {
          formatter: function formatter(val) {
            return val + " Seguimientos";
          }
        }
      },
      colors: [danger, success]
    };
    chart2 = new ApexCharts(document.querySelector(apexChartPC3B), options);
    chart2.render();
}


 




var PC1getData = function PC1getData(){
$.ajax({
	url:'Programmer/PanelControl/1',
	type:'get',
	success:function(data){
		chart.updateSeries(data);
	}
})
}

var PC3getData = function PC3getData(user){
$.ajax({
  url:'Programmer/PanelControl/3',
  type:'get',
  data:{user:user},
  success:function(data){
    
    var fecha = [];
    var sgto = [];
    $.each(data,function(i,item){
      fecha.push(item.fecha);
      sgto.push(item.sgto);
    })
    console.log(fecha)
    console.log(sgto)
    ApexCharts.exec('sgto','updateOptions',{
      xaxis: {
              categories: fecha
            }
    })

    ApexCharts.exec('sgto','updateSeries',[{
      data:sgto
    }])

    PC3BgetData();

  }
})
}

var PC3BgetData = function PC3BgetData(){
  var fecha = $("#sgtoDate").val();
  let user=$("#userSgto").val();  
  $.ajax({
  url:'Programmer/PanelControl/4',
  type:'get',
  data:{user:user,fecha:fecha},
  success:function(data){
    var total = []
    total.push(data.total);
    var doit = [];
    doit.push(data.realizados);
    var category = [];
    if(fecha==""){category.push('Hoy')}else {category.push(fecha);}
      ApexCharts.exec('sgtoDia','updateOptions',{
      xaxis: {
              categories: category
            }
    })
    ApexCharts.exec('sgtoDia','updateSeries',[{
      data:total
    },{
      data:doit
    }])
  }
})
} 

var PC1BgetData = function PC1BgetData(){
$.ajax({
	url:'Programmer/PanelControl/2',
	type:'get',
	success:function(data){
		var name = [];
		var activities = [];
		var doit = [];
		
		$.each(data,function(i,item){
			
			name.push(item.tag)
			activities.push(item.actividades)
			doit.push(item.realizadas)
			
			
		})
		ApexCharts.exec('mychart','updateOptions',{
			xaxis: {
			        categories: name
			      }
		})

		ApexCharts.exec('mychart','updateSeries',[{
			data:activities
		},{
			data:doit
		}])
		
	}
})
}