"use strict";
// Class definition
var vf = 0 ;

var Dt_News = function(pcte){
    $("#Dt_News").DataTable({
    responsive: true,
    orderable : true,
        destroy : true,
    ajax: {
        url: '/Paciente/News/History',
        type: 'get',
        data:{
          pcte : pcte
        },
        dataSrc: function (json) {
          if (!json.data) {
              return [];
          } else {
              return json.data;
          }}
        
      },
      columns: [
        {data:'id'},
        {data:'type'},
        {data:'observacion'},
        {data:'user'},
        {data:'fecha'},
        {data:'respuesta'},
        {data:'action'},
      ]
  })
}

var Dt_SPADPrf = function(pcte){
    $("#Dt_SPADPrf").DataTable({
    responsive: true,
    orderable : true,
        destroy : true,
    ajax: {
        url: '/Paciente/SPADPrf/History',
        type: 'get',
        data:{
          pcte : pcte
        },
        dataSrc: function (json) {
          if (!json.data) {
              return [];
          } else {
              return json.data;
          }}
        
      },
      columns: [
        {data:'id'},
        {data:'prf'},
        {data:'observacion'},
        {data:'user'},
        {data:'fecha'},
      ]
  })
}

var Dt_SPADAnalist= function(pcte){
$("#Dt_SPADAnalist").DataTable({
    responsive: true,
    orderable : true,
        destroy : true,
    ajax: {
        url: '/Paciente/SPADAnalist/History',
        type: 'get',
        data:{
          pcte : pcte
        },
        dataSrc: function (json) {
          if (!json.data) {
              return [];
          } else {
              return json.data;
          }}
        
      },
      columns: [
        {data:'id'},
        {data:'activity'},
        {data:'prf'},
        {data:'observacion'},
        {data:'user'},
        {data:'fecha'},
      ]
  })
}

var Dt_StatusHistory= function(pcte){
    $("#Dt_StatusHistory").DataTable({
    responsive: true,
    orderable : true,
        destroy : true,
    ajax: {
        url: '/Paciente/Status/History',
        type: 'get',
        data:{
          pcte : pcte
        },
        dataSrc: function (json) {
          if (!json.data) {
              return [];
          } else {
              return json.data;
          }}
        
      },
      columns: [
        {data:'id'},
        {data:'status'},
        {data:'fecha'},
        {data:'user'},
        {data:'observacion'}
      ]
  })
}

var Dt_Vfail = function(pcte){
  
  
      $("#Dt_Vfail").DataTable({
    responsive: true,
    orderable : true,
        destroy : true,
    ajax: {
        url: '/Paciente/vFail/History',
        type: 'get',
        data:{
          pcte : pcte
        },
        dataSrc: function (json) {
          if (!json.data) {
              return [];
          } else {
              return json.data;
          }}
        
      },
      columns: [
        {data:'id'},
        {data:'prf'},
        {data:'fecha'},
        {data:'obs'}
      ]
  })
  

}

var Dt_PrfNtf = function(pcte){
      $("#Dt_PrfNtf").DataTable({
    responsive: true,
    orderable : true,
        destroy : true,
    ajax: {
        url: '/Paciente/NtfPrf/History',
        type: 'get',
        data:{
          pcte : pcte
        },
        dataSrc: function (json) {
          if (!json.data) {
              return [];
          } else {
              return json.data;
          }}
        
      },
      columns: [
        {data:'id'},
        {data:'prf'},
        {data:'fecha'},
        {data:'obs'}
      ]
  })
}

var sweetMessage= function(title,msg,type){
 swal.fire(title,msg,type);
}

var SelectMl=function(url,id,place){
$.ajax({url: url,type: "GET",dataType: "JSON",success: function(data) {$(id).select2({data, placeholder: place });  } });    
}

jQuery(document).ready(function() {

  //REASIGNACION DE SERVICIOS
  $(document).on("click",".btnReasignService",function(){
    var service = $(this).attr('data-serviceid');
    var zona = $(this).attr('data-zoneid');
    var idOsa = $(this).attr('data-id');
    $("#reassignServiceSave").attr('data-id',idOsa);  
    $.ajax({
      url:'/Service/UserList',
      type:'get',
      data:{service:service,zona:zona},
      success:function(data){
        $.each(data,function(i,item){
          let line = '<tr><td class="pl-0">\
            <a class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">'+item.name+'</a>\
            </td>\
            <td>\
              <div class="d-flex flex-column w-100 mr-2">\
                <div class="d-flex align-items-center justify-content-between mb-2">\
                  <span class="text-muted mr-2 font-size-sm font-weight-bold">'+item.percent+' %</span>\
                </div>\
              <div class="progress progress-xs w-100">\
                <div class="progress-bar '+item.color+'" role="progressbar" style="width: '+item.percent+'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>\
                </div>\
                </div>\
                </td>\
                <td>'+item.asignadas+'</td>\
                <td>'+item.realizadas+'</td>\
                <td>'+item.activities+'</td>\
                <td>'+item.activities+'</td>\
                <td>'+item.action+'</td>\
            </tr>'
          $("#serviceUserListBody").append(line); 
        })  
      },error:function(){

      }
    })  
  })

  $(document).on("click",".setPrftoAssign",function(){
    var prf = $(this).attr('data-idprf');
    $("#reassignServiceSave").attr('data-idprf',prf); 
  })

  

  $(document).on("click","#reassignServiceSave",function(){
    var service = $(this).attr('data-id');
    var newPrf = $(this).attr('data-idprf');
    var type = $("#nulltype").val();
    var obs = $("#obsReasing").val();
    var actionRefresh = $(".btnReasignService").attr('data-actionRefresh');
    $.ajax({
      url:'/Service/reasignService',
      type:'post',
      data:{
        service : service,
        newPrf : newPrf,
        type : type,
        obs : obs
      },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success:function(data){
        sweetMessage('Reasignacion exitosa',data.message,'success');
        $("#reassignServiceObservation").modal('hide');
        $("#reassignService").modal('hide');
        if(actionRefresh=="true")setTimeout(function () { location.reload() }, 1000);
        if(actionRefresh=="programmer"){

        $('#Dt_servicesUnsigned tr:contains('+service+')').addClass('bg-success');
        }

      },
      error:function(){

      }
    })
  })


  //SELECT DE USUARIOS DE PLANTA
 
  //

  //FIN REASIGANACION DE SERVICIOS

  $(document).on('click','.closethismodal',function(){
    let thisModal = $(this).data('modalname');
    $("#"+thisModal).modal('hide');
  })
    
    //funcion para check todo los check tabla cercana
$(document).on('click','#selectAll',function(e){
  var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
})
//fin

$('.kt_datepicker_3').datepicker({
      rtl: KTUtil.isRTL(),
      todayBtn: "linked",
      clearBtn: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd',
    });

//erase fila closest table
$(document).on('click', ".removeRow",function(e) {
    var whichtr = $(this).closest("tr");
    whichtr.remove();      
});
//

$(document).on('click','.gotoNtf',function(){
	var id = $(this).attr('data-id');
  var url  = $(this).attr('data-url');
	$.ajax({
		url:'/notifications/asRead',
		type:'get',
		data:{id:id},
		success:function(){
			window.location.replace(url);
		}
	})
})


//Funcion para no permitir paste
$(document).on('paste','.copypasteRestric',function(e){
		e.preventDefault();
		sweetMessage("ERROR!", "No se puede pegar evoluciones, debe digitar la informacion del paciente !"  , "error", "#1976D2", false);
	})
//end

//funcion bloqueo de pantalla

$(document).ajaxStart(function(){
	 KTApp.blockPage({
        overlayColor: 'blue',
        opacity: 0.1,
        state: 'primary' // a bootstrap color

      });
});

$(document).ajaxComplete(function() {
            KTApp.unblockPage();
        });


	

//

//MEdicamentos , utricion y complemetarios

  $(document).on('click','#mednutcom',function(){
    var pcte = $('#id_pacienteM').val();
     $('#DrugHistory').empty();
     $('#CompleHistory').empty();
     
    $.ajax({
      url:'/Paciente/medNutCompl/'+pcte,
      type:'get',
      success:function(data){
        console.log(data);
        $.each(data.medicamentos,function(i,item){
          
          var line = '';
          var color = 'success';
          if(item.status==0){color = 'danger'}
             line = '<tr id="med'+item.id+'"><td><div class="d-flex align-items-center mb-9 bg-light-'+color+' rounded p-5">\
          <a  style="cursor:pointer;" ><i class="icon-2x flaticon2-refresh-button text-info refreshMed" data-name="'+item.name+'" data-id="'+item.id+'" data-med="'+item.idMed+'" data-toggle="modal" data-target="#medRefresh" data-pos="'+item.formulacion+'" ></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" >'+item.name+'</a>\
                <span class="text-muted font-weight-bold">'+item.formulacion+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'+item.validto+' faltantes</span>\
            <!--end::Lable-->\
        </div></td><tr>';
         
         $('#DrugHistory').append(line);
          
        
          
         
        })
        $.each(data.nutricion,function(i,item){
          
          var line = '';
          var color = 'success';
          if(item.status==0){color = 'danger'}
             line = '<tr id="med'+item.id+'"><td><div class="d-flex align-items-center mb-9 bg-light-'+color+' rounded p-5">\
          <a  style="cursor:pointer;" ><i class="icon-2x flaticon2-refresh-button text-info refreshMed" data-name="'+item.name+'" data-id="'+item.id+'" data-med="'+item.idNut+'" data-toggle="modal" data-target="#medRefresh" data-pos="'+item.formulacion+'" ></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" >'+item.name+'</a>\
                <span class="text-muted font-weight-bold">'+item.formulacion+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'+item.validto+' faltantes</span>\
            <!--end::Lable-->\
        </div></td><tr>';
         
         $('#NutHistory').append(line);
          
        
          
         
        })

        $.each(data.complementario,function(i,item){
          
          var line = '';
          var color = 'success';
          if(item.status==0){color = 'danger'}
             line = '<tr id="med'+item.id+'"><td><div class="d-flex align-items-center mb-9 bg-light-'+color+' rounded p-5">\
          <a  style="cursor:pointer;" ><i class="icon-2x flaticon2-refresh-button text-info refreshMed" data-name="'+item.name+'" data-id="'+item.id+'" data-med="'+item.idNut+'" data-toggle="modal" data-target="#medRefresh" data-pos="'+item.formulacion+'" ></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" >'+item.name+'</a>\
                <span class="text-muted font-weight-bold">'+item.formulacion+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'+item.validto+' faltantes</span>\
            <!--end::Lable-->\
        </div></td><tr>';
         
         $('#CompleHistory').append(line);
          
        
          
         
        })
      }
    })
  })
//

//SEGUIMIENTO PAD
$(document).on('click','#Spad',function(){
	var pcte = $('#id_pacienteM').val();
  if(vf==0){
    vf++;
    Dt_PrfNtf(pcte); 
    Dt_Vfail(pcte);
    Dt_StatusHistory(pcte);
    Dt_SPADAnalist(pcte);
    Dt_SPADPrf(pcte);
    Dt_News(pcte);   
  }
	
})
//FIN SEGUIMIENTO PAD


//FUNCTION PRINT REGISTER

$(document).on("click",".clinicRegisterPrint",function(){
    var format = $(this).attr("data-format");
    var table = $(this).attr("data-table");
    var ot = $(this).attr("data-ot");
    var service = $(this).attr("data-service");
    var activity = $(this).attr("data-activity");
    var activityName = $(this).attr("data-activityName");
    let url='/ClinicRecordPrint/'+table+'/'+format+'/'+activity+'/'+activityName;
        var xhr = new XMLHttpRequest();
        xhr.open("GET",url);
        xhr.responseType = 'arraybuffer';
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                var blob = new Blob([this.response], { type:'application/pdf'});
                var url = URL.createObjectURL(blob);
                var _iFrame = document.createElement('iframe');
                _iFrame.setAttribute('src', url);
                _iFrame.setAttribute('style', 'width:100%;height:800px');
                 $("#mdlpdf").modal('show');
                 $("#appPdf").html(_iFrame); 
            }
            if(this.status === 500){sweetMessage("ERROR!", "El archivo no fue posible ubicarlo !", "error", "#1976D2", false);}
        };
         xhr.send();
          

    
})

//

//funcion para mostrar registroclinico
$(document).on('click','.displayRegister',function(){
	var activity = $(this).attr('data-activity');
	var format = $(this).attr('data-format');
	var registerName = $(this).attr('data-registername');
	var tableName = $(this).attr('data-tablename');
  $(".clinicRegisterModalBody").empty();
	$.ajax({
		url:'/ClinicRecordDisplay',
		type:'get',
		data:{
			activity:activity,
			format:format,
			tableName:tableName,
			registerName,registerName
		},
		success:function(data){
			
			$(".clinicRegisterModalBody").html(data);
			
		}
	})
	//$("#clinicRegisterModal").modal('show');
	
	
})
//end



});





