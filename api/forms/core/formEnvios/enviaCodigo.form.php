<?php

function enviaCodigo ($usuario, $empresa, $codigo, $mensaje, $quienRegala) {
	$url = 'http://c2370883.ferozo.com/md/me';
	$destinatarios = array($usuario->email);
	$codigo = $codigo;
	$asunto = 'Has recibido una gift card!';
	$cuerpo = '
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
</head>
<style>

	@media screen and (max-width: 625px) {

		.logo-me {
			text-align: center;
		}

		.web {
			text-align: center !important;
		}

		.texto {
			font-size: 20px !important;
			line-height: 20px !important;
		}

	}

</style>
<body>
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td align="center">
			                <!--[if (gte mso 9)|(IE)]>
				<table width="640" align="center" style="border-spacing:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin: 0 auto;">
				<tr>
				<td width="640" valign="top" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin: 0 auto;">
					<![endif]-->
				<table border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:640px; background-color: #ffffff;">
<tr><td colspan="3" height="20"></td></tr>
<tr>
	<td width="20"></td>
	<td align="center">
		<!--[if (gte mso 9)|(IE)]>
		<table width="100%" style="border-spacing:0;font-family: Calibri, sans-serif;">
		<tr>
		<td width="295" valign="middle" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin: 0 auto">
			<![endif]-->
		<table style="width:100%;max-width:295px;display:inline-block;vertical-align:middle;text-align: left; border-spacing: 0px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align: left; width: 100%; width: 295px;" align="center" valign="bottom">
							<table cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; border-collapse: collapse; width:100%;" align="center">
								<tbody>
									<tr>
										<td class="logo-me"><img src="http://c2370883.ferozo.com/md/me/mailings/gift-card-camino/logo-member-experiences.png" alt="logo-member-experiences"></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>

														<!--[if (gte mso 9)|(IE)]>
		</td><td width="295" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin: 0 auto">
		<![endif]-->
		<table style="width:100%;max-width:295px;display:inline-block;vertical-align:middle;text-align: right; border-spacing: 0px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td style="text-align: right; width: 100%; width: 295px;" align="right" valign="bottom">
						<table cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; border-collapse: collapse; width:100%;" align="center">
							<tbody>
								<tr>
									<td class="web" height="50" valign="bottom" style="font-family:Arial, Helvetica, sans-serif; text-align: right; color: #000000; font-size: 14px; line-height: 24px;">
										<a href="http://www.memberexperiences.me" style="color: #000000;">www.memberexperiences.me</a>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>

		<!--[if (gte mso 9)|(IE)]>
		</td>
		</tr>
		</table>
		<![endif]-->

	</td>
	<td width="20"></td>
</tr>
<tr><td colspan="3" height="15"></td></tr>

					<tr>
						<td width="20"></td>
						<td height="9" style="background: url("http://c2370883.ferozo.com/md/me/mailings/gift-card-camino/linea-gradient.jpg") #5F62AA; background-position: center;">
							
						</td>
						<td width="20"></td>
					</tr>
						<tr>
						<td width="20"></td>
						<td style="background-color: #F8F5F2;">
						<table cellspacing="0" cellpadding="0" width="100%">
							<tbody>
								<tr>
									<td><img src="http://c2370883.ferozo.com/md/me/mailings/gift-card-camino/gift-card.png" alt="gift card" style="max-width: 100%;"></td>
								</tr>
								<tr>
									<td>
										<table cellspacing="0" cellpadding="0" width="100%">
											<tr>
												
										<td class="texto" style="font-family:Arial, Helvetica, sans-serif; text-align: center; color: #000000; font-size: 28px; line-height: 28px;">
										'.$quienRegala.' Te ha enviado una Gift	Card <br><br>
										<span style="font-size: 20px; font-weight: bold;" class="texto">'.$destinatarios[0].'</span><br><br>
										??TU C&Oacute;DIGO ES<br>'.$codigo.'
										</td>
										
										</tr>
										<tr>
											<td colspan="3" height="10"></td>
										</tr>
										<tr>
											<td colspan="3" height="10"></td>
										</tr>
										<tr>
											<td colspan="3" height="10"></td>
										</tr>
										<tr>
											<td style="width: 100%; text-align: center; font-size: 18px;">'.$mensaje.'</td>
										</tr>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
						<td width="20"></td>
					</tr>
					<tr>
						<td width="20"></td>
						<td height="25" style="background-color: #F8F5F2;"></td>
						<td width="20"></td>
					</tr>
					<br>
					<br>
					<tr>
						<td width="20"></td>
						<td style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #000000; font-size: 17px; line-height: 24px;text-align: center">
							Para canjear tu Gift Card has click <a href="http://c2370883.ferozo.com/md/me/index.php?addCodigo" >aqu??</a>
						</td>
							<td width="20"></td>
					</tr>

					<tr>
						<td colspan="3" height="30"></td>
					</tr>
					<tr>
						<td width="20"></td>
						<td style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #000000; font-size: 17px; line-height: 24px;text-align: center">
							??Necesit??s ayuda? Contactate con <a href="mailto:info@memberexperiences.me" style="color: #000000;">info@memberexperiences.me</a>
						</td>
							<td width="20"></td>
					</tr>
					<tr>
						<td colspan="3" height="30"></td>
					</tr>

					<tr>
						<td height="112" colspan="3" style="text-align: center; background-color: #F1F0F0;" align="center" valign="middle">
							<img src="http://c2370883.ferozo.com/md/me/mailings/gift-card-camino/me.png" alt="me">
						</td>
					</tr>

					<tr>
						<td valign="middle" align="center" style="text-align: center; background-color: #F1F0F0;" colspan="3">
							<!--[if (gte mso 9)|(IE)]>
							<table width="100%" style="border-spacing:0;font-family: Calibri, sans-serif;">
							<tr>
							<td width="180" valign="middle" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin: 0 auto">
								<![endif]-->
							<table style="width:100%;max-width:180px;display:inline-block;vertical-align:middle;text-align: center; border-spacing: 0px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td height="35" style="text-align: center; width: 100%; width: 180px;" align="center">
												<table cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; border-collapse: collapse; width:100%;" align="center">
													<tbody>
														<tr>
															<td width="20"><img src="http://c2370883.ferozo.com/md/me/mailings/gift-card-camino/facebook.png" alt="facebook"></td>
															<td width="5"></td>
															<td width="140" style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #54565a; font-size: 14px; line-height: 24px;">
																<a style="color: #54565a; text-decoration: none;" href="http://www.facebook.com/memberexperiences">memberexperiences</a>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>

																			<!--[if (gte mso 9)|(IE)]>
							</td><td width="180" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin: 0 auto">
							<![endif]-->
							<table style="width:100%;max-width:180px;display:inline-block;vertical-align:middle;text-align: center; border-spacing: 0px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr>
										<td height="35" style="text-align: center; width: 100%; width: 180px;" align="center">
											<table cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; border-collapse: collapse; width:100%;" align="center">
												<tbody>
													<tr>
														<td width="20"><img src="http://c2370883.ferozo.com/md/me/mailings/gift-card-camino/instagram.png" alt="instagram"></td>
														<td width="5"></td>
														<td width="140" style="font-family: Arial, Helvetica, sans-serif; text-align: left; color: #54565a; font-size: 14px; line-height: 24px;">
															<a style="color: #54565a; text-decoration: none;" href="http://www.instagram.com/memberexperiences">memberexperiences</a>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>																							<!--[if (gte mso 9)|(IE)]>
							</td><td width="180" valign="top" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;margin: 0 auto">
							<![endif]-->
							<table style="width:100%;max-width:180px;display:inline-block;vertical-align:middle;text-align: center; border-spacing: 0px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr>
										<td height="35" style="text-align: center; width: 100%; width: 180px;" align="center">
											<table cellspacing="0" cellpadding="0" border="0" style="border-spacing: 0px; border-collapse: collapse; width:100%;" align="center">
												<tbody>
													<tr>
														<td width="20"><img src="http://c2370883.ferozo.com/md/me/mailings/gift-card-camino/twitter.png" alt="twitter"></td>
														<td width="5"></td>
														<td width="140" style="font-family: Arial, Helvetica, sans-serif; text-align: left; color: #54565a; font-size: 14px; line-height: 24px;">
															<a style="color: #54565a; text-decoration: none;" href="http://www.twitter.com/memberexperiences">ME_experiences</a>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>

							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->

						</td>
					</tr>
					<tr>
						<td colspan="3" height="20" style="background-color: #F1F0F0;"></td>
					</tr>
					<tr>
						<td width="20" style="background-color: #F1F0F0;"></td>
						<td style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #54565a; font-size: 10px; line-height: 16px; background-color: #F1F0F0;">
							Usaremos la informaci??n que nos brindes para enviarte notificaciones con novedades que se publiquen a trav??s del sitio [memberexperiences.me] o para ofrecerte los servicios que se brindan a trav??s del sitio. Al completar el presente formulario, prestas tu consentimiento para que utilicemos tu informaci??n con esta finalidad y autorizas que te contactemos al correo electr??nico indicado para enviarte comunicaciones de marketing y de servicio. Tus datos personales son almacenados en una base de datos cuyo responsable es MULINGAN S.A., con domicilio en Yaguaron 1407, Esc 916, Montevideo (CP11200), Uruguay. A los efectos de procesar tus datos personales, los mismos podr??n ser enviados a nuestros socios comerciales en otros pa??ses (incluyendo a KULL COMPANY S.A., con domicilio en Lavalle 1619, P.B., Dto.??? B???, C.A.B.A., argentina), sujeto a nuestras pr??cticas normales de protecci??n de la informaci??n. Asimismo, confirmas que est??s informado que dicha base sea almacenada en servidores ubicados en la ???nube??? (a trav??s de Google Services???) fuera de Uruguay y de Argentina y autorizas la consecuente transferencia internacional de tus datos. En cualquier momento podr??s ejercer -en forma gratuita- los derechos de acceso, rectificaci??n y supresi??n de tus datos de nuestra base y/o oponerte al tratamiento y cesi??n de tus datos, enviando correo electr??nico a info@memberexperiences.me). A fin de autorizar los cambios que nos solicites te pediremos en forma previa que acredites tu identidad.
						</td>
						<td width="20" style="background-color: #F1F0F0;"></td>
					</tr>
					<tr>
						<td colspan="3" height="20" style="background-color: #F1F0F0;"></td>
					</tr>
					<tr>
						<td width="20" style="background-color: #F1F0F0;"></td>
						<td height="50" style="background-color: #F1F0F0;font-family:Arial, Helvetica, sans-serif; text-align: center; color: #000000; font-size: 16px; line-height: 20px;">
							??Por qu?? recib?? esto? <a href="#" style="color: #000000;">Salir de la lista</a> | <a href="#" style="color: #000000;">Cambiar mis datos</a>
						</td>
						<td width="20" style="background-color: #F1F0F0;"></td>
					</tr>
					<tr>
						<td colspan="3" height="30" style="background-color: #F1F0F0;"></td>
					</tr>
				</table>
				<!--[if (gte mso 9)|(IE)]>
				</td>
				</tr>
				</table>
				<![endif]-->
											</td>
						</tr>
				</table>
			</body>
			</html>
	';
	$mensaje = array();
	$mensaje['emailRemitente'] = $empresa->emailRmitente;
	$mensaje['nombreRemitente'] = $empresa->remitente;
	$mensaje['cuerpo'] = $cuerpo;
	$mensaje['asunto'] = $asunto;
	$envio= Email::enviarMensaje($destinatarios, $mensaje);
	return $envio;

}