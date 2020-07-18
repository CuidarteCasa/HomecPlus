{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    
                    
                    <input type="text" class="form-control" id="activityDate" readonly="" placeholder="Seleccione la fecha de actividad">
                
                </div>
                <div class="card-toolbar" >
                    <button type="button" class="btn btn-sm btn-success font-weight-bold" id="SaveAndClose"  data-activity="{{$activity->id}}" data-osa="{{$osa->id}}">
                        <i class="fas fa-save"></i> Guardar y Cerrar Actividad
                    </button>
                </div>
            </div>
            
            <div class="card-body">
               
                    <div id="savedRegisters">
                       {{\App\Http\Controllers\RegistrosClinicosController::SavedRegisters($activity->id)}}                                                                                                                                                                         
                    </div>
                    
                    <div class="example-preview">
                        <div class="row">
                            <div class="col-3">
                                <ul class="nav flex-column nav-pills">
                                    {{\App\Http\Controllers\PagesController::ClinicalRecordsMenuForms($serviceType->id)}}
                                    
                                </ul>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="myTabContent5">
                                   {{\App\Http\Controllers\PagesController::ClinicalRecordsForms($serviceType->id,$paciente,$order,$osa,$activity)}}
                                </div>
                            </div>
                        </div>
                    </div>
                   
          
            </div>
        </div>

        @include('layout.partials.extras._toolbar')
@include('registrosclinicos.store.modals.general');
@include('paciente.modals.clinicData');
@include('paciente.modals.globalClinicDataInfo');

@endsection


{{-- Scripts Section --}}
@section('scripts')
    
    <script src="{{ asset('lib/clinicValidator.js') }}" type="text/javascript"></script>    
    <script src="{{ asset('lib/user.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/clinicRecords.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/globalClinicInfo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/saveRegister.js') }}" type="text/javascript"></script>
@endsection
