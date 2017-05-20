
<div class="container">
	<h1>ADMINISTRACIÓN</h1>
	<div class="row">


		<!----------------------CLUBS-------------------------->
		<div class="col-md-3">
			<div ng-controller="clubCtrl">
				<h2>Clubes</h2>

				<h4 class="well" data-toggle="collapse" data-target="#clubN">Nuevo
					Club</h4>
				<div id="clubN" class="collapse well">
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombre">
					</div>
					<div class="form-group">
						<label>Origen</label> <input type="text" ng-model="origen">
					</div>
					<div class="form-group">
						<label>Comunidad</label> <input type="text" ng-model="comunidad">
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>

				<table class="table">
					<tr ng-repeat="club in clubes">
						<td>{{club.nombre}}</td>
						<td><button class="btn btn-primary" ng-click="borrar(club)">
								<span class="glyphicon glyphicon-remove"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(club)"
								data-toggle="collapse" data-target="#clubE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="clubE" class="collapse well">
					<h4>Modificar Club</h4>
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombreE">
					</div>
					<div class="form-group">
						<label>Origen</label> <input type="text" ng-model="origenE">
					</div>
					<div class="form-group">
						<label>Comunidad</label> <input type="text" ng-model="comunidadE">
					</div>
					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#clubE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#clubE">Cancelar</button>

				</div>

			</div>
		</div>

		<!----------------------CLUBS-------------------------->
		<!----------------------CATEGORIA-------------------------->
		<div class="col-md-3">
			<div ng-controller="categoriaCtrl">
				<h2>Categorías</h2>

				<h4 class="well" data-toggle="collapse" data-target="#catgN">Nueva
					Categoría</h4>
				<div id="catgN" class="collapse well">
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombre">
					</div>

					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>

				<table class="table">
					<tr ng-repeat="categoria in categorias">
						<td>{{categoria.nombre}}</td>
						<td><button class="btn btn-primary" ng-click="borrar(categoria)">
								<span class="glyphicon glyphicon-remove"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(categoria)"
								data-toggle="collapse" data-target="#catgE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="catgE" class="collapse well">
					<h4>Modificar Categoría</h4>
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombreE">
					</div>

					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#catgE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#catgE">Cancelar</button>
				</div>

			</div>
		</div>
		<!----------------------CATEGORIA-------------------------->
		<!----------------------TIPO EJERCICIO--------------------->
		<div class="col-md-3">
			<div ng-controller="tipoCtrl">
				<h2>Tipo de Ejercicio</h2>

				<h4 class="well" data-toggle="collapse" data-target="#tipoN">Nuevo
					Tipo de ejercicio</h4>
				<div id="tipoN" class="collapse well">
					<div class="form-group">
						<label>Descripcion</label> <input type="text"
							ng-model="descripcion">
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>

				<table class="table">
					<tr ng-repeat="tipo in tipos">
						<td>{{tipo.descripcion}}</td>
						<td><button class="btn btn-primary" ng-click="borrar(tipo)">
								<span class="glyphicon glyphicon-remove"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(tipo)"
								data-toggle="collapse" data-target="#tipoE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="tipoE" class="collapse well">
					<h4>Modificar Tipo de Ejercicio</h4>
					<div class="form-group">
						<label>Descripción</label> <input type="text"
							ng-model="descripcionE">
					</div>

					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#tipoE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#tipoE">Cancelar</button>
				</div>

			</div>
		</div>
		<!----------------------TIPO EJERCICIO--------------------->
		<!----------------------ESPECIALIDAD----------------------->
		<div class="col-md-3">
			<div ng-controller="especCtrl">
				<h2>Especialidades</h2>

				<h4 class="well" data-toggle="collapse" data-target="#espN">Nueva
					Especialidad</h4>
				<div id="espN" class="collapse well">
					<div class="form-group">
						<label>Descripción</label> <input type="text"
							ng-model="descripcion">
					</div>
					<div class="form-group">
						<label>Número Componentes</label> <input type="number"
							ng-model="num">
					</div>

					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>

				<table class="table">
					<tr ng-repeat="especialidad in especialidades">
						<td>{{especialidad.descripcion}}</td>
						<td>Num: {{especialidad.num}}</td>
						<td><button class="btn btn-primary"
								ng-click="borrar(especialidad)">
								<span class="glyphicon glyphicon-remove"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(especialidad)"
								data-toggle="collapse" data-target="#espE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="espE" class="collapse well">
					<h4>Modificar Especialidad</h4>
					<div class="form-group">
						<label>Descripción</label> <input type="text"
							ng-model="descripcionE">
					</div>
					<div class="form-group">
						<label>Numero componentes</label> <input type="number"
							ng-model="numE">
					</div>

					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#espE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#espE">Cancelar</button>
				</div>
			</div>
		</div>
		<!----------------------ESPECIALIDAD----------------------->

	</div>
        <div class="row">
            <!----------------------DEPORTISTAS-------------------------->
		<div class="col-md-6">
			<div ng-controller="clubCtrl">
				<h2>Clubes</h2>

				<h4 class="well" data-toggle="collapse" data-target="#clubN">Nuevo
					Club</h4>
				<div id="clubN" class="collapse well">
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombre">
					</div>
					<div class="form-group">
						<label>Origen</label> <input type="text" ng-model="origen">
					</div>
					<div class="form-group">
						<label>Comunidad</label> <input type="text" ng-model="comunidad">
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>

				<table class="table">
					<tr ng-repeat="club in clubes">
						<td>{{club.nombre}}</td>
						<td><button class="btn btn-primary" ng-click="borrar(club)">
								<span class="glyphicon glyphicon-remove"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(club)"
								data-toggle="collapse" data-target="#clubE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="clubE" class="collapse well">
					<h4>Modificar Club</h4>
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombreE">
					</div>
					<div class="form-group">
						<label>Origen</label> <input type="text" ng-model="origenE">
					</div>
					<div class="form-group">
						<label>Comunidad</label> <input type="text" ng-model="comunidadE">
					</div>
					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#clubE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#clubE">Cancelar</button>

				</div>

			</div>
		</div>

		<!----------------------DEPORTISTAS-------------------------->
                <!----------------------COMPETICIONES-------------------------->
		<div class="col-md-6">
			<div ng-controller="clubCtrl">
				<h2>Clubes</h2>

				<h4 class="well" data-toggle="collapse" data-target="#clubN">Nuevo
					Club</h4>
				<div id="clubN" class="collapse well">
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombre">
					</div>
					<div class="form-group">
						<label>Origen</label> <input type="text" ng-model="origen">
					</div>
					<div class="form-group">
						<label>Comunidad</label> <input type="text" ng-model="comunidad">
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>

				<table class="table">
					<tr ng-repeat="club in clubes">
						<td>{{club.nombre}}</td>
						<td><button class="btn btn-primary" ng-click="borrar(club)">
								<span class="glyphicon glyphicon-remove"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(club)"
								data-toggle="collapse" data-target="#clubE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="clubE" class="collapse well">
					<h4>Modificar Club</h4>
					<div class="form-group">
						<label>nombre</label> <input type="text" ng-model="nombreE">
					</div>
					<div class="form-group">
						<label>Origen</label> <input type="text" ng-model="origenE">
					</div>
					<div class="form-group">
						<label>Comunidad</label> <input type="text" ng-model="comunidadE">
					</div>
					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#clubE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#clubE">Cancelar</button>

				</div>

			</div>
		</div>

		<!----------------------COMPETICIONES-------------------------->
            
        </div>
</div>

