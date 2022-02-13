//Menu
$(document).ready(function () {
var scrollTop = 0;
$(window).scroll(function () {
scrollTop = $(window).scrollTop();
//$('.counter').html(scrollTop);

if (scrollTop >= 100) {
    $('#nav-me').addClass('navbarColorLight');
    switch(colorNav) {
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
  switch(colorNav) {
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
if($('#navbarCategorias').hasClass("show")) {
$('#navbarCategorias').removeClass("show");
}
}

function classPerfil() {
if($('#navbarPerfil').hasClass("show")) {
$('#navbarPerfil').removeClass("show");
}
}

function classGeneralMenu() {
  if($('#navbarGeneralContent').hasClass("show")) {
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
        slidesPerView: 2
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
    simulateTouch:false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: true,

    breakpoints: {
      640: {
        slidesPerView: 2
      },
      768: {
        slidesPerView: 3
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

  if($('#vermas').hasClass('show')) {
    $(this).html('Ver más');

}

});

//$('#ver-mas').hide();

//Search

  /*$(document).ready(function () {
    var searchBoxContent = $('.searchbox-content');
    var submitIcon = $('.searchbox-icon');
    var btIcon = $('.bt-search');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;

    $(document).on('click', '.bt-search', function (event) {
      event.preventDefault();
      if (isOpen == false) {
        searchBoxContent.css('display', 'block');
        searchBox.addClass('searchbox-open');
        inputBox.focus();
        isOpen = true;
      } else {
        searchBoxContent.css('display', 'none');
        searchBox.removeClass('searchbox-open');
        inputBox.focusout();
        isOpen = false;
      }
    });

    $(document).on('click', '.close-search', function (event) {
      event.preventDefault();
      searchBoxContent.css('display', 'none');
    });
    submitIcon.mouseup(function () {
      return false;
    });
    searchBox.mouseup(function () {
      return false;
    });
  });
  function buttonUp() {
    var inputVal = $('.searchbox-input').val();
    inputVal = $.trim(inputVal).length;
    if (inputVal !== 0) {
      $('.searchbox-icon').css('display', 'none');
    } else {
      $('.searchbox-input').val('');
      $('.searchbox-icon').css('display', 'block');
    }
  }
*/


//pasword

  let passwordInput = document.getElementById('txtPassword'),
  toggle = document.getElementById('btnToggle'),
  icon =  document.getElementById('eyeIcon');

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

if(toggle !== null && toggle !== '') {
  toggle.addEventListener('click', togglePassword, false);
}




let passwordInputRepeat = document.getElementById('txtPasswordRepeat'),
toggleRepeat = document.getElementById('btnToggleRepeat'),
iconRepeat =  document.getElementById('eyeIconRepeat');

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

if(toggleRepeat !== null && toggleRepeat !== '') {
  toggleRepeat.addEventListener('click', togglePasswordRepeat, false);
}


//Modal

  $('.modal').on('hidden.bs.modal', function () {
  //If there are any visible
  if($(".modal:visible").length > 0) {
      //Slap the class on it (wait a moment for things to settle)
          $('body').addClass('modal-open');
  }
});

//Back Button

function goBack() {
  window.history.back();
}

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


//Swiper Home
/*const breakpointMd = window.matchMedia( "(max-width: 767px)" )
const breakpointLg = window.matchMedia( "(min-width: 767px)" )
var imgBg = $('#swiper-home .swiper-slide').css('background-image').split('/').pop().slice(0, -2);
var extension = imgBg.substr( (imgBg.lastIndexOf('.') +1) );
var imgBg = imgBg.split('.').slice(0, -1).join('.');

if (breakpointMd.matches) {
  $('#swiper-home .swiper-slide').css('background-image', "url(imgs/" + imgBg + "-vert." + extension + ")");
} if (breakpointLg.matches) {
  $('#swiper-home .swiper-slide').css('background-image', "url(imgs/" + imgBg + "." + extension + ")");
}*/

/*const darkMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

  try {
    // Chrome & Firefox
    darkMediaQuery.addEventListener('change', (e) => {
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
    });
  } catch (e1) {
    try {
      // Safari
      darkMediaQuery.addListener((e) => {
        this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
      });
    } catch (e2) {
      console.error(e2);
    }
  }
*/
