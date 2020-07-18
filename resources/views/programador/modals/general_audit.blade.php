<div class="modal fade" id="auditPending" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Auditorias pendientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
              
               <div data-scroll="true" data-height="700">
                    <table class="table table-striped" id="Dt_serviceWTOaudit">
                    	<thead>
                    		<tr>
                    			<th>Actividad</th>
                    			<th>Profesional</th>
                    			<th>Paciente</th>
                    			<th></th>
                    		</tr>
                    	</thead>
                    </table>
                </div> 
            </div>
            
        </div>
    </div>
</div>



<div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activityModalLabel">Registros Clinico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-custom gutter-b">
           
            <div class="card-body">
               

                    
                    <div class="example-preview">
                        <div class="row">
                            <div class="col-3">
                                <ul class="nav flex-column nav-pills activityregistersNames" >
                                    
                                    
                                </ul>
                            </div>
                            <div class="col-9 clinicRegisterModalBody bg-light" >

                            </div>
                        </div>
                    </div>
                   
          
            </div>
        </div>
            </div>
           
        </div>
    </div>
</div>

<div class="modal fade" id="auditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Auditoria de servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                                                        <label class="col-form-label text-right col-lg-3 col-sm-12">Aprobada</label>
                                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                                            <input data-switch="true" type="checkbox" checked="checked" data-on-text="NO" data-off-text="SI" data-on-color="danger" data-off-color="success" id="auditCalification" />
                                                            
                                                        </div>
                                                    </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Observacion</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea rows="3" class="form-control" id="auditObservation"></textarea>
                    </div>
                </div>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="auditSave">Guardar</button>
            </div>
        </div>
    </div>
</div>


