
<div class="col-12">
	<table class="table">
		<thead>
			<tr>
				<th colspan="2"><u>Mini Nutritional Assessment</u></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><strong>Ha perdido el apetito? Ha comido menos por faltade apetito, problemas digestivos, dificultades de masticacióno deglución en los últimos 3 meses?</strong></td>
				<td>{{$registro_clinico_data->mna1}}</td>
				
			</tr>
			<tr>
				<td><strong>Pérdida reciente de peso (menor 3 meses)</strong></td>
				<td>{{$registro_clinico_data->mna2}}</td>
				
			</tr>
			<tr>
				<td><strong>Movilidad</strong></td>
				<td>{{$registro_clinico_data->mna3}}</td>
			
			</tr>
			<tr>
				<td><strong>Ha tenido una enfermedad aguda o situación de estrés psicológico en los últimos 3 meses?</strong></td>
				<td>{{$registro_clinico_data->mna4}}</td>
				
			</tr>
			<tr>
				<td><strong>Problemas neuropsicológicos</strong></td>
				<td>{{$registro_clinico_data->mna5}}</td>
				
			</tr>
			<tr>
				<td><strong>Índice de masa corporal (IMC) = peso en kg / (talla en m)²</strong></td>
				<td>{{$registro_clinico_data->mna6}}<td>
				
			</tr>
			<tr>
				<td><strong>Resultado</strong></td>
				<td>{{$registro_clinico_data->resultmna}}</td>
				
			</tr>
			
			
		</tbody>
	</table>
</div>