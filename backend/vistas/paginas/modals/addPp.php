<!-- Modal -->
<div class="modal fade" id="addpp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Politica de Privacidad</h5>
        <button type="button" class="btn-close close-pp" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div id="box-tyc">

              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="titulo1pp" style="height:100px"></textarea>
                <label for="floatingTextarea">Titulo en Español</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="titulo2pp" style="height:100px"></textarea>
                <label for="floatingTextarea">Titulo en Ingles</label>
              </div>              
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="parrafo1pp" style="height:100px"></textarea>
                <label for="floatingTextarea">Parrafo en Español</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="parrafo2pp" style="height:100px"></textarea>
                <label for="floatingTextarea">Parrafo en Ingles</label>
              </div>
              <div class="col-3 px-0">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" placeholder="Numero de orden" id="orden-pp" >
                  <label for="floatingTextarea">Orden</label>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary guarda-pp">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('.close-pp').click(()=>{
  $('#titulo1pp').val('')
  $('#titulo2pp').val('')
  $('#parrafo1pp').val('')
  $('#parrafo2pp').val('')
})
</script>