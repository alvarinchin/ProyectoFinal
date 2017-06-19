<div class="container">
	<div class="row">
		<div class="col-xs-8"></div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<img src="<?= base_url()?>assets/img/usuarios.png"
				class="img img-rounded" width="80%">
		</div>
	</div>
	<div class="row">



		<div ng-controller="usuarioCtrl">
			<div class="col-md-3">

				<h4 class="well menuOpciones" data-toggle="collapse"
					data-target="#usuarioN">Nuevo Usuario</h4>
				<div id="usuarioN" class="collapse well menuCreacion">
					<div class="form-group">
						<label>Login</label> <input type="text" ng-model="login"
							required="required">
					</div>
					<div class="form-group">
						<label>Password</label> <input type="password" ng-model="password"
							required="required">
					</div>
					<div class="form-group">
						<label>Rol</label> <select name="rol" ng-model="rol">
							<option value=2>Juez</option>
							<option value=3>Administrador</option>
						</select>
						<!-- <input type="text" ng-model="rol">-->
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-floppy-disk"></span>
					</button>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-3">
				<table class="table">
					<tr>
						<th>Login</th>
						<th>Rol</th>
						<th></th>
						<th></th>
					</tr>
					<tr ng-repeat="usuario in usuarios" ng-if="usuario.rol!=1">
						<td>{{usuario.login}}</td>
						<td ng-switch="usuario.rol"><span ng-switch-when="1">Enlace</span>
							<span ng-switch-when="2">Juez</span> <span ng-switch-when="3">Administrador</span>
						</td>
						<td><button class="btn btn-danger" ng-click="borrar(usuario)">
								<span class="glyphicon glyphicon-trash"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(usuario)"
								data-toggle="collapse" data-target="#usuarioE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="usuarioE" class="collapse well menuModificacion">
					<h4>Modificar Usuario</h4>
					<div class="form-group">
						<label>Login</label> <input type="text" ng-model="loginE">
					</div>
					<div class="form-group">
						<label>Password</label> <input type="text" ng-model="passwordE">
					</div>
					<div class="form-group">
						<label>Rol</label> <select name="rolE" ng-model="rolE">
							<option value=1>Enlace</option>
							<option value=2>Juez</option>
							<option value=3>Administrador</option>
						</select>
						<!--<input type="text" ng-model="rolE">-->
					</div>
					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#usuarioE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#usuarioE">Cancelar</button>

				</div>




			</div>
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<div class="col-md-6">

					<div class="form-group">
						<br /> <br /> <br />
						<button class="btn btn-danger" ng-click="bigJoe();">Resetear Base
							de datos</button>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>