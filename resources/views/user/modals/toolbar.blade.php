<div class="modal fade" id="precountModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Actividades Pendientes de cobro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

    <div class="col-sm-12">
      <table class="table table-bordered table-hover table-checkable" id="Dt_userFees">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Paciente</th>
                    <th>Order</th>
                    <th>Osa</th>
                    <th>Servicio</th>
                    <th>Actividad</th>
                    <th>Fecha cargue</th>
                    <th>Honorario</th>
                    <th>Tipo</th>
                    <th></th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">TOTAL HONORARIOS</td>
                    <td colspan="4"><input class="form-control" type="text" readonly id="totalfees"></td>
                    
                </tr>
                <tr>
                    <td colspan="7">TOTAL CUENTA DE COBRO</td>
                    <td colspan="4"><input class="form-control" type="text" readonly id="totalPreCC"></td>
                    
                </tr>
                
                
            </tfoot>
        </table>
    </div>
  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success mr-2 font-weight-bold"  id="sendPreCC">Generar Pre-Cuenta</button>
            </div>
        </div>
    </div>
</div>