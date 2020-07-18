@include('registrosclinicos.show.partials.serviceInfo')
<div class="row">
    <div class="col-12">
        <div class="card card-custom bg-light-success card-stretch gutter-b">
    <!--begin::Header-->
    @include('registrosclinicos.show.partials.registerhead')
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-2">
        
         <table class="table" border="0">
		<tbody>
			<tr>
				<td><strong>Formulacion:</strong></td>
				<td>@php echo $registro_clinico_data->formulacion @endphp</td>
			</tr>
		</tbody>
	</table>
    </div>
    <!--end::Body-->
</div>
    </div>
    
</div>