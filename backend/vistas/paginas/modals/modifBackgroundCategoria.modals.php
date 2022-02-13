<!-- Modal -->
<div class="modal fade" id="modifBackgroundCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="idCategoria-label">Modifica Background de la Categoria <span id="nombre-categoria-bk"></span></h5>
            <button type="button" class="btn-close close-modifBackgroundCategoria" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" style="min-height: 400px;">
            <div class="container">
                <div class="container cont-icon-upload-image" >
                    <label class="form-title my-3" for="">Seleccione la portada de la categoria</label>
                    <div class="row h-50 justify-content-center align-content-center" style="margin-top: 100px">
                        <div class="box-icon-image">
                            <label class="btn btn-default btn-file-imagen-categoria-modif-back">
                                <i class="far fa-image"></i><input type="file" id="subir-imagen-categoria-modif-back" style="display: none;" required>
                            </label>
                            <!-- <div id="preview-image-categoria-modif-back" ></div> -->
                            <!-- editor -->
                            <div id="editor-modif-categoria"></div>
                            <canvas id="preview-ca-modif-categoria"></canvas>
                            <code class="d-none" id="base64-modif-categoria"></code>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <div class="box-btn float-right">
                <button type="button" class="btn btn-primary guarda-categoria-modif-bk" >Guardar</button>
            </div>
        </div>

    </div>
  </div>
</div>

<style>
#preview-ca-modif-categoria {
    position: relative;
    overflow: hidden;
    height: 380px;
    object-fit: contain;
    display: none;
    margin-top: 40px;
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
  .btn-clear-imagen-modif-bk {
    width: 40px;
    height: 40px;
    background: red;
  }
</style>
<script>
    document.getElementById("subir-imagen-categoria-modif-back").onchange = function(e) {
        $('.btn-file-imagen-categoria-modif-back').css('display', 'none');
        //editar imagen
        const editor = document.querySelector('#editor-modif-categoria');
        const miCanvas = document.querySelector('#preview-ca-modif-categoria');
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
                document.querySelector('#base64-modif-categoria').textContent = imagenEn64;
            }
            // Proporciona la imagen cruda, sin editarla por ahora
            miNuevaImagenTemp.src = urlImage;
        }
    }


    // ciarre modal, cargamos la pagina
    $('.close-modifBackgroundCategoria').click(() => {
        window.location.reload(); 
    })
</script>