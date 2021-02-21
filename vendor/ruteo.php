<?php

// clase base con propiedades y métodos miembro
class ruteo {

   var $ruta;


   function __construct($ruta="http://localhost/estadia/")
   {
     
       $this->ruta = $ruta;
   }


   function ruta()
   {
       return $this->ruta;
   }

} // fin de la clase para confiiguracion rutas