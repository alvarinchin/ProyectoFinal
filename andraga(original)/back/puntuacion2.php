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
			<span class="site-desc">Panel de Administraci&oacuten</span>
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
				<h1>Panel de Administraci&oacuten</h1>
				<h2>Puntuaciones</h2>
			</header>
			<?php

            $dorsal=  $_GET["dorsal"];
            $club= $_GET["club"];
            $tipoejericio=$_GET["tipoejercicio"];
            $podium=$_GET["podium"];



?>
             <div class="content">
             <h1>Podium: <?php echo $podium ?></h1>
			<h2> N&uacutemero de dorsal: <?php echo $dorsal ?></h2>
			<h2> Club : <?php echo $club ?> </h2>


				<form id="formulario" method="post" action="puntuacion3.php">
						<fieldset>

                            Art&iacutesitico:<input type="text" id="artisitico" name="artistico"> <br/>
                            Ejecuci&oacuten:<input type="text" id="ejecucion" name="ejecucion"> <br/>
                            Dificultad:<input type="text" id="dificultad" name="dificultad"> <br/>
                            Penalizaci&oacuten:  <input type="text" id="penalizacion" name="penalizacion"> <br/>
                            <input type="hidden" id="dorsal" name="dorsal" value="<?php echo $dorsal?>">
                            <input type="hidden" id="tipoejericio" name="tipoejercicio" value="<?php echo $tipoejericio?>">
                             <input type="hidden" id="podium" name="podium" value="<?php echo $podium?>">
                            <input type="submit" value="Siguiente">
					 </fieldset>
					</form>

			</div>

		</article> <!-- /article -->

	</section> <!-- / #main-content -->



	<footer id="main-footer">
		<p></p>
	</footer> <!-- / #main-footer -->


</body>
</html>
