
<div class="container" ng-controller="deportistaCtrl">
	<div class="col-xs-6">
		<label>filtro</label> <input type="text" ng-model="filtrado"
			class="form-control">

		<table class="table">
			<tr>
				<th>Nombre</th>
				<th>Primer apellido</th>
				<th>Segundo apellido</th>
				<th>Borrar</th>
				<th>Modificar</th>
			</tr>
			<tr ng-repeat="deportista in deportistas | filter:filtrado">
				<td>{{deportista.nombre}}</td>
				<td>{{deportista.ape1}}</td>
				<td>{{deportista.ape2}}</td>
				<td><button class="btn btn-primary" ng-click="borrar(deportista)">
						<span class="glyphicon glyphicon-remove"></span>
					</button></td>
				<td><button class="btn btn-primary" ng-click="datos(deportista)"
						data-toggle="collapse" data-target="#deportistaE">
						<span class="glyphicon glyphicon-pencil"></span>
					</button></td>
			</tr>
		</table>

		<div id="deportistaE" class="collapse well">
			<h4>Modificar deportista</h4>
			<div class="form-group">
				<label>Nombre: </label> <input type="text" ng-model="nombreE">
			</div>
			<div class="form-group">
				<label>Primer apellido: </label> <input type="text" ng-model="ape1E">
			</div>
			<div class="form-group">
				<label>Segundo apellido: </label> <input type="text"
					ng-model="ape2E">
			</div>
			<div class="form-group">
				<label>Fecha de nacimiento: </label> <input type="text"
					ng-model="fechaE" id="fechaNac">
			</div>
			<div class="form-group">
				<label>Número federación: </label> <input type="text"
					ng-model="numerofederacionE">
			</div>

			<button type="button" ng-click="modificar();" class="btn btn-info"
				data-toggle="collapse" data-target="#deportistaE">Modificar</button>
			<button type="button" class="btn btn-danger" data-toggle="collapse"
				data-target="#deportistaE">Cancelar</button>

		</div>
	</div>
	<div class="col-xs-6">


		<h4>Introduce los datos del nuevo deportista</h4>

		<div class="form-group">
			<label for="nombre">Nombre: </label> <input type="text" id="nombre"
				name="nombre" placeholder="Nombre" ng-model="nombre" required>

		</div>
		<div class="form-group">
			<label for="ape1">Primer apellido: </label> <input type="text"
				id="ape1" name="ape1" placeholder="Primer apellido" ng-model="ape1"
				value="" required>

		</div>

		<div class="form-group">
			<label for="ape2">Segundo apellido: </label> <input type="text"
				id="ape2" name="ape2" placeholder="Segundo apellido" ng-model="ape2"
				value="" required>

		</div>

		<div class="form-group">
			<label for="fed">Numero federación: </label> <input type="text"
				id="fed" name="numerofederacion" placeholder="número federación"
				ng-model="numerofederacion" value="" required>

		</div>

		<div class="form-group">
			<label for="fecha">Fecha de nacimiento: </label> <input type="date"
				id="fecha" name="fecha" placeholder="Fecha de nacimiento"
				ng-model="fecha" value="" required>

		</div>
		<div class="form-group">
			<input type="button" class="btn btn-primary" value="Agregar"
				ng-click="insertar()">
		</div>




	</div>

</div>