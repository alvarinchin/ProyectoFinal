<div class="container"  ng-controller="inscripcionesCtrl">
	<h2>Gestor de competiciones</h2>

	<div class="row">
		<div class="col-md-12">
			<div>
				<h3>Inscripciones</h3>
				<!--        clubs-->
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label>Club</label> <select size="10" class="form-control"
								ng-model="club">
								<option ng-repeat="obj in clubes" value="{{obj.id}}">{{obj.nombre}}</option>
							</select>
						</div>
					</div>

					<!--        deportistas-->
					<div class="col-md-2">
						<div class="form-group">
							<label>Deportistas</label> <input class="form-control"
								type="text" ng-model="filtro" placeholder="filtro"> <select
								size="8" class="form-control" ng-model="deportistasSelect" multiple>
								<option ng-repeat="obj in deportistas |filter:filtro"
									value="{{obj.id}}" ng-if="obj.inscripcion_id == null">{{obj.ape1}} {{obj.ape2}}, {{obj.nombre}}</option>
							</select>
						</div>
					</div>
					<!--        campeonato-->
					<div class="col-md-2">
						<div class="form-group">
							<label>Competición</label> <select size="10" class="form-control"
								ng-model="competicion">
								<option ng-repeat="obj in competiciones" value="{{obj.id}}">{{obj.nombre}}</option>
							</select>
						</div>
					</div>
					<!--        especialidad-->
					<div class="col-md-2">
						<div class="form-group">
							<label>Especialidad</label> <select size="10"
								class="form-control" ng-model="especialidad">
								<option ng-repeat="obj in especialidades" value="{{obj.id}}">{{obj.descripcion}}
									: {{obj.num}}</option>
							</select>
						</div>
					</div>
					<!--        categoria-->
					<div class="col-md-2">
						<div class="form-group">
							<label>Categoría</label> <select size="10" class="form-control"
								ng-model="categoria">
								<option ng-repeat="obj in categorias" value="{{obj.id}}">{{obj.nombre}}</option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Tipo Ejercicio</label> <select size="10"
								class="form-control" ng-model="tipoejercicio">
								<option ng-repeat="obj in tiposejercicio" value="{{obj.id}}">{{obj.descripcion}}</option>
							</select>
						</div>
					</div>

				</div>
				<div class="row">
					<!--        botones-->
					<div class="col-md-1">
						<div class="form-group">
							<br> <br> <input class="btn btn-primary" type="button"
								value="Crear inscripción" ng-click="enviarInscripcion();">

						</div>
					</div>
				</div>
				<!--        inscripciones-->

				<div class="col-md-11">
					<div class="form-group">

						<table class="table">
							<tr>
								<th>Club</th>
								<th>Deportista</th>
								<th>Competición</th>
								<th>Especialidad</th>
								<th>Categoria</th>
								<th>Dorsal</th>
								<th>Tipo ejercicio</th>
								<th>Seleccionar/Deseleccionar todo <input type="checkbox"
									name="seleccionar" id="idSeleccion"></th>
							</tr>
							<form name="myForm">
								<tr ng-repeat="insc in inscripciones">
									<td>{{insc.club.nombre}}</td>
									<td><p ng-repeat="dep in insc.ownDeportistaList">{{dep.ape1}}
											{{dep.ape2}}, {{dep.nombre}}</p></td>
									<td>{{insc.competicion.nombre}}</td>
									<td>{{insc.especialidad.descripcion}}</td>
									<td>{{insc.categoria.nombre}}</td>
									<td>{{insc.dorsal}}</td>
									<td>{{insc.tipoejercicio.descripcion}}</td>
									<td name="fila"><input type="checkbox" value="{{insc.id}}"
										name="inscripcion"></td>
								</tr>
							</form>
						</table>


					</div>
				</div>
				<!-- botones -->

				<div class="col-md-1">
					<div class="form-group">
						<br /> <br /> <br />
						<button type="button" class="btn btn-primary"
							ng-click="rotacionesSeleccionados();">Crear rotación</button>
						<br /> <br /> <input type="button" class="btn btn-primary"
							ng-click="borrarSeleccionados();" value="Borrar">

					</div>

				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div >
			<div class="col-md-12">
				<h3>Rotaciones</h3>
				<!--        inscripciones-->

				<div class="col-md-11">
					<div class="form-group">

						<table class="table">
							<thead>
								<tr>
									<th>Orden</th>
									<th>Deportista</th>
									<th>Especialidad</th>
									<th>Categoria</th>
									<th>Dorsal</th>
									<th>Tipo de ejercicio</th>
									<th>¿Borrar?</th>
								</tr>
							</thead>
							<tbody>
								<tr ng-repeat="rot in rotaciones">
									<td>{{rot.orden}}</td>
									<td><p ng-repeat="dep in rot.ownDeportistaList">{{dep.ape1}}
											{{dep.ape2}}, {{dep.nombre}}</p></td>
									<td>{{rot.especialidad.descripcion}}</td>
									<td>{{rot.categoria.nombre}}</td>
									<td>{{rot.dorsal}}</td>
									<td>{{rot.tipoejercicio.descripcion}}</td>
									<td><button class="btn btn-remove" ng-click="borrarRotacion(rot.id);">
											<span class="glyphicon glyphicon-remove"></span>
										</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$( "table tbody" ).sortable( {
		update: function( event, ui ) {
	    $(this).children().each(function(index) {
				$(this).find('td').first().html(index + 1)
	    });
	  }
	});

</script>



