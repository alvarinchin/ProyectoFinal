# ProyectoFinal
Proyecto final del grado en desarrollo de aplicaciones web


Instrucciones de git

1-> Bajaros el git bash, https://git-for-windows.github.io/ , lo instalais y es una ventana de comandos de linux, tiene las mismas funcione, asi que puedes hacer scripts de shell, los comandos, etc.. incluso tiene SSH que sirve para hacer conexiones remotas a otros linux.

2-> CREAR EL REPOSITORIO LOCAL

    git funciona teniendo dos repositorios, el local y el remoto, el primero es el que tenemos en el ordenador y que sirve de control de nuestro trabajo, lo tendreos actualizado pero si no lo enviamos al remoto no tendremos acceso los demás
    
    *Como no estamos creando el repositorio, sino bajandolo, con crear una carpeta en el workspace con el nombre que queramos nos vale
    Opcion a: (la facil) decirle a eclipse que nos importe el repositorio
          boton derecho>IMPORT 
            buscamos y le decimos un proyecto de git y luego "clone URI"
               repositorio https://github.com/alvarinchin/ProyectoFinal.git
              
            Y andando, usando los comandos de eclipse podemos ir funcionando, recordadno que los archivos al modificarlos pasan a estar en unsatged, es decir que la version del archivo del repositorio es anterior al nuevo, entonces hay que hacer un "add"( del archivo o de la carpeta entera) y luego hacer un "commit" para que añada los cambios al repos
    
