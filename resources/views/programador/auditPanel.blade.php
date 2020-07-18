
{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

<div class="row mb-10">
	<div class="col-lg-6 col-xl-4 mb-10">
										<!--begin::Callout-->
										<div class="card card-custom mb-2 bg-diagonal">
											<div class="card-body">
												<div class="d-flex align-items-center justify-content-between p-4 flex-lg-wrap flex-xl-nowrap">
													<div class="d-flex flex-column mr-5">
														<a  class="h4 text-dark text-hover-primary mb-5">Medicos</a>
														<p class="text-dark-50">Evoluciones medicas y valoraciones</p>
														<p><strong>Pendientes : </strong></p>
													</div>
													<div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
														<a href="#" class="btn font-weight-bolder text-uppercase btn-light-success py-4 px-6" data-toggle="modal" data-target="#auditPending" id="auditTool" data-type="medicine">Auditar</a>
													</div>
												</div>
											</div>
										</div>
										<!--end::Callout-->
										
									</div>
									<div class="col-lg-6 col-xl-4 mb-10">
										<!--begin::Callout-->
										<div class="card card-custom mb-2 bg-diagonal">
											<div class="card-body">
												<div class="d-flex align-items-center justify-content-between p-4 flex-lg-wrap flex-xl-nowrap">
													<div class="d-flex flex-column mr-5">
														<a href="#" class="h4 text-dark text-hover-primary mb-5">Visita Enterostomal y Curaciones</a>
														<p class="text-dark-50">Curaciones I, II ,II ,IV y visita enterostomal</p>
													</div>
													<div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
														<a href="/metronic/preview/demo1/custom/apps/support-center/feedback.html" target="_blank" class="btn font-weight-bolder text-uppercase btn-light-success py-4 px-6">Auditar</a>
													</div>
												</div>
											</div>
										</div>
										<!--end::Callout-->
										
									</div>
									<div class="col-lg-6 col-xl-4 mb-10">
										<!--begin::Callout-->
										<div class="card card-custom mb-2 bg-diagonal">
											<div class="card-body">
												<div class="d-flex align-items-center justify-content-between p-4 flex-lg-wrap flex-xl-nowrap">
													<div class="d-flex flex-column mr-5">
														<a href="#" class="h4 text-dark text-hover-primary mb-5">Aplicacion de medicamentos</a>
														<p class="text-dark-50">There are many variations of Lorem Ipsum available.</p>
													</div>
													<div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
														<a href="/metronic/preview/demo1/custom/apps/support-center/feedback.html" target="_blank" class="btn font-weight-bolder text-uppercase btn-light-success py-4 px-6">Make A Call</a>
													</div>
												</div>
											</div>
										</div>
										<!--end::Callout-->
										
									</div>
									<div class="col-lg-6 col-xl-4 mb-10">
										<!--begin::Callout-->
										<div class="card card-custom mb-2 bg-diagonal">
											<div class="card-body">
												<div class="d-flex align-items-center justify-content-between p-4 flex-lg-wrap flex-xl-nowrap">
													<div class="d-flex flex-column mr-5">
														<a href="#" class="h4 text-dark text-hover-primary mb-5">Cambios de sonda</a>
														<p class="text-dark-50">There are many variations of Lorem Ipsum available.</p>
													</div>
													<div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
														<a href="/metronic/preview/demo1/custom/apps/support-center/feedback.html" target="_blank" class="btn font-weight-bolder text-uppercase btn-light-success py-4 px-6">Make A Call</a>
													</div>
												</div>
											</div>
										</div>
										<!--end::Callout-->
										
									</div>
									

</div>

 
								
  

@include('programador.modals.general_audit')


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('lib/programador.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/globalClinicInfo.js') }}" type="text/javascript"></script>
@endsection
