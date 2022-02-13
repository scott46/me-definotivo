<!-- Modal -->
<div class="modal fade" id="addAutor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Autor</h5>
        <button type="button" class="btn-close close-autor" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreAutor"></textarea>
                <label for="floatingTextarea">Nombre del Autor</label>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary guarda-autor">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('.close-autor').click(()=>{
  $('#nombreAutor').val('')
})
</script>