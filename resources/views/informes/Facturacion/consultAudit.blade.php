{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

  {{-- Head paciente --}}

    <div class="card card-custom gutter-b">

<div class="card-header border-0 py-5">
    <div class="card-title">
        
        
                <label class="col-lg-4 col-form-label"><strong>Usuario</strong></label>
                <div class="col-lg-6">
                   <select class="form-control" style="width: 100%" id="userPlanta" name="userPlanta">
                        <option value="0">Seleccione..</option>
                    </select>
                </div>
                <div class="col-lg-1">
                    <button type="button" class="btn btn-info" id="btnuserAudit">Cargar</button>
                </div>
              
    
    </div>

    
      
       
    </div>
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <div id="chart_Audit"></div>
    </div>
    <!--end::Body-->
</div>


  

@endsection

{{-- Scripts Section --}}
@section('scripts')
    
    <script src="{{ asset('lib/reports.js') }}" type="text/javascript"></script>
@endsection
