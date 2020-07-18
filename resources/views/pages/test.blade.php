{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<p><button class="btn btn-success btnStart" >START RECORDING</button><br/>
        <button class="btn btn-danger " id="btnStop">STOP RECORDING</button></p>
        
      

  

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/test2.js') }}" type="text/javascript"></script>


@endsection
