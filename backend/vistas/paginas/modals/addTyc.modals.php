<!-- Modal -->
<div class="modal fade" id="addTyc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo TyC</h5>
        <button type="button" class="btn-close close-tyc" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div id="box-tyc">

              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="titulo1" style="height:100px"></textarea>
                <label for="floatingTextarea">Titulo en Español</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="titulo2" style="height:100px"></textarea>
                <label for="floatingTextarea">Titulo en Ingles</label>
              </div>              
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="parrafo1" style="height:100px"></textarea>
                <label for="floatingTextarea">Parrafo en Español</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="parrafo2" style="height:100px"></textarea>
                <label for="floatingTextarea">Parrafo en Ingles</label>
              </div>
              <div class="col-3 px-0">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" placeholder="Numero de orden" id="orden-tyc" >
                  <label for="floatingTextarea">Orden</label>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary guarda-tyc">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('.close-tyc').click(()=>{
  $('#titulo1').val('')
  $('#titulo2').val('')
  $('#parrafo1').val('')
  $('#parrafo2').val('')
})
</script>