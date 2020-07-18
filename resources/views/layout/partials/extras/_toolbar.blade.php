{{-- Sticky Toolbar --}}
<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4 bg-primary">
    
     {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Historial clinico" data-placement="left">
        <a class="btn btn-sm btn-icon btn-icon-info btn-bg-light btn-text-warning btn-hover-info" href="#" data-toggle="modal" data-target="#History" id="ClinicHistoryToolbar">
            <i class="flaticon-clock-2"></i>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Laboratorios" data-placement="left">
        <a class="btn btn-sm btn-icon btn-icon-primary btn-bg-light btn-text-warning btn-hover-primary" href="#" data-toggle="modal" data-target="#">
            <i class="fas fa-syringe"></i>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Formulaciones" data-placement="left">
        <a class="btn btn-sm btn-icon btn-icon-secondary btn-bg-light btn-text-warning btn-hover-secondary" href="#" data-toggle="modal" data-target="#formulations" id="mednutcom">
            <i class="flaticon2-sheet"></i>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Estadisticas Clinicas" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-text-warning btn-hover-warning" id="ClinicStadistiscInfo" href="#" data-toggle="modal" data-target="#ClinicStadistisc">
            <i class="flaticon2-line-chart      "></i>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Diagnosticos" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-text-warning btn-hover-success" href="#" data-toggle="modal" data-target="#dx" id="dxToolbar">
            <i class="flaticon-notepad"></i>
        </a>
    </li>

     {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Antecedentes" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-text-warning btn-hover-danger"  href="#" data-toggle="modal" data-target="#antecedentesMdl" id="antecedentesToolbar">
            <i class="flaticon2-hourglass-1"></i>
        </a>
    </li>

    {{-- Item --}}
    <li class="nav-item mb-2" data-toggle="tooltip" title="Notas de voz" data-placement="left">
        <a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-text-warning btn-hover-primary"  href="#" data-toggle="modal" data-target="#quiNotesModal" >
            <i class="flaticon2-exclamation"></i>
        </a>
    </li>

<!--
    @if (config('layout.extras.chat.display') == true)
        
        <li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Chat Example" data-placement="left">
            <a class="btn btn-sm btn-icon btn-bg-light btn-text-danger btn-hover-danger" href="#" data-toggle="modal" data-target="#kt_chat_modal">
                <i class="flaticon2-chat-1"></i>
            </a>
        </li>
    @endif
-->
</ul>
