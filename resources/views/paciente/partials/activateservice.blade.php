<div class="row">
									<div class="col-lg-8">
										<!--begin::Advance Table Widget 2-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5 bg-success">
												<h3 class="card-title align-items-start flex-column ">
													<span class="card-label font-weight-bolder text-dark">Servicios activos</span>
													<span class="text-white mt-3 font-weight-bold font-size-sm">Ordenes de trabajo y servicios activos</span>
												</h3>
												<div class="card-toolbar">
													<ul class="nav nav-pills nav-pills-sm nav-dark-75">
														<li class="nav-item">
															<a href="#" id="createNewOrder" data-pcte="{{$paciente->id}}" data-toggle="modal" data-target="#NewOrder" class="btn btn-primary btn-shadow font-weight-bold mr-2">Nueva orden de trabajo</a>


														</li>
														
														
													</ul>
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-3 pb-0">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-borderless table-vertical-center">
														
														<tbody>
															{{\App\Http\Controllers\OrdendeTrabajoController::OrderProgress($paciente->id)}}
															
																			</tbody>
																		</table>
																	</div>
															
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 2-->
									</div>
									<div class="col-lg-4">
										<!--begin::Mixed Widget 14-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5 bg-success">
												<h3 class="card-title font-weight-bolder">Resumen de las Ordenes Activas</h3>
												
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body d-flex flex-column">
												<div class="flex-grow-1">
													<div id="kt_mixed_widget_14_chart" style="height: 200px"></div>
												</div>
												
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 14-->
									</div>
								</div>