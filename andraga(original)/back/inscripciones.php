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
			
			<img src="../img/andraga.jpg" alt="Andraga" />
			
			<div class="content">
				<form id="formulario" method="post" action="inscripciones1.php">
						<fieldset>
							<?php
							//Obtenci&oacuten de variables
								$sql = "SELECT `CODCAMPEONATO`,`NOMBRECAMPEONATO` FROM `campeonato`";
							?>
							campeonato : 
							<select name="campeonato" id="campeonato">
								<?php $resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

							while ($fila = mysql_fetch_assoc($resultado)) {
    								echo "<option value='" . $fila['CODCAMPEONATO'] . " '>" . $fila['NOMBRECAMPEONATO'] . "</option>";
}
								?>
							</select>  <br/>
							Dorsal: <input type="text" name="dorsal" id="dorsal" value=""/>   <br/>
							<?php
							//Seleccion de Categorias
								$sql = "SELECT `IdCat`, `Nombre`, `COMPETICION` FROM `categorias`";
								
							?>
							categoria : 
							<select name="categoria" id="categoria">
								<?php $resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

							while ($fila = mysql_fetch_assoc($resultado)) {
    								echo "<option value='" . $fila['IdCat'] . " '>" . $fila['Nombre'] . "</option>";
}
								?>
							</select>   <br/>
							<?php
							//Seleccion de Especialidad
								$sql = "SELECT `CodEsp`, `Descripcion`, `NumComponentes`FROM `especialidad`";

							?>
							especialidad : 
							<select name="especialidad" id="especialidad">
								<?php $resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

							while ($fila = mysql_fetch_assoc($resultado)) {
    								echo "<option value='" . $fila['CodEsp'] . '#' . $fila['NumComponentes'] . " '>" . $fila['Descripcion'] . "</option>";
}
								?>
							</select>       <br/>
								
								Club:
								<select name="club" id="club">
								<?php 
								$sql = "SELECT `CodClub`, `NombreClub` FROM `club`";
								$resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

							while ($fila = mysql_fetch_assoc($resultado)) {
    								echo "<option value='" . $fila['CodClub'] . " '>" . $fila['NombreClub'] . "</option>";
}
								?>
							</select>      <br/>
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
