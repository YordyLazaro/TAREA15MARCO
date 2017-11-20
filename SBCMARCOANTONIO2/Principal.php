<?php  
require_once("Conexion.php");

/*Variables de Session*/
session_start();

$_SESSION=array();

$_SESSION["sin"]="0";
$_SESSION["h"]="0";
$_SESSION["id"]="1";
$_SESSION["desc"]="";
$_SESSION["x"]="0";
$_SESSION["cont"]="0";
$_SESSION["enf"]="";
$_SESSION["inicio"]="no";
?>

<html>
<head>
<meta charset="utf-8">
<title>Sistema Basado en Conocimiento (Mycin)</title>
<link rel='stylesheet' href='estilo_Pag.css'>
</head>

<body>
<div class="Titulo" id="Titulo"><center><img src="Imagen/sml_slogan.png" width="808" height="188"></center></div>
<div class="Cont" id="Cont">
<center>
  <p><br><img src="Imagen/opc.png" width="625" height="59"> </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="0">
    <tr>
      <td><center>
        <a href="Sintomas.php"><img src="Imagen/Sin.png" width="383" height="92" title="Sintomas"></a>
      </center></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><center>
        <a href="Enfermedad.php"><img src="Imagen/Enf.png" width="435" height="109" title="Enfermedad"></a>
      </center></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</center></div>
</body>
</html>
