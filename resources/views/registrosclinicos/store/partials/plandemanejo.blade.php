<div class="row">
   	<div class="col-lg-6">

    <div class="card card-custom  card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">
        <h3 class="card-title font-weight-bolder text-dark">Plan de manejo actual</h3>
        
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">
        <p></p>
            
        {{\App\Http\Controllers\PacienteController::activeOrders($paciente->id)}}
        
    </div>

    <!--end: Card Body-->
    </div>
       

       
       
    </div>
    <div class="col-lg-6">
          <div class="card card-custom bg-light-info">
            <div class="card-header border-0">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-chat-1 text-black"></i>
                    </span>
                    <h3 class="card-label text-black">
                        Nuevo plan de manejo
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a  class="btn btn-sm btn-white savenewplan" data-table="{{$tag_blade}}">
                        <i class="flaticon2-cube"></i> Guardar plan de manejo
                    </a>
                </div>
            </div>
            <div class="separator separator-solid separator-white opacity-20"></div>
            <div class="card-body text-white newplan">
                
            </div>
        </div>

       
    </div>
</div>