<!-- Modal -->
<div class="modal fade" id="subirvideo-exp-modif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content h-100" style="min-height: 480px">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nueva Experiencia única </h5>
                <button type="button" class="btn-close close-elemento-exp-modif" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="tab-content border-top" id="myTabContent-exp-modif">
                    <div class="tab-pane fade show active" id="tabprewiev-ele-exp-modif" role="tabpanel" aria-labelledby="tabprewiev-tab" style="min-height: 480px">
                        <div class="container">
                            <div class="col-12">
                                <label class="form-title my-3" for="">Evento en Vivo</label>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="link-addElemento-modif" placeholder="Enlace para Evento en vivo" >
                                    <label for="floatingInput">Enlace para Evento en vivo</label>
                                </div> 
                                <div class="container cont-icon-upload">
                                    <label class="form-title my-3" for="">Video Preview</label>
                                    <div class="row h-50 justify-content-center align-content-center">
                                        <div class="box-icon">
                                            <label class="btn btn-default btn-file-modif">
                                            <i class="fas fa-upload"></i><input type="file" id="subir-video-ele-exp-modif" name="video" style="display: none;" required enctype="multipart/form-data">
                                            </label>
                                            <div id="preview-exp-modif" ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end pt-4 border-top">
                                    <button class="btn btn-primary btn-detalles-ele-modifica">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<style>
.cont-icon-upload, .cont-icon-upload-image {
    height: 500px
}
.box-icon label, .box-icon-image label{
    padding: 30px;
    border-radius: 50%;
}
.box-icon, .box-icon-image {
    width: fit-content
}
.box-icon label i, .box-icon-image label i{
    font-size: 80px
}
.video-fluid {
    width: 100%;
    height: auto;
    max-height: 400px;
}
.cont-icon-upload, .cont-icon-upload-image {
    height: 500px
}
.box-icon label, .box-icon-image label{
    padding: 30px;
    border-radius: 50%;
}
.box-icon, .box-icon-image {
    width: fit-content
}
.box-icon label i, .box-icon-image label i{
    font-size: 80px
}
.box-icon {
    margin-top: 175px;
}
.loader{
    margin: 0 0 2em;
    text-align: center;
    padding: 1em;
    margin: 0 auto 1em;
    display: inline-block;
    vertical-align: top;
}
/*
  Set the color of the icon
*/
svg path,
svg rect{
  fill: #FF6700;
}
svg {
  display: inline-block;
}
.ok {
  stroke-dasharray: 1000;
  stroke-dashoffset: 0;
}
.ok.circle {
  animation: ok-dash 2s ease-in;
}
.ok.check {
  stroke-dashoffset: -100;
  animation: ok-dash-check 3.5s 0.05s ease-in forwards;
}
@keyframes ok-dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes ok-dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}
</style>
<script>
$('.close-elemento-exp-modif').click(() => {
    $('#myTabContent-exp-modif input').val("")
    $('#myTabContent-exp-modif textarea').val("")
    $('#preview-exp-modif').empty()
    $('.btn-file-modif').css('display', 'block');
})
// $(function() {
//     var current_progress = 0;
//     var interval = setInterval(function() {
//         current_progress += 10;
//         $("#dynamic")
//         .css("width", current_progress + "%")
//         .attr("aria-valuenow", current_progress)
//         .text(current_progress + "% Complete");
//         if (current_progress >= 100)
//             clearInterval(interval);
//     }, 1000);
// });
document.getElementById("subir-video-ele-exp-modif").onchange = function(e) {
    $('.btn-file-modif').css('display', 'none');
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
        let preview = document.getElementById('preview-exp-modif'),
        video = document.createElement('video');
        video.className = 'video-fluid z-depth-1';
        video.setAttribute('controls', '');
        var source = document.createElement('source');
        source.src = reader.result;
        video.append(source);
        preview.innerHTML = '';
        preview.append(video);
    };
}
</script>