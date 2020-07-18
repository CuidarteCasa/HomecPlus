


$(document).ready(function(){

	$(document).on('click','.quickNote',function(){
		$("#quickNote").modal("show")

		 var service = $(this).attr('data-service');
		 var order = $(this).attr('data-order');
		 var activity  = $(this).attr('data-activity'); 
		 let constraintObj = { 
            audio: true, 
            video: false
        }; 
		 navigator.mediaDevices.getUserMedia(constraintObj)
        .then(function(mediaStreamObj) {
        	
			let mediaRecorder = new MediaRecorder(mediaStreamObj);
			let chunks = [];
			let stopButton=document.querySelector('#btnStop');
			mediaRecorder.start();
        	console.log(mediaRecorder.state);
        	stopButton.addEventListener('click', (ev)=>{
                mediaRecorder.stop();
                console.log(mediaRecorder.state);

            });
            mediaRecorder.ondataavailable = function(ev) {
                chunks.push(ev.data);
            }
             mediaRecorder.onstop = (ev)=>{
                let blob = new Blob(chunks, { 'type' : 'audio/mp3;' });
                chunks = [];
                sendData(blob,service,order,activity);
                
            }
        }).catch();


		
	})

})



var sendData = function(data,service,order,activity){
	formData = new FormData();
	 formData.append('file',data);
	 formData.append('order',order);
	 formData.append('service',service);
	 formData.append('activity',activity);
	 $.ajax({
	 	url:'/quickNoteStore',
	 	type:'post',
	 	data:formData,
	 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData:false,
        contentType:false,
        success:function(){
        	 sweetMessage('Exito','Nota de audio guardada con exito','success');
        	 $("#quickNote").modal("hide");
        	 setTimeout(function(){ location.reload() },1000) ;

        }
	 })
	 

}