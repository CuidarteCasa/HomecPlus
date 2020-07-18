<div class="card-header border-0">
        <h3 class="card-title font-weight-bolder text-success" >{{$nombreactividad}}</h3>
        <div class="card-toolbar">
            <div class="dropdown dropdown-inline">
                <a href="#" class="btn btn-clean btn-hover-success btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-ver text-success"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                    <!--begin::Naviigation-->
<ul class="navi">
    <li class="navi-header font-weight-bold py-5">
        <span class="font-size-lg">Profesionales</span>
        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
    </li>
    <li class="navi-separator mb-3 opacity-70"></li>
    @if(\Auth::user()->id == $activity->realizada_by and $osa->orden_de_trabajo->id_estado==1)
    <li class="navi-item">
        <a href="#" class="navi-link" data-toggle="modal" data-target="#disclaimer" data-activity="{{$activity->id}}" data-order="{{$osa->id_orden_trabajo}}" id="disclaimerBarTool" data-table="{{$table}}">
            <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
            <span class="navi-text">Nota aclaratoria</span>
        </a>
    </li>
    @endif
    
    <li class="navi-separator mt-3 opacity-70"></li>

     <li class="navi-header font-weight-bold py-5">
        <span class="font-size-lg">Homecare</span>
        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
    </li>
    <li class="navi-separator mb-3 opacity-70"></li>
    @if(\Auth::user()->_planta == 1 )
    <li class="navi-item">
        <a href="#" class="navi-link" data-toggle="modal" data-target="#auditModal" data-activity="{{$activity->id}}" data-order="{{$osa->id_orden_trabajo}}" id="auditBarTool">
            <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
            <span class="navi-text">Auditoria</span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link" id="barSegTel" data-toggle="modal" data-target="#SegTel" data-activity="{{$activity->id}}" data-order="{{$osa->id_orden_trabajo}}" data-pcte="{{$osa->orden_de_trabajo->id_paciente}}">
            <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
            <span class="navi-text">Seguimiento telefonico</span>
        </a>
    </li>
    @if($osa->id_servicio==1001)
    <li class="navi-item">
        <a href="/OrdendeTrabajo/{{$osa->id_orden_trabajo}}" class="navi-link" target="_blank" >
            <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>
            <span class="navi-text">Ordenamientos</span>
        </a>
    </li>
    @endif
    <li class="navi-item">
        <a href="#" class="navi-link clinicRegisterPrint" data-activityName="{{$nombreactividad}}" data-format="{{$format}}" data-order="{{$osa->id_orden_trabajo}}" data-service="{{$osa->id}}" data-activity="{{$activity->id}}" data-table="{{$table}}">
            <span class="navi-icon"><i class="flaticon2-print"></i></span>
            <span class="navi-text">Imprimir</span>
        </a>
    </li>
    @endif
    
</ul>
<!--end::Naviigation-->
                </div>
            </div>
        </div>
    </div>