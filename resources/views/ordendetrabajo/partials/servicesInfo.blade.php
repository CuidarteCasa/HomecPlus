<div class="card card-custom">
											<div class="card-header bg-success">
												<div class="card-title">
													
													<h3 class="card-label">Servicios Activos 
													<small class="text-white">Resumen servicios activos</small></h3>
												</div>
												<div class="card-toolbar">
													<div class="d-flex justify-content-end">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                                                        <span class="navi-text">Agregar servicios</span>
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
												<div class="row">
                                                    <div class="col-lg-12">
                                                    
                                                    <table class="table table-borderless table-vertical-center">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th class="p-0" style="min-width: 150px"></th>
                                                                <th class="p-0" style="min-width: 70px"></th>
                                                                <th class="p-0" style="min-width: 40px">Asig</th>
                                                                <th class="p-0" style="min-width: 40px">Real</th>
                                                                <th class="p-0" style="min-width: 40px"></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{\App\Http\Controllers\OrdendeTrabajoController::orderServices($order->id)}}
                                                            
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                </div>
											</div>
											
										</div>