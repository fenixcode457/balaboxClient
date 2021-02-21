<?php

session_start();

if(isset($_SESSION['acceso'])=="1"){
  session_destroy();
  header("Location:index.php");
  die();

}else{

  header("Location:index.php");
    print $_SESSION['acceso'];
}


?>