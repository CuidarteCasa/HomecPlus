
<div class="modal fade" id="formulations" tabindex="-1" role="dialog" aria-labelledby="formulationsModalLabel" aria-hidden="true">
    <input type="hidden" id="id_pacienteM" value="{{$paciente->id}}">
          <input type="hidden" id="id_orden_trabajo" value="{{$order->id}}">
        <input type="hidden" id="id_profesional" value="{{$osa->id_profesional_asignado}}">
        <input type="hidden" id="id_orden_servicio" value="{{$osa->id}}">

        <input type="hidden" id="id_actividad_servicio" value="{{$activity->id}}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formulationsModalLabel">Formulaciones </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="medicamentos-tab" data-toggle="tab" href="#medicamentos" role="tab" aria-controls="medicamentos" aria-selected="true">Medicamentos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="nutricion-tab" data-toggle="tab" href="#nutricion" role="tab" aria-controls="nutricion" aria-selected="false">Nutricion</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="complementarios-tab" data-toggle="tab" href="#complementarios" role="tab" aria-controls="complementarios" aria-selected="false">Complementarios</a>
  </li>
  
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="medicamentos" role="tabpanel" aria-labelledby="medicamentos-tab">
      <div class="row">
          <div class="col-xl-6">
              <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="card-title font-weight-bolder text-dark">
            <span class="card-icon">
                        <i class="flaticon2-chat-1 text-primary"></i>
                    </span>
            <h3 class="card-label">
                        Nueva formulacion
                        
                    </h3>        
        </div>
        <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-success font-weight-bold" data-toggle="modal" data-target="#newMed" id="ModaladdNewMed">
                        <i class="flaticon2-cube"></i> Agregar 
                    </a>
                </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    
        
    <div class="card-body pt-0">
        <!--begin::Item-->
        <div class="card-scroll" style="height: 300px;" >

                <table class="table" id="newFormulationRecods">
                    
                </table>
        </div>   
        <!--end::Item-->

        

       
    </div>
    <!--end::Body-->
    
        
</div>
          </div>

          <div class="col-xl-6">
              <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="card-header border-0">
        <div class="card-title font-weight-bolder text-dark">
            <span class="card-icon">
                        <i class="flaticon2-chat-1 text-primary"></i>
                    </span>
            <h3 class="card-label">
                        Historial
                        
                    </h3>        
        </div>
        
    </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">
        <div class="card-scroll" style="height: 300px;">
            <table class="table" id="DrugHistory">
                
            </table>
            
        </div>
        
        
        

        

       
    </div>
    <!--end::Body-->
</div>
          </div>
      </div>
  </div>
  <div class="tab-pane" id="nutricion" role="tabpanel" aria-labelledby="nutricion-tab">
      <div class="row">
        @if(\Auth::user()->perfiles->first()->slug == "nutricionista")
          <div class="col-xl-6">
              <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">

        <div class="card-title font-weight-bolder text-dark">
            <span class="card-icon">
                        <i class="flaticon2-chat-1 text-primary"></i>
                    </span>
            <h3 class="card-label">
                        Nueva formulacion
                        
                    </h3>        
        </div>
        
        <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-success font-weight-bold" data-toggle="modal" data-target="#newNut" id="ModaladdNewNut">
                        <i class="flaticon2-cube"></i> Agregar 
                    </a>
                </div>
                
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">
        <!--begin::Item-->
        
         <div class="card-scroll" style="height: 300px;" >

                <table class="table" id="newNutFormulationRecods">
                    
                </table>
        </div>   
        <!--end::Item-->
        
        

       
    </div>
    <!--end::Body-->
   
        
</div>
          </div>
@endif
          <div class="col-xl-6">
              <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="card-header border-0">
        <div class="card-title font-weight-bolder text-dark">
            <span class="card-icon">
                        <i class="flaticon2-chat-1 text-primary"></i>
                    </span>
            <h3 class="card-label">
                        Historial
                        
                    </h3>        
        </div>
        
    </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">
        <div class="card-scroll" style="height: 300px;">
            <!--begin::Item-->
       
        <!--end::Item-->
        </div>
        
        
        

        

       
    </div>
    <!--end::Body-->
</div>
          </div>
      </div>
  </div>
  <div class="tab-pane" id="complementarios" role="tabpanel" aria-labelledby="complementarios-tab">
      <div class="row">
          <div class="col-xl-6">
              <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="card-title font-weight-bolder text-dark">
            <span class="card-icon">
                        <i class="flaticon2-chat-1 text-primary"></i>
                    </span>
            <h3 class="card-label">
                        Nueva formulacion
                        
                    </h3>        
        </div>
        <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-success font-weight-bold" data-toggle="modal" data-target="#newComp" id="ModaladdNewComp">
                        <i class="flaticon-edit"></i> Agregar 
                    </a>
                </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">
        <!--begin::Item-->
         <div class="card-scroll" style="height: 300px;" >

                <table class="table" id="newCompleFormulationRecods">
                    
                </table>
        </div>  
        <!--end::Item-->

        

       
    </div>
    <!--end::Body-->
</div>
          </div>

          <div class="col-xl-6">
              <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="card-header border-0">
        <div class="card-title font-weight-bolder text-dark">
            <span class="card-icon">
                        <i class="flaticon2-chat-1 text-primary"></i>
                    </span>
            <h3 class="card-label">
                        Historial
                        
                    </h3>        
        </div>
        
    </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">
        <div class="card-scroll" style="height: 300px;">
            <!--begin::Item-->
           <table class="table" id="CompleHistory">
                
            </table>
        <!--end::Item-->
        </div>
        
        
        

        

       
    </div>
    <!--end::Body-->
</div>
          </div>
      </div>
  </div>
 
</div>
            </div>
            <div class="modal-footer">
                                        
           <button type="button" class="btn btn-success btn-lg btn-block" id="saveAllFormulation">Guardar formulacion</button>
 </div>
           
        </div>
    </div>
</div>




<div class="modal fade" id="newMed" tabindex="-1" role="dialog" aria-labelledby="newMedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMedModalLabel">Nuevo medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalMedicamentos">

                    <input type="hidden" name="id_orden_servicio" value="{{$osa->id}}">
      
               <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Medicamentos</label>
                    <div class="col-6">
                        <select class="form-control" style="width: 100%" id="medList" name="medList">
                            <option value="0">Seleccione..</option>
                        </select>
                    </div>
                    
                </div>
             <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Posologia</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="posologia" id="posologia">
                    </div>
                    
                </div>   
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Meses formulados</label>
                    <div class="col-6">
                        <select class="form-control" name="" id="meses">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="12">12</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    
                    <div class="col-6 text-center">
                       <button type="button" id="addMed" class="btn btn-success">Agregar</button>
                    </div>
                    
                </div>
        </form>
                
            </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="newNut" tabindex="-1" role="dialog" aria-labelledby="newNutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Nueva Nutricion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalNutricion">

                    
      
               <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Nutricion</label>
                    <div class="col-6">
                        <select class="form-control" style="width: 100%" id="nutList" name="nutList">
                            <option value="0">Seleccione..</option>
                        </select>
                    </div>
                    
                </div>
             <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Posologia</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="nutposologia" id="nutposologia">
                    </div>
                    
                </div>   
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Meses formulados</label>
                    <div class="col-6">
                        <select class="form-control" name="" id="nutmeses">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="12">12</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    
                    <div class="col-6 text-center">
                       <button type="button" id="addNut" class="btn btn-success">Agregar</button>
                    </div>
                    
                </div>
        </form>
                
            </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="newComp" tabindex="-1" role="dialog" aria-labelledby="newMedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Nuevo Complementario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalComplementario">

                   
               <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Complementario</label>
                    <div class="col-6">
                        <select class="form-control" style="width: 100%" id="compList" name="compList">
                            <option value="0">Seleccione..</option>
                        </select>
                    </div>
                    
                </div>
             <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Modo de uso</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="compposologia" id="compposologia">
                    </div>
                    
                </div>   
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Meses formulados</label>
                    <div class="col-6">
                        <select class="form-control" name="" id="compmeses">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="12">12</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    
                    <div class="col-6 text-center">
                       <button type="button" id="addComp" class="btn btn-success">Agregar</button>
                    </div>
                    
                </div>
        </form>
                
            </div>
           
        </div>
    </div>
</div>


<!-- DIAGNOSTICOS -->


<div class="modal fade" id="dx" tabindex="-1" role="dialog" aria-labelledby="dxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Dianosticos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <a href="#" class="btn btn-light-primary font-weight-bold" id="DxResume" data-toggle="modal" data-target="#DxResumeModal">Dx Resume</a>
                        
                    </div>
                       
                    
                </div><br>
                <div class="row">
               <div class="col-xl-6">
        <!--begin::List Widget 11-->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">

        <h3 class="card-title font-weight-bolder text-dark">ACTIVOS</h3>
        <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-success font-weight-bold" id="addDxTool" data-toggle="modal" data-target="#addDxModal">
                        <i class="flaticon2-plus"></i> Agregar
                    </a>
                </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0 ">
        <div data-scroll="true" data-height="500">
                    <table class="table" id="activeDx">
           
                    </table>
                </div>
       
    </div>
    <!--end::Body-->
</div>
<!--end::List Widget 11-->
    </div>
<div class="col-xl-6">
        <!--begin::List Widget 11-->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0">
        <h3 class="card-title font-weight-bolder text-dark">HISTORICO</h3>
        
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">

      <table class="table" id="InactiveDx">
           
       </table>

      
    </div>
    <!--end::Body-->
</div>
<!--end::List Widget 11-->
    </div>
</div>
            </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="DxResumeModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Dx Resumen</h5>
                
            </div>
            <div class="modal-body">
                <table class="table" >
                    <tbody id="DxResumeTable">
                        
                    </tbody>
                </table>
            </div>
            
           
        </div>
    </div>
</div>

<div class="modal fade" id="addDxModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Diagnosticos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

                <form id="NewDxForm">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Cie-10</label>
                    <div class="col-6">
                        <select class="form-control" style="width: 100%" id="cie10" name="cie10">
                            <option value="0">Seleccione...</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Observacion</label>
                    <div class="col-6">
                        <textarea rows="2" class="form-control" name="newDxobs" id="newDxobs"></textarea> 
                        
                    </div>
                    
                </div>
                <div class="form-group row">
                <label class="col-form-label text-right col-lg-3 col-sm-12">Fecha</label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <div class="input-group date">
                        <input type="text" class="form-control kt_datepicker_3" readonly="" id="newdxDate"  name="newdxDate">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <span class="form-text text-muted">Registre la fecha del evento</span>
                </div>



            </div>
            <div class="form-group row">
                <button type="button" class="btn btn-success btn-lg btn-block" id="saveNewDx" >Guardar</button>
            </div>
            </form>


                
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="dxAction" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Evento del diagnostico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="DxEventForm">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Evento</label>
                    <div class="col-6">
                        <select class="form-control" name="eventoDx" id="eventoDx">
                            <option value="0">Seleccione...</option>
                            <option value="1">Activar</option>
                            <option value="2">Inactivar</option>
                            <option value="3">Evento</option>
                        </select> 
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Observacion</label>
                    <div class="col-6">
                        <textarea rows="2" class="form-control" name="eventoDxobs" id="eventoDxobs"></textarea> 
                        
                    </div>
                    
                </div>
                <div class="form-group row">
                <label class="col-form-label text-right col-lg-3 col-sm-12">Fecha</label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <div class="input-group date">
                        <input type="text" class="form-control kt_datepicker_3" readonly=""  name="dxDate">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="la la-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <span class="form-text text-muted">Registre la fecha del evento</span>
                </div>



            </div>
            <div class="form-group row">
                <button type="button" class="btn btn-success btn-lg btn-block" id="saveEventDx">Guardar</button>
            </div>
            </form>
            </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="dxRecord" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Historico del diagnostico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-custom card-stretch gutter-b">
    

    <!--begin::Body-->
    <div class="card-body pt-4">
        <div class="timeline timeline-5 mt-3" id="DxHistoryRecords">


            
        </div>
        <!--end: Items-->
    </div>
    <!--end: Card Body-->
</div>
            </div>
           
        </div>
    </div>
</div>

<!--END DIAGNOSTICOS-->

<!-- MEDICAMENTOS-->

<div class="modal fade" id="medRefresh" tabindex="-1" role="dialog" aria-labelledby="newMedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Actulizar formula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="modalmedRefresh">

                   
               
             <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Posologia</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="medRefreshposologia" id="medRefreshposologia">
                    </div>
                    
                </div>   
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Meses formulados</label>
                    <div class="col-6">
                        <select class="form-control" name="" id="medRefreshmeses">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="12">12</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    
                    <div class="col-6 text-center">
                       <button type="button" id="savemedRefresh" class="btn btn-success">Agregar</button>
                    </div>
                    
                </div>
        </form>
                
            </div>
           
        </div>
    </div>
</div>

<!--END MEDICAMENTOS-->