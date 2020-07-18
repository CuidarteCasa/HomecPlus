<div class="modal fade" id="reassignService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Reasignacion de servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-10"><a class="text-info font-weight-bolder text-hover-primary mb-1 font-size-lg setPrftoAssign" data-idprf="NULL" data-toggle="modal" data-target="#reassignServiceObservation">DESEO DESASIGNAR EL SERVICIO Y DEJARLO PENDIENTE POR ASIGNACION</a> </div>
                    
                </div><br>
                <div data-scroll="true" data-height="500" class="scroll ps ps--active-y" style="height: 500px; overflow: hidden;">
                 <div class="table-responsive">
                                                    <table class="table table-borderless table-vertical-center">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th class="p-0" style="min-width: 130px"></th>
                                                                <th class="p-0" style="min-width: 70px">Resumen</th>
                                                                <th class="p-0" style="min-width: 40px">Asig.</th>
                                                                <th class="p-0" style="min-width: 40px">Real.</th>
                                                                <th class="p-0" style="min-width: 40px">Disponible</th>
                                                                <th class="p-0" style="min-width: 40px"></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="serviceUserListBody">
                                                            
                                                            
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Guardar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="desAssignService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Motivo Desasiganacion</label>
                    <div class="col-8">
                        <select class="form-control" id="nulltypeDes" >
                            <option value="0">Seleccione..</option>
                            {{\App\Http\Controllers\PagesController::nullserviceType()}}   
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Observacion</label>
                    <div class="col-8">
                        <textarea rows="3" class="form-control" id="obsDesAssing"></textarea>
                    </div>
                    
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-lg btn-block" id="DesAssignServiceSave">Reasignar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reassignServiceObservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Motivo Reasiganacion</label>
                    <div class="col-8">
                        <select class="form-control" id="nulltype" >
                            <option value="0">Seleccione..</option>
                            {{\App\Http\Controllers\PagesController::nullserviceType()}}   
                        </select>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">Observacion</label>
                    <div class="col-8">
                        <textarea rows="3" class="form-control" id="obsReasing"></textarea>
                    </div>
                    
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-lg btn-block" id="reassignServiceSave">Reasignar</button>
            </div>
        </div>
    </div>
</div>