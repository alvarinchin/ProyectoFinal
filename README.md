# ProyectoFinal
Proyecto final del grado en desarrollo de aplicaciones web

##RECUPERAR EL REPOSITORIO##
git funciona teniendo dos repositorios, el local y el remoto, el primero es el que tenemos en el ordenador y que sirve de control de    nuestro trabajo. Lo tendreos actualizado pero si no lo enviamos al remoto no tendremos acceso los demás.
Vamos a ello.

### Opcion a: (la fácil) Decirle a eclipse que nos importe el repositorio:
  + Botón derecho>import
  + Buscamos y le decimos un proyecto de git y luego __"clone URI"__
  + Repositorio __https://github.com/alvarinchin/ProyectoFinal.git__
  + Una vez copiada la uri rellenara los datos automáticamente y con añadir abajo usuario y contraseña podreís hacer "push"
  + Seleccionais la "rama" o "branch" en este caso la "master", ya que no habrá en principiio otra
  + Luego os pedirá que escojaís la ruta para el repositorio local ( Donde gusteis), la "branch" inicial y el nombre que va a teber el servidor remoto(dejadlo en __origin__, es lo más facil)
  + Ahora dejadlo en  __"Import existing project"__  y seleccionais el que hay dentro
  + __Y ya esta__ :open_mouth:
      
### Opción b: (La guay) Usar el bash de git ###
+ Bajarse [el git bash](https://git-for-windows.github.io/) e instalarlo
+ Vamos al workspace, creamos una carpeta nueva ( opcional, al clonar el repositorio la crea si no especificamos la ruta de una carpeta)
+ abrimos un "bash de git", boton derecho en carpeta y saldrán "git bash here" o "git gui here", seleccionamos la "bash".
+ Saldrá una especie de "cmd" per con mas colores y dentro pondrá al estilo linux el nombre de usuario, el host y donde estamos ubicados
+ A la chicha. Lo primero cambiar el nombre y mail del usuario de la shel
  + `git config --global user.name "nombre que querais poner"`
  + `git config --global unser.email "correo que querais usar"` (Os llegaran las notificaciones de cambios imagino)
  + Opcional( Pero recomendable): `git config --global core.editor notepad` ( yo prediero notepad pero podeis usar, el Notepad++ o vi, que viene de serie con el bash, nano no esta
  
+ Ahora clonamos el repositorio, si especificamos el segundo parametro es la ruta donde queremos que se cree, o bien en blanco para que cree la carpeta por defecto
  + `git clone https://github.com/alvarinchin/ProyectoFinal.git (ruta)`
  
+ Cualquier acción que queramos hacer se tendrá que entrar con en bash de git a la carpeta que ha creado y ahi poder realizar cualquier accion
+ Importamos ahora a eclipse el proyecto
  + Botón derecho > import
  + "projects from git"
  + Local 
  + Si nos aparece el respositorio que acabamos de clonar perfecto, lo seleccionamos y siguiente, si no, lo añadimos manualmente
  + Ahora dejadlo en  __"Import existing project"__  y seleccionais el que hay dentro
  
##CREAR REPOSITORIO NUEVO##

Esto es un poco más complejo de lo que puede parecer, más que nada porque no se puede crear a través de eclipse, o yo no he encontrado la manera, asi que voy a explicar paso por paso a hacerlo a mano.

+ Creamos un repositorio en la red ( github seguramente), podemos añadir el readme.md ( vendría a ser un documento como este que se puede formatear), le ponemos nombre y lo creamos

+ Luego tendréis que copiar la URL del repositorio, aqui es donde mantendréis los datos almacenados y podréis bajaroslos o subir nuevas versiones

+ Ahora nos vamos al PC. Ahi debemos tener el [el git bash](https://git-for-windows.github.io/) instalado

+ Vamos al workspace, podemos tenerlo donde queramos pero aquí es más comodo sobre todo a la hora de trabajar.

+ Abrimos una ventana de comandos de git, un gitbash, pulsando con el boton derecho en el workspace y en el menú contextual "git BASH here" , y ejecutamos el siguiente comando `git clone (url del repositorio)`
+ Se descargará los datos y pondrá un aviso del estilo " estas descargando un repositorio vacío" , pero no pasa nada no tardaremos en llenarlo. 
+ Revisamos que en el workspace tenemos una nueva carpeta con el nombre del repositorio, pero vacía, al menos casi ya que solo tendrá los archivo de configuración de git que por defecto están ocultos(.git)
+ Abrimos eclipse, que sea el que vayais a usar en el proyecto, no la liemos. Y con el boton derecho "new project"
+ Cuando creamos el proyecto nos saldrá la ventana de elegir que tipo de proyecto y le damos que uno de php standar, en caso de java el dynamic web project, le damos a siguiente y rellenamos el nombre que va a tener. __Importante: DEBE LLAMARSE IGUAL QUE LA CARPETA QUE SE HA CREADO AL HACER EL CLONE DEL REPOSITORIO__. Esto hará que se "sobreescriba" y añada los archivos de configuración del proyecto a esa carpeta.

+ Finalizamos el resto de los menús y una vez terminado tendremos el proyecto listo para funcionar.
+ Recomendación importante: Antes de empezar a añadir clases y trabajar en el proyecto sería __extremadamente recomendable__ que se hiciera un primer "push" al repositorio indicando que es el commit 0 de la aplicación por si luego hubiera que volver atras.
+ Aunque creo que no es necesario decirlo este proceso se realiza solo una vez por proyecto, los siguientes que quieran trabajar en el deben estar añadidos como colaboradores en "github", en las preferencias del repositorio, y seguir los pasos de "Recuperar repositorio".

##Tu repositorio y tu: Cuidados de la nueva vida que has engendrado##

###¿Que hago con mi repositorio ahora?###
 
Como ya lo tenemos listo para funcionar y "Up-to-date"( tenemos la última version del repositorio) podemos empezar a picar codigo como si no hubiera un mañana, una vez todo guardado y listo para acabar de trabajar el dia tenemos las dos opciones de antes:
####A####
Usar los comandos de "team" para hacer las funciones.

+ "pull" para cargar todo el contenido del epositorio remoto al local
+ "commit", aparecerá a la derecha una barra con tres cuadrados, el primero es donde aparecerán los cambios "staged"( en seguimiento) y despues se le podrá añadir al commit poniendo un mensaje( es necesario poner algo).

####B####

Usar los comando del bash de git.

+ Estando sobre el directorio que tiene el directorio ".git" lanzamos una bash de git
+ `git status`, aparecerá el estado del repositorio, los cambios no seguidos aparecerán en rojo, los seguidos en verde y si no hay nada nuevo pondrá que estamos "up-to-date". __OJO__ que esté "up-to-date" no sigifica que este sincronizado en el repositorio.
+ Una vez sabemos que carpetas y archivos están modificados  y no están en el repositorio hay que añadirlos `git add (la carpeta o los archivos no seguidos, en rojo)`, podemos volver a hacer `git status` y ver que quedan en verde
+  Ahora ya están marcados para ser añadidos al repositorio local, ejecutamos `git commit` si ejecutamos esta opción nos saltará un editor de texto para que pongamos un comentario del "commit" ( vi por defecto o notepad si lo hemos cambiado), Otra opcion es usar `git commit -m ( comentario)` podemos meterlo entre comillas y poner frases con espacios, si no, solo podremos poner una palabra, reconocerá los espacios como que después va un comando nuevo
+ Ahora el repositorio está "up-to-date" solo falta mandarlo al remoto: `git push origin(repositorio) master(rama)`, si cambiaran tendriamos que poner el que corresponde.

Y eso es todo, en principio con esos comando tendriamos para ir tirando.


#Opciones PRO# 

Como habreís deducido al usar una shell es posible hacer scrpits y ejecutarlos para evitar tener que abrir el bash y escribir a mano todo, os dejo los mios, en principio deberian ser iguales, pero por si acaso revisad que la carpeta se llame igual que la que pongo.

##COMMIT##

    #!/bin/bash
    # ADD Y COMMIT
    
    #primer parámetro repositorio 
    #segundo parámetro branch
    # si no ponemos parámetros usará los que vienen entre llaves. guardamos con extensión .sh y listo


    git add -A

	  git commit 

	  git push ${1-"origin"} ${2-"master"}

##PULL##

    #!/bin/bash
    #PULL
    #param 1 remote
    #param 2 branch
    # si no ponemos parámetros usará los que vienen entre llaves. guardamos con extensión .sh y listo

    git pull ${1-"origin"} ${2-master}
    
   
   
   
#Peleandonos con AngularJS#

##¿Qué es AngularJS?##

-Es una libreria para javascript ( de ahi el "JS") que su principal objetivo es el de desarrollar aplicaciones single-page, es decir que va todo en una misma pagina de html, aunque puede repartirse entre varias. La pricipal, o al menos la que mas me gusta es un concepto llamado Data-binding que significa enlace de datos. A grandes rasgos esto permite tener de una manera automatica sincronizados los datos del modelo y la vista ( guay eh?), aunque no lo creais esto es tremendamente brutal.


##Estructura de una aplicacion AngularJS##

En esencia sigue el esquema de MVC y de hecho los componentes estan nombrados de esa manera ya que la idea es mantener simepre separados esos tres componentes de una aplicación. Voy a poner algunos ejemplos de lo más basico, primero para ver que la potencia de esto es tremenda y ahorra una cantidad de codigo que ni os imaginais y segundo para que vayamos poco a poco cogiendo el ritmo de esto.


	<code>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<scrip>
	//vamos a comenzar con un ejercicio de clase muy sosillo, un tipico "hola mundo"
	</script>

	<div ng-app>

	<input type="text" ng-model="texto">

	<h1>{{texto}}</h1>

	</div>

	</code>

La salida de esto es un input que al escribir cualquier cosa en el automaticamente sale escrito en la cabecera que hay debajo, ni eventos ni submits ni nada, dos lineas y arreando.

Vamos a destriparlo para ir entendiendolo:

Por un lado importamos la libreria de AngularJS, como si bootstrap o jQuery se tratase. Luego tenemos que decirle al compilador de Angular que vamos a poner una aplicacion dentro del codigo, eso se consigue con la etiqueta "ng-app", todas las etiquetas con funcionalidades en angular se llaman "directivas" y se forman con "ng-(nombre que sea)" incluso podemos crear nuestras propias etiquetas gracias a HTML5.

Después en el input le decimos que lo recuperado de ahi va a ser un elementos del model, es decir, como decirle que el value de ese elemento se va a almacenar, o modificar en el valor guardado en el model de la aplicacion, en este caso no tenemos nada dentro del script, asi que por ahora no vamos a preocuparnos por eso, solo saber que es como si declararamos una variable con el nombre que aparece en la etiqueta "ng-model" y que si queremoa acceder a el va a ser a través de ese nombre, en nuestro ejemplo "texto".

Por último para sacar el valor de lo almacenado en el model usamos la sintaxis "{{}}" con el nombre del model dentro de las llaves.  Esta sintaxis también admite algunas expresiones u operaciones sencillas pero no se puede usar como si fuera una etiqueta de script.


ng-init y ng-repeat( gloria bendita )

Tenemos además un par de directivas bastante útiles, estas son ng-init y ng-repeat. Aunque la primera es considerada una mala praxis en la mayoria de los casos, ya veremos como hacerlo bién, la de ng-repeat es una ayuda inestimable a la hora de realizar html repetitivo. La funcionalidad es similar al foreach de php pero con la comodidad de que no salimos de html en ningun momento, pudiendo incluso enlazar llagadas de Ajax a traves de estas miniaplicaciones.

	<code>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<scrip>
	//Creamos un array de elementos y los imprimimos en una lista no ordenada
	</script>

	<div ng-app>
	<div ng-init="colores=['rojo','azul','verde']">

	<ul>
		<li ng-repeat="color in colores">{{color}}</li>
	</ul>

	</div>
	</div>
	</code>

De nuevo arrancamos la aplicación y le decimos a angular que nos inicialice un array llamado colores, esta manera no es correcta, estamos meclando controlador con vista, pero por ahora nos vale para saber como funciona ng-repeat y ng-init.

Dentro de la etiqueta "li" le decimos que nos la repita por cada elemento que aparezca en el array colores, como si fuera un for y ademas le decimos que como nombre ponga el valor de la variable color que es el elemento de colores.

Es sencillo no?
Ahora vamos a hacer con dos lineas un ejercicio de JavaScript que necesitaba unas pocas mas, vamos a verlo.

	<code>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<scrip>
	//Creamos un array de elementos y los imprimimos en un select
	</script>

	<div ng-app>
	<div ng-init="colores=['red','blue','green']">

	<select ng-model="colorElegido">
		<option ng-repeat="color in colores" value="{{color}}" >{{color}}</option>
	</select>
		<div style="width:400px;height:400px;border:1px solid black;background-color:{{colorElegido}}"></div>


	</div>
	</div>
	</code>

aqui cambiamo el color de fondo de un div a traves de un desplegable con colores
