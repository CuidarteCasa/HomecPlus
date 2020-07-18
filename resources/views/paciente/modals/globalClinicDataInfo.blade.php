



<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Registros Clinico</h5>
                <button type="button" class="close closethismodal" data-modalName="serviceModal"   aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <div class="card card-custom gutter-b">
           
            <div class="card-body">
               

                    
                    <div class="example-preview">
                        <div class="row">
                            <div class="col-3">
                                <ul class="nav flex-column nav-pills activityregistersNames" >
                                    
                                    
                                </ul>
                            </div>
                            <div class="col-9 clinicRegisterModalBody bg-light" >
                                
                            </div>
                        </div>
                    </div>
                   
          
            </div>
        </div>
            </div>
           
        </div>
    </div>
</div>



 

<div class="modal fade" id="SavedRegistersModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Historial clinico del pacientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body col-12 clinicRegisterModalBody bg-light">
               
            </div>
            
           
        </div>
    </div>
</div>
<div class="modal fade" id="History" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Historial clinico del paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-tabs"  role="tablist">
  <li class="nav-item">
    <a class="nav-link active"  data-toggle="tab" href="#MedicoHistory" role="tab"  aria-selected="true">Historial Medico</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#OtherHistory" role="tab"  aria-selected="false">Otros</a>
  </li>
  
</ul>
<div class="tab-content" >
  <div class="tab-pane fade show active" id="MedicoHistory" role="tabpanel" >
    <div class="col-xl-12">
        <!--begin::List Widget 11-->
<div class="card card-custom card-stretch gutter-b">
    

    <!--begin::Body-->
    <div class="card-body pt-0" >
        <br>
        <div class="row">
          <div class="col-3" id="ResultMedicoHistory">
                               
                            </div>
                            <div class="col-9 clinicRegisterModalBody bg-light" >
                                
                            </div>
        </div>
         
    </div>
    <!--end::Body-->
</div>
<!--end::List Widget 11-->
    </div>
  </div>
  <div class="tab-pane fade" id="OtherHistory" role="tabpanel" >...</div>
  
</div>
            </div>
            
           
        </div>
    </div>
</div>



<div class="modal fade" id="clinicRegisterModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clinicRegisterModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" id="clinicRegisterModalBody">
                
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="SegTel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seguimiento Telefonico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Descripcion</label>
                    <div class="col-6">
                        <select class="form-control" style="width: 100%" id="typeSeg" >
                            {{\App\Http\Controllers\PagesController::sltStatusSpad()}}
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Anotaciones</label>
                    <div class="col-6">
                        <textarea rows="3" required class="form-control" id="notaSeguimiento"></textarea>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-primary" id="saveSegtel" >Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nota Aclaratoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                   <label class="col-form-label text-right col-lg-3 col-sm-12">Anotacion</label>
                    <div class="col-6">
                        <textarea rows="3" required class="form-control" id="notaAclaratoria"></textarea>
                    </div>
                </div>
               
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-primary" id="SaveDisclaimer" >Guardar</button>
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






<div class="modal fade" id="antecedentesMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Antecedentes</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active"  data-toggle="tab" href="#patologicosTab" role="tab" aria-controls="home" aria-selected="true">Patologicos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#quirurgicosTab" role="tab" aria-controls="profile" aria-selected="false">Quirurgicos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#alergicosTab" role="tab" aria-controls="contact" aria-selected="false">Alergicos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#medicamentosTab" role="tab" aria-controls="contact" aria-selected="false">Medicamentos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#habitosTab" role="tab" aria-controls="contact" aria-selected="false">Habitos</a>
  </li>

  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#toxicosTab" role="tab" aria-controls="contact" aria-selected="false">Toxicos</a>
  </li>

  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#familiaresTab" role="tab" aria-controls="contact" aria-selected="false">Familiares</a>
  </li>

  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#hopitalizacionesTab" role="tab" aria-controls="contact" aria-selected="false">Hospitalizaciones</a>
  </li>
</ul>
<div class="tab-content" >
  <div class="tab-pane fade show active" id="patologicosTab" role="tabpanel" aria-labelledby="home-tab">
        <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelinePat">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>

  </div>
  <div class="tab-pane fade" id="quirurgicosTab" role="tabpanel" aria-labelledby="profile-tab">
      <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelineQuir">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>
  </div>
  <div class="tab-pane fade" id="alergicosTab" role="tabpanel" aria-labelledby="contact-tab">
      <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelineAle">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>
  </div>

  <div class="tab-pane fade " id="medicamentosTab" role="tabpanel" aria-labelledby="home-tab">
      <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelineMed">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>
  </div>
  <div class="tab-pane fade" id="habitosTab" role="tabpanel" aria-labelledby="profile-tab">
       <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelineHab">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>
  </div>
  <div class="tab-pane fade" id="toxicosTab" role="tabpanel" aria-labelledby="contact-tab">
      <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelineTox">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>
  </div>
  <div class="tab-pane fade" id="familiaresTab" role="tabpanel" aria-labelledby="profile-tab">
      <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelineFam">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>
  </div>
  <div class="tab-pane fade" id="hopitalizacionesTab" role="tabpanel" aria-labelledby="contact-tab">
      <div class="card card-custom">
            
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                         <div class="timeline timeline-5 mt-3" id="timelineHos">
                    
                         </div>
                    </div>
                </div>
               
            </div>

            
            
        </div>
  </div>
</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#MnewAnt">Nuevo antecedente</button>

            </div>
            
        </div>
    </div>
</div>

   <div class="modal fade" id="MnewAnt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar un nuevo antecedente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Tipo</label>
                    <div class="col-6">
                        <select class="form-control" id="AntType" >
                            <option value="NoData">Seleccione...</option>
                            <option value="ant_patologicos">Patologico</option>
                            <option value="ant_quirurgicos">Quirugicos</option>
                            <option value="ant_alergicos">Alergicos</option>
                            <option value="ant_medicamentos">Medicamentos</option>
                            <option value="ant_habitos">Habitos</option>
                            <option value="ant_toxicos">Toxicos</option>
                            <option value="ant_familiares">Familiares</option>
                            <option value="ant_hospitalizacion">Hospitalizacion</option>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Informacion</label>
                    <div class="col-6">
                        <textarea class="form-control" rows="2" id="antNewData"></textarea>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNewAnt">Agregar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlpdf" tabindex="-1" role="dialog" style=" overflow-y:scroll;" aria-labelledby="mdlpdf" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document" style="width:100%;height:80%;">

      <div class="modal-content" style="height:900px;">
        <div class="modal-header bg-info">
          
          <h4 class="modal-title text-center"><i>Impresi&oacute;n Registro clinico</i></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
        </div>
        <div class="modal-body">
          <div  id="appPdf"></div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="ClinicStadistisc" tabindex="-1" role="dialog" aria-labelledby="vitalsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vitalsModalLabel">Estadisticas clinicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
             <ul class="nav nav-tabs"  role="tablist">
              <li class="nav-item">
                <a class="nav-link active"  data-toggle="tab" href="#TA" role="tab"  aria-selected="true">Tension arterial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-toggle="tab" href="#FR" role="tab"  aria-selected="false">F. Respiratoria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-toggle="tab" href="#FC" role="tab"  aria-selected="false">F. Cardiaca</a>
            </li>
            <li class="nav-item mnaData">
                <a class="nav-link "   data-toggle="tab" href="#MNA" role="tab"  aria-selected="false">MNA</a>
            </li>
        </ul>
        <div class="tab-content" >
          <div class="tab-pane fade show active" id="TA" role="tabpanel" aria-labelledby="home-tab">
              
            <div class="row">
                <div class="col-xl-12">
                    <div id="TAchart">
                    
                </div>
                </div>
                
            </div>


          </div>
          <div class="tab-pane fade" id="FR" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                <div class="col-xl-12">
                    <div id="FRchart">
                    
                </div>
                </div>
                
            </div>
          </div>
          <div class="tab-pane fade" id="FC" role="tabpanel" aria-labelledby="contact-tab">...</div>
          <div class="tab-pane fade" id="MNA" role="tabpanel" aria-labelledby="contact-tab" >
               <div class="row">
                <div class="col-xl-12">
                    <div id="MNAchart">
                    
                </div>
                </div>
          </div>
      </div>
            </div>
           
        </div>
    </div>
</div>


