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
			<span class="site-desc">Clasificaci&oacuten</span>
		</a> <!-- / #logo-header -->

		<nav>
			<ul>

				<li><a href="puntuacion_podium.php">Puntuaci&oacuten Individual</a></li>
				<li><a href="paneles/panel.php">Clasificaci&oacuten</a></li>





			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->

    <?php
    $nombre="";
    $dorsal=$_GET['dorsal'];
    $Tejericio=$_GET["tipoejercicio"];
    $podium= $_GET["Podium"];
    $sql="SELECT inscripcion.CodInscripcion as Dorsal, especialidad.CodEsp as CodEsp, inscripcion.CodCategoria as CodCat, especialidad.Descripcion as especialidad, categorias.Nombre as categoria, campeonato.NOMBRECAMPEONATO as Campeonato, inscritas.CodDep, deportistas.NombreDepor as NombreDeport, deportistas.Ape1Deport as Ape1Deport, deportistas.CodClub as Club, club.NombreClub as NombreClub, club.Comunidad, inscripcion.Autonomico as Autonomico, campeonato.CODCAMPEONATO as codCampeonato ";
    $sql=$sql . "FROM inscripcion, inscritas, deportistas, club , campeonato, categorias, especialidad ";
    $sql=$sql . "WHERE especialidad.CodEsp=inscripcion.CodEspecialidad and categorias.IdCat=inscripcion.CodCategoria and  inscritas.CodInscripcion=inscripcion.CodInscripcion and deportistas.CodDeport=inscritas.CodDep and club.CodClub=inscripcion.CodClub and  inscripcion.CODCAMPEONATO=campeonato.CODCAMPEONATO ";
    $sql= $sql . " and inscripcion.CodInscripcion=" . $dorsal ;

    //echo $sql;
    $link=Conectarse();
    $resultado = mysql_query($sql, $link);
    if($fila = mysql_fetch_assoc($resultado))
      {  $campeonato = $fila["Campeonato"];
         $especialidad=$fila["CodEsp"];
         $categoria=$fila["CodCat"];
         $codcampeonato=$fila["codCampeonato"];
         
         
         }
    $sql1="SELECT CodInscripcion, Dificultad, Ejecucion, Artisitico, Penalizacion, Total, tipoejercicio.CodEjercicio as CodEjercicio, tipoejercicio.DescEjercicio as descripcionejercicio FROM clasificacion, tipoejercicio WHERE tipoejercicio.CodEjercicio=clasificacion.TipoEjercicio and CodInscripcion=". $dorsal . " and clasificacion.TipoEjercicio=" . $Tejericio;
    //echo $sql1;
    $resultado1 = mysql_query($sql1, $link);
    $fila1 = mysql_fetch_assoc($resultado1);

    
    ?>
 
	
	<section id="main-content-marc">
	
		<article>
			<header>
			<h1><img src="../img/logfederacionpeq.jpg" alt="Federacion" />	<?php echo $campeonato; ?> DE MADRID<img src="../img/andragapeq1.jpg" alt="Federacion" />	</h1>
				<?php
				if ( $fila["Autonomico"]==1)
				echo   "<h2> AUTONOMICO DE MADRID</h2>";
				?>
			</header>

            	<div class="content">
            	 <div class="nivel">
                 <?php
                 echo $fila["especialidad"] . " ". $fila["categoria"] . "  " . $fila1["descripcionejercicio"] . " <br/>Club: " . $fila["NombreClub"] . "&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp  Dorsal: <span class='marcado'> " . $fila["Dorsal"] .  "</span><br/>";
                 do{

                                       $nombre= $nombre . " " . $fila["NombreDeport"] . " " . $fila["Ape1Deport"] . "," ;


                              } while ($fila = mysql_fetch_assoc($resultado));
                echo "<span class='nombre'>" . $nombre . "</span>";

                 ?>
            	 </div>
            	 <div class="puntuacion">
              <span>Ejecuci&oacuten:&nbsp&nbsp&nbsp&nbsp&nbsp<span class="semimarcado"><?php echo $fila1["Ejecucion"];?></span></span><br/>

              <span>Art&iacutestica:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="semimarcado">   <?php echo $fila1["Artisitico"];?> </span></span> <br/>

              <span>Dificultad:&nbsp&nbsp&nbsp&nbsp<span class="semimarcado">  <?php echo $fila1["Dificultad"];?> </span></span>  <br/>

              <span>Penalizaci&oacuten:<span class="marcado"> <?php echo $fila1["Penalizacion"];?></span></span> <br/>
              <span class="total">Total: <?php echo $fila1["Total"];?> </span>  <br/>
              
            	 </div>
            	</div>
             <span>
             <?php
             echo " <a href='clasparcial1.php?categoria=" . $categoria ."&especialidad=" . $especialidad ."&ejercicio=" . $fila1["CodEjercicio"] . "&campeonato=".  $codcampeonato  . "&podium=" . $podium ."'>clasificaci&oacuten general </a>";
             ?>
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
