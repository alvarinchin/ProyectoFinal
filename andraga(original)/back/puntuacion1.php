<!DOCTYPE html> <html lang="es">
	 <head> <meta charset="utf-8"> 
	 	<title>Andraga
fija</title>
 
        <link rel="stylesheet" href="../style/andraga.css">
        <link rel="stylesheet" href="../style/tabla.css">
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
			<span class="site-desc">Panel de Administración</span>
		</a> <!-- / #logo-header -->
 
		<nav>
			<ul>
     <li><a href="deportistas.php">Participantes</a></li>
				<li><a href="inscripciones.php">Inscripci&oacuten</a></li>
				<li><a href="puntuacion.php">Puntuaci&oacuten</a></li>
				
			</ul>
		</nav><!-- / nav -->
 
	</header><!-- / #main-header -->
 
	
	<section id="main-content">
	
		<article>
			<header>
				<h1>Puntuaciön</h1>
			</header>
			<?php 
			$link=Conectarse(); 
		
			

			
?> 	
			

			
			<div class="content">
            <div class="datagrid">
            <table>
              <thead><tr><th>Dorsal</th><th>Club</th><th>Componentes</th></tr></thead>
               <tbody>
                    <?php
                         $campeonato= $_POST['campeonato'];
                           $categoria=$_POST['categoria'];
                           $especialidad=$_POST['especialidad'];

                           if(count($_POST)==5)
                                                $autonomico = $_POST['autonomico'];
                                 else
                                      $autonomico = 0;

                           //Tratamiento de especialidad
                           $start= stripos ( $especialidad, "#" );
                           $num= substr ( $especialidad , $start+1 )+0;
                           $especialidad= substr( $especialidad, 0, $start);
                           $tipoejercicio=$_POST["tipoejercicio"];
                           $sql="SELECT inscripcion.CodInscripcion as Dorsal, inscritas.CodDep, deportistas.NombreDepor as NombreDeport, deportistas.Ape1Deport as Ape1Deport, deportistas.CodClub as Club, club.NombreClub as NombreClub, club.Comunidad  FROM inscripcion, inscritas, deportistas, club ";
                           $sql= $sql ."WHERE inscritas.CodInscripcion=inscripcion.CodInscripcion and deportistas.CodDeport=inscritas.CodDep and club.CodClub=inscripcion.CodClub";
                           $sql= $sql . " and inscripcion.CODCAMPEONATO=" . $campeonato . "and inscripcion.CodCategoria='" .$categoria ."' ";
                           $sql =$sql . " and  inscripcion.CodEspecialidad='" . $especialidad . "'";

                             echo $sql;
                             $resultado = mysql_query($sql, $link);
                             $numfila=0;

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
                                         echo "<td>" . $nombre . "</td>";
                                     if ($numfila==0)
                                      { echo "<tr>" ;
                                       $numfila=1;
                                      }
                                      else
                                      { echo "<tr class='alt'>" ;
                                       $numfila=0;
                                      }
                                       echo  "<td>" . "<a href='puntuacion2.php?dorsal=". $fila["Dorsal"] . "&club=" . $fila["NombreClub"] . "&tipoejercicio=" . $tipoejercicio ."'>".  $fila["Dorsal"] .  "</a></td>";
                                       echo   "<td>" . $fila["NombreClub"] . "</td>";
                                       $nombre=$fila["NombreDeport"] . " " . $fila["Ape1Deport"];
                                      }
                                     else
                                     {   $nombre= $nombre . "-" . $fila["NombreDeport"] . " " . $fila["Ape1Deport"];
                                     }
                                   $dorsalant=$fila["Dorsal"];
                              } while ($fila = mysql_fetch_assoc($resultado));
                               echo "<td>" . $nombre . "</td>";
			     ?>
                </tbody>
                </table>
                </div>




 
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
