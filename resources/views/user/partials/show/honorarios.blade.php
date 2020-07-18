
<div class="tab-pane" role="tabpanel" id="showhonorarios">
<div class="card-header py-3">
				<div class="card-title align-items-start flex-column">
					<h3 class="card-label font-weight-bolder text-dark">Honorarios</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">listado de honorarios pendientes</span>
                </div>
				<div class="card-toolbar">
					<button type="button" class="btn btn-success mr-2" id="sendPreCC">Generar Pre-Cuenta</button>
					<button type="button" class="btn btn-secondary" id="loadFees">Refrescar</button>
				</div>
			</div>

<div class="card-body">
	<div class="row">
		<table class="table table-bordered table-hover table-checkable" data-user="{{$user->id}}"  style="margin-top: 13px !important"" id="Dt_userFees">
			<thead>
				<tr>
					<th>#</th>
					<th>Paciente</th>
					<th>Servicio</th>
					<th>Actividad</th>
					<th>Fecha cargue</th>
					<th>Honorario</th>
					<th>Tipo</th>
					<th><label class="checkbox checkbox-single">
                                        <input type="checkbox" id="selectAll" class="checkable">
                                        <span></span>
                                    </label></th>
					<th>Acciones</th>
					
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="5">TOTAL HONORARIOS</td>
					<td colspan="4"><input class="form-control" type="text" readonly id="totalfees"></td>
					
				</tr>
				<tr>
					<td colspan="5">TOTAL CUENTA DE COBRO</td>
					<td colspan="4"><input class="form-control" type="text" readonly id="totalPreCC"></td>
					
				</tr>
				
			</tfoot>
		</table>
	</div>
</div>			
</div>