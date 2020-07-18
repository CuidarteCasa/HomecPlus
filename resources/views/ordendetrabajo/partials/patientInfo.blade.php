<!--begin::Card-->
                                        <div class="card card-custom gutter-b">
                                        	<div class="card-header bg-success">
												<div class="card-title">
													<h3 class="card-label">Informacion del Paciente 
													
												</div>
											</div>

                                            <!--begin::Body-->
                                            <div class="card-body pt-4 ">
                                                
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                   
                                                    <div>
                                                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{$paciente->name}}</a>
                                                        
                                                        <div class="mt-2">
                                                            <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Tutela </a>
                                                            <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">Aocosto</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Contact-->
                                                <div class="pt-8 pb-6">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Telefono:</span>
                                                        <a href="#" class="text-muted text-hover-primary">{{$paciente->telefono}} - {{$paciente->celular}}</a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Direccion:</span>
                                                        <span class="text-muted">{{$paciente->direccion($paciente->id)}}</span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="font-weight-bold mr-2">Eps:</span>
                                                        <span class="text-muted">{{$paciente->eps->tag}}</span>
                                                    </div>
                                                </div>
                                                <!--end::Contact-->
                                               
                                                <a href="{{url('Paciente/'.$paciente->id)}}" class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">Ver paciente</a>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->