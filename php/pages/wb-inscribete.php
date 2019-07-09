<section class="container  flex  fixed-top">
	<div class="item  bg-form  ph12  m1  i-b  v-middle  left">

		<h5 class=" sansita  md-f2  p2  lg-f3  center  b-color">Ingresa tu datos y únete al Club Alvi</h5>
		<form method="post" name="contacto_frm" action="php/inc/enviar.php" enctype="multipart/form-data">
			<div class="container  flex">
			<label class=" item  ph12  p_5   f_75   md-f1  roboto-bold  b-color " for=""> Nombre Completo: <input class="item  ph7 floatr" name="nombre" type="text"  required> </label>
			</div>
			<div class="container  flex">
			<label class="item  ph12  p_5  f_75   md-f1  roboto-bold  b-color " for=""> Dirección: <input class=" ph7 floatr" name="direccion" type="text"  required> </label>
			</div>
			<div class="container  flex">
			<label class="item  ph12  p_5  f_75   md-f1  roboto-bold  b-color " for=""> Correo: <input class=" ph7 floatr" name="email" type="text"  required> </label>
			</div>
			<div class="container  flex">
				<label class="item  ph12  p_5  f_75   md-f1 roboto-bold  b-color " for=""> Teléfono Fijo o Celular: 
						<input class=" ph5 floatr" name="telefono" type="number" required> 
						<select class=" ph2 floatr" name="codigo" id="">
							<option value="+562">+562</option>
							<option value="+569">+569</option>
						</select>
				</label>
			</div>
			<div class="container  flex">
				<label class="item  ph12  p_5  f_75   md-f1  roboto-bold  b-color " for=""> Rut: <input class=" ph7 floatr" name="rut" type="text" placeholder="x.xxx.xxx-x"  required>  </label>
			</div>

			<div class="container  flex  ph12  roboto-bold   b-color ">
				<label class="item  ph5  f_75   md-f1   p2  roboto-bold  b-color " for="">
					¿ Es usted Comerciante ?: 
				</label>
				<label class="item  ph7  p2  roboto-bold  b-color " for="">
				<input onclick="Mostrar()" style="margin-right: 10px;" type="radio" checked  name="comerciante" value="Si">Si  
				<input onclick="Ocultar()" style="margin-left: 30px;" type="radio"  checked  name="comerciante" value="No"> No
				</label>
			</div>

			<div style="display:none;" id="comercianteDIV">

			<div class="container  flex">
				<label class="item  ph12  p_5  f_75   md-f1   roboto-bold  b-color " for=""> Rut: <input class=" ph7 floatr" name="rut_comercio" type="text" placeholder="x.xxx.xxx-x" >  </label>
			</div>

			<div class="container  flex">
				<label class="item  ph12  p_5  f_75   md-f1  roboto-bold  b-color " for=""> Dirección negocio: <input class=" ph7 floatr" name="direccion_comercio" type="text">  </label>
			</div>

			<div class="container  flex">
				<label class="item  ph12  p_5  f_75   md-f1   roboto-bold  b-color " for=""> Rubro: 
					<select class=" ph7 floatr" name="rubro" id="">
							<option value="Almacen">Almacén</option>
							<option value="Amasanderia">Amasandería</option>
							<option value="Ambulante">Ambulante</option>
							<option value="Banqueteria y Eventos">Banquetería y Eventos</option>
							<option value="Bazar (Paqueteria, Libreria y Fotocopia)">Bazar (Paquetería, Librería y Fotocopia)</option>
							<option value="Botilleria">Botillería</option>
							<option value="Carniceria">Carnicería</option>
							<option value="Feria">Feria</option>
							<option value="Fruteria y Verduleria">Frutería y Verdulería</option>
							<option value="Hotel / Motel">Hotel / Motel</option>
							<option value="Instituciones">Instituciones</option>
							<option value="Kiosco">Kiosco</option>
							<option value="Otro">Otro</option>
							<option value="Panaderia / PasteleriPuesto de Comidasa ">Panadería / Pastelería </option>
							<option value="Puesto de Comidas">Puesto de Comidas</option>
							<option value="Restaurant / Casino (Fuente de Soda, Comida Rapida, Bar Restoran, Cafeteria)">Restaurant / Casino (Fuente de Soda, Comida Rápida, Bar Restorán, Cafetería)</option>
					</select>
				</label>
			</div>

			<div class="container  flex">
				<label class="item  ph12  p_5  f_75   md-f1   roboto-bold  b-color " for=""> Adjunte Documentación: </label>
				<input class=" ph7 floatr" type="file" name="foto" >  
			</div>

			<div class="item  p2  ph12  right  nofw">
				<p class="roboto-regular  p1  f_75   md-f1  b-color">*Es necesario adjuntar documentación ya sea Rut, Boleta o Patente de tu negocio o serás inscrito como Socio Persona.</p>
			</div>

			</div>

			<div class="container  p2  flex">
				<label for="" class="item  ph12">
				<input class="	floatl p1" name="terminos" type="checkbox" required> &nbsp;<p class="floatl  f_75   md-f1  b-color  roboto">Acepto los términos y condiciones</p></label>
				<input type="submit" class="button" value="Enviar">
			</div>
		</form> 
		<h5 class="center  b-color" ><?php include("php/inc/mensajes.php"); ?> </h5><br><br>
		
	</div>
</section>

<script>
function Ocultar() {
    document.getElementById("comercianteDIV").style.display = "none";
}

function Mostrar() {
    document.getElementById("comercianteDIV").style.display = "block";
}
</script>