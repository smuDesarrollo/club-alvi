<?php
 
$nombre =  "Francisco";
$asunto =   "prueba";
$email  =   "caracas.classic@gmail.com";
$mensaje =  "prueba";
$contenido = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Haz recibido un mensaje através de la página</h2>
							 <p>'.$nombre. ' te ha enviado el siguiente mensaje:</p>
							 <p>'.$mensaje. ' <br><br> Puedes ponerte en contacto con la persona al email: '.$email.'</p>
							 <hr>
							 
						</body>
						</html>';


// Configuración de los encabezados
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";

// Enviar correo
$envio = mail('caracas.classic@gmail.com', $asunto, $contenido, $headers);


if($envio) {
$miresultado = '<h4>El correo ha sido enviado! Gracias por ponerse en contacto con nosotros.</h4>';
} else{

$miresultado = '<h4>No se envío el correo.</h4>';

}

echo $miresultado;
       
