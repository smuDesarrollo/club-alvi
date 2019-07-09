<section class="container  flex  fixed-top">
	<div class="item  ph12  i-b  v-middle  center">
		<img class="ph12  p_25" src="php/img/cursos/cursos-capacitaciones.jpg" alt="">
	</div>
</section>

<!--Botonera-->

<section class="container  ph12   p2  flex  flex-wrap  jc-center">



	<div class="p_5 md6  lg3 flex i-b">
		<div class="caja-cursos  point tab tablinks" onclick="openCity(event, 'dos')" id="defaultOpen">
			<p class="mayorista  p_25  center  f_75" >19 de Diciembre 2018</p>
			<div class="item  bg  flex-auto">
			 <p class="f1">Taller nº10 </p>
			<h4 class="p_5  line-bottom  out">Marketing para su negocio</h4>
			</div>
			<br>
		</div>
	</div>	

</section>

<!--FINBotonera-->

<!--Contenido-->
<section class="container  ph12   p2  flex  flex-wrap  jc-center">


<!--ContenidoUno-->
			<div id="dos" class="p1  ph12  tabcontent">
				<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				<div class="ph12  md4  flex i-b  floatl">
					<div class="item  bg  flex-auto">
						<p class="f1  p_5">Taller nº 9</p>
						<h4 class="f2  p_5  line-bottom  sansita">Marketing para su negocio</h4>
						<img class="floatr  inacap" src="php/img/cursos/inacap.png">
						<img class="persona" src="php/img/cursos/person12.jpg">
					</div>
					
				</div>
				<div class="ph12  md7  flex i-b  floatl">
					<div class="item  bg  flex-auto">

						<div class="floatl">
						<img class="floatl  ico-curso" src="php/img/cursos/objetivo.png"> <p class="f_75  md-f1 mayorista  p_5 floatl title-curso">OBJETIVO</p>
						</div>

						<div class="floatl  content-cursos">

							<p class="mayorista  f_75">Conocer técnicas de microempresas que permitan captar nuevos clientes a través de la incorporación de conceptos básicos del marketing moderno.</p>

						</div>

						<div class="floatl">
						<img class="floatl  ico-curso" src="php/img/cursos/tematica.png"> <p class="f_75  md-f1 mayorista  p_5 floatl title-curso">TEMÁTICAS</p>
						</div>

						<div class="floatl  content-cursos">
							
							<p class="mayorista">Conceptos generales del nuevo marketing:</p> <br>
							<p class="mayorista">	
								• Análisis del mercado y demanda en mi entorno<br>
								• Cómo posicionar a mi negocio en la comunidad<br>
								• Hacer de mi negocio un lugar atractivo<br>
								• Cómo potenciar mi negocio
							</p>

						</div>

						<div class="floatl">
						<img class="floatl  ico-curso" src="php/img/cursos/map.png"> <p class="f_75  md-f1 mayorista  p_5 floatl title-curso">DÓNDE SE IMPARTE</p>
						</div>

						<div class="floatl  content-cursos">
							<?php include 'php/inc/locales1.php' ?>					
						</div>

						<div class="floatl">
						<img class="floatl  ico-curso" src="php/img/cursos/time.png"> <p class="f_75  md-f1 mayorista  p_5 floatl title-curso">DÍA Y HORA</p>
						</div>

						<div class="floatl  content-cursos">
							
							<p class="mayorista">Miércoles 19 de diciembre, desde las 09:00 hrs. a 12:00 hrs.
								Inscripciones: hasta el sábado 15 de diciembre
							</p>

						</div>

						<div class="floatl">
						<img class="floatl  ico-curso" src="php/img/cursos/pdf.png"> <p class="f_75  md-f1 mayorista  p_5 floatl title-curso">MATERIAL COMPLEMENTARIO</p>
						</div>

						<div class="floatl  content-cursos  top">
							
							<a class="btn-cursos  mayorista  f_75" href="php/pdf/MARKETING-PARA-SU-NEGOCIO.pdf" download="Marketing para su Negocio">DESCARGAR AQUÍ</a> 
						</div>

					</div>
				</div>
				
			</div>
<!--FINContenidoUno-->


</section>
<!--FINContenido-->

<section class="container  line-bottom">
		
	<div class="ph12 i-b  v.middle  center  p-r">
		<a href="http://www.inacap.cl/" target="_blank"><img class="cursos-link" src="php/img/cursos/click.png" alt="Inacap"></a>
	</div>	
</section>


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>