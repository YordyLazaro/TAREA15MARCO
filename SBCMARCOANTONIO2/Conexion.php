<?php

/*Variables de Conexion*/
$servidor="localhost"; /*Nombre del Servidor*/
$user="root"; /*Usuario del Servidor*/
$password=""; /*Contraseña del Servidor*/
$BaseDatos="baseconocimiento"; /*Nombre de la BD a utilizar*/

$con=mysql_pconnect($servidor,$user,$password) or trigger_error(mysql_error(),E_USER_ERROR); /*Iniciamos la Conexion*/
mysql_select_db($BaseDatos, $con); /*Ejecutamos La BD*/
?>