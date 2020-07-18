<div class="modal fade" id="ordenamientosModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Ordenamientos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                                                    <table class="table table-borderless table-vertical-center">
                                                        
                                                        <tbody>
                                                            {{\App\Http\Controllers\OrdendeTrabajoController::OrderPreOrders($order->id)}}
                                                            
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>