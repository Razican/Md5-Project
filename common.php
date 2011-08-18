<?php
if(!defined("INSIDE")){ die("Intento de Hackeo"); } //si alguien intenta acceder desde fuera te dice que has intentado hackear el programa

include('includes/functions.php'); //incluimos todas las funciones
define('VERSION','1.4'); //Esta es la versión actual
define('DEFAULT_LANG', 'es'); //el lenguaje por defecto
define('TEMPLATE_DIR'     , 'styles/templates'); //definimos el directorio de templates
$config			= array(); //le decimos que $config será un array
$lang			= array(); //le decimos que $lang será un array
$link			= ""; //le decimos que $link será una variable en blanco