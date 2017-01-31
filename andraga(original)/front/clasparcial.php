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
    $dorsal=$_POST['dorsal'];
    $sql="SELECT inscripcion.CodInscripcion as Dorsal, especialidad.Descripcion as especialidad, categorias.Nombre as categoria, campeonato.NOMBRECAMPEONATO as Campeonato, inscritas.CodDep, deportistas.NombreDepor as NombreDeport, deportistas.Ape1Deport as Ape1Deport, deportistas.CodClub as Club, club.NombreClub as NombreClub, club.Comunidad, inscripcion.Autonomico as Autonomico, campeonato.CODCAMPEONATO as codCampeonato ";
    $sql=$sql . "FROM inscripcion, inscritas, deportistas, club , campeonato, categorias, especialidad ";
    $sql=$sql . "WHERE especialidad.CodEsp=inscripcion.CodEspecialidad and categorias.IdCat=inscripcion.CodCategoria and  inscritas.CodInscripcion=inscripcion.CodInscripcion and deportistas.CodDeport=inscritas.CodDep and club.CodClub=inscripcion.CodClub and  inscripcion.CODCAMPEONATO=campeonato.CODCAMPEONATO ";
    $sql= $sql . " and inscripcion.CodInscripcion=" . $dorsal ;
    //echo $sql;
    $link=Conectarse();
    $resultado = mysql_query($sql, $link);
    if($fila = mysql_fetch_assoc($resultado))
        $campeonato = $fila["Campeonato"];
    $sql1="SELECT CodInscripcion, Dificultad, Ejecucion, Artisitico, Penalizacion, Total, tipoejercicio.DescEjercicio as descripcionejercicio FROM clasificacion, tipoejercicio WHERE tipoejercicio.CodEjercicio=clasificacion.TipoEjercicio and CodInscripcion=". $dorsal;
                 //echo $sql1;
    $resultado1 = mysql_query($sql1, $link);
    $fila1 = mysql_fetch_assoc($resultado1);

    
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
                 <?php
                 echo $fila["especialidad"] . " ". $fila["categoria"] . "  " . $fila1["descripcionejercicio"] . " <br/>Club: " . $fila["NombreClub"] . "&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp  Dorsal: <span class='marcado'> " . $fila["Dorsal"] .  "</span><br/>";
                 do{

                                       $nombre= $nombre . " " . $fila["NombreDeport"] . " " . $fila["Ape1Deport"] . "," ;


                              } while ($fila = mysql_fetch_assoc($resultado));
                echo "<span class='nombre'>" . $nombre . "</span>";

                 ?>
            	 </div>
            	 <div class="puntuacion">
              <span>ejecuci&oacuten:&nbsp&nbsp&nbsp&nbsp&nbsp<span class="semimarcado"><?php echo $fila1["Ejecucion"];?></span></span><br/>

              <span>art&iacutestica:&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp<span class="semimarcado">   <?php echo $fila1["Artisitico"];?> </span></span> <br/>

              <span>dificultad:&nbsp&nbsp &nbsp&nbsp<span class="semimarcado">  <?php echo $fila1["Dificultad"];?> </span></span>  <br/>

              <span>penalizaci&oacuten:<span class="semimarcado"> <?php echo $fila1["Penalizacion"];?></span></span> <br/>
              <span class="total">Total: <?php echo $fila1["Total"];?> </span>  <br/>
              
            	 </div>
            	</div>
             <span>
             <?php
             echo " <a href='clasparcial.php?catgoria=" . $fila["categoria"] ."&especialidad=" . $fila["especialidad"] ."&ejercicio=" . $fila1["descripcionejercicio"] . "&campeonato=". $fila["codCampeonato"] . "'>clasificaci&oacuten general </a>";
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
