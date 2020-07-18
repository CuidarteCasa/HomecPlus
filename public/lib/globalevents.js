//console log
Pusher.logToConsole = true;
Echo.logToConsole = true;
//end

//EVENT TASK
Echo.private(`task`)
.listen('TaskEvent', (e) => {
toastr.info("Nuevo servicio asignado");
});
//END    