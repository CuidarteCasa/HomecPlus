<div class="card card-custom">
											<div class="card-header bg-success">
												<div class="card-title">
													
													<h3 class="card-label">Informacion del Paquete 
													
												</div>
												<div class="card-toolbar">
													 <div class="d-flex justify-content-end">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon btn-light-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Anular</span>
                                                                    </a>
                                                                </li>
                                                                
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Activar</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-gear"></i>
                                                                        </span>
                                                                        <span class="navi-text">Crear Alerta</span>
                                                                    </a>
                                                                </li>
                                                                
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-magnifier-tool"></i>
                                                                        </span>
                                                                        <span class="navi-text">Cargar Autorizacion</span>
                                                                    </a>
                                                                </li>
                                                               
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>
												</div>
											</div>
											<div class="card-body">
												<div class="d-flex align-items-center">
                                                   
                                                    <div>
                                                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{$order->paquete->nombre}}</a>
                                                        <div class="text-muted">Informacion Orden de trabajo</div>
                                                        
                                                    </div>
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Contact-->
                                                <div class="pt-8 pb-6">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Valida desde:</span>
                                                        <a href="#" class="text-success text-hover-primary">{{$order->valida_desde}}</a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Valida hasta:</span>
                                                        <span class="text-success">{{$order->valida_hasta}}</span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="font-weight-bold mr-2">Autorizacion</span>
                                                        <span class="text-danger">{{$order->autorizacion}}</span>
                                                    </div>
                                                </div>
											</div>
											
										</div>




