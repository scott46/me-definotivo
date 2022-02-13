<?php
	

	$lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);

?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ME | <?=$lang == 'es_US' ? 'Próximamente' : 'Coming soon' ?></title>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">

			    	<div class="bg-left"></div>
				    <div class="bg-center">
				      <img src="<?=$lang == 'es_US' ? 'imgProx/me-proximamente.png' : 'imgProx/me-proximamente-eng.png' ?>" alt="follow me" class="img-fluid">
				    </div>
			    	<div class="bg-right"></div>

				</div>
			</div>
		</header>
		<footer>
			<div class="container-footer">
				<div class="box-footer">
					<h5>Copyright @ 2020 MULINGAN S.A.</h5>
					<h5>Yaguaron 1407, Esc 916, Montevideo (CP11200), Uruguay</h5>
					<p><?=$lang == 'es_US' ? 'Usaremos la información que nos brindes para enviarte notificaciones con novedades que se publiquen a través del sitio [memberexperiences.me] o para ofrecerte los servicios que se brindan a través del sitio. Al completar el presente formulario, prestas tu consentimiento para que utilicemos tu información con esta finalidad y autorizas que te contactemos al correo electrónico indicado para enviarte comunicaciones de marketing y de servicio. Tus datos personales son almacenados en una base de datos cuyo responsable es MULINGAN S.A., con domicilio en Yaguaron 1407, Esc 916, Montevideo (CP11200), Uruguay. A los efectos de procesar tus datos personales, los mismos podrán ser enviados a nuestros socios comerciales en otros países (incluyendo a KULL COMPANY S.A., con domicilio en Lavalle 1619, P.B., Dto.” B”, C.A.B.A., argentina), sujeto a nuestras prácticas normales de protección de la información. Asimismo, confirmas que estás informado que dicha base sea almacenada en servidoresubicados en la “nube” (a través de Google Services”) fuera de Uruguay y de Argentina y autorizas la consecuente transferencia internacional de tus datos. En cualquier momento podrás ejercer -en forma gratuita- los derechos de acceso, rectificación y supresión de tus datos de nuestra base y/o oponerte al tratamiento y cesión de tus datos, enviando correo electrónico a info@memberexperiences.me). A fin de autorizar los cambios que nos solicites te pediremos en forma previa que acredites tu identidad.' : 'We will use the information you provide to send you news notifications posted through the [memberexperiences.me] site or to offer you the services provided through the site. By completing this form, you give your consent for us to use your information for this purpose and authorize us to contact you at the indicated email address to send you marketing and service communications. Your personal data is stored in a database whose manager is MULINGAN S.A., with an address at Yaguaron 1407, Esc 916, Montevideo (CP11200), Uruguay. For the purposes of processing your personal data, they may be sent to our business partners in other countries (including KULL COMPANY SA, domiciled at Lavalle 1619, PB, Dto. ”B”, CABA, Argentina), subject to our normal information protection practices. Likewise, you confirm that you are informed that said database is stored on servers located in the “cloud” (through Google Services ”) outside of Uruguay and Argentina and you authorize the consequent international transfer of your data. At any time you can exercise - free of charge - the rights of access, rectification, and deletion of your data from our database and/or oppose the treatment and transfer of your data, by sending an email to info@memberexperiences.me). In order to authorize the changes that you request, we will ask you in advance to prove your identity.'?></p>
				</div>
			</div>
		</footer>
	</body>
</html>

 
<style>
	body {
		padding: 0px;
		margin: 0px;
		font-family: 'Inter', sans-serif !important;
	}
	.row {
		display: flex;
		position: relative;
	}
	.bg-left {
		background: url('imgProx/img-1.jpg') no-repeat left center;
		min-height: 600px;
		width: 50%;
		background-size: contain;

	}
	.bg-right {
		background: url('imgProx/img-2.jpg') no-repeat right center;
		min-height: 600px;
		width: 50%;
		background-size: contain;
	}
	.bg-center {
		position: absolute;
		top:  20%;
		bottom: 50px;
		left: 0px;
		right: 0px;
		text-align: center;
	}
	.bg-center img {
		max-width: 470px;
	}
	.container-footer {
		background: #e3e3e3;
		padding: 40px;
	}
	.box-footer p {
		color: #A8A8A8;
    	line-height: 1rem;
    	margin-top: 30px;
    	font-size: 0.625rem;
	}
	.box-footer h5 {
		color: #707070;
    	line-height: 1rem;
    	margin: 0;
	}
	@media(max-width:  1420px) {
		.bg-center {
			top:  28%;
		}
		.bg-center img {
			max-width: 360px;
		}

	}
	@media(max-width:  460px) {
		.bg-center {
			top:  35%;
		}
		.bg-left {
			background-size: 100%;
    		background-position: 0 -25px;
		}
		.bg-right { 
			background-position: 0 360px;
    		background-size: 100%;
		}
		.box-footer {
			padding: 0px;
			padding-top: 40px;
			padding-bottom: 40px;
			padding-right: 15px;
    		padding-left: 15px;
		}
		.bg-center img {
			max-width: 230px;
		}
	}
	
</style>