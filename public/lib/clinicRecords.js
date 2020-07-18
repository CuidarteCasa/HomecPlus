


$(document).ready(function(){
var loadDx=0;
$(document).on('click','#SaveAndClose',function(){

  var activity = $(this).attr('data-activity');
  var osa = $(this).attr('data-osa');
  var fecha = $("#activityDate").val();
  $.ajax({ 
      url:'/ClinicalRecords/SaveAndClose',
      type:'post',
      data:{
        activity:activity,
        osa:osa,
        fecha:fecha
      },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success:function(data){
          sweetMessage('Registro exitoso','Actividad Cerrada y guardada con exito','success');
          window.location.replace("/AgendaDomiciliaria");
      },error:function(data){

      }
  })
})  


//SelectMl('/Laboratorios/Vm/List','#labList',"Seleccione..") 
$('#labList').selectpicker();
    $('#labList').on('changed.bs.select', function () {
      // Revalidate field
     //validator.revalidateField('select');
    }); // Select2
$(document).on('click','.refreshMed',function(){
  var pos = $(this).attr('data-pos');
  var med = $(this).attr('data-med');
  var id = $(this).attr('data-id');
  var name = $(this).attr('data-name');
  $("#savemedRefresh").attr('data-med',med);
  $("#savemedRefresh").attr('data-name',name);
  $("#savemedRefresh").attr('data-id',id);
  $("#medRefreshposologia").val(pos);
})

$(document).on('click','#addNewAnt',function(){
  var pcte = $("#id_pacienteM").val();
  var type = $("#AntType").val();
  var info = $("#antNewData").val();
  if(info=="" || type=="NoData"){
    sweetMessage('Precaucion','Todos lo datos son obligatorios','error');
    return false;
  }
  $.ajax({
    url:'/Paciente/new/antecedente',
    type:'post',
    data:{
      type:type,
      info:info,
      pcte:pcte
    },
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(data){
        sweetMessage('Registro Exitoso',data.message,'success');
        $('#antecedentesMdl').modal('hide');
        $('#MnewAnt').modal('hide');
    },error:function(data){
        obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
    }
  })
})

$(document).on('click','#savemedRefresh',function(){
   
          
          
          let id = $(this).attr('data-id');
          let namemed =  $(this).attr('data-name');
          let posologia = $('#medRefreshposologia').val();    
          let meses = $("#medRefreshmeses").val();  

          let line='<tr><td><div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">\
          <a class="removeRow" href="#"><i class="icon-2x flaticon2-trash text-danger "></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" name="listnewFormulation[]" data-idline="'+id+'" data-pos="'+posologia+'" data-mes="'+meses+'" data-name="'+namemed+'">'+namemed+'</a>\
                <span class="text-muted font-weight-bold">'+posologia+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">Formula por <br>'+meses+' Meses</span>\
            <!--end::Lable-->\
        </div></td><tr>';
          $("#newFormulationRecods").append(line);
          $("#medRefresh").modal('hide');
})





  $(document).on('click','.Mdxrecord',function(){
    var bodyRecord =$("#DxHistoryRecords");
    bodyRecord.empty();
    var pcte_cie = $(this).attr('data-pcteCie');
    $.ajax({
      url:'/Paciente/dx/History/records',
      type:'get',
      data:{
        pcte_cie:pcte_cie
      },
      success:function(data){
        $.each(data,function(i,value){

          let pointColor = '';
          switch(value.status){
            case 1:
              pointColor = 'success';
            break;
            case 2:
             pointColor = 'danger';
            break;
            case 3:
            pointColor = 'info';
            break;
          }
          let line='<div class="timeline-item align-items-start"><div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">'+value.fecha+'</div><div class="timeline-badge"><i class="fa fa-genderless text-'+pointColor+' icon-xxl"></i></div><div class="timeline-content text-dark-50">'+value.observacion+'</div></div>';
         
          bodyRecord.append(line);
           
        })
      },error:function(){

      }
    })
  })

  $(document).on('click','#addDxTool',function(){
    if(loadDx==0)SelectMl('/Selectcie10','#cie10',"Seleccione..") ;
    loadDx++;
  })


  $(document).on('click','#dxToolbar',function(){
    var pcte = $("#id_pacienteM").val();
     $('#activeDx').empty();
     $('#InactiveDx').empty();
    $.ajax({
      url:'/Paciente/dx/'+pcte,
      type:'get',
      success:function(data){
        $.each(data,function(i,item){
          console.log(item);
          var line = '';
          if(item.status==1){
             line = '<tr><td><div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">\
          <a class="updateDx" style="cursor:pointer;" data-toggle="modal" data-target="#dxAction" data-status="'+item.status+'" data-dx = "'+item.id+'"><i class="icon-2x flaticon-edit text-danger "></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 Mdxrecord" data-toggle="modal" data-target="#dxRecord" data-pcteCie="'+item.id+'">'+item.name+'</a>\
                <span class="text-muted font-weight-bold">Actulizado :'+item.act+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'+item.cie10+' </span>\
            <!--end::Lable-->\
        </div></td><tr>';
         
         $('#activeDx').append(line);
          }
          if(item.status==2){
             line = '<tr><td><div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">\
          <a class="updateDx" style="cursor:pointer;" data-toggle="modal" data-target="#dxAction" data-status="'+item.status+'" data-dx = "'+item.id+'"><i class="icon-2x flaticon-edit text-danger "></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 Mdxrecord"  data-toggle="modal" data-target="#dxRecord" data-pcteCie="'+item.id+'">'+item.name+'</a>\
                <span class="text-muted font-weight-bold">Actulizado :'+item.act+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'+item.cie10+' </span>\
            <!--end::Lable-->\
        </div></td><tr>';
         $('#InactiveDx').append(line);
          }

          
         
        })
      }
    })
  })

	

	//datetimepicker restricted for register
	$('#activityDate').datetimepicker({
      todayHighlight: true,
      autoclose: true,
      format: 'yyyy.mm.dd hh:ii',
      startDate: '-3d',
      endDate:'+0d',
    });
	//


$(document).on('click','#ModaladdNewMed',function(){
  SelectMl('/Medicamentos/Vm/List','#medList',"Seleccione..") 
})

$(document).on('click','#ModaladdNewNut',function(){
  SelectMl('/Nutricion/Vm/List','#nutList',"Seleccione..") 
})
$(document).on('click','#ModaladdNewComp',function(){
  SelectMl('/Complementarios/Vm/List','#compList',"Seleccione..") 
})


$(document).on('click','.addOtherPlan',function(){
  var thisEps = $(this).attr('data-eps');
  SelectMl('/activePackageForFormulation/'+thisEps,'#OtherPlanModalSelect',"Seleccione..") 
})

$(document).on('click','#saveEventDx',function(){
var dx = $(this).attr('data-dx');
  dxForm.validate().then(function(status){   
    if(status=='Valid'){
        
        console.log(dx);
        DxEvent(dx);
    }
  }) 
})

$(document).on('click','.updateDx',function(){
  var id = $(this).attr('data-dx');
  var status = $(this).attr('data-status');
  $("#saveEventDx").attr('data-dx',id);
  if(status==1){
    $('#eventoDx option[value="'+status+'"]').attr("disabled", true);
    $('#eventoDx option[value="2"]').attr("disabled", false);
  }
  if(status==2){
    $('#eventoDx option[value="'+status+'"]').attr("disabled", true);
    $('#eventoDx option[value="1"]').attr("disabled", false);
  }

})

	//agregar formulacion a la lista
	//MEDICAMENTOS
	$(document).on("click","#addMed",function(){
		medVal.validate().then(function(status){

				if (status=='Valid') {
          checkMedPac();
         
				}
		});
	})

  $(document).on("click","#addNut",function(){
    nutVal.validate().then(function(status){

        if (status=='Valid') {
          checkNutPac();
         
        }
    });
  })

  $(document).on("click","#addComp",function(){
    compVal.validate().then(function(status){

        if (status=='Valid') {
          checkComplePac();
         
        }
    });
  })

	//save formulation

  //AGREGAR DX
    $(document).on("click","#saveNewDx",function(){
    newdxForm.validate().then(function(status){

        if (status=='Valid') {
          checkDxPac();
         
        }
    });
  })
  //


  $(document).on('click','#saveAllFormulation',function(){
    var pcte = $('#id_pacienteM').val();
    var osa=$("#id_orden_servicio").val();
    var order =$("#id_orden_trabajo").val();
    var activity= $("#id_actividad_servicio").val();
    var localarry=[];
    let fecha = $("#activityDate").val();
    if(validaActivityDate()){
      $("a[name='listnewNutFormulation[]']").each(function(){  
        var obj={};
        if($(this).attr('data-id'))
        obj["id"]=$(this).attr('data-id');
        if($(this).attr('data-idline'))
        obj["idline"]=$(this).attr('data-idline');
        obj['pos'] = $(this).attr('data-pos'); 
        obj["mes"]=$(this).attr('data-mes');
        obj["Text"] = $(this).attr('data-name');
        obj["type"] = 'Nut';
        localarry.push(obj);
      
    });
    $("a[name='listnewFormulation[]']").each(function(){  
        var obj={};
        if($(this).attr('data-id'))
        obj["id"]=$(this).attr('data-id');
        if($(this).attr('data-idline'))
        obj["idline"]=$(this).attr('data-idline');
        obj['pos'] = $(this).attr('data-pos'); 
        obj["mes"]=$(this).attr('data-mes');
        obj["Text"] = $(this).attr('data-name');
        obj["type"] = 'Med';
        localarry.push(obj);
      
    });

    $("a[name='listnewCompleFormulation[]']").each(function(){  
        var obj={};
        if($(this).attr('data-id'))
        obj["id"]=$(this).attr('data-id');
        if($(this).attr('data-idline'))
        obj["idline"]=$(this).attr('data-idline');
        obj['pos'] = $(this).attr('data-pos'); 
        obj["mes"]=$(this).attr('data-mes');
        obj["Text"] = $(this).attr('data-name');
        obj["type"] = 'Comple';
        localarry.push(obj);
      
    });

    $.ajax({
      url:'/ClinicRecordFormulation',
      type:'post',
      data:{
        pcte:pcte,
        arry:localarry,
        osa:osa,
        order:order,
        activity:activity,
        fecha:fecha
      },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success:function(data){
          addRegister(data);  
          sweetMessage('Registro Exitoso',data.message,'success');
          $("#formulations").modal('hide');
      },error:function(data){
         obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
      }
    })
    }else{
      sweetMessage('Error en la fecha de atencion','Recuerde seleccionar una fecha y hora de atencion','warning');
          return false;
    }

    

  })


	//end save
	//END MEDICAMENTOS
	//

//GUARDADO DE REGISTROS CLINICOS


  

//

	$(document).on("click",'.saveClinicRecord',function(){
	     var form = $(this).attr('data-form');
	     if(validaActivityDate()){
	     		 switch(form){
            case 'valoracion_especialista_geriatria':
            //VALIDACION VALORACION ESPERCIALISTA
            if(barthelValidate(form))valoracionEspecialistaGeriatra(form);
              
            
            break;

            case 'valoracion_medicina_general':
            //VALIDACION VALORACION MEDICA
              if(barthelValidate(form) && interconsultaValidate(form))valoracionMedica(form);
              
              
            break;

            case 'evolucion_medicinageneral':
                if(barthelValidate(form) && interconsultaValidate(form))evolucionMedica(form);
              

               
    
            break;
            case 'laboratorio_clinico':
                laboratorioClinico(form);
            break;
            case 'evolucion_terapia_fisica':
                evolucionTerapia(form,'evolucion_terapia_fisica');  
            break;
           }
	     }else{
	     		sweetMessage('Error en la fecha de atencion','Recuerde seleccionar una fecha y hora de atencion','warning');
          return false;
	     }
          

      
	});

	$(document).on('click','.chargePackage',function(){

     
        var package = $(this).attr('data-package');
      if(!package)
        package = $("#OtherPlanModalSelect").val();
      $(".savenewplan").attr('data-package',package);
      $.ajax({
        url:'/ClinicRecordEvolution/chargePackage',
        type:'get',
        data:{
          package:package
        },
        success:function(data){
          $("#OtherPlanModal").modal('hide');
          $('.newplan').empty();
          $('.newplan').append(data);
        }
      })
      

    	
})

  
$(document).on('change','.barthel',function(){
  var total = 0;
  var form = $(this).attr('data-form');
  var barthel =document.getElementsByName(form+'barthel[]') ;
  for (var i = 0; i < barthel.length; i++) {

    let texto = barthel[i].value;
    texto = texto.split("-");
    let itemVal = texto[1];
    itemVal = $.trim(itemVal);


    total = parseInt(total) + parseInt(itemVal);
  }
  
  $("#"+form+"totalbarthel").val(total);
})
  

	$(document).on('click','.savenewplan',function(){

    let sw = false;
      $("input[name='services[]']").each(function(){  
        if($(this).val()!== "")
          sw=true;
      
    });
      if(sw==false){
        sweetMessage('Precaucion','Se debe seleccionar al menos un servicio','warning');
        return false;
        }else{
          var localarry=[];
    var package = $(this).attr('data-package');
    var table = $(this).attr('data-table');
    $("#"+table).find("input[name='services[]']").each(function() {
      if($(this).val()!=""){
        var obj={};
        obj["service"]=$(this).attr('data-service');
        obj['cantidad'] = $(this).val(); 
        obj["package"]=package;
        obj["nameService"] = $(this).attr('data-name');
        localarry.push(obj);
        console.log('in');
      }
    });
    $.ajax({
      url:'/ClinicRecordEvolution/validatePlan',
      type:'get',
      data:{
        arry:localarry
      },
      success:function(data){
        if(data['data']==0){
          sweetMessage("\u00A1Atenci\u00f3n!",data['ms'],'warning');
          return false;
        }
        if(data['data']==1){
          sweetMessage("\u00A1Exito!",data['ms'],'success');
          

          addResumePlan(localarry,table);

          $('.newplan').empty();
          $('.chargePackage[data-package="'+package+'"]').prop("disabled",true);
          
          
        }
        

      }
    })
        }  

		
		
		
	})

})



var planValidate = function(name){
    let alta = $('.altaMedica');
    if(alta.is(':checked'))return true;
    let rowCount = $("#resumePlan"+name+' tr').length;
    
    if(rowCount>0)return true;
    
    return false;

}

var barthelValidate = function(form){
  var barthelT=$("#"+form+"totalbarthel").val();
  let auditBarthel = $('.auditBarthel');
  if(barthelT>60 && !auditBarthel.is(':checked')){
    sweetMessage('Error en el barthel','Revise el barthel. Si esta bien marcar casilla de auditoria a paciente','warning');
    return false;
  }

  return true;
}

var interconsultaValidate = function(form){
  let inter = $("#"+form+"swIntercosulta");
  let special = $("#"+form+"especialidad").val()
  let justificacion = $("#"+form+"justificacion").val()
  console.log(inter);
  console.log(special);
  console.log(justificacion);
  if(inter.prop('checked') ){
    if(special=="" || justificacion==""){
      sweetMessage('Precaucion','Debe llenar todos los campos de la remision','warning');
      return false;
    }
       
  }
  return true;
}

var addResumePlan = function(data,name){
      var table = $("#resumePlan"+name);
      $.each(data,function(i,item){
            console.log(item);
            let line = "<tr><td><input name='plan[]' type='hidden'  value='"+item.package+"'><input name='service[]' type='hidden' value='"+item.service+"'><input name='cantidad[]' type='hidden'  value='"+item.cantidad+"'><input name='serviceName[]' type='hidden'  value='"+item.nameService+"'>"+item.nameService+"</td><td>"+item.cantidad+"</td></tr>";
            table.append(line);
            
      })
}

var addRegister = function(data){
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
                <a style="cursor:pointer;" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="'+data.data.format+'" data-activity="'+data.data.activity+'" data-tablename="'+data.data.table+'">'+data.registerName+'</a>\
                <a ><span class="text-muted font-weight-bold">Editar</span></a>\
            </div>\
            <!--end::Title-->\
        </div>';
        $("#savedRegisters").append(line);
}

var validaActivityDate= function(){
	let fecha = $("#activityDate");	
	if(fecha.val()=='')return false;
	return true;
}

var ajaxSubmitform = function(url,formulario){
      var form=$("#"+formulario+"")[0];
      var formData= new FormData(form);
      let fecha =$("#activityDate").val(); 
      formData.append('fecha_actividad',fecha);
      $.ajax({
            url:url,
            type:'post',
            processData: false,
            contentType: false,
            data: formData,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
            	  addRegister(data);	
                  sweetMessage('Registro Exitoso',data.message,'success');
                  $("#SaveAndClose").prop('disabled',false);

            },error:function(data){
                 obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
            }
      })
}

var checkDxPac = function(){
  var pcte = $('#id_pacienteM').val();
  var cie = $("#cie10").val();
  let observacion = $("#newDxobs").val();
  let fecha = $("#newdxDate").val();
  var osa=$("#id_orden_servicio").val();
  var order =$("#id_orden_trabajo").val();
  var activity= $("#id_actividad_servicio").val();
  $.ajax({
    url:'/Paciente/save/newDx',
    type:'get',
    data:{
      pcte:pcte,
      cie :cie,
      observacion:observacion,
      fecha:fecha,
      order:order,
      osa:osa,
      activity:activity
    },
    success:function(data){
      if(data.status==1){
        sweetMessage('Precaucion',data.message,'warning');
        return false;
      }
      if(data.status==0){
        let line = '<tr><td><div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">\
          <a class="updateDx" style="cursor:pointer;" data-toggle="modal" data-target="#dxAction" data-status="1" data-dx = "'+data.id_ciepcte+'"><i class="icon-2x flaticon-edit text-danger "></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 Mdxrecord" data-toggle="modal" data-target="#dxRecord" data-pcteCie="'+data.id_ciepcte+'">'+data.cieName+'</a>\
                <span class="text-muted font-weight-bold">Actulizado :'+data.fecha+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'+data.codigo_cie+'</span>\
            <!--end::Lable-->\
        </div></td><tr>';
         
         $('#activeDx').append(line);
          toastr.success("Dx agregado con exito");
          $("#addDxModal").modal('hide');
      } 
    },error:function(){
       obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
    }
  })
}

var checkComplePac = function(){
   var pcte = $('#id_pacienteM').val();
  var comple = $("#compList").val();
  $.ajax({
    url:'/Paciente/complementario/Valid/',
    type:'get',
    data:{
      pcte:pcte,
      comple:comple
    },
    success:function(data){
       if(data.status==0) 
        {
          let complementario = $('#compList');
          
          let idcomple = complementario.val();
          let namecomple = $('#compList option:selected').text();
          let posologia = $('#compposologia').val();    
          let meses = $("#compmeses").val();  

          let line='<tr><td><div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">\
          <a class="removeRow" href="#"><i class="icon-2x flaticon2-trash text-danger "></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" name="listnewCompleFormulation[]" data-id="'+idcomple+'" data-pos="'+posologia+'" data-mes="'+meses+'" data-name="'+namecomple+'">'+namecomple+'</a>\
                <span class="text-muted font-weight-bold">'+posologia+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">Formula por <br>'+meses+' Meses</span>\
            <!--end::Lable-->\
        </div></td><tr>';
          $("#newCompleFormulationRecods").append(line);
          $("#newComp").modal('hide');
        }
        
      
      if(data.status==1){
        sweetMessage('Precaucion',data.message,'warning');
        return false;
      }
     
    },error:function(data){
      obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
    }
  })
}

var checkMedPac = function(){
  var pcte = $('#id_pacienteM').val();
  var med = $("#medList").val();
  $.ajax({
    url:'/Paciente/med/Valid/',
    type:'get',
    data:{
      pcte:pcte,
      med:med
    },
    success:function(data){
       if(data.status==0) 
        {
          let medicamento = $('#medList');
          
          let idmed = medicamento.val();
          let namemed = $('#medList option:selected').text();
          let posologia = $('#posologia').val();    
          let meses = $("#meses").val();  

          let line='<tr><td><div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">\
          <a class="removeRow" href="#"><i class="icon-2x flaticon2-trash text-danger "></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" name="listnewFormulation[]" data-id="'+idmed+'" data-pos="'+posologia+'" data-mes="'+meses+'" data-name="'+namemed+'">'+namemed+'</a>\
                <span class="text-muted font-weight-bold">'+posologia+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">Formula por <br>'+meses+' Meses</span>\
            <!--end::Lable-->\
        </div></td><tr>';
          $("#newFormulationRecods").append(line);
          $("#newMed").modal('hide');
        }
        
      
      if(data.status==1){
        sweetMessage('Precaucion',data.message,'warning');
        return false;
      }
     
    },error:function(data){
      obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
    }
  })
}

var checkNutPac = function(){
  var pcte = $('#id_pacienteM').val();
  var nut = $("#nutList").val();
  $.ajax({
    url:'/Paciente/nut/Valid/',
    type:'get',
    data:{
      pcte:pcte,
      nut:nut
    },
    success:function(data){
       if(data.status==0) 
        {
          let nutricion = $('#nutList');
          
          let idmed = nutricion.val();
          let namemed = $('#nutList option:selected').text();
          let posologia = $('#nutposologia').val();    
          let meses = $("#nutmeses").val();  

          let line='<tr><td><div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">\
          <a class="removeRow" href="#"><i class="icon-2x flaticon2-trash text-danger "></i>&nbsp;</a>\
            <!--begin::Title-->\
            <div class="d-flex flex-column flex-grow-1 mr-2">\
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" name="listnewNutFormulation[]" data-id="'+idmed+'" data-pos="'+posologia+'" data-mes="'+meses+'" data-name="'+namemed+'">'+namemed+'</a>\
                <span class="text-muted font-weight-bold">'+posologia+'</span>\
            </div>\
            <!--end::Title-->\
            <!--begin::Lable-->\
            <span class="font-weight-bolder text-primary py-1 font-size-lg">Formula por <br>'+meses+' Meses</span>\
            <!--end::Lable-->\
        </div></td><tr>';
          $("#newNutFormulationRecods").append(line);
          $("#newNut").modal('hide');
        }
        
      
      if(data.status==1){
        sweetMessage('Precaucion',data.message,'warning');
        return false;
      }
     
    },error:function(data){
      obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
    }
  })
}

var DxEvent = function(dx){
   var form=$("#DxEventForm")[0];
 

        var formData= new FormData(form);
        var pcte = $('#id_pacienteM').val();
       
        var osa=$("#id_orden_servicio").val();
        var order =$("#id_orden_trabajo").val();
        var activity= $("#id_actividad_servicio").val();
        formData.append('pcte',pcte);
        formData.append('dx',dx);
        formData.append('osa',osa);
        formData.append('order',order);
        formData.append('activity',activity);
  $.ajax({
        url:'/ClinicRecordDx/Evento',
        type:'post',
        data:formData,
        processData: false,
        contentType: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(data){
           sweetMessage('Registro Exitoso',data.message,'success');
           $("#dxAction").modal('hide');
           $("#dx").modal('hide');
        },error:function(data){
          obj = JSON.parse(data.responseText);
                 console.log(obj);
                  sweetMessage('Error al guardar',obj.message,'error');
        }
      })
}
/*
 var substringMatcher = function substringMatcher(strs) {
      return function findMatches(q, cb) {
        var matches, substringRegex; // an array that will be populated with substring matches

        matches = []; // regex used to determine if a string contains the substring `q`

        substrRegex = new RegExp(q, 'i'); // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array

        $.each(strs, function (i, str) {
          if (substrRegex.test(str)) {
            matches.push(str);
          }
        });
        cb(matches);
      };
    };



*/