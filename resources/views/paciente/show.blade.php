{{-- Extends layout --}}
@extends('layout.default')
@section('styles')
<link rel="stylesheet" href="{{asset('/css/pages/wizard/wizard-4.css') }}">
@stop
{{-- Content --}}
@section('content')
<input type="hidden" id="id_pacienteM" value="{{$paciente->id}}">
    {{-- head paciente --}}
    
  @include('paciente.partials.basic_info')
  @if(\Auth::user()->_planta==1)
  @include('paciente.partials.activateservice')
  @endif
  @include('paciente.partials.general_tab')	
  @include('paciente.modals.general')
<!-- BARRA FLOTANTE -->
  @include('layout.partials.extras._toolbarPaciente')
  @include('paciente.modals.globalclinicDataInfo');
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('lib/paciente.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/quickNote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/globalClinicInfo.js') }}" type="text/javascript"></script>
    
@endsection
