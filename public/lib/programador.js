
$(document).ready(function(){

//switch styel
$('[data-switch=true]').bootstrapSwitch();

activeOrders();

var vr=0;
var sgmtT = 0;
var sgmtM = 0;




$(document).on("click","#seguimientoTerapyTool",function(){
  let type = $(this).attr('data-type');
  Dt_serviceWTOseguimiento(type);
})
//AUDT TOOL
$(document).on("click","#auditTool",function(){
  let type = $(this).attr('data-type');
  Dt_serviceWTOaudit(type);
})

  
//FIN AUDIT TOOL
$(document).on("click","#seguimientoPrfTool",function(){
  if (vr==0){
    Kt_PrfSeguimiento();
    vr=1;
  } 
  
})


});


var Dt_serviceWTOaudit = function(type){
 $("#Dt_serviceWTOaudit").DataTable({
    responsive: true,
    orderable : true,
    destroy : true,
    ajax: {
        url: '/Programmer/serviceWTOaudit',
        type: 'get',
        data:{type:type},
        dataSrc: function (json) {
        if (!json.data) {
            return [];
        } else {
            return json.data;
        }}

      },
      columns: [
        {data: 'activity'},
        {data: 'prf'},
        {data: 'pcte'},
        {data: 'action'}
      ],
 })
}



var Dt_serviceWTOseguimiento = function(type){

  $("#Dt_serviceWTOseguimiento").DataTable({
    responsive: true,
    orderable : true,
    destroy : true,
    ajax: {
        url: '/Programmer/serviceWTOseguimiento',
        type: 'get',
        data:{type:type},
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
        {data: 'servicio'},
        {data: 'fecha'},
        {data: 'telefono'},
        {data: 'action'},
      
      ],
  })
}

var Kt_PrfSeguimiento = function(){
  $("#Kt_PrfSeguimiento").KTDatatable({
      data:{
        type:'remote',
        source:{
          read:{
            url:'/Programmer/UserTracing',
            method:'GET'
          }
        }
      },
      layout:{
        scroll:'true',
        footer:false,
      },
      sortable:true,
      pagination:true,
      detail:{
        title:'Pacientes',
        content:subTablePrfPcte
      },
      search:{
        input:$("#kt_datatable_search_query_prf"),
        key:'generalSearch'
      },
      columns:[
        {
          field:'prfId',
          title:'',
          sortable:false,
          textAlign:'center',
          width:5
        },
        {
          field:'prf',
          title:'Profesional',
          sortable:true,
          textAlign:'center',
          width:120
        },
        {
          field:'profiles',
          title:'Servicios',
          sortable:true,
          textAlign:'center',
          width:150
        },
        {
          field:'location',
          title:'Servicios',
          sortable:true,
          textAlign:'center',
          width:100
        },
        {
          field:'progress',
          title:'Progreso',
          sortable:true,
          textAlign:'center',
          width:60
        }
      ]
  });
}

var activeOrders = function(){
  $('#Kt_activeOrders').KTDatatable({
      data:{
        type:'remote',
        source:{
          read:{
            url:'/Programmer/activeOrders',
            method: 'GET'
          }
        }
      },
      // layout definition
      layout: {
        scroll: true,
        footer: false,
        
      },
      // column sorting
      sortable: true,
      pagination: true,
      detail: {
        title: 'Informacion Detallada',
        content: subTableInit
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch'
      },
      columns:[{
        field:'orderID',
        title:'',
        sortable:false,
        textAlign:'center',
        width:10,
        
      },
      {
        field:'order',
        title:'Orden',
        sortable:true,
        textAlign:'center',
        width:60
      },
      {
        field:'pacienteName',
        title:'Paciente',
        sortable:false,
        textAlign:'center',
        width:150
      },
      {
        field:'pacienteSede',
        title:'Ciudad',
        sortable:false,
        textAlign:'center',
        width:100
      },
      {
        field:'pacienteEps',
        title:'Eps',
        sortable:false,
        textAlign:'center',
        width:100
      },
      {
        field:'orderDesde',
        title:'Desde',
        sortable:true,
        textAlign:'center',
        width:100
      },
      {
        field:'orderHasta',
        title:'Hasta',
        sortable:true,
        textAlign:'center',
        width:50
      },
      {
        field:'alert',
        title:'<i class="icon-2x text-dark-50 flaticon-warning-sign"></i>',
        sortable:true,
        textAlign:'center',
        width:50
      }
      ,
      {
        field:'packageName',
        title:'Paquete',
        sortable:false,
        width:250,
        responsive: {
          visible: 'md',
          hidden: 'lg'
        }
      },
      {
        field:'resume',
        title:'Progreso',
        sortable:true,
        textAlign:'center',
        width:80
      },
      {
        field:'action',
        title:'',
        sortable:false,
        textAlign:'center',
        width:40
      }
      ]
  })
}

function subTablePrfPcte(e){
  $('<div/>').attr('id', 'child_data_ajax_' + e.data.prfId).appendTo(e.detailCell).KTDatatable({
        data: {
          type: 'remote',
          source: {
            read: {
              url:'/User/ActiveOrders/'+e.data.prfId,
              method:'GET'
            }
          },
         
        },
        // layout definition
        layout: {
          scroll: false,
          footer: false,
          class:'table table-striped',
          // enable/disable datatable spinner.
          spinner: {
            type: 1,
            theme: 'default'
          }
        },
        sortable: true,
        // columns definition
        columns: [{
          field: 'order',
          title: ' <strong>ORDEN</strong>',
          sortable: false,
          width: 50,
          textAlign:'center'
        },
        {
          field:'name',
          title:'<strong>PACIENTE</strong>',
          sortable: false,
          width: 150,
          textAlign:'center'  
        },
        {
          field:'service',
          title:'<strong>SERVICIO</strong>',
          sortable: false,
          width: 90,
          textAlign:'center'  
        }
        ,
        {
          field:'numservicesAsigned',
          title:'<strong>ASIG</strong>',
          sortable: false,
          width: 40,
          textAlign:'center'  
        },
        {
          field:'realized',
          title:'<strong>REAL</strong>',
          sortable: false,
          width: 40,
          textAlign:'center'  
        },
        {
          field:'pending',
          title:'<strong>PEND</strong>',
          sortable: false,
          width: 40,
          textAlign:'center'  
        },
        {
          field:'progress',
          title:'<strong>PROGRESO</strong>',
          sortable: false,
          width: 100,
          textAlign:'center'  
        }
        ]
      });
}

function subTableInit(e) {
      $('<div/>').attr('id', 'child_data_ajax_' + e.data.orderID).appendTo(e.detailCell).KTDatatable({
        data: {
          type: 'remote',
          source: {
            read: {
              url:'/Programmer/Order/'+e.data.orderID,
              method:'GET'
            }
          },
         
        },
        // layout definition
        layout: {
          scroll: false,
          footer: false,
          class:'table table-striped',
          // enable/disable datatable spinner.
          spinner: {
            type: 1,
            theme: 'default'
          }
        },
        sortable: true,
        // columns definition
        columns: [{
          field: 'id',
          title: ' <strong>OSA</strong>',
          sortable: false,
          width: 40,
          textAlign:'center'
        },
        {
          field:'service',
          title:'<strong>SERVICIO</strong>',
          sortable: false,
          width: 100,
          textAlign:'center'  
        },
        {
          field:'prf',
          title:'<strong>PROFESIONAL</strong>',
          sortable: false,
          width: 150,
           textAlign:'center'
        },
        {
          field:'numAct',
          title:'<strong>ASIG.</strong>',
          sortable: false,
          width: 40,
            textAlign:'center'
        },
        {
          field:'numActDoIt',
          title:'<strong>REAL.</strong>',
          sortable: false,
          width: 40,
            textAlign:'center'
        },
        {
          field:'pending',
          title:'<strong>PEND</strong>',
          sortable: false,
          width: 40,
            textAlign:'center'
        }
        ,
         {
          field:'progress',
          title:'',
          sortable: false,
          width: 70,
            textAlign:'center'
        },
         {
          field:'action',
          title:'',
          sortable: false,
          width: 70,
            textAlign:'center'
        }
        ]
      });
    }