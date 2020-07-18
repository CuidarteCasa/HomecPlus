

<div class="card card-custom gutter-b">
    <div class="card-body">
<!--MENU TAB-->

<ul class="nav nav-tabs" id="myTab" role="tablist">
        {{\App\Http\Controllers\PagesController::pacienteTab()}}                         
</ul>
                        <!--MENU TAB-->
                        <!--TABS CONTENTS-->
                        <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade" id="actividades" role="tabpanel" aria-labelledby="home-tab">
                                @if(\App\Http\Controllers\UserController::usResolvedActivities()==1)
                                <center><div class="col-6 alert alert-custom alert-danger" role="alert">
                                                            <div class="alert-icon">
                                                                <i class="flaticon-warning"></i>
                                                            </div>
                                                            <div class="alert-text">PARA HACER UNA NUEVA EVOLUCION, PRIMERO TIENE QUE DAR RESPUESTA A TODAS LAS CORRECCIONES SOLICITADAS.</div>
                                                            <div class="alert-close">
                                        <button type="button" class="btn btn-primary" id="unResolvedCorrection" data-toggle="modal" data-target="#unResolvedModal" >
                                            Ver
                                        </button>
                                    </div>
                                                        </div></center>

                               
                                @endif
                                <table class="table table-striped table-borderless table-vertical-center" id="Dt_actividades" data-pcte="{{$paciente->id}}">
                                    <thead>
                                        <tr>
                                            <th>Orden de Servicio</th>
                                            <th>Actividad</th>
                                            <th>Servicio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                                
                                
                                
                            </div>
                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">Tab content 2</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Tab content 3</div>
                        </div>
                        <!--TABS CONTENTS-->
   </div>                     
   </div>