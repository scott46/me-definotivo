<?php

function olvidoForm ($usuario, $empresa, $token) {

	$destinatarios = array($usuario->email);
	$asunto = 'Recuperando Contraseña';
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
										<td class="logo-me"><img src="https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/logo-member-experiences.png" alt="logo-member-experiences"></td>
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
										<a href="http://www.memberexperiences.me" style="color: #000000; font-weight: bold;">www.memberexperiences.me</a>
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
						<td height="9" background= "https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/linea-gradient.jpg">
							
						</td>
						<td width="20"></td>
					</tr>

					<tr>
						<td width="20"></td>
						<td height="615" style="background-color: #F8F5F2;">
						<table cellspacing="0" cellpadding="0" width="100%">
							<tbody>
								<tr>
									<td style="text-align: center;" height="170"><img src="https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/reestablecer.jpg" alt="reestablecer"></td>
								</tr>
								<tr>
									<td style="font-family:Arial, Helvetica, sans-serif; text-align: center; color: #616161; font-size: 28px; line-height: 28px;">
										<span style="font-size: 32px;">¡HOLA XXX!</span><br><br>

										RECIENTEMENTE<br>HAS SOLICITADO<br>RESTABLECER TU<br>CONTRASEÑA

									</td>
								</tr>
							</tbody>
						</table>
					</td>
						<td width="20"></td>
					</tr>

					<tr>
						<td width="20"></td>
						<td valign="middle" height="175" background="https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/bg-gradient.jpg" style="font-family:Arial, Helvetica, sans-serif; text-align: center; color: #ffffff; font-size: 18px; line-height: 20px;">
							HACÉ <a href="'.$token.'" style="color: #ffffff;">CLICK ACÁ</a> PARA<br>RESTABLECERLA.
						</td>
						<td width="20"></td>
					</tr>

					<tr>
						<td colspan="3" height="30"></td>
					</tr>
					<tr>
						<td width="20"></td>
						<td style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #000000; font-size: 17px; line-height: 24px;">
							¿Necesitas ayuda? Contactate con <a href="mailto:info@memberexperiences.me" style="color: #000000;">info@memberexperiences.me</a>
						</td>
							<td width="20"></td>
					</tr>
					<tr>
						<td colspan="3" height="30"></td>
					</tr>

					<tr>
						<td height="112" colspan="3" style="text-align: center; background-color: #F1F0F0;" align="center" valign="middle">
							<img src="https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/me.png" alt="me">
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
															<td width="20"><img src="https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/facebook.png" alt="facebook"></td>
															<td width="5"></td>
															<td width="140" style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #000000; font-size: 14px; line-height: 24px;">
																<a style="color: #000000; font-weight: bold; text-decoration: none;" href="http://www.facebook.com/memberexperiences">memberexperiences</a>
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
														<td width="20"><img src="https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/instagram.png" alt="instagram"></td>
														<td width="5"></td>
														<td width="140" style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #000000; font-size: 14px; line-height: 24px;">
															<a style="color: #000000; font-weight: bold; text-decoration: none;" href="http://www.instagram.com/memberexperiences">memberexperiences</a>
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
														<td width="20"><img src="https://www.reinicia.com.ar/me/demo/mailings/olvidar-contrasena/twitter.png" alt="twitter"></td>
														<td width="5"></td>
														<td width="140" style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #000000; font-size: 14px; line-height: 24px;">
															<a style="color: #000000; font-weight: bold; text-decoration: none;" href="http://www.twitter.com/memberexperiences">ME_experiences</a>
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
						<td style="font-family:Arial, Helvetica, sans-serif; text-align: left; color: #706F70; font-size: 11px; line-height: 14px; background-color: #F1F0F0;">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin, dolor malesuada suscipit vulputate, nunc ante ultricies quam, eget rutrum metus libero nec purus. Nullam scelerisque, est nec luctus dignissim, orci quam consequat metus, a ultricies mi lorem eget massa. Sed tincidunt scelerisque nulla vitae congue. Aenean elit leo, euismod vel felis quis, elementum imperdiet orci. Etiam luctus id arcu vel rhoncus. Cras feugiat tristique urna, eget faucibus purus semper at. Praesent interdum non sem ullamcorper mollis. Donec bibendum diam mauris, sit amet consectetur nisl facilisis ac. Etiam egestas, lacus eget egestas dapibus, dui lacus pulvinar neque, a luctus est sem quis odio. Vivamus semper felis sodales accumsan placerat. Morbi vulputate pulvinar diam vel ultricies. In hac habitasse platea dictumst. Morbi consequat diam nec tellus finibus, sit amet volutpat purus congue.
						</td>
						<td width="20" style="background-color: #F1F0F0;"></td>
					</tr>
					<tr>
						<td colspan="3" height="20" style="background-color: #F1F0F0;"></td>
					</tr>
					<tr>
						<td width="20" style="background-color: #F1F0F0;"></td>
						<td height="50" style="background-color: #F1F0F0;font-family:Arial, Helvetica, sans-serif; text-align: center; color: #000000; font-size: 16px; line-height: 20px;">
							¿Por qué recibí esto? <a href="#" style="color: #000000;">Salir de la lista</a> | <a href="#" style="color: #000000;">Cambiar mis datos</a>
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