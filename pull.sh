#!/bin/bash
#PULL
#param 1 remote
#param 2 branch
# si no ponemos par�metros usar� los que vienen entre llaves. guardamos con extensi�n .sh y listo

git pull ${1-"origin"} ${2-master}