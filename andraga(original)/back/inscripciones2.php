
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
            $campeonato= $_POST['campeonato'];
            $categoria=$_POST['categoria'];
            $especialidad=$_POST['especialidad'];
            $club= $_POST['club'];
            $dorsal=$_POST['dorsal'];
            //Tratamiento de especialidad
            $start= stripos ( $especialidad, "#" );
            $num= substr ( $especialidad , $start+1 )+0;
            $autonomico=$_POST['autonomico'];
            $sql = "SELECT MAX(`CodInscripcion`) as num FROM `inscripcion`";

           $resultado = mysql_query($sql, $link);
            if(!$resultado)

              $inscripcion=1;

            else
              { $fila=mysql_fetch_assoc($resultado);
               $inscripcion=$fila['num']+1;
               }
               
            $sql = "INSERT INTO inscripcion (`CodInscripcion`, `CodClub`,  `CODCAMPEONATO`, `CodCategoria`, `CodEspecialidad`, `Fecha`, `Autonomico`)";
            $sql= $sql . " VALUES (" . $dorsal . ", '" . $club . "', '" . $campeonato. "', '" . $categoria . "', '" . $especialidad .  "', '', "  . $autonomico ." )";

           echo $sql;

           $resultado = mysql_query($sql, $link);

           for ($i=7; $i<=count($_POST); $i++)
             {  $j="deportista" . ($i-6);
                eval("\$codep=\$_POST['$j'];");
                echo $codep;
                $sql="INSERT INTO `inscritas` (`CodInscripcion`, `CodDep`) VALUES ('" . $dorsal ."', '" .$codep."')";
                $resultado = mysql_query($sql, $link);
            }

			if (!$resultado) {
			   echo "Error de BD, no se pudo consultar la base de datos\n";
   			   echo "Error MySQL: " . mysql_error();
   			   exit;
				}


 mysql_close($link); //cierra la conexion
 header("location: inscripciones.php");
 ?>


