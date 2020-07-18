
const pcte = $("#id_pacienteM").val(); 

$(document).ready(function(){

    $(document).on('click','#unResolvedCorrection',function(){
      
      $.ajax({
        url:'/Activities/unresolved',
        type:'get',
        success:function(data){
          $.each(data,function(i,item){
            let line = '<div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">\
            <span class="svg-icon svg-icon-success mr-5">\
                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
        <rect x="0" y="0" width="24" height="24"></rect>\
        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "></path>\
        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>\
    </g>\
</svg><!--end::Svg Icon--></span>            </span>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a href="/Paciente/'+item.idpcte+'" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 ">'+item.pcte+'</a>\
                <a ><span class="text-danger font-weight-bold">'+item.observacion+'</span></a>\
            </div>\
            <!--end::Title-->\
        </div>';
        $("#unResolvedBody").append(line);
          })
          

        },error:function(){

        }

      })
    })

    $(document).on('click','#registerreturnBtn',function(){
      var data = $(this).attr('data-observation');
      $("#registerreturnObs").empty();
      $("#registerreturnObs").html(data);
    })

    $(document).on('click','.showActivity',function(){
    var activity = $(this).attr('data-id');
    $(".activityregistersNames").empty();
    $(".clinicRegisterModalBody").empty();
    $.ajax({
      url:'/Activity/ModalInfo',
      type:'get',
      data:{
        activity:activity
      },
      success:function(data){
        console.log(data);
        var registers = data.register;
        var activity = data.activity;
        $.each(registers, function(i, item) {
          console.log(item);
          let line = '<li class="nav-item mb-2 displayRegister" data-registerName = "'+item.name+'" data-activity="'+activity.id+'" data-format="'+item.format+'" data-tableName="'+item.tableName+'">\
                                        <a class="nav-link" class="">\
                                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>\
                                            <span class="nav-text">'+item.name+'</span>\
                                        </a>\
                                    </li>';
                    $(".activityregistersNames").append(line);
        });

        $("#activityModal").modal('show');
      }
    })
  })

    $(document).on('click',"#SaveDisclaimer",function(){
      var nota = $("#notaAclaratoria").val();
      var activity = $(this).attr('data-activity');
      var order = $(this).attr('data-order');
      var table = $(this).attr('data-table');
      if(nota==""){
        toastr.warning("Porfavor diligenciar la anotacion");
        return false;
      }
      $.ajax({
        url:'/Activity/DisclaimerStore',
        type:'post',
        data:{
          activity :activity,
          order:order,
          nota:nota,
          table : table
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(data){
          toastr.success('Nota aclaratoria guardada con exito');
          $("#disclaimer").modal('hide');
        },
        error:function(data){

        }
      })
    })

    $(document).on('click','#auditSave',function(){
      var option = $("#auditCalification");
      var valid = true;
      var auditObservation = $("#auditObservation").val();
      var activity = $(this).attr('data-activity');
      var order = $(this).attr('data-order');
      console.log(activity);
      console.log(order);
      if(option.prop('checked')) valid=false;
      if(valid==false && auditObservation==""){
        toastr.error("Porfavor realizar una obaservacion de no aprobado");
        return false;
      }
      $.ajax({
        url:'/Activity/AuditStore',
        type:'post',
        data:{
          valid:valid,
          auditObservation : auditObservation,
          activity:activity,
          order:order
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(data){
          toastr.success("Auditoria realizada correctamente");
          $('#Dt_serviceWTOaudit tr:contains('+activity+')').addClass('bg-success');
          $("#auditModal").modal('hide');
        },
        error:function(data){

          toastr.error("Auditoria realizada correctamente");
          
        }
      })
      console.log(valid);
    })

   $(document).on("click","#auditBarTool",function(){
    var activity = $(this).attr('data-activity');
    var order = $(this).attr('data-order');
    
    $("#auditSave").attr('data-activity',activity);
    $("#auditSave").attr('data-order',order);
   }) 

   $(document).on("click","#disclaimerBarTool",function(){
    var activity = $(this).attr('data-activity');
    var order = $(this).attr('data-order');
    var table = $(this).attr('data-table');
    $("#SaveDisclaimer").attr('data-table',table);
    $("#SaveDisclaimer").attr('data-activity',activity);
    $("#SaveDisclaimer").attr('data-order',order);
   })


  $(document).on('click','#barSegTel',function(){
    var order = $(this).attr('data-order'); 
    var activity = $(this).attr('data-activity');
    var pcte = $(this).attr('data-pcte');
    $("#saveSegtel").attr('data-order',order);
    $("#saveSegtel").attr('data-activity',activity);
    $("#saveSegtel").attr('data-pcte',pcte);
  })

  $(document).on('click','#saveSegtel',function(){
    var order = $(this).attr('data-order'); 
    var activity = $(this).attr('data-activity');
    var pcte = $(this).attr('data-pcte');
    var nota = $("#notaSeguimiento").val();
    var type = $("#typeSeg").val();

    $.ajax({
      url:'/Activity/SeguimientoTelefonico',
      type:'post',
      data:{
        order:order,
        activity:activity,
        pcte:pcte,
        nota:nota,
        type:type
      },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success:function(data){
        $("#SegTel").modal('hide');
        toastr.success(data.message);
        $('#Dt_serviceWTOseguimiento tr:contains('+activity+')').addClass('bg-success');

      },error:function(data){
        obj = JSON.parse(data.responseText);
        toastr.error(obj.message);
      }
    })
  })

  $(document).on('click','#unsignedActivitiesTool',function(){


    $("#Dt_servicesUnsigned").DataTable({
      responsive: true,
      orderable : true,
      destroy : true,
      ajax: {
        url: '/Activities/unsigned',
        type: 'get',

        dataSrc: function (json) {
          if (!json.data) {
            return [];
          } else {
            return json.data;
          }}
        },
        columns: [

        {data: 'order'},
        {data: 'osa'},
        {data: 'pcte'},
        {data: 'service'},
        {data: 'action'}


        ]
    })
    
  })

  $(document).on('click','.showService',function(){
    
     
    var id = $(this).attr('data-id');
    
    $(".activityregistersNames").empty();
    $(".clinicRegisterModalBody").empty();
    $.ajax({
      url:'/Service/modalInfo',
      type:'get',
      data:{
        id : id,
      },
      success:function(data){
        
        $.each(data, function(i, item) {
          var status = 'bg-default';
          if(item.status==1)status='bg-light-success';
          if(item.status==2)status='bg-light-danger';
          var line = '<li class="nav-item mb-2 '+status+' displayRegister" data-activity="'+item.activity+'" data-format="'+item.format+'" data-tableName="'+item.tableName+'" data-registername = "'+item.registerName+'">\
                                        <a class="nav-link" class="">\
                                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>\
                                            <span class="nav-text">'+item.registerName+'</span>\
                                        </a>\
                                    </li>';
          
                    $(".activityregistersNames").append(line);
        });

        $("#serviceModal").modal('show');
      }
    })
  })
	
    $(document).on('click',"#DxResume",function(){
  //var pcte = $("#id_pacienteM").val();
  var table = $("#DxResumeTable");
  table.empty();
  $.ajax({
    url:'/Paciente/dx/History/records/resume',
    type:'get',
    data:{pcte:pcte},
    success:function(data){
        $.each(data,function(i,item){
          var dxHs = item.history;
          var color = '';
          var status = '';
          switch(item.status){
              case 1:
                  color = 'table-success';
                  status = 'ACTIVO';
              break;
              case 2:
                  color = 'table-danger';
                  status = 'INACTIVO';
              break;
          }
          var line = '<tr class="'+color+'"><td>'+item.dx+'</td><td>'+item.idcie+'</td><td>'+status+'</td><tr>';
          var insideline = '';
            $.each(dxHs,function(k,value){
              insideline = insideline + '<tr><td>'+value.observacion+'</td><td>'+value.fecha+'</td><td>'+value.medico+'</td></tr>';
            })
            
            table.append(line);
            table.append(insideline);
        })
    },error:function(){

    }
  })
})  

//HISTORIAL DEL PACIENTE

$(document).on('click','#ClinicHistoryToolbar',function(){
  $("#ResultMedicoHistory").empty();
  $("#ResultMedicoHistory").append('<br>');
  $(".clinicRegisterModalBody").empty();
    $.ajax({
      url:'/Paciente/Medical/History',
      type:'get',
      data:{pcte:pcte,take:3},
      success:function(data){
        $.each(data,function(i,item){
          var line = '<div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">\
            <span class="svg-icon svg-icon-success mr-5">\
                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
        <rect x="0" y="0" width="24" height="24"></rect>\
        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "></path>\
        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>\
    </g>\
</svg><!--end::Svg Icon--></span>            </span>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a style="cursor:pointer;" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 displayRegister" data-format="'+item.format+'" data-activity="'+item.activity+'" data-tablename="'+item.table+'">'+item.type+'</a>\
                <a ><span class="text-muted font-weight-bold">'+item.fecha+'</span></a>\
            </div>\
            <!--end::Title-->\
        </div>';
        $("#ResultMedicoHistory").append(line);
        })
           
      }
    })
})
//FIN DEL HISTRIAL


	$(document).on('click','#antecedentesToolbar',function(){
		//var pcte = $('#id_pacienteM').val()
		 $("#timelinePat").empty();
		 $("#timelineQuir").empty();
		 $("#timelineAle").empty();
		 $("#timelineMed").empty();
		 $("#timelineHab").empty();
		 $("#timelineFam").empty();
		 $("#timelineHos").empty();
		 $("#timelineTox").empty();
		$.ajax({
			url:'/Paciente/info/antecedentes',
			type:'get',
			data:{
				pcte:pcte
			},
			success:function(data){
				var patData = [];
				$.each(data.patologicos,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelinePat").append(line);
				})

				$.each(data.quirurgicos,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelineQuir").append(line);
				})

				$.each(data.alergicos,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelineAle").append(line);
				})

				$.each(data.medicamentos,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelineMed").append(line);
				})

				$.each(data.habitos,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelineHab").append(line);
				})

				$.each(data.familiares,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelineFam").append(line);
				})

				$.each(data.hospitalizacion,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelineHos").append(line);
				})
				$.each(data.toxicos,function(i,item){
					var line = '<div class="timeline-item align-items-start">\
                <!--begin::Label-->\
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+item.fecha+'</div>\
                <!--end::Label-->\
                <!--begin::Badge-->\
                <div class="timeline-badge">\
                    <i class="fa fa-genderless text-success icon-xxl"></i>\
                </div>\
                <!--end::Badge-->\
                <!--begin::Text-->\
                <div class="timeline-content text-dark-50">\
                    '+item.data+'\
                </div>\
                <!--end::Text-->\
            </div>';
					 $("#timelineTox").append(line);
				})


			},error:function(){

			}
		})
	})

	$(document).on('click','#ClinicStadistiscInfo',function(){
		//var pcte = $('#id_pacienteM').val()
		$.ajax({
			url:'/Paciente/info/vitals',
			type:'get',
			data:{
				pcte:pcte
			},
			success:function(data){
				
				var arrayTA = [];
				var arrayFR = [];
				$.each(data.TA,function(i,item){
					var obj = {};
					obj['systolic'] = item.systolic;
					obj['diastolic'] = item.diastolic;
					obj['TaMedia'] = item.TAmedia;
					obj['fecha'] = item.fecha;
					arrayTA.push(obj);
				})
				$.each(data.FR,function(i,item){
					var obj = {};
					obj['Fr'] = item.fr;
					obj['fecha'] = item.fecha;
					arrayFR.push(obj);
				})

				graphicTA(arrayTA);
				graphicFR(arrayFR);
			}
		})
	})

	$(document).on('click',".mnaData",function(){
		
		//var pcte = $('#id_pacienteM').val()
		$.ajax({
			url:'/Paciente/info/mna',
			type:'get',
			data:{
				pcte:pcte
			},
			success:function(data){
				
				var arrayMNA = [];
				
				$.each(data,function(i,item){
					var obj = {};
					obj['mna'] = item.mna;
					obj['fecha'] = item.fecha;
					arrayMNA.push(obj);
				})
				

				graphicMNA(arrayMNA);
				
			}
		})
	})

})
var primary = '#6993FF';
var success = '#1BC5BD';
var info = '#8950FC';
var warning = '#FFA800';
var danger = '#F64E60'; 

var graphicTA = function(arrayData) {
	var systolicData = [];
	var diastolicData = [];
	var dateData = [];
	var TaMediaData=[];
	$.each(arrayData,function(i,item){
		systolicData.push(item.systolic);
		diastolicData.push(item.diastolic);
		dateData.push(item.fecha);
		TaMediaData.push(item.TaMedia);
	})
	
	
    var apexChart = "#TAchart";
    var options = {
      series: [{
        name: "Sistolica",
        data: systolicData
      },
      {
        name: "Diastolica",
        data: diastolicData
      },
      {
        name: "TAMedia",
        data: TaMediaData
      }

      ],
      chart: {
        height: 750,
        width: '100%',
        type: 'line',
        zoom: {
          enabled: true
        }
      },
      dataLabels: {
        enabled: false
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
        categories: dateData
      },
      colors: [primary,info,success]
    };
    var chart = new ApexCharts(document.querySelector(apexChart), options);
    chart.render();
  };

  var graphicFR = function(arrayData) {
	
	var FrData = [];
	var dateData = [];
	;
	$.each(arrayData,function(i,item){
		FrData.push(item.Fr);
		
		dateData.push(item.fecha);
		
	})
	
	
    var apexChart = "#FRchart";
    var options = {
      series: [{
        name: "Frecuencia Respiratoria",
        data: FrData
      }
      ],
      chart: {
        height: 750,
        width: '100%',
        type: 'line',
        zoom: {
          enabled: true
        }
      },
      dataLabels: {
        enabled: false
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
        categories: dateData
      },
      colors: [primary]
    };
    var chart = new ApexCharts(document.querySelector(apexChart), options);
    chart.render();
  };

  var graphicMNA = function(arrayData) {
	
	var MNAData = [];
	var dateData = [];
	;
	$.each(arrayData,function(i,item){
		MNAData.push(item.mna);
		dateData.push(item.fecha);
		
	})
	
	
    var apexChart = "#MNAchart";
    var options = {
      series: [{
        name: "MNA",
        data: MNAData
      }
      ],
      chart: {
        height: 750,
        width: '100%',
        type: 'line',
        zoom: {
          enabled: true
        }
      },
      dataLabels: {
        enabled: false
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
        categories: dateData
      },
      colors: [primary]
    };
    var chart = new ApexCharts(document.querySelector(apexChart), options);
    chart.render();
  };






 