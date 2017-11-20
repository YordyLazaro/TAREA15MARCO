<?php  
/*Inicializamos las Variables de Session*/
session_start();
/*LLamamos a la Conexion*/
require_once("Conexion.php");

?>
<html>
<head>
<title>Sistema Basado en Conocimiento (Mycin)</title>
<link rel='stylesheet' href='estilo_Pag.css'>
</head>

<body>

<div class="Titulo" id="Titulo"><center><img src="Imagen/sml_slogan.png" width="808" height="188"></center></div>
	<div class="Cont" id="Cont">
		<div class="Atras" id="Atras"><a href="Principal.php"><img src="Imagen/Home.gif" width="64" height="57" alt="prod" /></a></div>

 <p><img src="Imagen/Escfer.png" width="508" height="46"></p>
  
<div id="Enfermedad" align="center">

<?php
/*Realizamos una consulta para extraer el Nom_Enfer de la tabla Enfermedad y lo mostramos en un COMBO DINAMICO*/
		$sql= "SELECT DISTINCT `nom_enfer` FROM `enfermedad` ORDER BY `nom_enfer` ASC ";
		$result= mysql_query($sql);
		$options = '';
		while ($row= mysql_fetch_array($result))
			{	$options= $options.'<option value="'.$row['nom_enfer'].'">'.$row['nom_enfer'].'</option>';/*COMBO DINAMICO*/ }
	?> 
  
<form action="" method="POST">
     <?php
	 
	 /*En esta parte hacemos uso del COMBO DINAMICO*/
	echo '<label><b><font face="Courier New" size="5">Elija una opcion:</b> <select name="opt[]">'.$options.'</select></font></label>';	?>
    <font face="Courier New" size="5"><input type='submit' name='ENFER' value='Buscar'></font>
  </form>
    <?php
/* Se ejecuta esta ACCION si se presiona el BOTTON "Buscar"*/
if(isset($_POST['ENFER'])){
	
/*Comenzamos La consulta de las Enfermedades que Mostraran Sus Sintomas (Encadenamiento hacia Atras)*/
  
  /*Consulta*/
$query= ("SELECT * FROM enfermedad, sintoma WHERE enfermedad.id_enfer=sintoma.id_enfer AND enfermedad.nom_enfer='".$_POST['opt'][0]."'");

$mov= mysql_query($query) or die ( "Error en query:  el error  es: " . mysql_error() );//(mysql_error());
$row= mysql_fetch_assoc($mov);
/*Fin de la Consulta de las Enfermedades*/
?>

<center><br>
<table width="731">
<tr>
    <td align="center"><b><font face="Courier New" size="5" color="#FF0000">Sintomas</b></font></td></tr>

  <?php do { ?>
  <tr>
  	  <td align="justify"><font face="Courier New" size="5">=><?php echo $row['nom_sint']; ?></font></td></tr>
  <?php 
      /*Aqui Mostraremos los Resultados de la Consulta por Enfermedad*/
	      } while ($row= mysql_fetch_assoc($mov));?>
</table>

<?php }	?>   
  
</div>
</div>
</body>
</html>
