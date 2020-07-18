{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

 <div class="card card-custom gutter-b">

<div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Copagos y cuotas moderadoras</span>
            
        </h3>
        
    </div>
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <div class="tab-content">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="Dt_copay">
                    <thead>
                        <tr class="text-left text-uppercase">
                            <th>Order</th>
                            <th style="min-width: 200px" class="pl-7"><span class="text-dark-75">Paciente</span></th>
                            <th><span class="text-dark-75">identificacion</span></th>
                            <th><span class="text-dark-75">Telefonos</span></th>
                            <th><span class="text-dark-75">Copago</span></th>
                            <th><span class="text-dark-75">Moderadora</span></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
    </div>
    <!--end::Body-->
</div>


  

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('lib/contabilidad.js') }}" type="text/javascript"></script>
@endsection
