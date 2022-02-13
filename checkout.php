<?php

require_once('api/inicio.php');
define('SECCION', 'checkout');
$section = 'checkout';
$color = 'black';
include_once("inc/header.php");

?>

  <header class="header-checkout">

  </header>

  <section id="checkout">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-12">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">INICIO</a></li>
          <li class="breadcrumb-item"><a href="productos.php">BOLSA</a></li>
          <li class="breadcrumb-item active" aria-current="page">PAGO</li>
          <li class="breadcrumb-item"><a href="<?=url('checkout-tarjetas')?>">RESUMEN</a></li>
        </ol>
      </nav>
        </div>
        <div class="col-md-4 col-12">
          <a href="" class="bt-back">VOLVER</a>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h1>CHECKOUT</h1>
          <h2 class="datos">COMPLETÁ TUS DATOS</h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <form>
            <div class="row">
              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label class="col-form-label">Nombre y apellido o razón social*</label>
                  <input type="text" name="nombreapellido" class="form-control">
                </div>
                <small class="form-text text-muted">Asegurate que coincida con el nombre que figura en tu documento de identificación o registro comercial.</small>
              </div>

              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label class="col-form-label">Correo electrónico*</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <small class="form-text text-muted">Validaremos tu mail via correo electrónico.</small>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-3">
                <label class="col-form-label">Contraseña:</label>
                <div class="input-group">
                  <input type="password" class="form-control password" name="password" id="txtPassword">
                  <div class="input-group-append">
                    <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon" class="bi bi-eye"></i></button>
                  </div>
                </div>
                <small class="form-text text-muted">Escribí una contraseña segura: debe contener al menos 8 caracteres incluyendo letras mayúsculas, minúsculas y números.</small>
              </div>

              <div class="col-md-6 mt-3">
                <label class="col-form-label">Repetir contraseña*:</label>
                <div class="input-group">
                  <input type="password" class="form-control password" name="passwordrepeat" id="txtPasswordRepeat">
                  <div class="input-group-append">
                    <button type="button" id="btnToggleRepeat" class="toggleRepeat"><i id="eyeIconRepeat" class="bi bi-eye"></i></button>
                  </div>
                </div>
                <small class="form-text text-muted">Repetí la contraseña que escribiste anteriormente.</small>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6 mt-3">
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
              </div>

              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label for="nacimiento" class="col-form-label">Fecha de nacimiento</label>
                  <input type="date" name="nacimiento" class="form-control">
                </div>
                <small class="form-text text-muted">El formato de la fecha es DD/MM/AA</small>
              </div>

            </div>


            <div class="row">
              <div class="col-md-6 mt-3">
                <div class="row">
                  <div class="col">
                    <label class="col-form-label">Tipo de Documento*</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tipodocumento" value="DNI">
                      <label class="form-check-label small">DNI</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tipodocumento" value="CUIT">
                      <label class="form-check-label small">CUIT</label>
                    </div>
                  </div>
                  <div class="col">
                    <label for="numerodoc" class="col-form-label">Número de documento*</label>
                    <input type="text" name="numerodoc" class="form-control">
                    <small class="form-text text-muted">Ingresá el número sin espacios.</small>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mt-3">
                <div class="form-group mb-0">
                  <label class="col-form-label">Genero</label>
                </div>

                <div class="form-group mb-0">

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" value="Femenino">
                    <label class="form-check-label small">Femenino</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" value="No binario">
                    <label class="form-check-label small">No binario</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" value="Masculino">
                    <label class="form-check-label small">Masculino</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" value="Prefiero no decirlo">
                    <label class="form-check-label small">Prefiero no decirlo</label>
                  </div>

                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label class="col-form-label">País*</label>
                  <select class="custom-select" name="pais">
                    <option value="1">Argentina</option>
                  </select>
                </div>
                <small class="form-text text-muted">Seleccioná tu país de residencia</small>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label for="email" class="col-form-label">Codigo Postal*</label>
                  <input type="text" name="codigopostal" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label for="email" class="col-form-label">Domicilio*</label>
                  <input type="text" name="domicilio" class="form-control">
                </div>
              </div>
              <div class="col-md-2 mt-3">
                <div class="form-group">
                  <label for="email" class="col-form-label">Número*</label>
                  <input type="text" name="numero" class="form-control">
                </div>
              </div>
              <div class="col-md-2 mt-3">
                <div class="form-group">
                  <label for="email" class="col-form-label">Piso*</label>
                  <input type="text" name="piso" class="form-control">
                </div>
              </div>
              <div class="col-md-2 mt-3">
                <div class="form-group">
                  <label for="email" class="col-form-label">Depto*</label>
                  <input type="text" name="depto" class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label for="localidad" class="col-form-label">Localidad*</label>
                  <select class="custom-select" name="localidad">
                    <option value="1">Localidad</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6 mt-3">
                <div class="form-group">
                  <label for="provincia" class="col-form-label">Provincia*</label>
                  <select class="custom-select" name="provincia">
                    <option value="1">Provincia</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <h3 class="border-bottom pb-3 mb-4 mt-5">Datos Impositivos*</h3>
                <div class="container-datosimp">
                  <h4>Condición frente al IVA</h4>
                  <div class="row">
                    <div class="col">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicioniva" value="Responsable inscripto">
                        <label class="form-check-label small">Responsable inscripto</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicioniva" value="Responsable Monotributista">
                        <label class="form-check-label small">Responsable Monotributista</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicioniva" value="Consumidor final">
                        <label class="form-check-label small">Consumidor final</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicioniva" value="Exento">
                        <label class="form-check-label small">Responsable inscripto</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container-datosimp">
                  <h4>Condición ante impuesto a las ganancias</h4>
                  <div class="row">
                    <div class="col">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ganancias" value="Inscripto">
                        <label class="form-check-label small">Inscripto</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ganancias" value="No Alcanzado">
                        <label class="form-check-label small">No Alcanzado</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ganancias" value="Exento">
                        <label class="form-check-label small">Exento</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container-datosimp">
                  <h4>Ingresos Brutos</h4>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ingresosbrutos" value="Jurisdicción local">
                        <label class="form-check-label small">Jurisdicción local</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ingresosbrutos" value="Convenio multilateral">
                        <label class="form-check-label small">Convenio multilateral</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ingresosbrutos" value="No inscripto">
                        <label class="form-check-label small">No inscripto</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ingresosbrutos" value="No alcanzado">
                        <label class="form-check-label small">No alcanzado</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ingresosbrutos" value="Exento">
                        <label class="form-check-label small">Exento</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ingresosbrutos" value="Consumidor final">
                        <label class="form-check-label small">Consumidor final</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ingresosbrutos" value="Régimen simplificado">
                        <label class="form-check-label small">Régimen simplificado</label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group d-flex flex-row mb-3">
                  <input type="checkbox" name="recibirmail" value="recibirmail">
                  <p class="sm-text ml-2 mt-0 mb-0">Utilizar como datos de facturación.</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group d-flex flex-row mb-3">
                  <input type="checkbox" name="terminos" value="terminos">
                  <p class="sm-text ml-2 mt-0 mb-0">Para continuar es necesario que aceptes los <a href="terminos-condiciones.php">Términos y Condiciones</a> de ME.
                    Si ya leíste y estás de acuerdo con los Términos y Condiciones por favor hacé
                    click en el recuadro.</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group d-flex flex-row mb-3">
                  <input type="checkbox" name="recibirmail" value="recibirmail">
                  <p class="sm-text ml-2 mt-0">Quiero recibir comunicaciones comerciales personalizadas de ME a través
                    del email.</p>
                </div>
              </div>
            </div>

            <!-- <button type="button" class="btn btn-bg btn-block registro" data-dismiss="modal" data-toggle="modal" data-target="#exitoRegistro">Registrate</button> -->
            <a type="button" href="<?=url('checkout-sesion')?>" class="btn btn-bg btn-block registro" >Registrate</a>
            <?php include_once('inc/terms.php'); ?>

          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include_once('inc/footer.php'); ?>

