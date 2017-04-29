<h1>administración</h1>
<div class="container">
    <div class="row">
        <div  class="col-xs-3">
            <div ng-controller="clubCtrl">
                <h2>Clubes</h2>
                <table class="table">
                    <tr  ng-repeat="club in clubes">
                        <td>{{club.nombre}}</td>
                        <td><button class="btn btn-primary" ng-click="borrar(club)"><span class="glyphicon glyphicon-remove"></span></button></td>
                        <td><button class="btn btn-primary" ng-click="editar(club)"><span class="glyphicon glyphicon-pencil"></span></button></td>
                        
                    </tr>
                    
                </table>
                <h4>nuevo Club</h4>
                <fieldset>
               <div>
                    <div class="form-group">
                        <label>nombre</label>
                        <input type="text" ng-model="nombre">
                    </div>
                   <div class="form-group">
                        <label>Origen</label>
                        <input type="text" ng-model="origen">
                    </div>
                   <div class="form-group">
                        <label>Comunidad</label>
                        <input type="text" ng-model="comunidad">
                    </div>
                </div>
                </fieldset>
                <button type="button" ng-click="insertar();" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
                
            </div>
        </div>  
        
        <div  class="col-xs-3">
            <div ng-controller="categoriaCtrl">
                <h2>Clubes</h2>
                <table class="table">
                    <tr  ng-repeat="categoria in categorias">
                        <td>{{categoria.nombre}}</td>
                        <td><button class="btn btn-primary" ng-click="borrar(club)"><span class="glyphicon glyphicon-remove"></span></button></td>
                        <td><button class="btn btn-primary" ng-click="editar(club)"><span class="glyphicon glyphicon-pencil"></span></button></td>
                        
                    </tr>
                    
                </table>
                    <h4>nueva Categoría</h4>
                <fieldset>
               <div>
                    <div class="form-group">
                        <label>nombre</label>
                        <input type="text" ng-model="nombre">
                    </div>
                </div>
                </fieldset>
                <button type="button" ng-click="insertar();" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
            
        </div>  
        
    </div>
</div>
<!-- Modal -->
