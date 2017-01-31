<!DOCTYPE html> <html lang="es">
	 <head> <meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
	 	<title>Andraga
fija</title>

        <link rel="stylesheet" href="../style/andraga.css">
</head>
 <?php header('Content-Type: text/html; charset=UTF-8'); ?>
  <?php

  ini_set('default_charset','utf8');
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
								$sql = "SELECT CodEjercicio, DescEjercicio FROM tipoejercicio";
								echo $sql;
?>
<body>

	<header id="main-header">

		<a id="logo-header" href="#">
			<span class="site-name">Club Andraga.<span>
			<span class="site-desc">Clasificacion</span>
		</a> <!-- / #logo-header -->

		<nav>
			<ul>
				<li><a href="puntuacion.php">Puntuacion Individual</a></li>
				<li><a href="#">Clasificacion</a></li>


			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->


	<section id="main-content">

		<article>
			<header>
				<h1>PUNTUACION</h1>
			</header>

			<img src="../img/andraga.jpg" alt="Andraga" />

			<div class="content">

               	<form id="formulario" method="post" action="puntuacion1.php">
						<fieldset>
                             Introduzca n&uacutemero de dorsal: <input type="text" id="dorsal" name="dorsal" > <br/>
                             Introduzca podium:
							<select name="podium" id="podium">
								<?php
                                $sql1="SELECT idPodium, desPodium, texto FROM `despodium`";
                                $resultado1 = mysql_query($sql1, $link);
								if (!$resultado1) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}
								while ($fila1 = mysql_fetch_assoc($resultado1)) {
    								echo "<option value='" . $fila1['idPodium'] . " '>" . $fila1['desPodium']. "-" . $fila1['texto'] . "</option>";
                                 }
                                 ?>
                             </select><br/>
                             <?php



							?>
							Tipo de Ejercicio :
							<select name="Tejercicio" id="Tejercicio">
								<?php $resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}
								while ($fila = mysql_fetch_assoc($resultado)) {
    								echo "<option value='" . $fila['CodEjercicio'] . " '>" . $fila['DescEjercicio'] . "</option>";
                                 }
                                 ?>
                             </select>
                             <input type="submit" value="Siguiente">
                             
			</div>

		</article> <!-- /article -->

	</section> <!-- / #main-content -->



	<footer id="main-footer">
		<p></p>
	</footer> <!-- / #main-footer -->


</body>
</html>
