<?php

if (isset($_FILES['image'])) {
     

    copy($_FILES['image']['tmp_name'],'Ofertas/'.$_FILES['image']['name']);
 

	$nombre = $_FILES['image']['name'];

	$imagen = getimagesize($_FILES['image']);    //Sacamos la información
	$ancho = $imagen[0];              //Ancho
	$alto = $imagen[1];               //Alto
	$tipo = $info["mime"];
  

	$nuevoAncho = $ancho * $porcien / 100;
	$nuevoAlto = $alto * $porcien / 100;

	switch ($tipo) {
		case 'image/jpg':
		case 'image/jpeg':
			$imagen = imagecreatefromjpeg($archivo);
			break;

		case 'image/png':
			$imagen = imagecreatefrompng($archivo);
			break;

		case 'image/gif':
			$imagen = imagecreatefromgif($archivo);
			break;
	}

	//creamos el lienzo donde vaciaremos la nueva imagen
	$lienzo = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	//optimizamos el tamaño GD
	imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, 1100, 400, $ancho, $alto);

	//Vaciamos de la memoria RAM al disco
	imagejpeg($lienzo, "Ofertas/".$imagen, 80);

}
?>
