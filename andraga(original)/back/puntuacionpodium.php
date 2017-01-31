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
				<h1>Panel de Administracion</h1>
			</header>
			<?php 
			$link=Conectarse(); 
		
			

			
?> 	
			
			<img src="../img/logfederacionmed.jpg" alt="Andraga" />
			
			<div class="content">
				<form id="formulario" method="post" action="puntuacion1podium.php">
						<fieldset>
							<?php
							//Obtencio&acuten de variables
								$sql = "SELECT idPodium, desPodium, texto FROM despodium ";
							?>
							podium :
							<select name="podium" id="podium">
								<?php $resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

							while ($fila = mysql_fetch_assoc($resultado)) {
    								echo "<option value='" . $fila['idPodium'] . " '>". $fila['desPodium'] . "-" . $fila['texto'] . "</option>";
}
								?>
							</select>  <br/>
							tipo de ejercicio:
							<select name="tipoejercicio" id="ctipoejercicio">
								<?php
                                $sql= "SELECT `CodEjercicio`, `DescEjercicio` FROM `tipoejercicio` " ;
                                $resultado = mysql_query($sql, $link);
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
                             <br/>


							<input type="checkbox" id="autonomico" name="autonomico" value="1"> Autonomico<br/>
							

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
