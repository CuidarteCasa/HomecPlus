

<div class="col-12">
	<table class="table">
		<tbody>
			<tr>
				<td><strong>Comer</strong></td>
				<td>{{strtok($registro_clinico_data->comer,'-')}}</td>

			</tr>
			<tr>
				<td><strong>Bañarse</strong></td>
				<td>{{strtok($registro_clinico_data->banarse,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Vestirse</strong></td>
				<td>{{strtok($registro_clinico_data->vestirse,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Arreglarse</strong></td>
				<td>{{strtok($registro_clinico_data->arreglarse,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Deposicion</strong></td>
				<td>{{strtok($registro_clinico_data->deposicion,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Miccion</strong></td>
				<td>{{strtok($registro_clinico_data->miccion,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Usar el retrete</strong></td>
				<td>{{strtok($registro_clinico_data->usar_el_retrete,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Traslado al Sillon/Cama</strong></td>
				<td>{{strtok($registro_clinico_data->traslado_al_sillon_cama,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Deambulacion</strong></td>
				<td>{{strtok($registro_clinico_data->deambulacion,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>Subir / Bajar Escaleras</strong></td>
				<td>{{strtok($registro_clinico_data->subir_bajar_escaleras,'-')}}</td>
				
			</tr>
			<tr>
				<td><strong>TOTAL</strong></td>
				<td>{{$registro_clinico_data->total}}</td>
				
			</tr>
			
		</tbody>
	</table>
</div>