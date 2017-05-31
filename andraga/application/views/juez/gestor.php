<div class="container">
    <h2>Gestor de competiciones</h2>
        
    <div class="row" ng-controller="inscripcionesCtrl">
        <h3>Inscripciones</h3>
        <!--        clubs-->
        
        <div class="col-md-2">
            <div class="form-group">
                <label>Club</label>
                <select size="10" class="form-control" ng-model="club">
                    <option ng-repeat="obj in clubes" value="{{obj.id}}">{{obj.nombre}}</option>
                </select>
            </div>
        </div>
        
        <!--        deportistas-->
        <div class="col-md-3">
            <div class="form-group">
                <label>Deportistas</label>
                <input class="form-control" type="text" ng-model="filtro" placeholder="filtro">
                <select size="8" class="form-control" ng-model="deportistasSelect">
                    <option ng-repeat="obj in deportistas |filter:filtro" value="{{obj.id}}" >{{obj.ape1}} {{obj.ape2}}, {{obj.nombre}}</option>
                </select>
            </div>
        </div>
        <!--        campeonato-->
        <div class="col-md-2">
            <div class="form-group">
                <label>Competición</label>
                <select  size="10" class="form-control" ng-model="competicion">
                    <option ng-repeat="obj in competiciones" value="{{obj.id}}">{{obj.nombre}}</option>
                </select>
            </div>   
        </div>
        <!--        especialidad-->
        <div class="col-md-2">
            <div class="form-group">
                <label>Especialidad</label>
                <select  size="10" class="form-control" ng-model="especialidad">
                    <option ng-repeat="obj in especialidades" value="{{obj.id}}" >{{obj.descripcion}} : {{obj.num}} </option>
                </select>
            </div>
        </div>
        <!--        categoria-->
        <div class="col-md-2">
            <div class="form-group">
                <label>Categoría</label>
                <select  size="10" class="form-control" ng-model="categoria">
                    <option ng-repeat="obj in categorias" value="{{obj.id}}">{{obj.nombre}}</option>
                </select>
            </div>
        </div>
        <!--        botones-->
        <div class="col-md-1">
            <div class="form-group">
                <label>Dorsal</label>
                <input class="form-control" type="text" ng-model="dorsal"><br><br>
                <input class="btn btn-primary" type="button" value="Enviar" ng-click="enviar()">
                <input class="btn btn-primary" type="button" value="cancelar">
                
            </div>
        </div>
            
        <!--        inscripciones-->
        <div class="col-md-11">
            <div class="form-group">
            
                <table class="table">
                    <th>Club</th><th>Competición</th><th>Competición</th><th>Especialidad</th><th>Categoria</th><th>Dorsal</th>
                    <tr ng-repeat="insc in inscripciones"><td>{{insc.club.nombre}}</td><td><p ng-repeat="dep in insc.ownDeportistaList">{{dep.ape1}} {{dep.ape2}}, {{dep.nombre}}</p></td><td> {{insc.competicion.nombre}} </td><td>{{insc.especialidad.descripcion}}</td><td> {{insc.categoria.nombre}} </td><td>{{insc.dorsal}}</td></tr>
                </table>
            </div>
        </div>
        <!-- botones -->
            
        <div class="col-md-1">
            <div class="form-group">
               
                <input class="btn btn-primary" type="button" value="Enviar">
                <input class="btn btn-primary" type="button" value="cancelar">
                        
            </div>
                    
        </div>
        
    </div>
    <div class="row" ng-controller="rotacionCtrl">
        <h3>Rotaciones</h3>
        <!--        inscripciones-->
        <div class="col-md-2">
            <select>
            </select>
        </div>
    </div>      
</div>