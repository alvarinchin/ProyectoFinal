<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="container" ng-controller="pantallaCtrl">
    <div class="row">
        <div class="col-xs-8">
            <img src="assets/img/logo.png" class="img img-rounded" width="25%" height="25%">
        </div>
    </div>    
    <table class="table">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Dorsal</th>
                <th>Club</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="rotacion in rotaciones | orderBy: rotacion.orden.posicion : reverse">
                <td>{{rotacion.orden.posicion}}</td>
                <td>{{rotacion.dorsal}}</td>
                <td>{{rotacion.club.nombre}}</td>
                <td>{{rotacion.puntuacion.total}}</td>
                
            </tr>
        </tbody>
    </table>
    <!-- <button ng-click="mostrarPuntuacion();">mostrar</button>-->
    <div id="dialog">
        <div class="panel panel-default">
            <div class="panel-heading">{{nueva.dorsal}}</div>
            <div class="panel-body">
                <div class="row" ><span class="titulo">Ejecucion: </span><span class="puntos">{{nueva.puntuacion.ejecucion}}</span></div>
                <div class="row" ><span class="titulo">Dificultad: </span><span class="puntos">{{nueva.puntuacion.dificultad}}</span></div>
                <div class="row" ><span class="titulo">Artístico: </span><span class="puntos">{{nueva.puntuacion.artistico}}</span></div>
                <div class="row" ><span class="titulo">Penalización: </span>{{nueva.puntuacion.penalizacion}}<span class="puntos" style="color:red"></span></div>
            </div>
            <div class="panel-footer"><span class="titulo"><b>Total</b></span><span class="puntos">{{nueva.puntuacion.total}}</span></div>
        </div>
        
    </div>
    
    
</div>

