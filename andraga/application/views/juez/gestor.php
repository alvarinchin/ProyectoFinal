<div class="container">
    <h2>Gestor de competiciones</h2>
        
    <div class="row" ng-controller="inscripcionesCtrl">
        <h3>Inscripciones</h3>
        <!--        clubs-->
        
        <div class="col-md-2">
            <div class=" form-group">
                <label>Club</label>
                <select size="10" class="form-control">
                    <option ng-repeat="obj in clubes">{{obj.nombre}}</option>
                </select>
            </div>
        </div>
        
        <!--        deportistas-->
        <div class="col-md-3">
            <div class="form-group">
                <label>Deportistas</label>
                <input class="form-control" type="text" ng-model="filtro" placeholder="filtro">
                <select multiple size="8" class="form-control">
                    <option ng-repeat="obj in deportistas |filter:filtro">{{obj.ape1}} {{obj.ape2}}, {{obj.nombre}}</option>
                </select>
            </div>
        </div>
        <!--        campeonato-->
        <div class="col-md-2">
            <div class="form-group">
                <label>Competición</label>
                <select  size="10" class="form-control">
                    <option ng-repeat="obj in competiciones">{{obj.nombre}}</option>
                </select>
            </div>   
        </div>
        <!--        especialidad-->
        <div class="col-md-2">
            <div class="form-group">
                <label>Especialidad</label>
                <select  size="10" class="form-control">
                    <option ng-repeat="obj in especialidades">{{obj.descripcion}} : {{obj.num}} </option>
                </select>
            </div>
        </div>
        <!--        categoria-->
        <div class="col-md-2">
            <div class="form-group">
                <label>Categoría</label>
                <select  size="10" class="form-control">
                    <option ng-repeat="obj in categorias">{{obj.nombre}}</option>
                </select>
            </div>
        </div>
        <!--        botones-->
        <div class="col-md-1">
            <div class="form-group">
                <input class="btn btn-primary" type="button" value="Enviar">
                <input class="btn btn-primary" type="button" value="cancelar">
                
            </div>
        </div>
            
        <!--        inscripciones-->
        <div class="col-md-11">
            <div class="form-group">
                <label>inscripciones</label>
                <select  size="10" class="form-control">
                    <option ng-repeat="obj in inscripciones">{{obj.nombre}}</option>
                </select>
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