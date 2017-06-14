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

    
    
    
</div>
