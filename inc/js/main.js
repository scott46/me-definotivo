  //Menu
$(window).on('load', function () {
  $('.over-loader').addClass('over-hide').hide();
});



$(document).ready(function () {
  var scrollTop = 0;
  $(window).scroll(function () {
    scrollTop = $(window).scrollTop();

    if (scrollTop >= 100) {
      $('#nav-me').addClass('navbarColorLight');
      switch (colorNav) {
        case 'white':
          $('#nav-me').addClass('navbar-light');
          $('#nav-me').removeClass('navbar-dark');
          break;
        case 'black':
          $('#nav-me').removeClass('navbar-dark');
          $('#nav-me').addClass('navbar-light');
          break;
        default:
          $('#nav-me').addClass('navbar-light');
      }

    } else if (scrollTop < 100) {
      $('#nav-me').removeClass('navbarColorLight');
      switch (colorNav) {
        case 'white':
          $('#nav-me').addClass('navbar-dark');
          $('#nav-me').removeClass('navbar-light');
          break;
        default:
          $('#nav-me').addClass('navbar-light');
      }
    };

  });

});

function classCategorias() {
  if ($('#navbarCategorias').hasClass("show")) {
    $('#navbarCategorias').removeClass("show");
  }
}

function classPerfil() {
  if ($('#navbarPerfil').hasClass("show")) {
    $('#navbarPerfil').removeClass("show");
  }
}

function classGeneralMenu() {
  if ($('#navbarGeneralContent').hasClass("show")) {
    $('#navbarGeneralContent').removeClass("show");
  }
}

//referencia botones
var buttonsMenu = [".back-bt", ".bt-categoria", ".bt-person", "#navbarCategorias .nav-item"];

$('.second-button').on('click', function () {
  $('.animated-icon2').toggleClass('open');
  classCategorias();
  classPerfil();
});

$(buttonsMenu[0]).on('click', function () {
  classCategorias();
  classPerfil();
});

$(buttonsMenu[1]).on('click', function () {
  classPerfil();
});

$(buttonsMenu[2]).on('click', function () {
  classCategorias();
});

$((buttonsMenu[3])).on('click', function () {
  classCategorias();
  classGeneralMenu();
  $('.animated-icon2').toggleClass('open');
});


//Search box 

$('.search-open').on('click', function (e) {
  e.preventDefault();
  $('#search-box-desktop').addClass('search-active');
 $('.overlay').addClass('is-active');
 $('body').addClass('search-open');
});

$('.bt-close').on('click', function () {
  $('#search-box-desktop').removeClass('search-active');
  $('.overlay').removeClass('is-active');
  $('body').removeClass('search-open');
});

/*$('.navbar-toggler').on('click', function (e) {
if($('.animated-icon2').hasClass('open')) {
  setTimeout(
    function() 
    {
  $('.search-box').addClass('search-active');
}, 800);

} else {
      $('.search-box').removeClass('search-active');
}
});*/


//back to top

var btn = $('.btn-top');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.css('opacity','1');
  } else {
    btn.css('opacity','0');
  }
});

function scrollToTop() {
  window.scrollTo(0, 0);
}





//Swiper header Home
var swiper = new Swiper('#swiper-home', {
  effect: 'fade',
  autoplay: {
    delay: 5000,
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true,
  },
});



//Swiper Categorias Home
var swiper = new Swiper('#swiper-categorias-home', {
  slidesPerView: 1,
  spaceBetween: 2,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  loop: true,

  breakpoints: {
    640: {
      slidesPerView: 1
    },
    768: {
      slidesPerView: 2
    },
    1024: {
      slidesPerView: 3
    },
  }
});

//Swiper Categorias Texto
var swiper = new Swiper('.swiper-categorias-texto', {
  slidesPerView: 1,
  simulateTouch: false,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  loop: true,

  breakpoints: {
    640: {
      slidesPerView: 1
    },
    768: {
      slidesPerView: 1
    },
    1024: {
      slidesPerView: 5
    },
  }
});

//Swipper categorias

/*$(document).ready(function () {
  const myCustomSlider = document.querySelectorAll('.swiper-categorias');
  const myButtonNext = document.querySelectorAll('.categoria-wrapper .swiper-button-next');
  const myButtonPrev = document.querySelectorAll('.categoria-wrapper .swiper-button-prev');

  for( i=0; i< myCustomSlider.length; i++ ) {
    
    myCustomSlider[i].classList.add('swiper-categorias-' + i);
    myButtonNext[i].classList.add('swiper-button-next-' + i);
    myButtonPrev[i].classList.add('swiper-button-prev-' + i);
    var slider = new Swiper('.swiper-categorias-' + i, {
      init: true,
      slidesPerView: 1,
      loop: true,
      loopedSlides: 0,
      slidesPerGroup: 1,
      spaceBetween: 30,
      navigation: {
        nextEl: '.swiper-button-next-'+ i,
        prevEl: '.swiper-button-prev-'+ i,
      },
      breakpoints: {
        640: {
          slidesPerView: 1
        },
        767: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 3
        },
      }
    });
  
  }
});*/

$('.vermas').on('click', function () {
  $(this).html('Ver menos');

  if ($('#vermas').hasClass('show')) {
    $(this).html('Ver más');

  }

});


//pasword

let passwordInput = document.getElementById('txtPassword'),
  toggle = document.getElementById('btnToggle'),
  icon = document.getElementById('eyeIcon');

function togglePassword() {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.add("bi-eye-slash");
    icon.classList.remove("bi-eye");
    //toggle.innerHTML = 'hide';
  } else {
    passwordInput.type = 'password';
    icon.classList.remove("bi-eye-slash");
    icon.classList.add("bi-eye");
  }
}

if (toggle !== null && toggle !== '') {
  toggle.addEventListener('click', togglePassword, false);
}




let passwordInputRepeat = document.getElementById('txtPasswordRepeat'),
  toggleRepeat = document.getElementById('btnToggleRepeat'),
  iconRepeat = document.getElementById('eyeIconRepeat');

function togglePasswordRepeat() {
  if (passwordInputRepeat.type === 'password') {
    passwordInputRepeat.type = 'text';
    iconRepeat.classList.add("bi-eye-slash");
    iconRepeat.classList.remove("bi-eye");
    //toggle.innerHTML = 'hide';
  } else {
    passwordInputRepeat.type = 'password';
    iconRepeat.classList.remove("bi-eye-slash");
    iconRepeat.classList.add("bi-eye");
  }
}

if (toggleRepeat !== null && toggleRepeat !== '') {
  toggleRepeat.addEventListener('click', togglePasswordRepeat, false);
}


//Modal

$('.modal').on('hidden.bs.modal', function () {
  //If there are any visible
  if ($(".modal:visible").length > 0) {
    //Slap the class on it (wait a moment for things to settle)
    $('body').addClass('modal-open');
  }
});

//Back Button

/*function goBack() {
  window.history.back();
}*/

//Spinner

$(document).on('click', '.number-spinner button', function (e) {
  e.preventDefault();
  var btn = $(this),
    oldValue = btn.closest('.number-spinner').find('input').val().trim(),
    newVal = 0;

  if (btn.attr('data-dir') == 'up') {
    newVal = parseInt(oldValue) + 1;
  } else {
    if (oldValue > 1) {
      newVal = parseInt(oldValue) - 1;
    } else {
      newVal = 1;
    }
  }
  btn.closest('.number-spinner').find('input').val(newVal);
});


/*perfil*/
$('.nav-main-me .dropdown-toggle').on('click', function () {
  $('.nav-main-me .dropdown-menu a').removeClass('active');
});

/*$('.nav-main-me .dropdown-menu a').on('click', function () {
  $('#pills-perfil-tab').addClass('active');
});*/


// var wavesurfer = WaveSurfer.create({
//   container: '.waveform',
//   waveColor: 'white',
//   progressColor: '#939191',
//   scrollParent: false,
//   responsive: true,
//   hideScrollbar: true,
//   barWidth: 2,
//   barHeight: 1,
//   barGap: null

// });

// wavesurfer.load('audio/ME-audio.mp3');

// var formatTime = function (time) {
//   return [
//       Math.floor((time % 3600) / 60), // minutes
//       ('00' + Math.floor(time % 60)).slice(-2) // seconds
//   ].join(':');
// };

// wavesurfer.on('audioprocess', function () {
//   $('.waveform__counter').text( formatTime(wavesurfer.getCurrentTime()) );
// });


// wavesurfer.on('ready', function () {
//   $('.waveform__duration').text( formatTime(wavesurfer.getDuration()) );
// });

// $('.playaudio').on('click', function () {
  
//   if($(this).find('.bi').hasClass('bi-play-circle')) {
//     $(this).find('.bi').removeClass('bi-play-circle').addClass('bi-pause-circle');
//   } else {
//     $(this).find('.bi').removeClass('bi-pause-circle').addClass('bi-play-circle');
    
//   }
  
// });


/*$(window).on('load',function() {
$(".over-loader").addClass('over-hide');
});*/

$(window).on('load', function () {
  $('.over-loader').addClass('hola');
});











// js de marcelo
//$(document).ready(function () {
function limpiarFormulario(formulario) {
  document.getElementById(formulario).reset();
}
function mayoredad (fecha) {
  //var fecha = $('#nacimiento').val();
  var anio = fecha.split('-');
  var caracter = anio[0].split().toString();
  var array = Array.from(caracter);
  if(array[0] != 0) {
    var anioinput = parseInt(caracter.replace(',', ''))+18;
    var nuevodia = anio[2];
    var nuevomes = anio[1];
    var nuevafecha = Date.parse(anioinput+"-"+nuevomes+"-"+nuevodia);
    var hoy =  Date.parse(new Date());
    if(nuevafecha > hoy) {
      $('.error-txt').remove();
      $('#group-nacimiento input').addClass('error');
      $('#group-nacimiento').append('<div class="error-txt">Lo sentimos, tienes que ser mayor de edad para loguearte a este sitio</div>');
        console.log('es menor edad');
      }else {
        $('.error-txt').remove();
      }
    }
}
//registro usuario
$('.btn-registro').click(()=> {
  $('.over').css('display', 'block');
  var genero = $('input:radio[name=genero]:checked').val()==undefined ? '' : $('input:radio[name=genero]:checked').val();
  var terminos = $('input:checkbox[name=terminos]:checked').val();
  var recibeEmail = $('input:checkbox[name=recibirmail]:checked').val();
  var date = new Date();
  var hoy = date.toLocaleString({timeZone: "America/Argentina/Buenos_Aires"});
  var user = {
    nombre: $('#nombre').val().toLowerCase(),
    apellido: $('#apellido').val().toLowerCase(),
    usuario: $('#nombre').val().toLowerCase()+$('#apellido').val().toLowerCase(),
    clave: $('#password-reg').val(),
    repiteclave: $('#repetirpassword-reg').val(),
    genero: genero,
    pais: $('#pais option:selected').val().toLowerCase(),
    nacimiento: $('#nacimiento').val(),
    acepto: terminos==='terminos'?'1':'0',
    quiero: recibeEmail==='recibeEmail'?'1':'0',
    telefono: '+'+$('#codigopais option:selected').val()+"-"+$('#telefono').val(),
    email: $('#email').val(),
    nivel: "user",
    fechaAcepto: hoy,
    estado: 'pendiente',
  }
  console.log(user);
  var json = JSON.stringify(user);
  var mensaje = $('#mensaje');
  $.ajax({
    url:"api/ajax/user.ajax.php",
    method: "POST",
    data: {addUser: json},
    success:function(respuesta){ 
      console.log(respuesta);
      $('.over').css('display', 'none');
      if(respuesta.includes('ok')){
        $('#registro').modal('toggle');
        $('#exitoRegistro').modal('toggle');
      } else {
        $('.error-txt').remove();
        $('.error').removeClass('error');
        var json = JSON.parse(respuesta);
        json.forEach((e) => {
          if(e.tipo === 'cajon'){
            $('#group-mensaje').empty();
            var padre = $(`#group-mensaje`);
            var campo = document.createElement('div');
            campo.innerHTML = e.mensaje;
            $(padre).addClass('py-2 bg-danger mt-4 text-center text-light text-uppercase');
            $(padre).append(campo);
          }else{
            $('#group-mensaje').empty();
            $('#group-mensaje').removeClass('bg-danger');
            var padre = $(`#group-${e.campo}`);
            var padreinput = $(`#group-${e.campo} input`);
            var padreselect = $(`#group-${e.campo} select`);
            var campo = document.createElement('div');
            campo.innerHTML = e.mensaje;
            $(campo).addClass('error-txt');
            $(padreinput).addClass('error');
            $(padreselect).addClass('error');
            $(padre).append(campo);
          }
        });
      }
    }
    });
  });
  // cambia de modal inicio / registro
  $('.btn-cambio-registro').click(() => {
    $('#iniciarsesion').modal('toggle');
    $('#registro').modal('toggle');
  });
  //olvido contraseña
  $('.btn-olvido').click(()=>{
    $('#iniciarsesion').modal('toggle');
    $('#olvidecontrasena').modal('toggle');
  });
  //reenvio email
  $('.btn-reenvioMail').click(()=>{
    $('#iniciarsesion').modal('toggle');
    $('#reenviaEmail').modal('toggle');
  });
  $('.close').click(()=>{
    document.getElementById('form-register').reset();
    document.getElementById('form-login').reset();
    document.getElementById('olvido-form').reset();
    document.getElementById('form-recupero').reset();
    document.getElementById('form-reenvia').reset();
    $('.error-txt').remove();
    $('.error').removeClass('error');
    $('.bg-danger').removeClass('bg-danger');
    $('#mensaje-inicio').empty();
    $(`#mensaje-recuperocontrasena`).empty();
    $('#mensaje-reenvia').empty();
  });
  // inicia session
  $('.btn-inicia-sesion').click(() => {
    $('.over').css('display', 'block');
    var inicio = {
      email: $('#email-inicio').val().toLowerCase(),
      password: $('#password-inicio').val()
    }
    var json = JSON.stringify(inicio);
    var mensaje = $('#mensaje-inicio');
    $.ajax({
      url:"api/ajax/user.ajax.php",
      method: "POST",
      data: {startUser: json},
      success:function(respuesta){ 
        console.log(respuesta);
        $('.over').css('display', 'none');
        if(respuesta.includes('tipo')){
          $('.error-txt').remove();
          $('.error').removeClass('error');
          var json = JSON.parse(respuesta);
          json.forEach((e) => {        
            //$(mensaje).append(respuesta.replace('error', ''));
            if(e.campo === 'mensaje-inicio') {
              $(mensaje).empty();
              var padre = $(`#mensaje-inicio`);
              //console.log(padre);
              var campo = document.createElement('div');
              campo.innerHTML = e.mensaje;
              $(padre).addClass('py-2 bg-danger mt-4 text-center text-light text-uppercase');
              $(padre).append(campo);
            } else {
              var padre = $(`#form-group-${e.campo}-inicio`);
              var padreinput = $(`#form-group-${e.campo}-inicio input`);
              var campo = document.createElement('div');
              campo.innerHTML = e.mensaje;
              $(campo).addClass('error-txt');
              $(padreinput).addClass('error');
              $(padre).append(campo);
            }
           })
        }else{
          $('html').append(respuesta);
        }
      }
    });
  });
  //cambia codigo de area
  $('#pais').change(() => {
    var seleccion = $('#pais option:selected').val();
    $(`#codigopais option[name='${seleccion}']`).attr("selected", true);
  });
  //olvide contraseña
  $('.btn-enviar-email').click(() => {
    $('.over').css('display', 'block');
    var email = $('#email-olvido').val();
    $.ajax({
      url:"api/ajax/user.ajax.php",
      method: "POST",
      data: {olvido: email},
      success:function(respuesta){ 
        console.log(respuesta);
        $('.over').css('display', 'none');
        if(respuesta.includes('campo')){
          $('.error-txt').remove();
          $('.error').removeClass('error');
          var json = JSON.parse(respuesta);
          var padre = $(`#form-group-email-olvido`);
          var padreinput = $(`#form-group-email-olvido input`);
          var campo = document.createElement('div');
          campo.innerHTML = json[0].mensaje;
          $(campo).addClass('error-txt');
          $(padreinput).addClass('error');
          $(padre).append(campo);
        } else {
          $('html').append(respuesta);
        }
      }
    });

  });
  //recupera contraseña
  $('.btn-recupero').click(() => {
    $('.over').css('display', 'block');
    var dato = {
      password: $('#password-recuperocontrasena').val(),
      repassword: $('#repassword-recuperocontrasena').val(),
      usuario: $(".btn-recupero").attr("data-olf"),
      codigo: $(".btn-recupero").attr("data-weis")
    };
    $.ajax({
      url:"api/ajax/user.ajax.php",
      method: "POST",
      data: {nuevapassolvido: dato},
      success:function(respuesta){ 
        console.log(respuesta);
        $('.over').css('display', 'none');
        if(respuesta.includes('cajon')){
          var json = JSON.parse(respuesta);
          $('#mensaje-recuperocontrasena').empty();
          var padre = $(`#mensaje-recuperocontrasena`);
          var campo = document.createElement('div');
          campo.innerHTML = json[0].mensaje;
          $(padre).addClass('py-2 bg-danger mt-4 text-center text-light text-uppercase');
          $(padre).append(campo);
        }else if(respuesta.includes('input')) {
          $('.error-txt').remove();
          $('.error').removeClass('error');
          var json = JSON.parse(respuesta);
          json.forEach((e) => {
            var padre = $(`#form-group-${e.campo}-recuperocontrasena`);
            var padreinput = $(`#form-group-${e.campo}-recuperocontrasena input`);
            var campo = document.createElement('div');
            campo.innerHTML = e.mensaje;
            $(campo).addClass('error-txt');
            $(padreinput).addClass('error');
            $(padre).append(campo);
          })       
        } else {
          $('html').append(respuesta);
        }
      }
    });
  })
  //reenvia email de verificacion
  $('.btn-reenvioemailverificacion').click(() => {
    $('.over').css('display', 'block');
    var email = $('#email-reenvia').val();
    $.ajax({
      url:"api/ajax/user.ajax.php",
      method: "POST",
      data: {reenviaEmail: email},
      success:function(respuesta){ 
        $('.error-txt').remove();
        $('.error').removeClass('error');
        $('.over').css('display', 'none');
        console.log(respuesta);
        if(respuesta.includes('cajon')){
          var json = JSON.parse(respuesta);
          $('#mensaje-reenvia').empty();
          var padre = $('#mensaje-reenvia');
          var campo = document.createElement('div');
          campo.innerHTML = json[0].mensaje;
          $(padre).addClass('py-2 bg-danger mt-4 text-center text-light text-uppercase');
          $(padre).append(campo);
        } else if (respuesta.includes('input')) {
          $('#mensaje-reenvia').empty();
          $('#mensaje-reenvia').removeClass('bg-danger');
          var json = JSON.parse(respuesta);
          var padre = $(`#form-group-${json[0].campo}`);
          var padreinput = $(`#form-group-${json[0].campo} input`);
          var campo = document.createElement('div');
          campo.innerHTML = json[0].mensaje;
          $(campo).addClass('error-txt');
          $(padreinput).addClass('error');
          $(padre).append(campo);
        } else {
          $('html').append(respuesta);
        }
      }
    });
  });


 $('#nacimiento').change(() => {
    var fecha = $('#nacimiento').val();
    mayoredad (fecha);
 })


function actualizaLS() {
  console.log('buscando carrito');
  $.ajax({
    url:"api/ajax/carrito.ajax.php",
    method: "POST",
    data: {buscaCarrito: 'null'},
    success:function(respuesta){ 
      if(respuesta != ''){
        if(!respuesta.includes('Carrito vacio')){
          var json = JSON.parse(respuesta);
          var box = $('.box-lenght a');
          $(box).append(`<span class="car-lenght">${json.detalle.length}</span>`)
        }
      }
    }
  });
}
$(document).ready(function () {
  actualizaLS();
})



$('.btn-add').click(() => {
  function b64_to_utf8( str ) {
    return decodeURIComponent(escape(window.atob( str )));
  }
  var idCompra = b64_to_utf8($('.btn-add').attr('data-int'));
  if(idCompra !=''){
    $.ajax({
      url:"api/ajax/carrito.ajax.php",
      method: "POST",
      data: {agregaProducto: idCompra},
      success:function(respuesta){ 
        console.log(respuesta);
        if(respuesta.includes('Added')){
          actualizaLS();
          $('#agregarCarrito').modal('show');
        } else if (respuesta.includes('Duplicado')) {
          $('#duplicadoCarrito').modal('toggle');
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Se ha producido un error. Intente nuevamente',
          })
        }
      }
    });
  }
})

$(document).on("click", ".delete", function(){


  function b64_to_utf8( str ) {
    return decodeURIComponent(escape(window.atob( str )));
  }
  var idCompra = b64_to_utf8($(this).attr('data-int'));
  if(idCompra !=''){
    $.ajax({
      url:"api/ajax/carrito.ajax.php",
      method: "POST",
      data: {removeProducto: idCompra},
      success:function(respuesta){ 
        console.log(respuesta);
        if(respuesta.includes('Removed')){
          $('#eliminaCarrito').modal('show');
          // Swal.fire({
          //   icon: 'success',
          //   title: 'El contenido fue eliminado',
          // }).then((result) => {
          //   if (result.isConfirmed) {
          //     // $('.over').css('opacity', '1');
          //     // $('.over').css('display', 'block');
          //     window.location.reload();
          //   }
          // })
        } else if (respuesta.includes('Duplicado')) {
            Swal.fire({
              icon: 'Inexistente',
              title: 'El contenido no se encuentra en el carrito',
            })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Se ha producido un error. Intente nuevamente',
          })
        }
      }
    });
  }
})

$('.btn-acepta-agrega').click(() => {
  $('#agregarCarrito').modal('toggle');
})
$('.btn-acepta-elimina').click(() => {
  window.location.reload();
  //$('#eliminaCarrito').modal('toggle');
})
$('.btn-acepta-duplicado').click(() => {
  $('#duplicadoCarrito').modal('toggle');
})





$('.btn-comentarioContenido').click(() => {
  var comentarioData = $('.btn-comentarioContenido').attr('data-tipo') == 'contenidos' ? $('#comentarioContenido').val() : $('#comentarioContenido-ele').val(); 
  var idContenido = $('.btn-comentarioContenido').attr('data-comentario');
  var tipo = $('.btn-comentarioContenido').attr('data-tipo');

  var comentario = {
    contenidoId: parseInt(idContenido),
    resena1: comentarioData.trim(),
    resena2: '',
    tipo: tipo
  }

  var comentarioEle = {
    elementoId: parseInt(idContenido),
    resena1: comentarioData.trim(),
    resena2: '',
    tipo: tipo
  }

  var json = tipo=='contenidos' ? JSON.stringify(comentario) : JSON.stringify(comentarioEle)

  console.log(json);

  if(comentarioData != ''){
    $.ajax({
      url:"api/ajax/comentarios.ajax.php",
      method: "POST",
      data: {comentario: json},
      success:function(respuesta){ 
        if(respuesta.includes('Added')){
          var json = JSON.parse(respuesta);
          $('#comentarioContenido').val('')
          traeComentarios(comentario, json.user, tipo)
        }
      }
    });
  }
})


function traeComentarios(comentario, user, tipo) {
  var ini = $('.overlay').attr('data-ini');
  if(comentario != ''){
    var padre = tipo == 'contenidos' ? $('#ContenedorComentarios') : $('#ContenedorComentarios-ele');
    $(padre).append(`        
      <div class="col-md-6 d-flex flex-row mb-4">
        <div class="follower">
          <div class="box-user">
            <p class="comment">${ini}</p>
          </div>
        </div>
        <div class="follower-comment">  
          <h5>${user}</h5>
          <p class="comment">${comentario.resena1}</p>
        </div>
      </div>`).hide().fadeIn(500);
  }
}



//});





