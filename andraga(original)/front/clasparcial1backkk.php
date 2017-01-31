<!DOCTYPE html> <html lang="es">
	 <head> <meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
	 
	 	<title>Andraga
fija</title>
 
        <link rel="stylesheet" href="../style/andraga.css">
        <link rel="stylesheet" href="../style/marcador.css">
</head>
 <? header('Content-Type: text/html; charset=UTF-8'); ?>
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

    <?php
    $nombre="";
    $categoria=$_GET['categoria'];
    $especialidad=$_GET['especialidad'];
    $ejercicio=$_GET['ejercicio'];
    $codCampeonato=$_GET['codCampeonato'];
    $codejercio=$_GET['ejercicio'];
    
    $sql="SELECT clasificacion.CodInscripcion as Dorsal,  deportistas.NombreDepor as Nombre, deportistas.Ape1Deport as Ape1, club.NombreClub as NombreClub, clasificacion.Total as Total, tipoejercicio.DescEjercicio as TipoEjercicio, categorias.Nombre as Categoria, especialidad.Descripcion AS especialidad, campeonato.NOMBRECAMPEONATO as NombreCampeonato ";
    $sql=$sql . "FROM inscripcion, inscritas, deportistas, club, clasificacion, tipoejercicio, categorias, especialidad, campeonato ";
    $sql=$sql . "WHERE inscripcion.CodInscripcion=inscritas.CodInscripcion ";
    $sql=$sql  . "AND deportistas.CodDeport=inscritas.CodDep  ";
    $sql=$sql . "AND club.CodClub=inscripcion.CodClub  ";
    $sql=$sql . "AND clasificacion.CodInscripcion=inscripcion.CodInscripcion    ";
    $sql=$sql . "AND tipoejercicio.CodEjercicio=clasificacion.TipoEjercicio    ";
    $sql=$sql . "AND categorias.IdCat=inscripcion.CodCategoria ";
    $sql=$sql . "AND especialidad.CodEsp=inscripcion.CodEspecialidad ";
    $sql=$sql . "AND campeonato.CODCAMPEONATO=inscripcion.CODCAMPEONATO ";
    $sql=$sql . "AND inscripcion.CODCAMPEONATO='" . $codCampeonato . "' ";
    $sql=$sql . "AND inscripcion.CodCategoria=' " . $categoria . "' ";
    $sql=$sql . "AND inscripcion.CodEspecialidad='" . $especialidad . "'";
    $sql=$sql . "AND clasificacion.TipoEjercicio=" . 	$codejercio . "'";
    
    echo $sql;

    $link=Conectarse();
    $resultado = mysql_query($sql, $link);

    
    ?>
 
	
	<section id="main-content">
	
		<article>
			<header>
				<h1><?php echo $campeonato; ?> DE MADRID</h1>
				<?php
				if ( $fila["Autonomico"]==1)
				echo   "<h1> AUTONOMICO DE MADRID</h1>";
				?>
			</header>

            	<div class="content">
            	 <div class="nivel">

            	 </div>
            	</div>
             <span>

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
