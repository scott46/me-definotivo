
$(document).on("click", ".verVideo", function(){
	var idVideo = $(this).attr("idContenidos");
	$('.over').css('display', 'block');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verVideoPost: idVideo},
      success: function (respuesta) {
      	verVideoFunction(respuesta);
      }
  	});
})


function verVideoFunction(video) {
	$('#box-video').append(`<video class="video-fluid z-depth-1" controls><source src="${video}"></source></video>`);
	$('.over').css('display', 'none');
	$('#verVideoModal').modal('show');
}



