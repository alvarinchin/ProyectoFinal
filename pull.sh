#!/bin/bash
#PULL
#param 1 remote
#param 2 branch
# si no ponemos parámetros usará los que vienen entre llaves. guardamos con extensión .sh y listo

git pull ${1-"origin"} ${2-master}