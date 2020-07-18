<!--
<input type="hidden"  value="{{$tag_blade}}">
-->       
        <input type="hidden" name="id_orden_servicio" value="{{$osa->id}}">
        <input type="hidden" name="id_orden_trabajo" value="{{$order->id}}">
        <input type="hidden" name="id_profesional" value="{{$osa->id_profesional_asignado}}">
        <input type="hidden" name="id_paciente" value="{{$order->id_paciente}}">
        <input type="hidden" name="id_actividad_servicio" value="{{$activity->id}}">
        <input type="hidden" name="id_registroclinico_master" value="{{$masterId}}">