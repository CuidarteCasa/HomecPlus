@include('registrosclinicos.show.partials.serviceInfo')
<div class="row">
    <div class="col-12">
        <div class="card card-custom bg-light-success card-stretch gutter-b">
    <!--begin::Header-->
    @include('registrosclinicos.show.partials.registerhead')
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-2">
        @include('registrosclinicos.show.partials.motivo')
        <br>
        @include('registrosclinicos.show.partials.diagnosticos')
        <br>
        @include('registrosclinicos.show.partials.examenfisico')
        <br>
        @include('registrosclinicos.show.partials.barthel')
        <br>
        @include('registrosclinicos.show.partials.karnosky')
        <br>
        
        @include('registrosclinicos.show.partials.cfs')
        <br>

        @include('registrosclinicos.show.partials.anaplansignos')
        <br>
        @include('registrosclinicos.show.partials.interconsulta')
        <br>
        @include('registrosclinicos.show.partials.plandemanejo')
        <br>
        @include('registrosclinicos.show.partials.notes')
    </div>
    <!--end::Body-->
</div>
    </div>
    
</div>


