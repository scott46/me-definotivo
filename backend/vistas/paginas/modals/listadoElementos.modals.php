
<div class="modal fade" id="listadoElementos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Elementos</h5>
            <button type="button" class="btn-close close-elementos" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">

                <div class="col-12 text-left mt-4">
                  <div class="card">
                    <div class="card-body">
                      <p class="mb-0" ><strong>Background: </strong>(Contenidos y elementos)Las imágenes deben ser menores a 2 MB, para un mejor rendimiento. <br>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="cont-12">
                    <table class="table table-bordered table-striped dt-responsive tablaMEElementos" width="100%">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th></th>
                                <th style="text-align: center;">Tipo</th>
                                <th>Título</th>
                                <th>Free</th>
                                <th width='120px'>Estado</th>
                                <th width='120px'>Preview</th>
                                <th width='80px' >Acciones</th>
                            </tr>   
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<script>
    // $('.close-elementos').click(() => {
    //     var table = $('.tablaMEElementos').DataTable({
    //         paging: false,
    //     });
    //     //table.clear();
    //     table.destroy();
    // })
</script>