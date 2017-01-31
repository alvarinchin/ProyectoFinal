<?php 
function Conectarse() 
{ 
  echo "entrando";   
if (!($link=mysql_connect("localhost","root",""))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!$conex=mysql_select_db("campeonatos")) 
   { echo $conex;
     echo("<br><br>");
      
	echo "Error seleccionando la base de datos."; 
echo "campeonatos";
      exit(); 
   } 
   return $link; 
}
	$link=Conectarse(); 
	$sql = "SELECT max(`CodDeport`) as CodDeport FROM `deportistas`";
	$resultado = mysql_query($sql, $link);
	$fila = mysql_fetch_assoc($resultado);
	$CodDepor=$fila['CodDeport'] + 1; 
	echo $CodDepor;
	
	$sql="INSERT INTO `deportistas`(`CodDeport`, `NombreDepor`, `Ape1Deport`, `Ape2Deport`, `CodClub`) VALUES (" . $CodDepor . ", '" .$_POST['nombre'] . "', '".
	$_POST['ape1']. "', '" . $_POST['ape2'] . "', '" . $_POST['club'] . "')" ;
	echo $sql;
	$resultado=mysql_query($sql, $link);
	if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: '" . mysql_error();
    exit;
}
	mysql_close($link); //cierra la conexion 
	header("location: deportistas.php");
	
 ?>

