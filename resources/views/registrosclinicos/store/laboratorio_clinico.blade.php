<form id="{{$tag_blade}}">
    @include('registrosclinicos.store.partials.aditionals')

    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Laboratorios institucionales</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                          <select class="form-control kt-bootstrap-select" id="labList" multiple="multiple" name="labList[]">
                            {{\App\Http\Controllers\PagesController::LabList()}}
                          </select>
                          <span class="form-text text-muted">Select at least 2 and maximum 4 options</span>
                        </div>
                      </div>




                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Otros laboratorios</label>
                    <div class="col-8">
                        <textarea rows="3" class="form-control" id="otherLab" name="otherLab"></textarea>
                    </div>
                    
                </div>

<br>
<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-success btn-lg btn-block saveClinicRecord" data-form="{{$tag_blade}}">Guardar Examenes Paraclinicos</button>
    

  </div>
</div>
</form>