$(document).ready(function(){
	
	
	

	$(document).on('click','#sendPreCC',function(){
		var arry=[];
  		var total = $("#totalPreCC").val();
  		var user = $("#Dt_userFees").attr('data-user');
  			$("input[name='fee[]']").each(function(){
    				if($(this).is(':checked')){
        				arry.push($(this).val());
      					}
      			}); 
		$.ajax({
			url:'/User/fees/PreCC/store',
			type:'post',
			data:{
				arry:arry,
				total:total,
				user:user,
			},
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			success:function(data){
				console.log(data);
			}
		})
	})

	$(document).on('click','#loadFees',function(){
		Dt_userFees();
	})

	$(document).on('click','.loadusertabInfo',function(){
		var tab = $(this).attr('data-blade');
		$.ajax({
			url:'/User/page/tab',
			type:'get',
			data:{
				tab:tab
			},
			success:function(data){
				$('#userBodyInfo').empty();
				$('#userBodyInfo').append(data)
			}
		})
	})
})

var Dt_userFees = function(){
	var user = $("#loadFees").attr('data-user');
	
	$("#Dt_userFees").DataTable({
		responsive: true,
		orderable : true,
		lengthMenu : [[-1], ['Todo']],
        destroy : true,
		ajax: {
				url: '/User/fees/data',
				type: 'GET',
				data:{
					user:user
				},
				dataSrc: function (json) {
		    if (!json.data) {
		        return [];
		    } else {
		        return json.data;
		    }}
			},
			columns: [
				{data: 'id'},
		        {data: 'paciente'},
		        {data: 'order'},
		        {data: 'osa'},
		        {data: 'service'},
		        {data: 'activity'},
		        {data: 'fecha'},
		        {data: 'honorario'},
		        {data: 'tipo'}, 
		        {data : 'option'},
		        {data: 'actions'}
			],
                        initComplete: function( settings, json ){
                        	
                        	$("#totalfees").val(json.totalcc);
                        	$("#totalPreCC").val(json.totalfee);
                            
                        }
	})
}

var Dt_Users = function(){
	$("#Dt_Users").DataTable({
		responsive: true,
		orderable : true,
        destroy : true,
		ajax: {
				url: '/Users',
				type: 'GET',
				
			},
			columns: [
				{data: 'id'},
				{data: 'name'},
				{data: 'identificacion'},
				{data: 'action'}
			]
	})
}