

<div class="modal fade" id="agendaServiceObservation" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Observaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="timeline timeline-5 mt-3"  id="observationsBody">
                                                    
                                                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="VfailModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Visita fallida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Informacion</label>
                    <div class="col-8">
                        <textarea rows="3" class="form-control" id="vFailObs"></textarea> 
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_save_vFail" >Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="PrfNtfModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notificacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text">Informacion</span></div>
              <textarea rows="2" class="form-control " id="PrfNtfObs"></textarea> 
              
            </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_save_ntf">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ChargeSignature" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cargar firma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Certificado de atencion</label>
                                                <div class="col-lg-8 col-md-9 col-sm-12">
                                                    <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                                        <div class="dropzone-msg dz-message needsclick">
                                                            <h3 class="dropzone-msg-title">Soltar aqui o click para cargar.</h3>
                                                            <span class="dropzone-msg-desc">Solo archivos PDF son permitidos</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            </div>
            
        </div>
    </div>
</div>

