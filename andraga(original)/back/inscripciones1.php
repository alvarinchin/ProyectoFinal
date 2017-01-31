<!DOCTYPE html> <html lang="es">
	 <head> <meta charset="utf-8">
	 	<title>Andraga
fija</title>

        <link rel="stylesheet" href="../style/andraga.css">
</head>
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
 ?>

<body>

	<header id="main-header">

		<a id="logo-header" href="#">
			<span class="site-name">Club Andraga.<span>
			<span class="site-desc">Panel de Administración</span>
		</a> <!-- / #logo-header -->

		<nav>
			<ul>
   <li><a href="deportistas.php">Participantes</a></li>
				<li><a href="inscripciones.php">Inscripci&oacuten</a></li>
				<li><a href="puntuacionpodium.php">Puntuaci&oacuten</a></li>
			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->


	<section id="main-content">

		<article>
			<header>
				<h1>Panel de Administracion</h1>
			</header>
			<?php
			$link=Conectarse();




?>

			<img src="../img/andraga.jpg" alt="Andraga" />

			<div class="content">
				<form id="formulario" method="post" action="inscripciones2.php">
						<fieldset>
							<?php
							
							$lista=array();
							//Obtención de parámetros

                           $campeonato= $_POST['campeonato'];
                           $categoria=$_POST['categoria'];
                           $especialidad=$_POST['especialidad'];
                           $club= $_POST['club'];
                           $dorsal=$_POST['dorsal'];
                           if(count($_POST)==6)
                                                $autonomico = $_POST['autonomico'];
                                 else
                                      $autonomico = 0;
                           
                           //Tratamiento de especialidad
                           $start= stripos ( $especialidad, "#" );
                           $num= substr ( $especialidad , $start+1 )+0;
                           $especialidad= substr( $especialidad, 0, $start);
                             $sql = "SELECT `CodDeport`, `NombreDepor`, `Ape1Deport`, `Ape2Deport`FROM `deportistas`
                             WHERE CodClub ='". $club . "'AND `CodDeport` NOT IN (SELECT `CodDep` FROM `inscritas`) ";
                             //echo $sql;

                                 $link=Conectarse();
							?>
                            <input type="hidden" id="campeonato" name="campeonato" value="<?php echo $campeonato;?>">
                            <input type="hidden" id="categoria" name="categoria" value="<?php echo $categoria;?>">
                            <input type="hidden" id="especialidad" name="especialidad" value="<?php echo $especialidad;?>">
                            <input type="hidden" id="club" name="club" value="<?php echo $club;?>">
                            <input type="hidden" id="autonomico" name="autonomico" value="<?php echo $autonomico;?>">
                            <input type="hidden" id="dorsal" name="dorsal" value="<?php echo $dorsal;?>">
                            <div id="seleccionar">
                            <ul>
                            <?php
                            //pintar select de deportistas
                           /* $resultado = mysql_query($sql, $link);
                             while ($fila = mysql_fetch_assoc($resultado))
                             {  echo "<li id='" . $fila['CodDeport'] ."'>" . $fila['NombreDepor'] . "-" . $fila['Ape1Deport'] . "</li>";

                               }*/
                             for(; $num>0; $num--)
                               {
                             echo "deportista:<select id='deportista" . $num . "' name='deportista" . $num . "'>";
                             $resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

                               while ($fila = mysql_fetch_assoc($resultado))
                                  {
                                   echo "<option value='" . $fila['CodDeport'] . " '>" . $fila['NombreDepor'] . " " . $fila['Ape1Deport']
                                    .  "</option>";
                              }

                                echo "</select> <br/>";
                                //echo "viene " . count($_POST);
                             };
                             ?>
                             </ul>
                              </div>

							<input type="submit" value="Siguiente">
					 </fieldset>
					</form>

			</div>

		</article> <!-- /article -->

	</section> <!-- / #main-content -->



	<footer id="main-footer">
		<p></p>
	</footer> <!-- / #main-footer -->
 <?php
 mysql_close($link); //cierra la conexion
 ?>

</body>
</html>
