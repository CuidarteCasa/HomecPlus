{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="d-flex flex-row">
                                    <!--begin::Aside-->
                                    <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                                        @include('ordendetrabajo.partials.patientInfo')
                                        <!--begin::Mixed Widget 14-->
                                        <div class="card card-custom gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title font-weight-bolder">Resumen Servicios</h3>
                                                
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body d-flex flex-column">
                                                
                                                
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Mixed Widget 14-->
                                    </div>
                                    <!--end::Aside-->
                                    <!--begin::Content-->
                                    <div class="flex-row-fluid ml-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="col-lg-4">
                                                @include('ordendetrabajo.partials.packageInfo')
                                            </div>
                                            <div class="col-lg-8">
                                                 @include('ordendetrabajo.partials.servicesInfo') 
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Advance Table Widget 8-->
                                        <div class="card card-custom gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 py-5 bg-success">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Historial Orden de trabajo</span>
                                                    <span class="text-white mt-3 font-weight-bold font-size-sm">Registro de actividades</span>
                                                </h3>
                                                
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-0 pb-3">
                                                <div class="timeline timeline-5 mt-3">
                                                    <!--begin::Item-->
                                                    {{\App\Http\Controllers\OrdenDeTrabajoController::orderHistory($order->id)}}
                                                    <!--end::Item-->
                                                    
                                                </div>
                                                
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Advance Table Widget 8-->
                                    </div>
                                    <!--end::Content-->
                                </div>
@include('layout.partials.extras._toolbarOrder')
@include('ordendetrabajo.modals.servicesOptions')
@include('ordendetrabajo.modals.ordenamientos')
@include('paciente.modals.globalclinicDataInfo')                                                               
                                
@endsection

{{-- Scripts Section --}}
@section('scripts')
    
    <script src="{{ asset('lib/ordendetrabajo.js') }}" type="text/javascript"></script>
     <script src="{{ asset('lib/globalClinicInfo.js') }}" type="text/javascript"></script>
    
@endsection
