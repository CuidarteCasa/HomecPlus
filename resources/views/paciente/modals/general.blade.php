
<div class="modal fade" id="quickNote" tabindex="-1" role="dialog" aria-labelledby="quickNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickNoteModalLabel">Grabando Nota Medica</h5>
                
            </div>
            <div class="modal-body">
                <center><div class="spinner-border text-success" role="status">
  <span class="sr-only">Grabando...</span>
</div></center><br>
                <center><button class="btn btn-danger" id="btnStop">Stop</button></center>
            </div>
            
           
        </div>
    </div>
</div>


<div class="modal fade" id="unResolvedModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Actividades pendientes de correcion</h5>
                
            </div>
            <div class="modal-body " id="unResolvedBody">
                
            </div>
            
           
        </div>
    </div>
</div>


<div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activityModalLabel">Registros Clinico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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


<!-- CREACION DE ORDENES DE TRABAJO -->
<div class="modal fade" id="NewOrder" data-backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" >Nueva orden de trabajo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-custom example example-compact">
                      <div class="card-header">
                        <h3 class="card-title">Form Label Aligment</h3>
                        <div class="card-toolbar">
                          <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
                          </div>
                        </div>
                      </div>
                      <!--begin::Form-->
                      <form class="form">
                        <div class="card-body">
                          <h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Customer Info:</h3>
                          <div class="mb-15">
                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label text-right">Full Name:</label>
                              <div class="col-lg-6">
                                <select class="form-control" style="width: 100%" id="activePackage" name="activePackage"><option value="0">Seleccione..</option></select>
                               
                                <span class="form-text text-muted">Please enter your full name</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label text-right">Email address:</label>
                              <div class="col-lg-6">
                                <input type="email" class="form-control" placeholder="Enter email">
                                <span class="form-text text-muted">We'll never share your email with anyone else</span>
                              </div>
                            </div>
                          </div>
                          <h3 class="font-size-lg text-dark font-weight-bold mb-6">2. Customer Account:</h3>
                          <div class="mb-3">
                            <div class="form-group row">
                              <label class="col-lg-3 col-form-label text-right">Holder:</label>
                              <div class="col-lg-6">
                                <select class="form-control" style="width: 100%" id="servicesAvaliable" ><option value="0">Seleccione..</option></select>
                               
                                <span class="form-text text-muted">Please enter your account holder</span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <table class="table table-striped" >
                              <thead>
                                <tr>
                                  <th>Servicio</th>
                                  <th>Cantidad</th>
                                  <th>Observacion</th>
                                </tr>
                              </thead>
                              <tbody id="tableservicesInfo">
                                
                              </tbody>
                            </table>
                            </div>
                            <div class="form-group row align-items-center" >
                              <label class="col-lg-3 col-form-label text-right">Formula:</label>
                              <div class="col-lg-6" id="DosisList">
                                
                              </div>
                            </div>
                          </div>
                          
                          
                        </div>
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                              <button type="reset" class="btn btn-success mr-2">Submit</button>
                              <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                      <!--end::Form-->
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Guardar</button>
            </div>
        </div>
    </div>
</div>  

<div class="modal fade"  id="dosisPosologia" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Aplicacion de medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-right">Primera Dosis</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control firstDosis" id="firstDayDosis" readonly="" placeholder="Seleccione fecha">
                </div>
              </div>
              
              <div class="form-group row">
                <label class="col-lg-4 col-form-label text-right">Frecuencia dia</label>
                <div class="col-lg-6">
                  <input type="number" class="form-control" id="frecuency" readonly="">
                </div>
              </div>
              
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="makeDosisForm">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!--FIN CREACION DE ORDEN DE TRABAJO -->



<!-- FORMULATIOS -->

<div class="modal fade" id="formulations" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formulationsModalLabel">Medicamentos, Nutricion y Complementarios </h5>
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
          

          <div class="col-xl-12">
              <div class="card card-custom card-stretch gutter-b">
    

    <!--begin::Body-->
    <div class="card-body pt-0">
        
            <table class="table" id="DrugHistory">
                
            </table>
            
        
        
        
        

        

       
    </div>
    <!--end::Body-->
</div>
          </div>
      </div>
  </div>
  <div class="tab-pane" id="nutricion" role="tabpanel" aria-labelledby="nutricion-tab">
      <div class="row">
          

          <div class="col-xl-12">
              <div class="card card-custom card-stretch gutter-b">
    

    <!--begin::Body-->
    <div class="card-body pt-0">
         <table class="table" id="NutHistory">
                
            </table>
        
        
        

        

       
    </div>
    <!--end::Body-->
</div>
          </div>
      </div>
  </div>
  <div class="tab-pane" id="complementarios" role="tabpanel" aria-labelledby="complementarios-tab">
      <div class="row">
          

          <div class="col-xl-12">
              <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0">
        <table class="table" id="CompleHistory">
                
            </table>
        
        
        

        

       
    </div>
    <!--end::Body-->
</div>
          </div>
      </div>
  </div>
 
</div>
            </div>
          
           
        </div>
    </div>
</div>

<!-- END FORMUALTION -->

<!-- SEGUIMIENTO PAD-->

<div class="modal fade" id="Spad" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SEGUIMIENTO AL PLAN DE ATENCION DOMICILIARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs"  role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#VFailTab" role="tab" aria-controls="home" aria-selected="true">Visitas Fallidas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#NtrPrfTab" role="tab" aria-controls="profile" aria-selected="false">Notificaciones Ext.</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#StatusHistory" role="tab" aria-controls="contact" aria-selected="false">Historial estados</a>
                </li>
                @if(\Auth::user()->_planta==1)
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#AnalistSpad" role="tab" aria-controls="contact" aria-selected="false">SPAD Analistas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#PrfSpad" role="tab" aria-controls="contact" aria-selected="false">SPAD Profesionales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Novedades" role="tab" aria-controls="contact" aria-selected="false">Novedades</a>
                </li>
                @endif
              </ul>
              <div class="tab-content" >
                <div class="tab-pane fade show active" id="VFailTab" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-xl-12">
                    <table class="table table-striped" id="Dt_Vfail">
                      <thead>
                        <th>#</th>
                          <th>Profesional</th>
                          <th>Fecha</th>
                          <th>Observacion</th>
                      </thead>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="NtrPrfTab" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="col-xl-12">
                    <table class="table table-striped" id="Dt_PrfNtf">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Profesional</th>
                          <th>Fecha</th>
                          <th>Observacion</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="StatusHistory" role="tabpanel" aria-labelledby="contact-tab">
                  
                  <div class="col-xl-12">
                    <table class="table table-striped" id="Dt_StatusHistory">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Status</th>
                          <th>Fecha</th>
                          <th>Usuario</th>
                          <th>Observacion</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="AnalistSpad" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-xl-12">
                    <table class="table table-striped" id="Dt_SPADAnalist">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Actividad</th>
                          <th>Profesional</th>
                          <th>Observacion</th>
                          <th>Registro</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="PrfSpad" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-xl-12">
                    <table class="table table-striped" id="Dt_SPADPrf">
                      <thead>
                        <tr>
                          <th>#</th>                          
                          <th>Profesional</th>
                          <th>Observacion</th>
                          <th>Registro</th>
                          <th>Fecha</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="Novedades" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="col-xl-12">
                    <table class="table table-striped" id="Dt_News">
                      <thead>
                        <tr>
                          <th>#</th>                          
                          <th>Tipo</th>
                          <th>Observacion</th>
                          <th>Registro</th>
                          <th>Fecha</th>
                          <th>Respuesta</th>
                          <th></th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>

              </div>


              
                
            </div>
            
        </div>
    </div>
</div>

<!-- FIN SEGUIMIENTO-->

<!-- SIAU-->

<div class="modal fade" id="SIAU" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SISTEMA INTEGRAL DE ATENCION AL USUARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

              <ul class="nav nav-tabs"  role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#EncuetasTab" role="tab" aria-controls="home" aria-selected="true">Encuestas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-toggle="tab" href="#PqrsTab" role="tab" aria-controls="profile" aria-selected="false">PQRS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-toggle="tab" href="#NtfIntTab" role="tab" aria-controls="contact" aria-selected="false">Notificacion int.</a>
                </li>
               
              </ul>
              <div class="tab-content" >
                
                <div class="tab-pane fade show active" id="EncuetasTab" role="tabpanel" aria-labelledby="contact-tab">...</div>
                <div class="tab-pane fade" id="PqrsTab" role="tabpanel" aria-labelledby="contact-tab">...</div>
                <div class="tab-pane fade" id="NtfIntTab" role="tabpanel" aria-labelledby="contact-tab">...</div>
                
              </div>


              
                
            </div>
            
        </div>
    </div>
</div>

<!-- FIN SEGUIMIENTO-->


<div class="modal fade" id="registerreturnMdl" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Observacion de devolucion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" >
              <div class="row">
                <div class="col-lg-12" style="word-wrap: break-word" id="registerreturnObs">
                  
                </div>
              </div>
              
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>
