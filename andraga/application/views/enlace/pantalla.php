<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="container" ng-controller="pantallaCtrl">
      
    <table class="table">
        <thead>
            <tr class="cabeceraT">
                <th class="p1">Orden</th>
                <th class="p2">Dorsal</th>
                <th class="p3">Club</th>
                <th class="p4">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="rotacion in rotaciones | orderBy: rotacion.orden.posicion : reverse" class="cuerpoT">
                <td class="t">{{rotacion.orden.posicion}}</td>
                <td class="t">{{rotacion.dorsal}}</td>
                <td class="t">{{rotacion.club.nombre}}</td>
                <td class="t">{{rotacion.puntuacion.total}}</td>                
            </tr>
        </tbody>
    </table>
    <!-- <button ng-click="mostrarPuntuacion();" class="btn btn-success">mostrar</button>-->
    <div id="dialog">
        <div class="panel panel-default contenedor">
            <div class="panel-heading panelCustom">{{nueva.dorsal}}</div>
            <div class="panel-body panelCustom">
                <div class="row" ><span class="titulo">Ejecucion: </span><span class="puntos">{{nueva.puntuacion.ejecucion}}</span></div>
                <div class="row" ><span class="titulo">Dificultad: </span><span class="puntos">{{nueva.puntuacion.dificultad}}</span></div>
                <div class="row" ><span class="titulo">Artístico: </span><span class="puntos">{{nueva.puntuacion.artistico}}</span></div>
                <div class="row" ><span class="titulo">Penalización: </span>{{nueva.puntuacion.penalizacion}}<span class="puntos" style="color:red"></span></div>
            </div>
            <div class="panel-footer panelCustom"><span class="titulo"><b>Total:  </b></span><span class="puntos">{{nueva.puntuacion.total}}</span></div>
        </div>
        
    </div>
    
    
</div>

