<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/grid.css">
</head>
<body>

 @include('registrosclinicos.print.partials._header')
 @include('registrosclinicos.print.partials._fichapaciente_print')
 @include('registrosclinicos.print.partials._actividad')

 

     <div class="w3-row">
      <div class="w3-col s2" style="font-size: 10px">
       <strong> Motivo Consulta</strong>
      </div>
      <div class="w3-col s10" style="font-size: 10px">
        {{$registro_clinico_data->motivo_consulta}}
      </div>
    </div><br>
    <div class="w3-row">
      <div class="w3-col s2" style="font-size: 10px">
        <strong>Enfermedad actual</strong>
      </div>
      <div class="w3-col s10" style="font-size: 10px">
        {{$registro_clinico_data->enfermedad_actual}}
      </div>
    </div>
    <br>
    <div class="w3-row">
      <div class="w3-col s12" style="font-size: 10px">
        <table class="w3-table" border="1">
          <thead>
            <tr>
              <th colspan="3">Signos vitales</th>
            </tr>
            <tr>
              <td><strong>Campo</strong></td>
              <td><strong>Medicion</strong></td>
              <td><strong>Unidad</strong></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Presion Arterial</strong></td>
              <td>{{$registro_clinico_data->sv_pa_sistolica}} / {{$registro_clinico_data->sv_pa_diastolica}}</td>
              <td><strong>mmHg</strong></td>
            </tr>
            <tr>
              <td><strong>Frecuencia Cardiaca</strong></td>
              <td>{{$registro_clinico_data->sv_frecuencia_cardiaca}}</td>
              <td><strong>V x Min</strong></td>
            </tr>
            <tr>
              <td><strong>Frecuencia Respiratoria</strong></td>
              <td>{{$registro_clinico_data->sv_frecuencia_respiratoria}}</td>
              <td><strong>V x Min</strong></td>
            </tr>
            <tr>
              <td><strong>Temperatura</strong></td>
              <td>{{$registro_clinico_data->sv_temperatura}}</td>
              <td><strong>°C</strong></td>
            </tr>
            <tr>
              <td><strong>Peso</strong></td>
              <td>{{$registro_clinico_data->sv_peso}}</td>
              <td><strong>Kg</strong></td>
            </tr>
            <tr>
              <td><strong>Talla</strong></td>
              <td>{{$registro_clinico_data->sv_talla}}</td>
              <td><strong>Cm</strong></td>
            </tr>
            <tr>
              <td><strong>Saturacion de Oxigeno</strong></td>
              <td>{{$registro_clinico_data->sv_saturacion_oxigeno}}</td>
              <td></td>
            </tr>
            <tr>
              <td><strong>Circunferencia Abdominal</strong></td>
              <td>{{$registro_clinico_data->sv_circunferencia_abdominal}}</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div><br>
     <div class="w3-row">
      <div class="w3-col s12" style="font-size: 10px">
        <table class="w3-table" border="1">
          <thead>
            <tr>
              <th colspan="3"><strong>Examen Fisico</strong></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Cabeza / Cuello<br>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Traqueostomia</td>
                      <td>{{$registro_clinico_data->exf_traqueostomia}}</td>
                    </tr>
                    <tr>
                      <td>Sonda Nasogastrica</td>
                      <td>{{$registro_clinico_data->exf_sondanasogastrica}}</td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td>{{$registro_clinico_data->exf_cabezaycuello}}</td>
              <td>{{$registro_clinico_data->exf_cabezaycuello_obs}}</td>
            </tr>
            <tr>
              <td>Neurologico</td>
              <td>{{$registro_clinico_data->exf_neurologico}}</td>
              <td>{{$registro_clinico_data->exf_neurologico_obs}}</td>
            </tr>
            <tr>
              <td>Genitourinario</td>
              <td>{{$registro_clinico_data->exf_genitourinario}}</td>
              <td>{{$registro_clinico_data->exf_genitourinario_obs}}</td>
            </tr>
            <tr>
              <td>Cardiopulmonar</td>
              <td>{{$registro_clinico_data->exf_cardiopulmonar}}</td>
              <td>{{$registro_clinico_data->exf_cardiopulmonar_obs}}</td>
            </tr>
            <tr>
              <td>Abdomen<br>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Gastrostomia</td>
                      <td>{{$registro_clinico_data->exf_gastrostomia}}</td>
                    </tr>
                    <tr>
                      <td>Colostomia</td>
                      <td>{{$registro_clinico_data->exf_colostomia}}</td>
                    </tr>
                    <tr>
                      <td>Cistostomia</td>
                      <td>{{$registro_clinico_data->exf_cistostomia}}</td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td>{{$registro_clinico_data->exf_abdomen}}</td>
              <td>{{$registro_clinico_data->exf_abdomen_obs}}</td>
            </tr>
            <tr>
              <td>Extremidades<br>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Vias endovenosas</td>
                      <td>{{$registro_clinico_data->exf_viasendovenosas}}</td>
                    </tr>
                   
                  </tbody>
                </table></td>
              <td>{{$registro_clinico_data->exf_extremidades}}</td>
              <td>{{$registro_clinico_data->exf_extremidades_obs}}</td>
            </tr>
            <tr>
              <td>Piel y faneras</td>
              <td>{{$registro_clinico_data->exf_pielyfaneras}}</td>
              <td>{{$registro_clinico_data->exf_pielyfaneras_obs}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div><br>
    
    
    <div class="w3-row">
  <div class="w3-col s12" style="font-size: 10px">
    <table class="w3-table" border="1">
      <thead>
        <tr>
          <th>Escala de Barthel</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Comer</td>
          <td>{{$registro_clinico_data->comer}}</td>
        </tr>
        <tr>
           <td>Bañarse</td>
          <td>{{$registro_clinico_data->banarse}}</td>
        </tr>
        <tr>
           <td>Vestirse</td>
          <td>{{$registro_clinico_data->vestirse}}</td>
        </tr>
        <tr>
           <td>Arreglarse</td>
          <td>{{$registro_clinico_data->arreglarse}}</td>
        </tr>
        <tr>
           <td>Deposicion</td>
          <td>{{$registro_clinico_data->deposicion}}</td>
        </tr>
        <tr>
           <td>Miccion</td>
          <td>{{$registro_clinico_data->miccion}}</td>
        </tr>
        <tr>
           <td>Usar el retrete</td>
          <td>{{$registro_clinico_data->usar_el_retrete}}</td>
        </tr>
        <tr>
           <td>Traslado al sillon/cama</td>
          <td>{{$registro_clinico_data->traslado_al_sillon_cama}}</td>
        </tr>
        <tr>
           <td>Deambulacion</td>
          <td>{{$registro_clinico_data->deambulacion}}</td>
        </tr>
        <tr>
           <td>Subir y bajar escalares</td>
          <td>{{$registro_clinico_data->subir_bajar_escaleras}}</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td><strong>Total : </strong>{{$registro_clinico_data->total}}</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div><br>
<div class="w3-row">
  <div class="w3-col s12" style="font-size: 10px">
    <table class="w3-table" border="1">
      <thead>
        <tr>
          <th>El resultado despues de la evaluacion de la escala de karnofsky</th>
        </tr>
      </thead>  
      <tbody>
        <tr>
          <td>{{$registro_clinico_data->escala_karnofsky}}</td>
        </tr>
      </tbody>
     </table>
  </div>
</div>
   
    
    <br>
    <div class="w3-row">
      <div class="w3-col s4" style="font-size: 10px"><strong>DIAGNOSTICOS PACIENTE</strong></div>
    </div>
    
    <div class="w3-row">
      <div class="w3-col s12" style="font-size: 10px">
         <table class="w3-table" id="tbl_dgpaciente" border="1"> 
          <thead>
            <tr>
              <th>Diagnostico</th>
              <!--
              <th class="w3-col s3">Fecha diagnostico</th>-->
              </tr>
          </thead>
          <tbody>
            @foreach($paciente->cie as $cie)
            <tr>
               <td>{{$cie->cie->nombre}} {{$cie->cie->codigo_cie}} <input type="hidden" name="paciente_dg[]" value="{{$cie->cie->id}}"></td><!--

               <td><div class='input-group date' id='datepicker'>
                 <input type="text" class="form-control" readonly="" name="fecha_dg_paciente[]" style="color: #555" value="{{$cie->fecha_diagnostico}}"><span class="input-group-addon " >
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
               </div>
             </td>-->
            </tr>
            @endforeach
            
          </tbody>
        </table>  
      </div>
    </div>
    
    <br>
    <div class="w3-row">
      <div class="w3-col s4" style="font-size: 10px"><strong>Analisis Medico</strong></div>
    </div>
    <div class="w3-row">
      <div class="w3-col s12" style="font-size: 10px">{{$registro_clinico_data->analisis_medico}}</div>
    </div>
    
    <br>
    <div class="w3-row">
      <div class="w3-col s4" style="font-size: 10px"><strong>Plan de Manejo</strong></div>
    </div>
    <div class="w3-row">
      <div class="w3-col s12" style="font-size: 10px">
        <table class="table table-striped">
          <tbody>
            @php echo $registro_clinico_data->plan_de_manejo @endphp
          </tbody>
        </table>
        
      </div>
    </div>

    <br>
    <div class="w3-row">
      <div class="w3-col s4" style="font-size: 10px"><strong>Recomendaciones / Signos de alarma</strong></div>
    </div>
    <div class="w3-row">
      <div class="w3-col s12" style="font-size: 10px">{{$registro_clinico_data->signosdealarma}}</div>
    </div>

     <br>
    <div class="w3-row">
      <div class="w3-col s4" style="font-size: 10px"><strong>Interconsulta</strong></div>
    </div>
    <div class="w3-row">
      <div class="w3-col s12" style="font-size: 10px">@php echo $registro_clinico_data->interconsulta @endphp</div>
    </div>
  
 @include('registrosclinicos.print.partials._footer')






</body>

</html>




