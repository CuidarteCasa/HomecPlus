
<div class="modal fade" id="OtherPlanModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Agregar plan</h5>
                
            </div>
            <div class="modal-body" >
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Paquete</label>
                    <div class="col-8">
                        <select class="form-control" name="" id="OtherPlanModalSelect" >
                               
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <button type="button" class="btn btn-success btn-lg btn-block chargePackage" >Agregar</button>

                    
                </div>
            </div>
            
           
        </div>
    </div>
</div>

<div class="modal fade" id="quiNotesModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Notas de audio guardadas</h5>
                
            </div>
            <div class="modal-body" >
                 {{\App\Http\Controllers\RegistrosClinicosController::quickNotes($order,$osa,$activity)}}
            </div>
            
           
        </div>
    </div>
</div>