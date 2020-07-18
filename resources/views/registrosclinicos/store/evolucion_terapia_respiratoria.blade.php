<form id="{{$tag_blade}}">
	@include('registrosclinicos.store.partials.aditionals')
<div class="row">
  <div class="col-md-12">
  @include('registrosclinicos.store.partials._tratamientoTerapy')
  </div>
</div>

@include('registrosclinicos.store.partials.saveButton')  
</form>