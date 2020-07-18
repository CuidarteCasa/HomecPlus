@if($registro_clinico_data->interconsulta<>"")
<div class="col-12">
	<table class="table" border="0">
				<thead>
					<tr><th>REMISIONES</th></tr>
				</thead>
				<tbody>
					<tr>
						
						<td>@php echo $registro_clinico_data->interconsulta @endphp</td>
					</tr>
				</tbody>
			</table>
</div>
@endif
