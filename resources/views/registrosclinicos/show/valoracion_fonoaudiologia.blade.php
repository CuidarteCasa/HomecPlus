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
                    <td style="width: 180px"><strong>Comprension</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->comprension}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Expresion</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->expresion}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Praxis Orofaciales</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->praxis_orofaciales}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Estado del OFA</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->estado_del_ofa}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Diagnostico Comunicativo</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->diagnostico_comunicativo}}</td>

                </tr>
                <tr>
                    <td style="width: 180px"><strong>Observaciones</strong></td>
                    <td style="word-wrap: break-word;">{{$registro_clinico_data->observaciones}}</td>

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