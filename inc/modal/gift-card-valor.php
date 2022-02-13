<div class="modal fade modal-info" id="giftCardValor" tabindex="-1" role="dialog" aria-labelledby="giftCardValorLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-line gradient-2"></div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-giftcard">
        <div class="row mb-5">
    <div class="col">
      <h2>Regalá<br>experiencias</h2>
      <p class="desc-gc">Elegí un contenido, seleccioná o escribí un importe, personalizá el mensaje y enviale un regalo a alguien especial.</p>
    </div>
  </div>
<div class="row mb-5">
          <div class="col-lg-6">
            <img src="imgs/gift-card-canal.png" alt="gift card" class="img-fluid">
          </div>
          <div class="col-lg-6">
            <select class="form-control select-exp gradient-1 mb-3">
              <option value="">ELEGí UNA EXPERIENCIA</option>
              <option>EXPERIENCIA 1</option>
              <option>EXPERIENCIA 2</option>
              <option>EXPERIENCIA 3</option>
            </select>
          <h3 class="title-gc mb-3">VALOR DE LA GIFT CARD</h3>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <input class="cantidad" type="text" name="cantidad" placeholder="$ Otra Cantidad">
  <label class="btn btn-secondary">
    <input type="radio" name="valorgiftcard" value="200">$200
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="valorgiftcard" value="400">$400
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="valorgiftcard" value="600">$600
  </label>
</div>
            <div class="product-cant border d-flex flex-row">
              <h6 class="align-self-center">Cantidad:</h6>
              <div class="input-group number-spinner">
                <input type="text" class="form-control text-center" value="1">
                <div class="group-cant">
                  <span class="input-group-btn">
                    <button data-dir="up"><i class="bi bi-chevron-up"></i></button>
                  </span>
                  <span class="input-group-btn">
                    <button data-dir="dwn"><i class="bi bi-chevron-down"></i></button>
                  </span>
                </div>
              </div>
            </div>


          </div>   
        </div>

        <div class="row">
        <div class="col">
          <form>
            <div class="row border-top border-bottom pt-4 pb-4">
              <div class="col">
                <h3 class="title-gc">ELEGIR LA FORMA DE ENVIO</h3>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="email" value="Email">
                  <label class="form-check-label small">Por email</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="whatsapp" value="whatsapp">
                  <label class="form-check-label small">Por whatsapp</label>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-12 col-lg-6 mt-3">
              <h3 class="title-gc">PARA</h3>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="col-form-label">Seleccioná tu país</label>
                    <select class="custom-select form-control-sm" name="codigopais">
                      <option value="1">Argentina (+54)</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="col-form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control">
                  </div>
                </div>

                  <div class="form-group">
                    <label class="col-form-label">Nombre y apellido*</label>
                    <input type="text" name="nombreapellido" class="form-control">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">Correo electrónico*</label>
                    <input type="email" name="email" class="form-control">
                  </div>

                  
                  <div class="form-group">
                    <label class="col-form-label">Asunto*</label>
                    <input type="text" name="asunto" class="form-control">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label mb-2">Mensaje</label>
                  <textarea class="comment-review" rows="4" name="mensaje"></textarea>
                  </div>


              </div>


              <div class="col-md-6 col-lg-6 mt-3">
                <h3 class="title-gc">DE</h3>
                <div class="form-group">
                  <label class="col-form-label">Nombre y apellido*</label>
                  <input type="text" name="nombreapellido" class="form-control">
                </div>
                <div class="form-group">
                  <label for="nacimiento" class="col-form-label">Fecha de envio*</label>
                  <input type="date" name="fechaenvio" class="form-control">
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-gradient gradient-2">AGREGÁ AL CARRITO</button>

          </form>
        </div>
      </div>
        </div>
        <div class="modal-line gradient-2"></div>
      </div>
    </div>
  </div>