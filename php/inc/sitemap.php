<?php

if(!isset($_GET['wb']))
{
	//cargar contenido inicio
	$titulo = '..:: Alvi Socio | Home ::..';
	$contenido = 'php/pages/wb-home.php';

}


else if ( $_GET['wb'] == 'home' )
{
	//cargar contenido beneficios
	$titulo = '..:: Alvi Socio | Home ::..';
	$contenido = 'php/pages/wb-home.php';

}
else if ( $_GET['wb'] == 'beneficios' )
{
	//cargar contenido beneficios
	$titulo = '..:: Alvi Socio | Beneficios ::..';
	$contenido = 'php/pages/wb-beneficios.php';

}
// else if ( $_GET['wb'] == 'categorias' )
// {
// 	//cargar contenido categorias
// 	$titulo = '..:: Alvi Socio | Categorias ::..';
// 	$contenido = 'php/pages/wb-categorias.php';

// }
else if ( $_GET['wb'] == 'eventos' )
{
	//cargar contenido eventos
	$titulo = '..:: Alvi Socio | Eventos ::..';
	$contenido = 'php/pages/wb-eventos.php';

}
// else if ( $_GET['wb'] == 'capacitaciones' )
// {
// 	//cargar contenido capacitaciones
// 	$titulo = '..:: Alvi Socio | Capacitaciones ::..';
// 	$contenido = 'php/pages/wb-capacitaciones.php';

// }
else if ( $_GET['wb'] == 'frecuente' )
{
	//cargar contenido capacitaciones
	$titulo = '..:: Alvi Socio | Preguntas Frecuentes ::..';
	$contenido = 'php/pages/wb-frecuente.php';

}
else if ( $_GET['wb'] == 'asistencias' )
{
	//cargar contenido asistencias
	$titulo = '..:: Alvi Socio | Asistencias ::..';
	$contenido = 'php/pages/wb-asistencias.php';

}

else if ( $_GET['wb'] == 'combustible' )
{
	//cargar contenido asistencias
	$titulo = '..:: Alvi Socio | Combustible ::..';
	$contenido = 'php/pages/wb-combustible.php';

}

// else if ( $_GET['wb'] == 'inscribete' )
// {
// 	//cargar contenido inscribete
// 	$titulo = '..:: Alvi Socio | Inscribete ::..';
// 	$contenido = 'php/pages/wb-inscribete.php';

// }
else
{
	//cargar contenido error
	$titulo = '..:: Alvi Socio | Error 404 ::..';
	$contenido = 'php/pages/404.php';
}
?>