<div class="container">
	<div class="row">
		<div class="col-md-6">
		<img src="<?= base_url()?>assets/img/administracion.png" class="img img-rounded" width="100%"></div>
	</div>
	
	<div class="row">


		<!----------------------CLUBS-------------------------->
		<div class="col-md-3">
			<div ng-controller="clubCtrl">


				<h4 class="well menuOpciones" data-toggle="collapse"
					data-target="#clubN">Nuevo Club</h4>
				<div id="clubN" class="collapse well menuCreacion">
					<div class="form-group">
						<label>Nombre</label> <input type="text" ng-model="nombre">
					</div>
					<div class="form-group">
						<label>Origen</label> <input type="text" ng-model="origen">
					</div>
					<div class="form-group">
						<label>Comunidad</label> <input type="text" ng-model="comunidad">
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-floppy-disk"></span>
					</button>
				</div>

				<table class="table">
					<tr>
						<th>Nombre</th>
						<th></th>
						<th></th>
					</tr>
					<tr ng-repeat="club in clubes">
						<td>{{club.nombre}}</td>
						<td><button class="btn btn-danger" ng-click="borrar(club)">
								<span class="glyphicon glyphicon-trash"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(club)"
								data-toggle="collapse" data-target="#clubE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="clubE" class="collapse well menuModificacion">
					<h4>Modificar Club</h4>
					<div class="form-group">
						<label>Nombre</label> <input type="text" ng-model="nombreE">
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


				<h4 class="well menuOpciones" data-toggle="collapse"
					data-target="#catgN">Nueva Categoría</h4>
				<div id="catgN" class="collapse well menuCreacion">
					<div class="form-group">
						<label>Nombre</label> <input type="text" ng-model="nombre">
					</div>

					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-floppy-disk"></span>
					</button>
				</div>

				<table class="table">
					<tr>
						<th>Nombre</th>
						<th></th>
						<th></th>
					</tr>
					<tr ng-repeat="categoria in categorias">
						<td>{{categoria.nombre}}</td>
						<td><button class="btn btn-danger" ng-click="borrar(categoria)">
								<span class="glyphicon glyphicon-trash"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(categoria)"
								data-toggle="collapse" data-target="#catgE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="catgE" class="collapse well menuModificacion">
					<h4>Modificar Categoría</h4>
					<div class="form-group">
						<label>Nombre</label> <input type="text" ng-model="nombreE">
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


				<h4 class="well menuOpciones" data-toggle="collapse"
					data-target="#tipoN">Nuevo Tipo de ejercicio</h4>
				<div id="tipoN" class="collapse well menuCreacion">
					<div class="form-group">
						<label>Descripcion</label> <input type="text"
							ng-model="descripcion">
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-floppy-disk"></span>
					</button>
				</div>

				<table class="table">
					<tr>
						<th>Descripción</th>
						<th></th>
						<th></th>
					</tr>
					<tr ng-repeat="tipo in tipos">
						<td>{{tipo.descripcion}}</td>
						<td><button class="btn btn-danger" ng-click="borrar(tipo)">
								<span class="glyphicon glyphicon-trash"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(tipo)"
								data-toggle="collapse" data-target="#tipoE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="tipoE" class="collapse well menuModificacion">
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


				<h4 class="well menuOpciones" data-toggle="collapse"
					data-target="#espN">Nueva Especialidad</h4>
				<div id="espN" class="collapse well menuCreacion">
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
						<span class="glyphicon glyphicon-floppy-disk"></span>
					</button>
				</div>

				<table class="table">
					<tr>
						<th>Nombre</th>
						<th>Número</th>
						<th></th>
						<th></th>
					</tr>
					<tr ng-repeat="especialidad in especialidades">
						<td>{{especialidad.descripcion}}</td>
						<td>Num: {{especialidad.num}}</td>
						<td><button class="btn btn-danger" ng-click="borrar(especialidad)">
								<span class="glyphicon glyphicon-trash"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(especialidad)"
								data-toggle="collapse" data-target="#espE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="espE" class="collapse well menuModificacion">
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
		<!----------------------COMPETICIONES-------------------------->
		<div class="col-md-6">
			<div ng-controller="competicionCtrl">


				<h4 class="well menuOpciones" data-toggle="collapse"
					data-target="#competicionN">Nueva Competición</h4>
				<div id="competicionN" class="collapse well menuCreacion">
					<div class="form-group">
						<label>Nombre</label> <input type="text" ng-model="nombre">
					</div>
					<div class="form-group">
						<label>Fecha</label> <input type="text" ng-model="fecha">
					</div>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-floppy-disk"></span>
					</button>
				</div>

				<table class="table">
					<tr>
						<th>Nombre</th>
						<th>Fecha</th>
						<th></th>
						<th></th>
					</tr>
					<tr ng-repeat="competicion in competiciones">
						<td>{{competicion.nombre}}</td>
						<td>{{competicion.fecha}}</td>
						<td><button class="btn btn-danger" ng-click="borrar(competicion)">
								<span class="glyphicon glyphicon-trash"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(competicion)"
								data-toggle="collapse" data-target="#competicionE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="competicionE" class="collapse well menuModificacion">
					<h4>Modificar Competición</h4>
					<div class="form-group">
						<label>Nombre</label> <input type="text" ng-model="nombreE">
					</div>
					<div class="form-group">
						<label>Fecha</label>
						<!-- <ng-datepicker ng-model="fechaE"></ng-datepicker> -->
						<input type="text" id="calendario" ng-model="fechaE" readonly>

					</div>
					<button type="button" ng-click="modificar();" class="btn btn-info"
						data-toggle="collapse" data-target="#competicionE">Modificar</button>
					<button type="button" class="btn btn-danger" data-toggle="collapse"
						data-target="#competicionE">Cancelar</button>

				</div>

			</div>
		</div>

		<!----------------------COMPETICIONES-------------------------->
		<!----------------------DEPORTISTAS-------------------------->
		<div class="col-md-6">
			<div ng-controller="deportistaCtrl">


				<h4 class="well menuOpciones" data-toggle="collapse"
					data-target="#deportistaN">Nuevo Deportista</h4>
				<div id="deportistaN" class="collapse well menuCreacion">
					<table class="table">
						<tr>
							<td>
								<div class="form-group">
									<label>Nombre</label>
							
							</td>
							<td><input type="text" ng-model="nombre" placeholder="Nombre">
								</div></td>
							</th>
						
						
						<tr>
							<td><div class="form-group">
									<label for="ape1">Primer apellido: </label></td>
							<td><input type="text" id="ape1" name="ape1"
								placeholder="Primer apellido" ng-model="ape1" value="">

								</div></td>
							</th>
						
						
						<tr>
							<td><div class="form-group">
									<label for="ape2">Segundo apellido: </label></td>
							<td><input type="text" id="ape2" name="ape2"
								placeholder="Segundo apellido" ng-model="ape2" value="">

								</div></td>
							</th>
						
						
						<tr>
							<td><div class="form-group">
									<label for="fed">Numero federación: </label></td>
							<td><input type="text" id="fed" name="numerofederacion"
								placeholder="número federación" ng-model="numerofederacion"
								value="">

								</div></td>
							</th>
						
						
						<tr>
							<td><div class="form-group">
									<label for="fecha">Fecha de nacimiento: </label></td>
							<td><input type="text" id="fecha" name="fecha"
								placeholder="Fecha de nacimiento" ng-model="fecha" value="">

								</div></td>
							</th>
						</tr>
					</table>
					<button type="button" ng-click="insertar();"
						class="btn btn-success">
						<span class="glyphicon glyphicon-floppy-disk"></span>
					</button>
				</div>

				<table class="table">
					<tr>
						<th>Nombre</th>
						<th>Apellido 1</th>
						<th>Apellido 2</th>
						<th></th>
						<th></th>
					</tr>
					<tr ng-repeat="deportista in deportistas">
						<td>{{deportista.nombre}}</td>
						<td>{{deportista.ape1}}</td>
						<td>{{deportista.ape2}}</td>
						<td><button class="btn btn-danger" ng-click="borrar(deportista)">
								<span class="glyphicon glyphicon-trash"></span>
							</button></td>
						<td><button class="btn btn-primary" ng-click="datos(deportista)"
								data-toggle="collapse" data-target="#deportistaE">
								<span class="glyphicon glyphicon-pencil"></span>
							</button></td>

					</tr>

				</table>

				<div id="deportistaE" class="collapse well menuModificacion">
					<h4>Modificar Deportista</h4>
					<div class="form-group">
						<label>Nombre</label> <input type="text" ng-model="nombreE">
					</div>
					<div class="form-group">
						<label>Primer apellido: </label> <input type="text"
							ng-model="ape1E">
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
		</div>

		<!----------------------DEPORTISTAS-------------------------->


	</div>
</div>

