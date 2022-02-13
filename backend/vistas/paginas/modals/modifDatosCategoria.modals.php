<!-- Modal -->
<div class="modal fade" id="modifDatosCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="idCategoria-label">Modifica Datos Categoria <span id="nombre-categoria"></span></h5>
                <button type="button" class="btn-close close-modifCategorias" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="container">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="titulo-es-categoria-modifica" placeholder="name@example.com">
                        <label for="floatingInput">Titulo Español</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="titulo-en-categoria-modifica" placeholder="name@example.com">
                        <label for="floatingInput">Titulo Ingles</label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="descripcion-es-categoria-modifica" style="height: 100px"></textarea>
                        <label for="floatingTextarea">Descripción Español</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="descripcion-en-categoria-modifica" style="height: 100px"></textarea>
                        <label for="floatingTextarea">Descripción Ingles</label>
                    </div> -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 px-0">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="orden-categoria-modifica" placeholder="name@example.com">
                                    <label for="floatingTextarea">Orden</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <div class="box-btn float-right">
                    <button type="button" class="btn btn-primary modifica-categoria">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.close-modifCategorias').click(()=>{
        window.location.reload();
    })
</script>