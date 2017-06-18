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
            <tr ng-repeat="rotacion in rotaciones | orderBy: rotacion.orden">
                <td>{{rotacion.orden}}</td>
                 <td>{{rotacion.dorsal}}</td>
                  <td>{{rotacion.club.nombre}}</td>
                  <td>{{rotacion.puntuacion.total}}</td>
               
            </tr>
        </tbody>
    </table>
   <!-- <button ng-click="mostrarPuntuacion();">mostrar</button>-->
    <div id="dialog">
        <table class="table">
            <thead>
                <tr>
                    <th>Dorsal</th>
                    <th>Cateoría</th>
                    <th>Especialidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{nueva.dorsal}}</td>
                    <td>{{nueva.categoria.nombre}}</td>
                    <td>{{nueva.especialidad.descripcion}}</td>
                </tr>
                
            </tbody>
        </table>

    </div>
    
    
</div>

