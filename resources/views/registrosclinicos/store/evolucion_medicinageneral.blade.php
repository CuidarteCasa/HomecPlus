<form id="{{$tag_blade}}">
    @include('registrosclinicos.store.partials.aditionals')  
<div class="row">
  <div class="col-md-12">
    @include('registrosclinicos.store.partials.motivoconsulta')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    @include('registrosclinicos.store.partials.examenfisico')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    @include('registrosclinicos.store.partials.barthel')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    @include('registrosclinicos.store.partials.escala_karnosky')
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    @include('registrosclinicos.store.partials.cfs')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
     @include('registrosclinicos.store.partials.analisis_signos_plan')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
     @include('registrosclinicos.store.partials.interconsulta')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    @include('registrosclinicos.store.partials.resumePlan')
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    @include('registrosclinicos.store.partials.plandemanejo')
  </div>
</div><br>
<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-success btn-lg btn-block saveClinicRecord" data-form="{{$tag_blade}}">Guardar Evolucion Medica</button>
  </div>
</div>
</form>