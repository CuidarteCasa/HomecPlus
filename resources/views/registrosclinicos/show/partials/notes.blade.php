@if($registro_clinico_data->nota_aclaratoria)
<div class="col-12">
	<table class="table" border="0">
		<tbody>
			<tr>
				<td><strong>Nota Aclaratoria</strong></td>
				<td>{{$registro_clinico_data->nota_aclaratoria}}</td>
			</tr>
		</tbody>
	</table>
</div>

@endif