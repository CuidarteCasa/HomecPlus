{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    
  <div class="card card-custom">
									<div class="card-header">
										<div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-psd text-primary"></i>
											</span>
											<h3 class="card-label">Mi Agenda Domiciliaria</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											<div class="dropdown dropdown-inline mr-2">
												<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="la la-download"></i>Exportar</button>
												<!--begin::Dropdown Menu-->
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<ul class="nav flex-column nav-hover">
														<li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Opciones:</li>
														
														<li class="nav-item">
															<a href="#" class="nav-link" id="export_excel">
																<i class="nav-icon la la-file-excel-o"></i>
																<span class="nav-text">Excel</span>
															</a>
														</li>
														
													</ul>
												</div>
												<!--end::Dropdown Menu-->
											</div>
											<!--end::Dropdown-->
											<!--begin::Button-->
											
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-bordered table-hover table-checkable" id="Dt_orderList" style="margin-top: 13px !important">
											<thead>
												<tr>
													<th></th>
													<th>Paciente</th>
													<th>Direccion</th>
													<th>Barrio</th>
													<th>Telefono</th>
													<th>Orden de trabajo</th>
													<th>Orden de servicio</th>
													<th>Servicio</th>
													<th>Valida hasta</th>
													<th>Asig.</th>
													<th>Real.</th>
													<th>Obs.</th>
													<th></th>
												</tr>
											</thead>
										</table>
										<!--end: Datatable-->
									</div>
								</div>

@include('agenda.partials.general')								

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset('lib/agenda.js') }}" type="text/javascript"></script>
@endsection
