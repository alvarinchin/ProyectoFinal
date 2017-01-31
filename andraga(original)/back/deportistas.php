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
			</header>
			<?php 
			$link=Conectarse(); 
			$sql = "SELECT `CodClub`, `NombreClub` FROM `club`";
			

			
?> 	
			
			<img src="../img/andraga.jpg" alt="Andraga" />
			
			<div class="content">
				<form id="formulario" method="post" action="deportistas1.php">
						<fieldset>
							nombre= <input name="nombre" id="nombre" type="text"/></br>
							apellido 1= <input name="ape1" id="ape1" type="text"/></br>
							apellido 2= <input name="ape2" id="ape2" type="text"/></br>
							club : 
							<select name="club" id="club">
								<?php $resultado = mysql_query($sql, $link);
								if (!$resultado) {
    									echo "Error de BD, no se pudo consultar la base de datos\n";
   									  echo "Error MySQL: " . mysql_error();
   										 exit;
								}

							while ($fila = mysql_fetch_assoc($resultado)) {
    								echo "<option value='" . $fila['CodClub'] . " '>" . $fila['NombreClub'] . "</option>";
}
								?>
							</select>
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
