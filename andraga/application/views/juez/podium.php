<style>
.selected {
	background-color: lightgrey;
}

.puntuaciones {
	background: #d6eaf7;
}
</style>

<div class="container" ng-controller="podiumsCtrl">
	<div class="row podiums">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<img src="<?= base_url()?>assets/img/podiums.png"
						class="img img-rounded" width="80%">
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">
					<div>

						<div class="row">
							<div class="col-md-4">
								<!--        categoria-->
								<div class="col-md-6">
									<div class="form-group">
										<label>Categoría</label> <select size="10"
											class="form-control" ng-model="categoria">
											<option ng-repeat="obj in categorias" value="{{obj.id}}">{{obj.nombre}}</option>
										</select>
									</div>
								</div>
								<!--        especialidad-->
								<div class="col-md-6">
									<div class="form-group">
										<label>Especialidad</label> <select size="10"
											class="form-control" ng-model="especialidad">
											<option ng-repeat="obj in especialidades" value="{{obj.id}}">{{obj.descripcion}}
												: {{obj.num}}</option>
										</select>
									</div>
								</div>
							</div>
							<!--        botones-->
							<div class="col-md-2">
								<div class="col-md-12">
									<div class="form-group">
										<br> <br> <input class="btn btn-primary" type="button"
											value="Crear podium" ng-click="enviarPodium();">

									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="col-md-12">
									<div class="form-group">

										<table class="table">
											<tr>
												<th>Categoria</th>
												<th>Especialidad</th>
												<th>¿Borrar?</th>
												<th></th>
											</tr>
											<form name="myForm">


												<tr ng-repeat="pod in podiums">
													<td>{{pod.categoria.nombre}}</td>
													<td>{{pod.especialidad.descripcion}}</td>

													<td><button class="btn btn-remove"
															ng-click="borrarPodium(pod.id);">
															<span class="glyphicon glyphicon-remove"></span>
														</button></td>
													<td name="fila"><input type="radio" value="{{pod.id}}"
														name="podium"></td>
												</tr>


											</form>
										</table>


									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<div class="col-md-12">
									<br /> <br /> <br />
									<button type="button" class="btn btn-primary"
										ng-click="podiumSeleccionado();">
										Mostrar <br />rotaciones
									</button>
								</div>
							</div>
						</div>

						<!--        inscripciones-->

						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Orden</th>
											<th>Deportista</th>
											<th>Especialidad</th>
											<th>Categoria</th>
											<th>Dorsal</th>
											<th>Tipo de ejercicio</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="rotVin in rotacionesVinculadas">
											<td>{{rot.orden}}</td>
											<td><p ng-repeat="dep in rotVin.ownDeportistaList">{{dep.ape1}}
													{{dep.ape2}}, {{dep.nombre}}</p></td>
											<td>{{rotVin.especialidad.descripcion}}</td>
											<td>{{rotVin.categoria.nombre}}</td>
											<td>{{rotVin.dorsal}}</td>
											<td>{{rotVin.tipoejercicio.descripcion}}</td>

										</tr>
									</tbody>
								</table>

							</div>
						</div>
						<!-- botones 

				<div class="col-md-1">
					<div class="form-group">
						<br /> <br /> <br />
						<button type="button" class="btn btn-primary"
							ng-click="rotacionesSeleccionados();">Crear rotación</button>
						<br /> <br /> <input type="button" class="btn btn-primary"
							ng-click="borrarSeleccionados();" value="Borrar">

					</div>

				</div>-->

					</div>
				</div>
			</div>
			<!-- 
	<div class="row">
		<div>
			<div class="col-md-12">
				<h3>Rotaciones</h3>
				        inscripciones

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
									<td><button class="btn btn-remove"
											ng-click="borrarRotacion(rot.id);">
											<span class="glyphicon glyphicon-remove"></span>
										</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>-->
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



