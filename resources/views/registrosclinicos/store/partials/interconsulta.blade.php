 <div class="card card-custom">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label">
                Remitir paciente a Interconsulta
                
              </h3>
            </div>
          </div>
          <div class="card-body">
           <p>En caso que usted desee remitir a este paciente a intercosulta diligenciar el formulario</p>
          	<div class="form-group row">
            <label class="col-2 col-form-label">Remitir a interconsulta</label>
            <div class="col-2">
              <span class="switch">
                <label>
                  <input type="checkbox" id="{{$tag_blade}}swIntercosulta" name="swIntercosulta">
                  <span></span>
                </label>
              </span>
            </div>
            
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Especialidad</label>
            <div class="col-4">
              <input type="text" class="form-control" id="{{$tag_blade}}especialidad" name="especialidad">
            </div>
            
          </div>

          <div class="form-group row">
              
              <div class="col-sm-12">
                <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text">Justificacion</span></div>
              <textarea rows="3" class="form-control" id="{{$tag_blade}}justificacion" name="justificacion"></textarea> 
              
            </div>
              </div>
            </div>
          </div>
        </div>