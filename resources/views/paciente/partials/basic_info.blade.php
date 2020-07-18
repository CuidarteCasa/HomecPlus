<div class="card card-custom gutter-b">
    <div class="card-header bg-success">
                                                <div class="card-title">
                                                    <h3 class="card-label">{{$paciente->name}}
                                                    <i class="flaticon2-correct text-info font-size-h5"></i></h3>
                                                </div>
                                                <div class="card-toolbar">
                                                    <a href="#" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3" id="kt_blockui_page_overlay_color">Tutela </a>
                                                        <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Alto costo</a>
                                                </div>
                                            </div>
                                    <div class="card-body">
                                        <!--begin::Details-->
                                        <div class="d-flex mb-9">
                                            <!--begin: Pic-->
                                            
                                            <!--end::Pic-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                
                                                <!--begin::Content-->
                                                <div class="d-flex flex-wrap justify-content-between mt-1">

                                                        <!--Datos basicos-->
                                                        <div class="col-sm-4">
                                                     <div class="card card-custom">
                                                        <div class="card-header bg-light-success">
                                                            <div class="card-title">
                                                                <span class="card-icon">
                                                                    <i class="flaticon2-chat-1 text-primary"></i>
                                                                </span>
                                                                <h3 class="card-label">
                                                                    Basicos
                                                                    
                                                                </h3>
                                                            </div>
                                                            <div class="card-toolbar">
                                                                
                                                                <a href="#" class="btn btn-sm btn-icon btn-light-success mr-2">
                                                                    <i class="flaticon2-gear"></i>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            {{\App\Http\Controllers\PacienteController::addressPacienteBasic($paciente->id)}}
                                                        </div>
                                                    </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                     <div class="card card-custom">
                                                        <div class="card-header bg-light-success">
                                                            <div class="card-title">
                                                                <span class="card-icon">
                                                                    <i class="flaticon2-chat-1 text-primary"></i>
                                                                </span>
                                                                <h3 class="card-label">
                                                                    Diagnosticos
                                                                    
                                                                </h3>
                                                            </div>
                                                            <div class="card-toolbar">
                                                                
                                                                <a style="cursor: pointer;" id="DxResume" class="btn btn-sm btn-icon btn-light-info mr-2"  data-theme="dark" title="Historial Dx" data-toggle="modal" data-target="#DxResumeModal">
                                                                    <i class="flaticon-notepad"></i>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            {{\App\Http\Controllers\PacienteController::addressPacienteDg($paciente->id)}}
                                                        </div>
                                                    </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                     <div class="card card-custom">
                                                        <div class="card-header bg-light-success">
                                                            <div class="card-title">
                                                                <span class="card-icon">
                                                                    <i class="flaticon2-chat-1 text-primary"></i>
                                                                </span>
                                                                <h3 class="card-label">
                                                                    Administrativos
                                                                    
                                                                </h3>
                                                            </div>
                                                            <div class="card-toolbar">
                                                                
                                                                <a href="#" class="btn btn-sm btn-icon btn-light-success mr-2">
                                                                    <i class="flaticon2-gear"></i>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                           
                                                        </div>
                                                    </div>
                                                        </div>
                                                                <!--End datos basicos-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Details-->
                                        <div class="separator separator-solid"></div>
                                        <!--begin::Items-->
                                        <div class="d-flex align-items-center flex-wrap mt-8">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon2-lorry display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column text-dark-75">
                                                    <span class="font-weight-bolder font-size-sm">Ruta Base</span>
                                                    <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold">@if($paciente->atRoute){{$paciente->atRoute->id_ruta}}@else Sin ruta asignada @endif</span>
                                                </div>
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <!--
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column text-dark-75">
                                                    <span class="font-weight-bolder font-size-sm">Expenses</span>
                                                    <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold">$</span>164,700</span>
                                                </div>
                                            </div>
                                        -->
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <!--
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column text-dark-75">
                                                    <span class="font-weight-bolder font-size-sm">Net</span>
                                                    <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold">$</span>782,300</span>
                                                </div>
                                            </div>
                                        -->
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <!--
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column flex-lg-fill">
                                                    <span class="text-dark-75 font-weight-bolder font-size-sm">73 Tasks</span>
                                                    <a href="#" class="text-primary font-weight-bolder">View</a>
                                                </div>
                                            </div>
                                        -->
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <!--
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column">
                                                    <span class="text-dark-75 font-weight-bolder font-size-sm">648 Comments</span>
                                                    <a href="#" class="text-primary font-weight-bolder">View</a>
                                                </div>
                                            </div>
                                        -->
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <!--
                                            <div class="d-flex align-items-center flex-lg-fill mb-2 float-left">
                                                <span class="mr-4">
                                                    <i class="flaticon-network display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="symbol-group symbol-hover">
                                                    <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Mark Stone">
                                                        <img alt="Pic" src="assets/media/users/300_25.jpg" />
                                                    </div>
                                                    <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Charlie Stone">
                                                        <img alt="Pic" src="assets/media/users/300_19.jpg" />
                                                    </div>
                                                    <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Luca Doncic">
                                                        <img alt="Pic" src="assets/media/users/300_22.jpg" />
                                                    </div>
                                                    <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Nick Mana">
                                                        <img alt="Pic" src="assets/media/users/300_23.jpg" />
                                                    </div>
                                                    <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Teresa Fox">
                                                        <img alt="Pic" src="assets/media/users/300_18.jpg" />
                                                    </div>
                                                    <div class="symbol symbol-30 symbol-circle symbol-light">
                                                        <span class="symbol-label font-weight-bold">5+</span>
                                                    </div>
                                                </div>
                                            </div>
                                        -->
                                            <!--end::Item-->
                                        </div>
                                        <!--begin::Items-->
                                    </div>
                                </div>