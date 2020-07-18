 <div class="card card-custom">
          <div class="card-header">
            <div class="card-title">
              <h3 class="card-label">
                Diagosticos
                
              </h3>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              
            	<div class="col-sm-6">
            		<h3>Activos</h3>
            		{{\App\Http\Controllers\PacienteController::activeDxedit($paciente->id)}}
            	</div>
              	<div class="col-sm-6">
              		<h3 style="text-align: right;">Historico</h3>
            		{{\App\Http\Controllers\PacienteController::inactiveDxedit($paciente->id)}}
            	</div>
            </div>
             
          </div>
        </div>