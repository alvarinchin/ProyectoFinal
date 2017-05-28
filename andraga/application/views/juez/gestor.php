<div class="container">
    <h2>Gestor de competiciones</h2>
    
    <div class="row" ng-controller="inscripcionesCtrl">
        <h3>Inscripciones</h3>
<!--        clubs-->

       <div class="col-xs-2 form-group">
           <select size="10" class="form-control">
            <option ng-repeat="obj in clubes">{{obj.nombre}}</option>
        </select>
       </div>
     
<!--        deportistas-->
      <div class="col-xs-3 form-group">
          <input class="form-control" type="text" ng-model="filtro">
           <select multiple size="10" class="form-control">
             <option ng-repeat="obj in deportistas | fiter:filtro">{{obj.ape1}} {{obj.ape2}}, {{obj.nombre}}</option>
        </select>
       </div>
<!--        campeonato-->
       <div class="col-xs-2 form-group">
           <select  size="10" class="form-control">
             <option ng-repeat="obj in competiciones">{{obj.nombre}}</option>
        </select>
       </div>   
<!--        especialidad-->
       <div class="col-xs-2 form-group">
           <select  size="10" class="form-control">
             <option ng-repeat="obj in especialidades">{{obj.descripcion}}</option>
        </select>
       </div>
<!--        categoria-->
       <div class="col-xs-2 form-group">
           <select  size="10" class="form-control">
             <option ng-repeat="obj in categorias">{{obj.nombre}}</option>
        </select>
       </div>
<!--        botones-->
       <div class="col-xs-1 form-group">
            <input class="btn btn-primary" type="button" value="Enviar">
            <input class="btn btn-primary" type="button" value="cancelar">

       </div>


    </div>
    <div class="row" ng-controller="rotacionCtrl">
        <h3>Rotaciones</h3>
        <!--        inscripciones-->
       <div class="col-xs-2">
        <select>
        </select>
       </div>
    </div>
    
    
    
</div>