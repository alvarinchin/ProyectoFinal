# ProyectoFinal
Proyecto final del grado en desarrollo de aplicaciones web

##1-> CREAR EL REPOSITORIO LOCAL##
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
