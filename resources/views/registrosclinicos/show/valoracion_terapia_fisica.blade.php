@include('registrosclinicos.show.partials.serviceInfo')
<div class="row">
    <div class="col-12">
        <div class="card card-custom bg-light-success card-stretch gutter-b">
    <!--begin::Header-->
    @include('registrosclinicos.show.partials.registerhead')
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-2">

        <div class="col-12">
            <h4>SISTEMA OSTEOMUSCULAR</h4>
        </div><br>
       <div class="col-12" >
        <table class="table" style="table-layout: fixed;">
           
            <tbody>
                <tr>
                    <td style="width: 180px"><strong>Dolor</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_dolor}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Edema</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_edema}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Medidas</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_medidas}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Fuerza muscular</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_fuerza_muscular}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Retraccion muscular</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_retracciones_musculares}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Postura</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_postura}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Marcha</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_marcha}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Otros</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->so_otros}}</td>

                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="col-12">
            <h4>SISTEMA NEUROLOGICO</h4>
        </div><br>
     <div class="col-12" >
        <table class="table" style="table-layout: fixed;">
            
            <tbody>
                <tr>
                    <td style="width: 180px"><strong>Conciencia</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_estado_conciencia}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Funciones mentales superiores</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_funciones_mentales_superiores}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Tono muscular</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_tono_muscular}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Sensibilidad</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_sensibilidad}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Actividad fisica</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_actividad_fisica}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Evaluacion Funcional</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_evaluacion_funcional}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Coordinacion</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_coordinacion}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Equilibrio</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_equilibrio}}</td>

                </tr>
                 <tr>
                    <td style="width: 180px"><strong>Otros</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sn_otros}}</td>

                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <div class="col-12" >
        <table class="table" style="table-layout: fixed;">
            
            <tbody>
                <tr>
                    <td style="width: 180px"><strong>Plan de manejo</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->plandemanejo}}</td>

                </tr>
                
            </tbody>
        </table>
    </div>
</div>
    <!--end::Body-->
</div>
    </div>
    
</div>