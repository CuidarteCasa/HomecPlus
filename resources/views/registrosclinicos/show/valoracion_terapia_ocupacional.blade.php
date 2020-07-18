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
            <h4>INFORMACION GENERAL</h4>
        </div><br>
       <div class="col-12" >
        <table class="table" style="table-layout: fixed;">
           
            <tbody>
                <tr>
                    <td style="width: 180px"><strong>Componente Neuromuscular</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->componente_neuromuscular}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Componente Motor</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->componente_motor}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Componente Sensorial</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->componente_sensorial}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Componente Cognitivo</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->componente_cognitivo}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Componente Psicologico</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->componente_psicologico}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Procesamiento Perseptivo</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->procesamiento_perceptivo}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Implicaciones funcionales</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->implicaciones_funcionales}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>IDX</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->idx}}</td>

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