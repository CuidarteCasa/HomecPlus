$(document).ready(function(){
	Dt_copay();
})

var Dt_copay = function(){
	$("#Dt_copay").DataTable({
		responsive: true,
		orderable : true,
        destroy : true,
		ajax: {
				url: '/accounting/copay/data',
				type: 'get',
			},
			columns: [
				
				{data: 'order'},
				{data: 'paciente'},
				{data: 'identificacion'},
				{data: 'telefonos'},
				{data: 'valor'},
				{data: 'action'}
			],
	})
}