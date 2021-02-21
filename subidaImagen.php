<?php

if (isset($_FILES['image'])) {



	$imagen = getimagesize($_FILES['image']);    //Sacamos la información
	$ancho = $imagen[0];              //Ancho
	$alto = $imagen[1];               //Alto
	echo "Ancho: $ancho";
	echo "Alto: $alto";

     

	move_uploaded_file($_FILES['image']['tmp_name'],'imagenes/'.$_FILES['image']['name']);
	 print $_FILES['image']['name'];
}
?>
