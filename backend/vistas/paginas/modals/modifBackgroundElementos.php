<!-- Modal -->
<div class="modal fade" id="modifBackgroundElementos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="idElemento-label">Modifica Background del Elemento <span id="nombre-elemento-bk"></span></h5>
            <button type="button" class="btn-close close-modifBackgroundElemento" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" style="min-height: 400px;">
            <div class="container">
                <div class="container cont-icon-upload-image" >
                    <label class="form-title my-3" for="">Seleccione la portada del Elemento</label>
                    
                    <div class="box-icon-image">
                        <label class="btn btn-default btn-file-imagen-elemento-modif-back">
                            <i class="far fa-image"></i><input type="file" id="subir-imagen-elemento-modif-back" style="display: none;" required>
                        </label>
                        <!-- <div id="preview-image-elemento-modif-back" ></div> -->
                        <!-- editor -->
                        <div id="editor-modif-elemento"></div>
                        <canvas id="preview-ca-modif-elemento"></canvas>
                        <code class="d-none" id="base64-modif-elemento"></code>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal-footer">
            <div class="box-btn float-right">
                <button type="button" class="btn btn-primary guarda-elemento-modif-bk" >Guardar</button>
            </div>
        </div>

    </div>
  </div>
</div>

<style>
#preview-ca-modif-elemento {
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
  #modifBackgroundElementos .box-icon-image {
    height: 400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 0px;
}
  #editor-modif-elemento .croppr-container {
    width: 100%;
    height: 100%;
  }
  #editor-modif-elemento .croppr-container .croppr{
      height: 100%;
  }
  #editor-modif-elemento .croppr-container .croppr img{
      height: 100%;
  }
</style>
<script>
    document.getElementById("subir-imagen-elemento-modif-back").onchange = function(e) {
        $('.btn-file-imagen-elemento-modif-back').css('display', 'none');
        //editar imagen
        const editor = document.querySelector('#editor-modif-elemento');
        $(editor).addClass('w-100 h-100 text-center')
        const miCanvas = document.querySelector('#preview-ca-modif-elemento');
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
                //aspectRatio: 100 / 400,
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
                document.querySelector('#base64-modif-elemento').textContent = imagenEn64;
            }
            // Proporciona la imagen cruda, sin editarla por ahora
            miNuevaImagenTemp.src = urlImage;
        }
    }

    $('.close-modifBackgroundElemento').click(() => {
        $('.btn-file-imagen-elemento-modif-back').css('display', 'block');
        $('#editor-modif-elemento').removeClass('w-100 h-100 text-center')
        $('#editor-modif-elemento').empty();
    })

</script>