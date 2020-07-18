<div class="w3-row">
  <div class="w3-col m6" style="font-size: 12px">
    <address>
      <strong>Apellidos : </strong>{{$paciente->primerapellido}} {{$paciente->segundoapellido}}<br>
      <strong>Nombres : </strong>{{$paciente->primernombre}} {{$paciente->segundonombre}}<br> 
      <strong>Identificacion : </strong> {{$paciente->tipodocumento->tag}} {{$paciente->identificacion}}<br>
      <strong>Sexo / Fecha Nac : </strong>{{$paciente->sexo}} / {{$paciente->fecha_de_nacimiento}}<br>
      <strong>Direccion : </strong>{{$paciente->direccion($paciente->id)}} <br>
          
    </address>
  </div>
  <div class="w3-col m6" style="font-size: 12px">
    <address>
      <strong>Orden de servicio : </strong>{{$registro_clinico_data->id_orden_servicio}}<br>
      <strong>Orden de trabajo : </strong>{{$registro_clinico_data->id_orden_trabajo}}<br>
      <strong>Servicio : </strong>{{$servicio->servicio->tag}}<br>
     
    </address>
  </div>
</div>

 
 

    