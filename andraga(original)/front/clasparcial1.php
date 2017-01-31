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
    <li><a href="puntuacion_podium.php">Puntuaci&oacuten Individual</a></li>
				<li><a href="paneles/panel.php">Clasificaci&oacuten</a></li>


			</ul>
		</nav><!-- / nav -->

	</header><!-- / #main-header -->

    <?php
    $nombre="";
    $categoria=$_GET['categoria'];
    $especialidad=$_GET['especialidad'];
    $ejercicio=$_GET['ejercicio'];
    $codCampeonato=$_GET['campeonato'];
    $codejercio=$_GET['ejercicio'];
    $podium=$_GET['podium'];
    
    $sql="SELECT clasificacion.CodInscripcion as Dorsal,  deportistas.NombreDepor as NombreDeport, deportistas.Ape1Deport as Ape1Deport, club.NombreClub as NombreClub, clasificacion.Total as Total, tipoejercicio.DescEjercicio as TipoEjercicio, categorias.Nombre as Categoria, especialidad.Descripcion AS especialidad, campeonato.NOMBRECAMPEONATO as NombreCampeonato, inscripcion.Autonomico as Autonomico  ";
    $sql=$sql . "FROM inscripcion, inscritas, deportistas, club, clasificacion, tipoejercicio, categorias, especialidad, campeonato ";
    $sql=$sql . "WHERE inscripcion.CodInscripcion=inscritas.CodInscripcion ";
    $sql=$sql  . "AND deportistas.CodDeport=inscritas.CodDep  ";
    $sql=$sql . "AND club.CodClub=inscripcion.CodClub  ";
    $sql=$sql . "AND clasificacion.CodInscripcion=inscripcion.CodInscripcion    ";
    $sql=$sql . "AND tipoejercicio.CodEjercicio=clasificacion.TipoEjercicio    ";
    $sql=$sql . "AND categorias.IdCat=inscripcion.CodCategoria ";
    $sql=$sql . "AND especialidad.CodEsp=inscripcion.CodEspecialidad ";
    $sql=$sql . "AND campeonato.CODCAMPEONATO=inscripcion.CODCAMPEONATO ";
    $sql=$sql . "AND inscripcion.CODCAMPEONATO=" . $codCampeonato . " ";
    $sql=$sql . "AND inscripcion.CodCategoria='" . $categoria . "' ";
    //$sql=$sql . "AND inscripcion.CodEspecialidad='" . $especialidad . "' ";
    $sql=$sql . "AND clasificacion.TipoEjercicio=" . 	$codejercio . " ";
    $sql=$sql . "AND clasificacion.CodInscripcion IN (" ;
    $sql=$sql .  "SELECT clasificacion.CodInscripcion
FROM clasificacion, podium, inscripcion
WHERE inscripcion.CodInscripcion=clasificacion.CodInscripcion
AND inscripcion.CODCAMPEONATO=podium.CODCAMPEONATO
and inscripcion.CodCategoria=podium.IdCategoria
and inscripcion.CodEspecialidad=podium.IdEspecialidad
and podium.idPodium=" . $podium . ") ";
    $sql=$sql . " ORDER BY  Total DESC, Dorsal ASC";

    //echo $sql;

    
   $sql2="SELECT texto, autonomico, desPodium FROM despodium WHERE idPodium=" . $podium;

    $link=Conectarse();
    $resultado = mysql_query($sql, $link);
    $fila = mysql_fetch_assoc($resultado);
     $resultado2 = mysql_query($sql2, $link);
     $fila2=  mysql_fetch_assoc($resultado2);
    
    ?>
 
	
	<section id="main-content-marc">
	
		<article>
			<header>
				<h1><img src="../img/logfederacionpeq.jpg" alt="Federacion" /><?php echo $fila["NombreCampeonato"]; ?> DE MADRID<img src="../img/andragapeq1.jpg" alt="Federacion" />	</h1>
				<?php
				//if ( $fila["autonomico"]==1)
				echo   "<h1>". $fila2['texto'] . "</h1>";
				?>
			</header>

            	<div class="content">
            	 <div class="nivel">
                        <?php
                        echo "<b><center>" . $fila2['desPodium'] . "</b></center>  " ;
                 //echo $fila["especialidad"] . " ". $fila["Categoria"] . "  " . $fila["TipoEjercicio"] . " <br/></span><br/>";
                 
                 ?>
            	 </div>
              <div class="datagrid">
            <table>
              <thead><tr><th></th><th>Club</th><th>Componentes</th><th>Puntuaci&oacuten</th></tr></thead>
              <?php

                             $resultado = mysql_query($sql, $link);
                             $parfila=0;
                             $numfila=1;

                             $fila = mysql_fetch_assoc($resultado);
                             $dorsalant=0;
                             $primeravez=0;
                             $nombre="";
                             do
                                  {//echo "<tr><td colspan='3'>" . $dorsalant . "->" .$fila["Dorsal"] . "</td></tr>";

                                   if ($dorsalant!=$fila["Dorsal"])
                                   {  if($primeravez==0)
                                          $primeravez=1;
                                      else
                                         echo "<td><span class='columna'>" . $dorsalant . "&nbsp &nbsp"  . $nombre . "(" .$especialidad. ")</span></td><td class='total'>". $total .  "</td></tr>";
                                         
                                     if ($numfila>3)
                                      { echo "<tr>" ;
                                       //$parfila=1;
                                      }
                                      else
                                      { echo "<tr class='alt'>" ;
                                       //$parfila=0;
                                      }
                                       echo  "<td>&nbsp&nbsp" .  $numfila++ .  "&nbsp&nbsp</td>";
                                      // echo  "<td>" .  $fila["Dorsal"] .  "</td>";
                                       echo   "<td><span class='columna'>" .substr($fila["NombreClub"], 0, 7). "</span></td>";
                                       $nombre=$fila["NombreDeport"] . " " . substr ( $fila["Ape1Deport"] , 0, 3 ) . ". ";
                                       $total=$fila['Total'];
                                       $especialidad=  $fila["especialidad"];
                                      }
                                     else
                                     {   $nombre= $nombre . " " . $fila["NombreDeport"] . " " . substr ( $fila["Ape1Deport"] , 0, 3 ) . ". ";
                                         $total= $fila['Total'];
                                     }
                                   $dorsalant=$fila["Dorsal"];
                              } while ($fila = mysql_fetch_assoc($resultado));
                               echo "<td><span class='columna'>" . $dorsalant . "&nbsp &nbsp"  . $nombre . "(" .$especialidad. ")</span></td><td class='total'>". $total .  "</td></tr>";
			     ?>

                </table>
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
