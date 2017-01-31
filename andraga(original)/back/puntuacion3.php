
<?php
function Conectarse()
{

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
			$lista=array();
      		//Obtención de parámetros
            $dificultad= $_POST['dificultad'];
            $ejecucion=$_POST['ejecucion'];
            $artistico=$_POST['artistico'];
            $penalizacion= $_POST['penalizacion'];
            //Tratamiento de especialidad
            $dorsal=$_POST['dorsal'];
            $total= $dificultad + $ejecucion + $artistico -  $penalizacion;
            $sql = "INSERT INTO `clasificacion`(`CodInscripcion`, TipoEjercicio, `Dificultad`, `Ejecucion`, `Artisitico`, `Penalizacion`, `Total`)";
            $sql= $sql . " VALUES (" . $dorsal . ", " . $_POST['tipoejercicio'] . ", " . $dificultad . ", " . $ejecucion. ", " . $artistico . ", ". $penalizacion. "," . $total .  ")";

           //echo $sql;

          $resultado = mysql_query($sql, $link);


			if (!$resultado) {
			   echo "Error de BD, no se pudo consultar la base de datos\n";
   			   echo "Error MySQL: " . mysql_error();
   			   exit;
				}


 mysql_close($link); //cierra la conexion
 ?>
 <script>


    window.history.back(-3);

</script>


