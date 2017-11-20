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

  <p><br>&nbsp;&nbsp;<img src="Imagen/opcsin.png" width="754" height="46"></p>
  
<?php
/*Realizamos una consulta para extraer los Sintomas la tabla Sintoma*/
$sql= "SELECT  * FROM sintoma where id_enfer ='".$_SESSION["id"]."' ";
		$result= mysql_query($sql); /*Ejecutamos la Consulta*/
			$i=0;
		$s= mysql_num_rows($result); /*Numero de Filas Afectadas*/
		
/*Recorremos las filas afectadas y las almacenamos en una variable*/
while ($rows= mysql_fetch_array($result)){	
		$id[$i]=$rows['id_enfer'];
		$sin[$i]=$rows['nom_sint'];
			$i=$i+1; /*Incremento*/
}

?>       

<div id="Sintomas">
<center>
  
  <?php
  /*ingresa al inicio a este bucle para visualizar los sintomas (Encadenamiento hacia Adelante)*/
  if($_SESSION["inicio"]=='no'){
  ?>
  <br><br>
<form action="" method="post">
	<table width="548">
     <tr>
    	<td colspan="3" align="center"><img src="Imagen/Ud.png" width="272" height="36"></td>
 	 </tr>
 	 <tr>
    	<td colspan="3" align="center"><font face="Courier New" size="6"><b><?php echo $sin[$_SESSION["sin"]]; /*Mostramos los Sintomas*/?></b></font></td>
 	 </tr>
     <tr>
   		 <td align="right" width="248"><input type="submit" name="si" id="" value="Si" class="uno"/></td>
         <td width="24">&nbsp;</td>
    	<td width="248"> <input type="submit" name="no" id="" value="No" class="uno"/></td>
  	</tr>
	</table>
</form></center>
 
   <?php
   }
        /*Iniciamos */
  $h=0;
   if ($_SESSION["sin"] < $s-1){
	if(isset($_POST['si'])){
	
	/*Consulta para extraer los Sintomas*/
	$sql= "SELECT * FROM sintoma WHERE  nom_sint='".$sin[$_SESSION["sin"]]."'  ";
		$result= mysql_query($sql);
		$i=0;

			while ($row= mysql_fetch_array($result)){	
				$id_sin=$row['id_enfer'];
				echo $nom= $row['nom_sint'];
				$i=$i+1;
			}	
	/*Consulta para extraer la enfermedad de acuedo al codigo del sintoma*/
		$sql= "SELECT * FROM enfermedad WHERE  enfermedad.id_enfer='".$id_sin."'";
		$result= mysql_query($sql);
			$i=0;
	/*Recorremos la Consulta y Asignamos los Valores a las Variables de Sesion*/
		while ($row = mysql_fetch_array($result)){	
			$id_en[$i]=$row['id_enfermedad'];
			$_SESSION["enf"]= $row['nom_enfer'];
			$_SESSION["desc"]= $row['desc_enfer'];
			$_SESSION["cont"]+=1;
				$i=$i+1;
		}
	$_SESSION["sin"]=$_SESSION["sin"]+1; /*Incrementamos la Variable de los Sintomas*/
	
		header("Location: Sintomas.php");
}
	?>   
       <?php
	   /*en caso de no iniciar inicializamos las variables*/
	if(isset($_POST['no'])){
		
	$_SESSION["x"]=$_SESSION["x"]+1;
		if ($_SESSION["x"] > 1){
			$_SESSION["id"]=$_SESSION["id"]+1;
			echo $_SESSION["id"];
				$_SESSION["sin"]="0";
				$_SESSION["x"]="0";
				$_SESSION["con"]="0";
				header("Location: Sintomas.php");
		}else {
				$_SESSION["sin"]+=1;
				$_SESSION["cont"]+=1;
				header("Location: Sintomas.php");
		}}}else {
		$h=1;
		$_SESSION["h"]+=1;
		$_SESSION["inicio"]="si";
		}
		
	if ($_SESSION["h"]==2){
	if ($_SESSION["cont"]>3){
		$_SESSION["sin"]="0";
		$_SESSION["x"]="0";
		$_SESSION["cont"]="0";
?>
<br><br>
<h2 align="justify"><font face="Courier New" >Usted Padece de  
  <font face="Courier New" color="#FF0000"><?php  echo $_SESSION["enf"];/*Mostrar la enfermedad*/?></font>:&nbsp;<?php  echo $_SESSION["desc"];/*Mostramos la descripcion*/?>....</h2></font>
        
 <?php }} ?>  
 
</div>
</div>
</body>
</html>
