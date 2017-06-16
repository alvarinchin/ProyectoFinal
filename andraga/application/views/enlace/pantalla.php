<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<div class="container" ng-controller="pantallaCtrl">
    
    <table class="table">
        <thead>
            <tr>
                <th>Dorsal</th>

            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="rotacion in rotaciones">
                <td>{{rotacion.dorsal}}</td>
               
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

