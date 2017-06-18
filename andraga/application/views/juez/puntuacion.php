<style>
    .selected{
        background-color: lightgrey;
    }
    
    
</style>

<div class="container">
	<h2>Puntuaciones</h2>
<div ng-controller="puntuacionCtrl">
	<div class="row">
            <div class="col-md-3">
                
               <table class="table table-resposive">
                    <thead>
                            <tr>
                                    <th></th>
                                    <th>Orden</th>
                                    <th>Especialidad</th>
                                    <th>Categoria</th>
                                    <th>Dorsal</th>
                            </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="rot in rotaciones" name="rotacion" id="rotacion{{rot.id}}" >
                         <td><span ng-if="rot.puntuacion.total!=null" class="glyphicon glyphicon-ok"></span>
                         <span ng-if="rot == activo" class="glyphicon glyphicon-chevron-right"></span>
                         </td>
                                    <td>{{rot.orden}}</td>
                                    <td>{{rot.especialidad.descripcion}}</td>
                                    <td>{{rot.categoria.nombre}}</td>
                                    <td>{{rot.dorsal}}</td>   
                            </tr>
                    </tbody>
            </table>  
               
            </div>    
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <div>
                <div class="form-group" >
                    <label for="">Dificultad</label>
                    <input type="number" class="form-control " ng-model="dificultad">
                </div>
                <div class="form-group">
                    <label for="">Ejecución</label>
                    <input type="number" class="form-control" ng-model="ejecucion">
                </div>
                <div class="form-group">
                    <label for="">Artístico</label>
                    <input type="number" class="form-control" ng-model="artistico">
                </div>
                <div class="form-group">
                    <label for="">Penalización</label>
                    <input type="number" class="form-control" ng-model="penalizacion" style="color:red">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Total</label>
                    <input type="number" class="form-control" ng-model="total" readonly value="{{dificultad+ejecucion+artistico-penalizacion}}">
                </div>
                </div>
                  <div class="form-group">
                    
                    <button class="btn btn-primary" ng-click="enviar()">Enviar</button>
                </div>
                </div>
                
            </div>
	</div>
</div>
	
</div>