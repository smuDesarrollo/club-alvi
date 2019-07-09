<?php 

require'db.php';
$objdata = new Database();

require'validator_rut.php';

require'files.php';
$objFile = new Files();

if ( $_POST['comerciante']=='Si'){

  $errores = 0;
  $nombre       		= $_POST['nombre'];
  $direccion    		= $_POST['direccion'];
  $email    			= $_POST['email'];
  $codigo     			= $_POST['codigo'];
  $telefono     		= $_POST['telefono'];
  $rut     				= $_POST['rut'];
  $comerciante  		= $_POST['comerciante'];
  $rut_comercio  		= $_POST['rut_comercio'];
  $direccion_comercio 	= $_POST['direccion_comercio'];
  $rubro  				= $_POST['rubro'];
  $terminos  			= $_POST['terminos'];
  $tel 					= $_POST['codigo'].$_POST['telefono'];
  
  if (! valida_rut($rut) )      $errores++;
  if (! valida_rut($rut_comercio) ) $errores++;
  if ( strlen($nombre) == 0) $errores++;
  if ( strlen($direccion) == 0) $errores++;
  if ( strlen($email) == 0) $errores++;
  if ( strlen($codigo) == 0) $errores++;
  if ( strlen($telefono) == 0) $errores++;
  if ( strlen($comerciante) == 0) $errores++; 
  if ( strlen($direccion_comercio) == 0) $errores++; 
  if ( strlen($rubro) == 0) $errores++;
  if ( strlen($terminos) == 'on') $errores++; 
  
  if (! filter_var($email, FILTER_VALIDATE_EMAIL) ) $errores++;

  
if ($errores == 0) {

    

    $sth = $objdata->prepare('SELECT * FROM inscribete WHERE email= :email or rut = :rut');

    $sth->bindParam(':email', $_POST['email']);

    $sth->bindParam(':rut', $_POST['rut']);

    $sth->execute();

    $sth->setFetchMode(PDO::FETCH_ASSOC);

    $result = $sth->fetchAll();


    if ($result) {
      header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=No se puedo Registrar el Usuario con el correo ó Rut, ya existe...' );
    }else{

        // armar ruta de la imagen
       $path = $objFile->fix_path($rut_comercio);

        //Cambiar nombre del archivo
       $file = $objFile->change_name();

       $success = $objFile->upload_file($file, $path); 

       $sth = $objdata->prepare('INSERT INTO inscribete (nombre, direccion, telefono, rut, comerciante, rut_comercio, direccion_comercio, rubro, documento, email, terminos) VALUES (:nombre, :direccion, :telefono, :rut, :comerciante, :rut_comercio, :direccion_comercio, :rubro, :documento, :email, :terminos)');


        $sth->bindParam(':nombre', $nombre);
        $sth->bindParam(':direccion', $direccion);
        $sth->bindParam(':telefono', $tel);
        $sth->bindParam(':rut', $rut);
        $sth->bindParam(':comerciante', $comerciante);
        $sth->bindParam(':rut_comercio', $rut_comercio);
        $sth->bindParam(':direccion_comercio', $direccion_comercio);
        $sth->bindParam(':rubro', $rubro);
        $sth->bindParam(':documento', $success);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':terminos', $terminos);

        $sth->execute();

        // título
        $título = 'REGISTRO CLUB ALVI';

        // mensaje
        $mensaje="<table width='658' border='0' align='center' cellpadding='0' cellspacing='0'>
                       <tbody><tr>
                            <td width='658' height='62' align='center' valign='top' bgcolor='#FFFFFF'><a rel='nofollow'>
                                <img src='http://www.alvi.cl/club-alvi/php/img/header-mail.jpg' alt='Header'>
                            </a>
                          </td>
                        </tr>

                        <tr>
                            <td width='658' height='39' align='center'>
                                <table width='300' border='0' cellspacing='0' cellpadding='10'>
                                    <tbody><tr>
                                        <td height='20' align='center' style='font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-style:normal;line-height:20px;font-color:#6c6d6f;margin-top:20px;'><span style='font-weight:bold;text-transform:uppercase;color:#6c6d6f;'>Registro Club Alvi Mayorista</span></td>
                                    </tr>
                                </tbody></table>
                        </td></tr>
                    </tbody>
                  </table>

                <table width='658' border='0' align='center' cellpadding='0' cellspacing='0'>
                    <tbody><tr>
                        <td width='658' align='center' valign='top'>
                            <table width='658' border='0' align='center' cellpadding='10' cellspacing='0'>
                                <tbody><tr>
                                    <td width='658' align='center' valign='top' style='border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#cccccc;'>
                                        <p style='font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:13px;'>
                                            <span style='font-weight:bold;text-transform:uppercase;color:#6c6d6f;'>HOLA! , $nombre</span> <br><br>
                                            <br><br>
                                            <b>Ya estás registrado y puedes acceder a los precios baratos, baratos baratos!!!</b><br><br>
                                        </p>
                                        <p style='font-family:'Lucida Sans Unicode','Lucida Grande', sans-serif;font-size:13px; text-align:left;'>
                                            <br><br>
                                            <b>Tus Datos:</b><br>
                                            <b>Nombre:</b> $nombre<br>
                                            <b>Rut:</b> $rut<br>
                                            <b>Telefono:</b> $tel<br>
                                            <b>Correo:</b> $email<br><br>
                                        </p>
                                        <br>
                                    </td>
                                </tr>
                            </tbody></table>

                            <br>
                            <table width='537' border='0' cellspacing='0' cellpadding='0'>
                                <tbody>
                            </tbody>
                            </table>
                        </td>
                    </tr>
                  </tbody>
                </table>
        ";


        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        
        // Cabeceras adicionales
      
        $cabeceras .= 'To: '.$nombre.' <'.$email.'>' . "\r\n";
        $cabeceras .= 'From: Club Alvi <contacto@alvi.cl>' . "\r\n";

        if (mail($email, $título, $mensaje, $cabeceras)) {

           header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Gracias por registrarte, te hemos enviado un mail, sino lo consigues revisa en tu carpeta de spam...' );
          } else {
             header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Ocurrio un Error no se Registro el usuario, intente de nuevo...' );
          }
          
     	}
  
 	} else {
  
    header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Verifica los datos ingresados, debes aceptar los términos y los campos no pueden estar en blanco o tu rut es INCORRECTO!!' );
    
  	}
}else{

  $errores = 0;
  $nombre       = $_POST['nombre'];
  $direccion    = $_POST['direccion'];
  $email    	= $_POST['email'];
  $codigo     	= $_POST['codigo'];
  $telefono     = $_POST['telefono'];
  $rut     		= $_POST['rut'];
  $comerciante  = $_POST['comerciante'];
  $terminos  	= $_POST['terminos'];
  $tel 			= $_POST['codigo'].$_POST['telefono'];
  
  if (! valida_rut($rut) ) $errores++;
  if ( strlen($nombre) == 0) $errores++;
  if ( strlen($direccion) == 0) $errores++;
  if ( strlen($email) == 0) $errores++;
  if ( strlen($codigo) == 0) $errores++;
  if ( strlen($telefono) == 0) $errores++;
  if ( strlen($comerciante) == 0) $errores++; 
  if ( strlen($terminos) == 'on') $errores++; 
  
  if (! filter_var($email, FILTER_VALIDATE_EMAIL) ) $errores++;

  
if ($errores == 0) {

    $objdata = new Database();

    $sth = $objdata->prepare('SELECT * FROM inscribete WHERE email= :email or rut = :rut');

    $sth->bindParam(':email', $_POST['email']);

    $sth->bindParam(':rut', $_POST['rut']);

    $sth->execute();

    $sth->setFetchMode(PDO::FETCH_ASSOC);

    $result = $sth->fetchAll();


    if ($result) {
      header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=No se puedo Registrar el Usuario con el correo ó Rut, ya existe...' );
    }else{

     

      $sth = $objdata->prepare('INSERT INTO inscribete (nombre, direccion, telefono, rut, comerciante, email, terminos) VALUES (:nombre, :direccion, :telefono, :rut, :comerciante, :email, :terminos)');


        $sth->bindParam(':nombre', $nombre);
        $sth->bindParam(':direccion', $direccion);
        $sth->bindParam(':telefono', $tel);
        $sth->bindParam(':rut', $rut);
        $sth->bindParam(':comerciante', $comerciante);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':terminos', $terminos);

        $sth->execute();

        // título
        $título = 'REGISTRO CLUB ALVI';

        // mensaje
        $mensaje="<table width='658' border='0' align='center' cellpadding='0' cellspacing='0'>
                       <tbody><tr>
                            <td width='658' height='62' align='center' valign='top' bgcolor='#FFFFFF'><a rel='nofollow'>
                                <img src='http://www.alvi.cl/club-alvi/php/img/header-mail.jpg' alt='Header'>
                            </a>
                          </td>
                        </tr>

                        <tr>
                            <td width='658' height='39' align='center'>
                                <table width='300' border='0' cellspacing='0' cellpadding='10'>
                                    <tbody><tr>
                                        <td height='20' align='center' style='font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-style:normal;line-height:20px;font-color:#6c6d6f;margin-top:20px;'><span style='font-weight:bold;text-transform:uppercase;color:#6c6d6f;'>Registro Club Alvi Mayorista</span></td>
                                    </tr>
                                </tbody></table>
                        </td></tr>
                    </tbody>
                  </table>

                <table width='658' border='0' align='center' cellpadding='0' cellspacing='0'>
                    <tbody><tr>
                        <td width='658' align='center' valign='top'>
                            <table width='658' border='0' align='center' cellpadding='10' cellspacing='0'>
                                <tbody><tr>
                                    <td width='658' align='center' valign='top' style='border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#cccccc;'>
                                        <p style='font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:13px;'>
                                            <span style='font-weight:bold;text-transform:uppercase;color:#6c6d6f;'>HOLA! , $nombre</span> <br><br>
                                            <br><br>
                                            <b>Ya estás registrado y puedes acceder a los precios baratos, baratos baratos!!!</b><br><br>
                                        </p>
                                        <p style='font-family:'Lucida Sans Unicode','Lucida Grande', sans-serif;font-size:13px; text-align:left;'>
                                            <br><br>
                                            <b>Tus Datos:</b><br>
                                            <b>Nombre:</b> $nombre<br>
                                            <b>Rut:</b> $rut<br>
                                            <b>Telefono:</b> $tel<br>
                                            <b>Correo:</b> $email<br><br>
                                        </p>
                                        <br>
                                    </td>
                                </tr>
                            </tbody></table>

                            <br>
                            <table width='537' border='0' cellspacing='0' cellpadding='0'>
                                <tbody>
                            </tbody>
                            </table>
                        </td>
                    </tr>
                  </tbody>
                </table>
        ";


        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        
        // Cabeceras adicionales
      
        $cabeceras .= 'To: '.$nombre.' <'.$email.'>' . "\r\n";
        $cabeceras .= 'From: Club Alvi <contacto@alvi.cl>' . "\r\n";

        if (mail($email, $título, $mensaje, $cabeceras)) {

           header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Gracias por registrarte, te hemos enviado un mail, sino lo consigues revisa en tu carpeta de spam...' );
          } else {
             header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Ocurrio un Error no se Registro el usuario, intente de nuevo...' );
          }

          
     	}
  
 	} 
 	else {
  
    header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Verifica los datos ingresados, debes aceptar los términos y los campos no pueden estar en blanco o tu rut es INCORRECTO!!' );
    
  	}

}