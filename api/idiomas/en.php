<?php

/**
* Archivo de idioma
*
* Las traducciones se agregan de a una con el formato 'clave' => 'valor'.
* Las claves no se pueden repetir asi que conviene ponerles un prefijo.
* Además no puede haber arrays dentro de este array.
* 
* @example
*  // HOME
* 'home-titulo' => 'Título de la home',
* 'home-bajada' => 'Lorem ipsum	dolor sit amet...',
* 
* // CONTACTO
* 'contacto-titulo' => 'Contáctenos',
* ...
*
* Estas traducciones se pueden acceder desde el sitio usando la función __(), el 
* alias del helper "Traduccion".
*
* @example
* echo __('msj-incompleto'); // Todos los campos con asterisco (*) son requeridos.
* 
* @example 
* Traducción:
* 'nav' => array(
*   'home' => 'Home'.
*   'contacto' => 'Contacto'.
* );
*
* Obtener traducción:
* __('nav contacto');
*
*
*/

return array(
	'menu' => array(
		'Categories',
		'FAQ',
		'ME Profile',
		'Me Channels',
		'ME Experiences',
		'ME Codes',
		'Wish list',
		'Sign off',
		'Sign up',
		'Log in'
	),
	'home' => array(
		'WE CREATE A<br>COMMUNITY',
		'We generate unique content for a demanding global audience <br> and we empower talents as part of a profitable business.',
		'EXPLORE the experiences',
		'Unique <br> Experiences',
		'Access unique experiences, create memorable memories with the creators of the moment.',
		'WE CREATE <br>CONTENT',
		'Discover the best content and <br> enjoy the best experiences where you want, when you want.',
		'Follow your <br>favorite creators',
		'Explore our categories, access streaming and on-demand content from creators that inspire you.',
		'Enjoy exclusive experiences with',
		'subscribe',
		'Give someone special the content you like',
		'buy now',
		'In ME Haus you will find the best space to make your content. We offer you communication tools, professional training, exclusive locations and audiovisual production services.',
		'CONTACT NOW'
	),
	'acerca' => array(
		'ABOUT ',
		'Member Experiences',
		'A NEW CHANNEL OF COMMUNICATION <br> THAT PROMOTES UNIQUE EXPERIENCES.',
		'It is a platform for streaming and on-demand content, inspired by the latest trends of the moment, designed by the most important references in the industry, for a demanding audience.',
		'Unique <br> Experiences',
		'when you want, <br> where you want.',
		'DISCOVER AN EXCLUSIVE WORLD'
	),

	'categorias' => array(
		'I followed your',
		'favorite creators',
		'Explore our categories, access streaming and on-demand content from creators that inspire you.',
		'OUTSTANDING EXPERIENCES',
		'DISCOVER ALL THE NEWS',
		'Subscribe to receive more information',
		'SEND',
		'ENJOY UNIQUE EXPERIENCES WITH THE CREATORS WHO INSPIR YOU.',
		'On-Demand Content',
		'Livestreaming experiences',
		'Available when you want, where you want',
		"WE WILL USE THE INFORMATION YOU PROVIDE TO CREATE YOUR ACCOUNT ON THE <a href='#'> WWW.MEMBEREXPERIENCES.ME </a> PLATFORM OR TO OFFER YOU THE SERVICES THAT ARE PROMOTED THROUGH IT. WHEN COMPLETING THE
		PRESENT FORM, YOU GIVE YOUR CONSENT FOR US TO USE YOUR INFORMATION FOR THIS PURPOSE.
		INCLUDED IN THIS FORM ARE MANDATORY FOR THOSE WHO SUBSCRIBE. ANY
		FALSE, ERROR AND / OR INACCURACIES REGARDING THE INFORMATION PROVIDED WILL INVOLVE THE REJECTION OF YOUR
		APPLICATION. ALSO, YOU AUTHORIZE US TO CONTACT YOU AT THE INDICATED EMAIL, INCLUDING WITHOUT LIMITATION:
		THROUGH THE SENDING OF SMS TEXT MESSAGES, THROUGH OUR MOBILE APP AND / OR THROUGH OTHER APPLICATIONS
		SUCH AS WHATSAPP, TO SEND YOU MARKETING AND SERVICE COMMUNICATIONS. IT IS EMPHASIZED THAT THE SENDING OF MESSAGES FROM
		SMS TEXT AND / OR CONTACT THROUGH MOBILE APPLICATIONS SUCH AS WHATSAPP, WILL NOT BE USED AS A CHANNEL
		CONSULTATIONS AND CLAIMS AND THAT THEY SHOULD BE PROCESSED THROUGH THE CUSTOMER SERVICE ROUTES (MAIL
		ELECTRONIC) YOUR PERSONAL DATA IS STORED IN A DATABASE WHOSE RESPONSIBLE IS MULINGAN S.A., WITH
		ADDRESS IN YAGUARON 1407, ESC 916, MONTEVIDEO (CP11200), URUGUAY. FOR THE PURPOSES OF PROCESSING YOUR PERSONAL DATA,
		THE SAME MAY BE SENT TO OUR BUSINESS PARTNERS IN OTHER COUNTRIES (INCLUDING, AMONG OTHERS, KULL
		COMPANY S.A., WITH ADDRESS AT LAVALLE 1619, P.B., DTO. ”B”, C.A.B.A., ARGENTINA), IT SUBJECT TO OUR PRACTICES
		NORMAL INFORMATION PROTECTION. ALSO, YOU CONFIRM THAT YOU ARE INFORMED THAT SUCH BASE WILL BE STORED IN
		SERVERS LOCATED IN THE 'CLOUD' (THROUGH <a href='#'> 'AMAZON WEB SERVICES' </a>) OUTSIDE URUGUAY AND ARGENTINA AND AUTHORIZES THE
		CONSEQUENTIAL INTERNATIONAL TRANSFER OF YOUR DATA. AT ANY TIME YOU WILL BE ABLE TO EXERCISE -FREE FORM- THE
		RIGHTS OF ACCESS, RECTIFICATION AND DELETE OF YOUR DATA FROM OUR BASE AND / OR OPPOSE TO THE TREATMENT AND / OR ASSIGNMENT OF
		YOUR DATA, BY SENDING AN EMAIL TO <a href='mailto:info@memberexperiences.me'> INFO@MEMBEREXPERIENCES.ME. </a> IN ORDER TO AUTHORIZE THE CHANGES YOU REQUEST US
		WE WILL ASK YOU IN PRIOR TO PROVIDE YOUR IDENTITY. IN ARGENTINA, THE INFORMATION ACCESS AGENCY
		PUBLIC, IN ITS CHARACTER OF CONTROLLING BODY OF LAW No. 25,326, HAS THE ATTRIBUTION TO ATTEND THE COMPLAINTS AND
		CLAIMS FROM THOSE WHO ARE AFFECTED IN THEIR RIGHTS FOR BREACH OF THE RULES IN FORCE IN
		PERSONAL DATA PROTECTION MATTER.
		PRIVACY STATEMENT: TO KNOW HOW WE OBTAIN, SECURE AND USE YOUR PERSONAL INFORMATION IN COMPLIANCE
		WITH THE REGULATIONS IN FORCE, VISIT THE COMPANY'S PRIVACY STATEMENT BY ENTERING PRIVACY."
	),				
	'contenidos' => array(
		'buy now',
		'Reviews',
		'Share',
		'I like it',
		'reviews',
		'I wrote your comment',
		'Send',
		'See all reviews',
		'buy now',
		'Give away experiences Discover a world of options for every moment'
	),
	'elemento' => array(
		'SEE CONTENT',
		'CONTENT',
		'RETURN',
		'OF THE EXPERIENCE',
		'OF THE CHANEL',
		'Reviews',
		'Share',
		'I like it',
		'Send',
		'See all reviews',
		'I wrote your comment'
	),
	'privacidad' => array(
		'Privacy',
		'The privacy policy of ME <br>
      Updated December 31, 2020'
	),
		'tyc' => array(
		'Terms and Conditions',
		'Legal information and news'
	),
	'productos' => array(
		'BEGINNING',
		'BAG',
		'PAYMENT',
		'RETURN',
		'YOUR PRODUCTS',
		'REMOVE',
		'You have no products in your bag',
		'TOTAL',
		'Subtotal',
		'Total',
		'I kept buying',
		'Do you have a discount coupon?',
		'APPLY COUPON',
		'GIVE AS A GIFTCARD <br>OF THIS CONTENT',
		'BUY NOW',
		'<strong>DISCLAIMER:</strong> The balance of the gift cards is not cumulative. Only 1 gift card per purchase is allowed.'
	),
	'modalGift' => array(
		'Give away content',
		"Enter the recipient's email:",
		"Re-enter the recipient's email:",
		'Personalize your message:',
		'Give a present'
	),
	'giftAdd' => array(
		'Your Gift Card <br> was successfully redeemed',
		'go to content'
	),
		'faq' => array(
		'FAQ'
	),

	'footer' => array(
		'to subscribe',
		'Subscribe to receive news about Member Experiences, events, information and news.',
		'Leave us your email',
		'Subscribe',
		'Member Experiences',
		'About ME',
		'Privacy Policy',
		'Terms and Conditions',
		'Press',
		'Contact us: <a href="#">info@memberexpeeriences.me</a>',
		'Copyright © 2020 MULINGAN S.A. <br>
            Yaguaron 1407, Esc 916, Montevideo (CP11200), Uruguay <br> <br>
            <span> We will use the information you provide us to send you notifications with news that are published to
              through the site [memberexperiences.me] or to offer you the services provided through the site.
              By completing this form, you give your consent for us to use your information with this
              purpose and you authorize us to contact you at the indicated email address to send you communications of
              marketing and service. Your personal data is stored in a database whose responsible is
              MULINGAN S.A., with address at Yaguaron 1407, Esc 916, Montevideo (CP11200), Uruguay. For the purposes of
              process your personal data, they may be sent to our business partners in other
              countries (including KULL COMPANY S.A., domiciled at Lavalle 1619, P.B., Dto. ”B”, C.A.B.A.,
              Argentina), subject to our normal information protection practices. You further confirm that
              you are informed that said database is stored in servers located in the "cloud" (through Google
              Services ”) outside Uruguay and Argentina and authorize the consequent international transfer of your
              data. At any time you can exercise -free of charge- the rights of access, rectification and
              deletion of your data from our database and / or oppose the treatment and transfer of your data, by sending mail
              email to info@memberexperiences.me). In order to authorize the changes that you request, we will ask you at
              prior form that you prove your identity. </span>'
	),
	'registro' => array(
		'Sign up',
		'Name',
		'Last name',
		'Date of birth',
		'Gender',
		'Feminine',
		'Not binary',
		'Male',
		'I prefer not to say',
		'Country',
		'Select your country of residence',
		'Select your country',
		'Area code',
		'Telephone',
		'Email',
		'Password',
		'Show password',
		'The password must contain at least one capital letter and 8 digits in total.',
		'Repeat password',
		'Make sure it matches the password entered.',
		'To continue it is necessary that you accept the',
		'Terms and Conditions',
		'give me. If you have already read and agree to the Terms and Conditions please click on the box.',
		'I want to receive personalized commercial communications from ME through email.',
		'Sign up',
		'We will use the information you provide to create your account on the platform
    <a href="https://www.memberexperiences.me">www.memberexperiences.me</a> or to offer you the services that are promoted through it. To the
    Complete this form, you give your consent for us to use your information with this
    purpose. the answers included in this form are mandatory for
    who subscribes it. Any falsification, error and / or inaccuracy regarding the information provided
    will imply the rejection of your application. You also authorize us to contact you by email
    indicated including without limitation: through the sending of text messages sms, through
    our mobile application and / or through other applications such as whatsapp, to send you
    marketing and service communications. It is highlighted that sending text messages sms and / or contact to
    through mobile applications such as whatsapp, it will not be used as a channel for inquiries and complaints and
    that they must be processed through the customer service channels (email) .Your data
    Personal data are stored in a database whose manager is mulingan s.a., domiciled at
    yaguaron 1407, esc 916, montevideo (cp11200), uruguay. For the purposes of processing your personal data, the
    They may be sent to our business partners in other countries (including, among others, to kull
    company s.a., with address at Lavalle 1619, p.b., disc. ”B”, c.a.b.a., Argentina), subject to our
    normal information protection practices. Likewise, you confirm that you are informed that said base
    will be stored on servers located in the "cloud" (via <a>“amazon web services”</a>) outside of uruguay and
    Argentina and authorize the consequent international transfer of your data. Anytime
    You can exercise -free of charge- the rights of access, rectification and deletion of your data from
    our base and / or oppose the treatment and / or transfer of your data, by sending an email to
    <a href="mailto:info@memberexperiences.me">info@memberexperiences.me.</a> In order to authorize the changes you request, we will ask you in advance
    that you prove your identity. In Argentina, the public information access agency, in its capacity as
    control body of Law No. 25,326, has the power to deal with complaints and claims that
    brought by those who are affected in their rights due to breach of the regulations in force in
    personal data protection matter.
    privacy statement: to learn how we obtain, secure and use your personal information
    complying with current regulations, visit the company"s privacy statement by going to
    <a href="politica-privacidad.php">Privacy Policy.</a>'
	),
	'agrega-carrito' => array (
		'Content was added<br>to cart',
		'ACCEPT'
	),
	'califica' => array (
		'¡RATE <br>THE CONTENT!',
		'SEND QUALIFICATION',
		'SKIP'
	),
	'cancelar-canal-exito' => array(
		'THE CANCELLATION OF YOUR CHANNEL<br> WAS SUCCESSFULLY CARRIED OUT'
	),
	'cancelar-canal' => array(
		'ARE YOU SURE WHAT YOU WANT <br>TO CANCEL YOUR CHANNELS?',
		'Remember that you can access the content until the last business day of the current month',
		'ACCEPT',
		'RETURN'
	),
	'inicio-session' => array(
		'Log in',
		'Email:',
		'Password:',
		'DID YOU FORGET YOUR PASSWORD?',
		"DON'T YOU RECEIVE THE VERIFICATION MAIL?",
		"Still don't have a username and password?",
		'Sign up',
		'Login with facebook',
		'Login with google'
	),
	'me' => array(
			'AR. En ME - Member Experience from',
			'ME PROFILE',
			'ME SETTING',
			'ME PAYMENTS',
			'ME CHANNELS',
			'ME EXPERIENCES',
			'ME WISH LIST',
			'Personal information',
			'User and password',
			'Name',
			'Last name',
			'Email',
			'Telephone',
			'Country',
			'Date of birth',
			'The date format is DD/MM/AA',
			'Save Changes',
			'User and password',
			'User',
			'password',
			'DID YOU FORGET YOUR PASSWORD?',
			'Update password',
			'Current password',
			'New Password',
			'ME account cancellation',
			'One-time cancellation of experiences',
			'Channel cancellation',
			'By selecting cancel, all information in your account will be deleted on the last business day of the current month, including the content or experiences you have purchased.',
      'Cancel account',
      'You can request cancellation up to 72 business hours before the event, after this period no returns will be accepted.',
      'EXPERIENCE',
      'DETAIL',
      'SELECT',
      'CANCEL',
      'Cancel selected',
      'You can request the cancellation of the channels purchased up to 10 days (in a row) before the expiration of the current month. <br> Otherwise, the charge corresponding to the renewal will be automatically debited from your credit card.',
      'CHANNEL',
      'Payment method',
      'Billing history',
      'These are the payment methods registered in ME'
	),
	'mehaus' => array(
		'In <span>ME Haus</span> you will find the best space to create your content.',
		'Access audiovisual solutions, equipment and production tools to create your content with the highest quality standards.<br>If you are interested in learning more about this service, send us your contact information:',
		'complete the form',
		'Name',
		'Last name',
		'Email',
		'Select your country',
		'Phone',
		'Comments',
		'(*) This service has an additional cost',
		'To continue you need to accept the',
		'Terms and Conditions',
		'give me. If you have read and agree to the Terms and Conditions, please click the button.',
		'Send form'
	),





								
	'msj-incompleto'       => 'Todos los campos con asterisco (*) son requeridos.',
	'msj-error'            => 'El email ingresado es inválido. Por favor, vuelva a ingresarlo.',
	'msj-mail_invalido'    => 'El captcha no fue completado correctamente. Vuelva a intentarlo',
	'msj-captcha_invalido' => 'Todos los campos con asterisco (*) son requeridos.',
	'msj-ok'               => 'Su mensaje ha sido enviado, muchas gracias por comunicarse con nosotros.<br /> breve nos pondremos en contacto con Ud.',
);

