<!DOCTYPE html> <html lang="es">
	 <head> <meta charset="utf-8"> 
	 	<title>Andraga
fija</title>
 
         <link rel="stylesheet" href="/../style/andraga.css">
        <link rel="stylesheet" href="/../style/marcador.css">
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

   <li><a href="../puntuacion_podium.php">Puntuaci&oacuten Individual</a></li>
				<li><a href="..\paneles\panel.php">Clasificaci&oacuten</a></li>

			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->


	<section id="main-content">

 	<article>
			<header>
				<h1>Clasificaci&oacuten</h1>
			</header>
			<?php
			$link=Conectarse();




?>

  	<img src="../../img/logfederacionmed.jpg" alt="Andraga" />

			<div class="content">
              <div class="nivel"></div>
                      <table>
                        <thead><tr><th>Orden</th><th>Podium</th><th>Descripci&oacuten del Podium</th></tr></thead>
       <?php
							//Obtencio&acuten de variables
								$sql = "SELECT idPodium, desPodium, texto, autonomico FROM despodium ";
                                $resultado = mysql_query($sql, $link);
        if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

       while ($fila = mysql_fetch_assoc($resultado)) {
                                   echo "<tr><td>" . $fila['idPodium'] . "</td><td><a href='clasparcial1.php?categoria=0&especialidad=0&ejercicio=3&campeonato=0&podium=". $fila['idPodium'] . "&autonomico=" . $fila['autonomico'] . "'>" . $fila['desPodium'] .  "</a></td><td>" . $fila['texto'] . "</td></tr>";
                       }
                         ?>
                         </table>
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
