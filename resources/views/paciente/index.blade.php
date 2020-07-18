{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

  {{-- Head paciente --}}

  <div class="card card-custom gutter-b">

<div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Pacientes</span>
            
        </h3>
        <div class="card-toolbar">
            <a href="#" class="btn btn-info font-weight-bolder font-size-sm mr-3">Nuevo Paciente</a>
           
        </div>
    </div>
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <div class="tab-content">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="Dt_Pacientes">
                    <thead>
                        <tr class="text-left text-uppercase">
                            <th>#</th>
                            <th style="min-width: 200px" class="pl-7"><span class="text-dark-75">Nombre</span></th>
                            <th><span class="text-dark-75">identificacion</span></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
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
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/paciente.js') }}" type="text/javascript"></script>
@endsection
