<?php



$host= "localhost";
$usuario= "root";
$clave="";
$database="balabox";
$url="ohla";

$db = new mysqli($host,$usuario,$clave,$database);


function mysqlTimestampNow()
{

    date_default_timezone_set("America/Mexico_City");

    return date('Y-m-d');
}


$timestamp =  mysqlTimestampNow();







$query = "DELETE FROM  Ofertas WHERE FechaExpiracion < '$timestamp' ";

 
$delete = $db->query($query);




  /* $nombreArchivo = "../Ofertas/".$imagenOferta[0];

   touch($nombreArchivo);
   unlink($nombreArchivo);*/
?>
