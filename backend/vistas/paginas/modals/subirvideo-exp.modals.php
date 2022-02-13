<!-- Modal -->
<div class="modal fade" id="subirvideo-exp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content h-100" style="min-height: 480px">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nueva Experiencia única </h5>
                <button type="button" class="btn-close close-elemento-exp" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="tab-content border-top" id="myTabContent-exp">
                    <div class="tab-pane fade show active" id="tabprewiev-ele-exp" role="tabpanel" aria-labelledby="tabprewiev-tab" style="min-height: 480px">
                        <div class="container">
                            <div class="col-12">
                                <label class="form-title my-3" for="">Evento en Vivo</label>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="link-addElemento" placeholder="Enlace para Evento en vivo" >
                                    <label for="floatingInput">Enlace para Evento en vivo</label>
                                </div> 
                                <div class="container cont-icon-upload">
                                    <label class="form-title my-3" for="">Video Preview</label>
                                    <div class="row h-50 justify-content-center align-content-center">
                                        <div class="box-icon">
                                            <label class="btn btn-default btn-file">
                                            <i class="fas fa-upload"></i><input type="file" id="subir-video-ele-exp" name="video" style="display: none;" required enctype="multipart/form-data">
                                            </label>
                                            <div id="preview-exp" ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end pt-4 border-top">
                                    <button class="btn btn-primary btn-video">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade " id="result-ele" role="tabpanel" aria-labelledby="home-result" style="min-height: 480px">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-12 mb-4 text-center">
                                    <label class="form-title pb-4 pt-2 mb-2 mt-4">Aguarde un momento, por favor. Se estan generando el elemento. <br> No cierre la ventana hasta que este proceso no haya finalizado.</label>
                                </div>
                                <div class="col-12 d-flex flex-column justify-content-center" style="margin-bottom: 40px;">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 px-4 text-right">
                                            <label class="form-title mb-0">Guardando datos del elemento</label>
                                        </div>
                                        <div class="col-6 text-center" id="box-carga-datos">
                                            <!-- remueve cuando se complete -->
                                            <div class="loader loader--style2" id="loading-carga-datos-ele" title="1">
                                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70px" height="60px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z"> <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/></path></svg>
                                            </div><!-- remueve cuando se complete -->
                                            <!-- lo mete una vez que esta ok -->
                                            <div id="loading-carga-datos-ok-ele" style="display: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve" width="100px" height="60px">
                                                <defs></defs></style>
                                                <circle class="ok circle" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" cx="16" cy="16" r="12"/>
                                                <polyline class="ok check" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" points="23,12 15,20 10,15 "/>
                                                </svg>
                                            </div><!-- lo mete una vez que esta ok -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 h-25 d-flex flex-column justify-content-center">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 px-4 text-right">
                                            <label class="form-title mb-0">Guardando video</label>
                                        </div>
                                        <div class="col-6 text-center" id="box-loading-video">
                                            <!-- remueve cuando se complete -->
                                            <div class="loader loader--style2" id="loading-video" >
                                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="70px" height="60px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                                <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                                <animateTransform attributeType="xml"
                                                    attributeName="transform"
                                                    type="rotate"
                                                    from="0 25 25"
                                                    to="360 25 25"
                                                    dur="0.6s"
                                                    repeatCount="indefinite"/>
                                                </path>
                                                </svg>
                                            </div><!-- remueve cuando se complete -->
                                            <!-- lo mete una vez que esta ok -->
                                            <div class="loading-ok" style="display: none" id="loading-video-ok">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve" width="100px" height="60px">
                                                <defs></defs></style>
                                                <circle class="ok circle" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" cx="16" cy="16" r="12"/>
                                                <polyline class="ok check" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" points="23,12 15,20 10,15 "/>
                                                </svg>
                                            </div><!-- lo mete una vez que esta ok -->
                                        </div>
                                    </div>
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
$('.close-elemento-exp').click(() => {
    $('#myTabContent-exp input').val("")
    $('#myTabContent-exp textarea').val("")
    $('#preview-exp').empty()
    $('.btn-file').css('display', 'block');
})
$(function() {
    var current_progress = 0;
    var interval = setInterval(function() {
        current_progress += 10;
        $("#dynamic")
        .css("width", current_progress + "%")
        .attr("aria-valuenow", current_progress)
        .text(current_progress + "% Complete");
        if (current_progress >= 100)
            clearInterval(interval);
    }, 1000);
});
document.getElementById("subir-video-ele-exp").onchange = function(e) {
    $('.btn-file').css('display', 'none');
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
        let preview = document.getElementById('preview-exp'),
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