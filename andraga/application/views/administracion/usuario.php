<div class="container">
    <h1>GESTIÓN DE USUARIOS</h1>
    <div class="row">
        
        
       <div  class="col-md-3">
            <div ng-controller="usuarioCtrl">
                <h2>Usuarios</h2>
                
                <h4 class="well" data-toggle="collapse" data-target="#usuarioN">Nuevo Usuario</h4>
                <div id="usuarioN" class="collapse well">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" ng-model="login" required="required">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" ng-model="password" required="required">
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="rol" ng-model="rol">
                        <option value=1>Enlace</option>
                        <option value=2>Juez</option>
                        <option value=3>Administrador</option>
                        </select>
                        <!-- <input type="text" ng-model="rol">-->
                    </div>
                    <button type="button" ng-click="insertar();" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
                
                <table class="table">
                    <tr><th>Login</th><th>Rol</th><th></th><th></th></tr>
                    <tr  ng-repeat="usuario in usuarios">
                        <td>{{usuario.login}}</td><td ng-switch="usuario.rol">                        
                        <span ng-switch-when="1" selected="selected">Enlace</span>
                        <span ng-switch-when="2">Juez</span>
                        <span ng-switch-when="3">Administrador</span>
                        </td>
                        <td><button class="btn btn-primary" ng-click="borrar(usuario)"><span class="glyphicon glyphicon-remove"></span></button></td>
                        <td><button class="btn btn-primary" ng-click="datos(usuario)"data-toggle="collapse" data-target="#usuarioE"><span class="glyphicon glyphicon-pencil"></span></button></td>
                        
                    </tr>
                    
                </table>
                
                <div id="usuarioE" class="collapse well">
                    <h4>Modificar Usuario</h4>
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" ng-model="loginE">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" ng-model="passwordE">
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="rolE" ng-model="rolE">
                        <option value=1>Enlace</option>
                        <option value=2>Juez</option>
                        <option value=3>Administrador</option>
                        </select>
                        <!--<input type="text" ng-model="rolE">-->
                    </div>
                    <button type="button" ng-click="modificar();" class="btn btn-info" data-toggle="collapse" data-target="#usuarioE">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#usuarioE" >Cancelar</button>
                    
                </div>
                
            </div>
        </div>    
        
    </div>
</div>
