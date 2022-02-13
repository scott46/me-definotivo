<!-- Modal -->
<div class="modal fade" id="modificaFaq" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modifica FAQ <span class="title-faq-modifica"></span></h5>
        <button type="button" class="btn-close close-faq" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div id="box-faq">

              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="pregunta1-modifica" style="height:100px"></textarea>
                <label for="floatingTextarea">Pregunta Español</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="pregunta2-modifica" style="height:100px"></textarea>
                <label for="floatingTextarea">Pregunta Ingles</label>
              </div>              
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="respuesta1-modifica" style="height:100px"></textarea>
                <label for="floatingTextarea">Respuesta Español</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="respuesta2-modifica" style="height:100px"></textarea>
                <label for="floatingTextarea">Respuesta Ingles</label>
              </div>
              <div class="col-3 px-0">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" placeholder="Numero de orden" id="orden-faq-modifica" >
                  <label for="floatingTextarea">Orden</label>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary guarda-faq-modifica">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('.close-faq').click(()=>{
  $('#pregunta1-modifica').val('')
  $('#pregunta2-modifica').val('')
  $('#respuesta1-modifica').val('')
  $('#respuesta2-modifica').val('')
})
</script>