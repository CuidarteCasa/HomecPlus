 <div class="card card-custom">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label">
                Examen Fisico
                
              </h3>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">P.A Sistolica</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="" name="systolic">
              <div class="input-group-prepend"><span class="input-group-text">mmHg</span></div>
              
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">P.A Diastolica</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="" name="diastolic">
              <div class="input-group-prepend"><span class="input-group-text">mmHg</span></div>
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">Frecuencia Cardiaca</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="" name="fc">
              <div class="input-group-prepend"><span class="input-group-text">V x Min</span></div>
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">Frecuencia Respiratoria</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="" name="fr">
              <div class="input-group-prepend"><span class="input-group-text">V x Min</span></div>
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">Temperatura</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
             
              <input type="number" class="form-control" placeholder="" name="temp">
               <div class="input-group-prepend"><span class="input-group-text">°C<span></div>
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">Peso estimado</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="{{(count($paciente->vitals)>0)?$paciente->vitals->last()->sv_peso:''}}" name="peso">
              <div class="input-group-prepend"><span class="input-group-text">Kg</span></div>
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">Talla estimada</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="{{(count($paciente->vitals)>0)?$paciente->vitals->last()->sv_talla:''}}"  name="talla">
              <div class="input-group-prepend"><span class="input-group-text">Cm</span></div>
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">Saturacion de Oxigeno</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="" name="saturacion">
              <div class="input-group-prepend"><span class="input-group-text">%</span></div>
            </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">Circunferencia abdominal estimada</label>
              <div class="col-lg-4 col-md-9 col-sm-12">
                <div class="input-group">
              
              <input type="number" class="form-control" placeholder="" name="circunferencia">
              <div class="input-group-prepend"><span class="input-group-text">Cm</span></div>
            </div>
              </div>
            </div>

            <div class="form-group row">
              
              <div class="col-sm-12">
                <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text">Examen fisico</span></div>
              <textarea rows="6" class="form-control" placeholder="Describa detalladamente el Examen fisico del paciente" name="fisicExam"></textarea> 
              
            </div>
              </div>
            </div>

            <div class="form-group row">
            <label class="col-2 col-form-label">Traquestomia</label>
            <div class="col-2">
              <span class="switch">
                <label>
                  <input type="checkbox" name="traqueo">
                  <span></span>
                </label>
              </span>
            </div>
            <label class="col-2 col-form-label">Sonda Nasogastrica</label>
            <div class="col-2">
              <span class="switch switch-icon">
                <label>
                  <input type="checkbox" name="sondanaso">
                  <span></span>
                </label>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Gastrostomia</label>
            <div class="col-2">
              <span class="switch">
                <label>
                  <input type="checkbox" name="gastro">
                  <span></span>
                </label>
              </span>
            </div>
            <label class="col-2 col-form-label">Colostomia</label>
            <div class="col-2">
              <span class="switch switch-icon">
                <label>
                  <input type="checkbox" name="colostomia">
                  <span></span>
                </label>
              </span>
            </div>
            <label class="col-2 col-form-label">Cistostomia</label>
            <div class="col-2">
              <span class="switch switch-icon">
                <label>
                  <input type="checkbox" name="cistostomia">
                  <span></span>
                </label>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-2 col-form-label">Sonda Vesical</label>
            <div class="col-2">
              <span class="switch">
                <label>
                  <input type="checkbox" name="sondavesical">
                  <span></span>
                </label>
              </span>
            </div>
            
          </div>
          </div>
        </div>