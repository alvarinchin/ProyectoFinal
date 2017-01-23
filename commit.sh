#!/bin/bash
# ADD Y COMMIT

#primer parámetro repositorio 
#segundo parámetro branch
# si no ponemos parámetros usará los que vienen entre llaves. guardamos con extensión .sh y listo


  git add -A

  git commit 

  git push ${1-"origin"} ${2-"master"}