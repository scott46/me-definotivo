<!-- Modal -->
<div class="modal fade" id="modifAutor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modifica Autor</h5>
        <button type="button" class="btn-close close-autor-modifica" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreAutor-modifica"></textarea>
                <label for="floatingTextarea">Nombre del Autor</label>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary modifica-autor">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('.close-autor').click(()=>{
  $('#nombreAutor-modifica').val('')
})
</script>