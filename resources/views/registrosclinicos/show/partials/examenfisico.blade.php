
<div class="col-12">
	<table class="table">
		<tbody>
			<tr>
				<td><strong>Presion arterial</strong></td>
				<td>{{$registro_clinico_data->sv_pa_sistolica}} / {{$registro_clinico_data->sv_pa_diastolica}}</td>
				<td>mmHg</td>
			</tr>
			<tr>
				<td><strong>Frecuencia Cardiaca</strong></td>
				<td>{{$registro_clinico_data->sv_frecuencia_cardiaca}}</td>
				<td>V x Min</td>
			</tr>
			<tr>
				<td><strong>Frecuencia Respiratoria</strong></td>
				<td>{{$registro_clinico_data->sv_frecuencia_respiratoria}}</td>
				<td>V x Min</td>
			</tr>
			<tr>
				<td><strong>Temperatura</strong></td>
				<td>{{$registro_clinico_data->sv_temperatura}}</td>
				<td>°C</td>
			</tr>
			<tr>
				<td><strong>Peso estimado</strong></td>
				<td>{{$registro_clinico_data->sv_peso}}</td>
				<td>Kg</td>
			</tr>
			<tr>
				<td><strong>Talla estimada</strong></td>
				<td>{{$registro_clinico_data->sv_talla}}</td>
				<td>Cm</td>
			</tr>
			<tr>
				<td><strong>Saturacion de Oxigeno</strong></td>
				<td>{{$registro_clinico_data->sv_saturacion_oxigeno}}</td>
				<td>%</td>
			</tr>
			<tr>
				<td><strong>Circunferencia abdominal estimada</strong></td>
				<td>{{$registro_clinico_data->sv_circunferencia_abdominal}}</td>
				<td>Cm</td>
			</tr>
			
		</tbody>
	</table>
</div>
<br>
<div class="col-12" >
	<table class="table" style="table-layout: fixed;">
		<tbody>
			<tr>
				<td style="width: 100px"><strong>Examen fisico</strong></td>
				<td style="word-wrap: break-word;">{{$registro_clinico_data->examenfisico}}</td>
				
			</tr>
		</tbody>
	</table>
</div>
<br>
<div class="col-12">
	<table class="table">
		<tbody>
			<tr>
				<td><strong>Traquestomia</strong></td>
				<td>{{$registro_clinico_data->exf_traqueostomia}}</td>
				<td><strong>Sonda Nasogastrica</strong></td>
				<td>{{$registro_clinico_data->exf_sondanasogastrica}}</td>
			</tr>
			<tr>
				<td><strong>Gastrostomia</strong></td>
				<td>{{$registro_clinico_data->exf_gastrostomia}}</td>
				<td><strong>Colostomia</strong></td>
				<td>{{$registro_clinico_data->exf_colostomia}}</td>
			</tr>
			<tr>
				<td><strong>Sonda Vesical</strong></td>
				<td>{{$registro_clinico_data->exf_sondavesical}}</td>
				<td><strong>Cistostomia</strong></td>
				<td>{{$registro_clinico_data->exf_cistostomia}}</td>
			</tr>
			
		</tbody>
	</table>
</div>