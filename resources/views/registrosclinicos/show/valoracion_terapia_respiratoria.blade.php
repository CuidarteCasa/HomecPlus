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
                    <td style="width: 180px"><strong>Tos</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->tos}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Expectoracion</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->expectoracion}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Disnea</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->disnea}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>SPO</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->spo}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Oxigenoterapia</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->oxigenoterapia}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>SDR</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->sdr}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Patron Respiratorio</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->patron_respiratorio}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Tipo de Torax</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->tipo_torax}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Expansibilidad Toraxica</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->expansibilidad_toracica}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Distensibilidada Toraxica</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->distensibilidad_toracica}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Auscultacion</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->auscultacion}}</td>

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