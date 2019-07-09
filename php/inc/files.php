<?php 

class Files{

	public function __construct(){ }

	//Funcion que arme y verifique la ruta de los documentos

	public function fix_path($rut_comercio){
		$path = '../documentos/'.$rut_comercio. '/';
		if (file_exists($path)) {
			//echo "la ruta ya existe.";
			return $path;
		} else {
			if (!mkdir($path,0755,TRUE)) {
				echo "Fallo al crear la ruta";
			} else {
				return $path;
			}
		}

	}

	public function change_name() {
		$string = "";
		$posible ="1234567890ABCDEFGHIJKLMNOPQRSTWXYZabcdefghijklmnopqrstvwxyz_";
		$i = 0;
		while ($i < 20) {
			$char = substr($posible, mt_rand(0, strlen($posible)-1),1);
			$string .= $char;
			$i++;
		}
		return $string;

	}

	public function upload_file($file = false, $path = false){
        // verificar que si esta el archivo
		 $uploap = TRUE;

         if($_FILES["foto"]["error"] > 0){
         	  header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Error Al cargar archivo...' );
              $uploap = FALSE;
         } else {
              // verificar el tamaño del archivo
              if($_FILES["foto"]["size"] > 2000000) {
                    echo "El tamaño no puede ser superior a 2mb";
                    $uploap = FALSE;
              }
              //Verificamos el formato del archivo
              if(!($_FILES["foto"]["type"] === "image/jpeg" || $_FILES["foto"]["type"]  ===  "image/jpg" || $_FILES["foto"]["type"]  ===  "image/png")){
              		header('Location: http://www.alvi.cl/club-alvi/inscribete&mensaje=Fomarto de archivo no permitido...' );
                    $uploap = FALSE;
              }
         }

         if ($uploap) {
         	$type = explode('.', $_FILES['foto']['name']);
         	$num = count($type);
         	$extension = $type[$num-1];

         	$real_file = $path.$file.'.'.$extension;

         	if (file_exists($real_file)) {
         		move_uploaded_file($_FILES['foto']['tmp_name'], $real_file);
         		return $real_file;
         	} else {
         		move_uploaded_file($_FILES['foto']['tmp_name'], $real_file);
         		return $real_file;
         	}
         }

	}
}