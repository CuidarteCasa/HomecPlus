$(document).ready(function(){
	var table;
    Dt_orderList()

$('#kt_dropzone_3').dropzone({
      url: "/signatureCertified/",
      // Set the url for your upload script location
      paramName: "file",
      // The name that will be used to transfer the file
      maxFiles: 1,
      maxFilesize: 10,
      // MB
      addRemoveLinks: true,
      acceptedFiles: "application/pdf",
      accept: function accept(file, done) {

        var order = $('#kt_dropzone_3').attr('data-order');
        
        var osa = $('#kt_dropzone_3').attr('data-osa');
        formData = new FormData();
        datafile = file;
        formData.append("fileanx",datafile);
        formData.append("OtforAnexo",order);
        formData.append("osa",osa);
        formData.append("DocType",2);
        $.ajax({
                url:'/signatureCertified',
                type:'post',
                data:formData,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData:false,
                contentType:false,
                success:function(){
                    toastr.success("Firma cargada con exito");
                    setTimeout(function(){ location.reload() },1000);
                }
            })
      }
    });    
  

$(document).on("click",'.uploadCertificado',function(){
    var order = $(this).attr("data-order");
    var osa = $(this).attr("data-osa");
    $('#kt_dropzone_3').attr('data-order',order);
    $('#kt_dropzone_3').attr('data-osa',osa);
})   

$(document).on('click','#chargeObservations',function(){
  let osa = $(this).attr('data-osa');
  $("#observationsBody").empty(); 
  $.ajax({
    url:'/Service/observations',
    type:'get',
    data:{osa:osa},
    success:function(data){
      $.each(data,function(i,item){
        let line = '<div class="timeline-item align-items-start">\
             <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">'+item.fecha+'</div>\
                <div class="timeline-badge">\
                  <i class="fa fa-genderless text-info icon-xl"></i>\
                                                        </div>\
                   <div class="font-weight-mormal font-size-lg timeline-content text-dark pl-3">'+item.observacion+'</div>\
                      </div>';
         $("#observationsBody").append(line);             
      })
    }
  })
}) 

$(document).on("click","#VFail",function(){
   
    var order = $(this).attr("data-order");
    var patient = $(this).attr("data-patient");
    $("#btn_save_vFail").attr("data-order",order);
    $("#btn_save_vFail").attr("data-patient",patient);
     
});

$(document).on("click","#btn_save_vFail",function(){
   
    var order = $(this).attr("data-order");
    var patient = $(this).attr("data-patient");
    var obs =$("#vFailObs").val(); 
    var type = 7;

    if(obs!="")
    {
        $.ajax({
        url:'/Vfail',
        type:'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{order:order,patient:patient,obs:obs,type:type},
        success:function(){
                 sweetMessage('Guardado','Visita fallida guardada con exito','success');
                 $("#VfailModal").modal('hide');
        }
    })
        

    }else{
        sweetMessage("ERROR!", "Todos los campos son obligatorios !", "error");
    }
    
    
   
});


$(document).on("click","#PrfNtf",function(){
   
    var order = $(this).attr("data-order");
    var patient = $(this).attr("data-patient");
    $("#btn_save_ntf").attr("data-order",order);
    $("#btn_save_ntf").attr("data-patient",patient);
     
});

$(document).on("click","#btn_save_ntf",function(){
   
    var order = $(this).attr("data-order");
    var patient = $(this).attr("data-patient");
    var obs =$("#PrfNtfObs").val(); 
    

    if(obs!="")
    {
        $.ajax({
        url:'/NrfPrf',
        type:'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{order:order,patient:patient,obs:obs},
        success:function(){
                 sweetMessage('Guardado','Notificacion guardada con exito','success');
                 $("#PrfNtfModal").modal('hide');
        }
    })
        

    }else{
        sweetMessage("ERROR!", "Todos los campos son obligatorios !", "error");
    }
    
    
   
});



})

var Dt_orderList = function(){
	 table = $("#Dt_orderList").DataTable({
		responsive: true,
        buttons: ['print', 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
		orderable : true,
        destroy : true,
		ajax: {
				url: '/Agenda/orderList',
				type: 'get',
                dataSrc: function (json) {
            if (!json.data) {
                return [];
            } else {
                return json.data;
            }}
			},
			columns: [
				{data: 'img'},
				{data: 'patient'},
				{data: 'direccion'},
				{data: 'barrio'},
				{data: 'telefono'},
				{data: 'ot'},
				{data: 'osa'},
				{data: 'activity'},
				{data: 'valid_to'},
				{data: 'assign'},
				{data: 'doit'},
                {data: 'action2'},
				{data: 'action'}
			],
                    rowCallback:function(row,data,index){
                    	if(data.assign - data.doit == 0){
                    		$('td', row).css('background-color', 'rgba(0, 255, 0, 0.3)');
                    	}
                        
                    }
			
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

