"use strict";
// Class definition
var Dt_Pacientes = function(){
	$("#Dt_Pacientes").DataTable({
		responsive: true,
		orderable : true,
        destroy : true,
		ajax: {
				url: '/Dt_pacientes',
				type: 'get',
			},
			columns: [
				
				{data: 'id'},
				{data: 'name'},
				{data: 'identificacion'},
				{data: 'tag'},
				{data: 'direccion'},
				{data: 'departamento'},
				{data: 'municipio'},
				{data: 'barrio'},
				{data: 'phone'},
				{data: 'status'},
			],
	})
}

var Dt_actividades = function(){
	var pcte = $("#Dt_actividades").attr('data-pcte');
	$("#Dt_actividades").DataTable({
		responsive: true,
		orderable : true,
        destroy : true,
		ajax: {
				url: '/User/M/Activities',
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
				
				{data: 'osa'},
				{data: 'activity'},
				{data: 'service'},
				{data: 'action'}
				
				
			],
	})
}



jQuery(document).ready(function() {
	Dt_actividades()
	Dt_Pacientes()

	//CRWCION DE ORDENDES DE TRABAJO

	$(document).on('click','#createNewOrder',function(){
		let pcte = $(this).attr('data-pcte');
		SelectMl('/Active/Package/'+pcte,'#activePackage',"Seleccione..");
	})

	$(document).on('change','#activePackage',function(){
		let pkte = $(this).val();
		$.ajax({
			url:'/Package/services',
			type:'get',
	        data:{
	          pkte:pkte
	        },
	        success:function(data){
	        	$.each(data,function(i,item){
	        		let line = '<option value="'+item.id+'">'+item.tag+'</option>';
	        		$("#servicesAvaliable").append(line);
	        	});
	        },error:function(data){

	        }
		})
	})

	$('.firstDosis').datetimepicker({
      todayHighlight: true,
      autoclose: true,
      format: 'yyyy/mm/dd hh:ii',
      startDate: '-3d',
      endDate:'+0d',
    });

	$(document).on('change','#servicesAvaliable',function(){

		
		let id =$(this).val() 
		let textSelect = $( "#servicesAvaliable option:selected" ).text();
		var line = '<tr><td>'+textSelect+'</td><td><input type="number" class="form-control"></td><td><textarea rows="2" class="form-control"></textarea></td> </tr>';
		
		if(id==4001 || id==4002 || id==4003 || id==4004){
			let frecuency = 0
			if(id==4001)frecuency=1;
			if(id==4002)frecuency=2;
			if(id==4003)frecuency=3;
			if(id==4004)frecuency=4;

			$("#dosisPosologia").modal('show');
			$("#frecuency").val(frecuency);
		}
		
		$("#tableservicesInfo").append(line);
	})	

	$(document).on('click','#makeDosisForm',function(){
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
		                <a style="cursor:pointer;" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1" >informacion</a>\
		                <a ><span class="text-muted font-weight-bold">Editar</span></a>\
		            </div>\
		            <!--end::Title-->\
		        </div>';
		 $("#DosisList").append(line);       
	})

	$(document).on('change','#lastDayDosis',function(){
		
	})

	//FIN D CREACION DE ORDEES

	$(document).on('click','.registerPdfMake',function(){
		var tableName = $(this).attr('data-table');
		var activity = $(this).attr('data-activity');
		var registerName = $(this).attr('data-registerName');

		var typedisplay="application/pdf";
		
  		var url='/ClinicRecordPrint?tableName='+tableName+'&&activity='+activity+'&&registerName='+registerName;
   		var xhr = new XMLHttpRequest();
              xhr.open('GET', url, true);
              xhr.responseType = 'arraybuffer';
              xhr.onload = function(e) {
                 if (this.status == 200) {

                    var blob=new Blob([this.response], {type:typedisplay});
                    var fileURL = URL.createObjectURL(blob);
                    window.open(fileURL);
                   
                 }
              };
          xhr.send();


		
	})










	$(document).on('click','.medicalCare',function(){
		var service = $(this).attr('data-service');
		var order = $(this).attr('data-order');
		var activity = $(this).attr('data-activity');
		window.location.href="/ClinicRecordEvolution/"+order+"/"+service+"/"+activity;
	})
});






