#!/bin/bash
# ADD Y COMMIT

#primer par�metro repositorio 
#segundo par�metro branch
# si no ponemos par�metros usar� los que vienen entre llaves. guardamos con extensi�n .sh y listo


  git add -A

  git commit 

  git push ${1-"origin"} ${2-"master"}