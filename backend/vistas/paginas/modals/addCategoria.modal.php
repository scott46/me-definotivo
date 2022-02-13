<!-- Modal -->
<div class="modal fade" id="addCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="idCategoria-label">Nueva Categoria</h5>
        <button type="button" class="btn-close close-addcategoria" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <div class="container">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button disabled class="nav-link active" id="detalle-categoria-tab" data-bs-toggle="tab" data-bs-target="#detalle-categoria" type="button" role="tab" aria-controls="home" aria-selected="true">Detalles</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button disabled class="nav-link" id="background-categoria-tab" data-bs-toggle="tab" data-bs-target="#background-categoria" type="button" role="tab" aria-controls="profile" aria-selected="false">Background</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button disabled class="nav-link" id="resultado-categoria-tab" data-bs-toggle="tab" data-bs-target="#resultado-categoria" type="button" role="tab" aria-controls="contact" aria-selected="false">Resultado</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="detalle-categoria" role="tabpanel" aria-labelledby="home-tab">.
    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="titulo-es-categoria" placeholder="name@example.com">
                        <label for="floatingInput">Titulo Español</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="titulo-en-categoria" placeholder="name@example.com">
                        <label for="floatingInput">Titulo Ingles</label>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 px-0">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="orden-categoria" placeholder="name@example.com">
                                    <label for="floatingTextarea">Orden</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-btn float-right">
                        <button type="button" class="btn btn-primary btn-pasa-siguiente-categoria">Siguiente</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="background-categoria" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="container cont-icon-upload-image" >
                        <label class="form-title my-3" for="">Seleccione la portada de la categoria</label>

                        <div class="box-icon-image">
                            <label class="btn btn-default btn-file-imagen-categoria">
                            <i class="far fa-image"></i><input type="file" id="subir-imagen-categoria" style="display: none;" required>
                            </label>
                            <!-- <div id="preview-image-categoria" ></div> -->
                            <div id="editor-add-categoria"></div>
                            <canvas id="preview-ca-add-categoria"></canvas>
                            <code class="d-none" id="base64-add-categoria"></code>

                        </div>

                    </div>

                    <div class="box-btn float-right">
                        <button type="button" class="btn btn-primary guarda-categoria" id="btn-guarda-categoria">Guardar</button>
                    </div>

                </div>
                <div class="tab-pane fade" id="resultado-categoria" role="tabpanel" aria-labelledby="contact-tab">
                    
                    <div class="container">
                        <div class="row h-100 align-items-center">
                        
                            <div class="col-12 text-center" style="margin-bottom: 70px">
                                <label class="form-title pb-4 pt-2 mb-2 mt-4">Aguarde un momento, por favor. Se esta generando la categoria. <br> No cierre la ventana hasta que este proceso no haya finalizado.</label>
                            </div>
                            <div class="col-12 d-flex flex-column justify-content-center">
                                <div class="d-flex align-items-center" style="height: 140px !important;">
                                    <div class="col-6 px-4 text-right">
                                        <label class="form-title mb-0">Guardando datos de la categoria</label>
                                    </div>

                                    <div class="col-6 text-center" id="box-carga-datos">
                                    <!-- remueve cuando se complete -->
                                        <div class="loader loader--style2" id="loading-carga-datos-categoria" title="1">
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
                                        <div id="loading-carga-datos-ok-categoria" style="display: none">
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
</div>

<style>
#preview-ca-add-categoria {
    position: relative;
    overflow: hidden;
    height: 200px;
    object-fit: contain;
    display: none;
}
#background-categoria .box-icon-image {
    height: 400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
#editor-add-categoria .croppr-container {
    width: 100%;
    height: 100%;
}
#editor-add-categoria .croppr-container .croppr{
    height: 100%;
}
#editor-add-categoria .croppr-container .croppr img{
    height: 100%;
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
</style>
<script>
    document.getElementById("subir-imagen-categoria").onchange = function(e) {
        var archivo = e.target.files[0]
        if(archivo.type == 'image/jpeg') {
            $('.btn-file-imagen-categoria').css('display', 'none');
            const editor = document.querySelector('#editor-add-categoria');
            $(editor).addClass('w-100 h-100 text-center')
            const miCanvas = document.querySelector('#preview-ca-add-categoria');
            const contexto = miCanvas.getContext('2d');
            abrirEditor(e)
            function abrirEditor(e) {
                // Obtiene la imagen
                urlImage = URL.createObjectURL(e.target.files[0]);
                // Borra editor en caso que existiera una imagen previa
                editor.innerHTML = '';
                let cropprImg = document.createElement('img');
                cropprImg.setAttribute('id', 'croppr');
                editor.appendChild(cropprImg);
                // Limpia la previa en caso que existiera algún elemento previo
                contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);
                // Envia la imagen al editor para su recorte
                document.querySelector('#croppr').setAttribute('src', urlImage);
                // Crea el editor
                new Croppr('#croppr', {
                    //aspectRatio: 80 / 640,
                    aspectRatio: 360 / 640,
                    startSize: [70, 70],
                    onCropEnd: recortarImagen
                })
            }
            function recortarImagen(data) {
                // Variables
                const inicioX = data.x;
                const inicioY = data.y;
                const nuevoAncho = data.width;
                const nuevaAltura = data.height;
                const zoom = 1;
                let imagenEn64 = '';
                // La imprimo
                miCanvas.width = nuevoAncho;
                miCanvas.height = nuevaAltura;
                // La declaro
                let miNuevaImagenTemp = new Image();
                // Cuando la imagen se carge se procederá al recorte
                miNuevaImagenTemp.onload = function() {
                    // Se recorta
                    contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura * zoom, 0, 0, nuevoAncho, nuevaAltura);
                    // Se transforma a base64
                    imagenEn64 = miCanvas.toDataURL("image/jpeg");
                    // Mostramos el código generado
                    document.querySelector('#base64-add-categoria').textContent = imagenEn64;
                }
                // Proporciona la imagen cruda, sin editarla por ahora
                miNuevaImagenTemp.src = urlImage;
            } 
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Debe seleccionar un archivo .jpg',
            })
        }
    }

    //pasa de tab
    $('.btn-pasa-siguiente-categoria').click(() => {
        var tituloEs = $('#titulo-es-categoria').val();
        var tituloEn = $('#titulo-en-categoria').val();
        var descripcionEs = '';
        var descripcionEn = '';
        var ordenCategoria = $('#orden-categoria').val();
        if(tituloEs == '' || tituloEn == '' || ordenCategoria == '') {
            Swal.fire({
                icon: 'error',
                title: 'Todos los datos son obligatorios',
            })
        } else {
            $('#detalle-categoria-tab').removeClass('show active');
            $('#detalle-categoria').removeClass('show active');
            $('#background-categoria').addClass('show active');
            $('#background-categoria-tab').addClass('show active');
        }
    })

    // ciarre modal, cargamos la pagina
    $('.close-addcategoria').click(() => {
        window.location.reload(); 
    })
</script>