<div class="container">
	<h2>Gestor de competiciones</h2>
	<form name="form">
		<div class="row" ng-controller="inscripcionesCtrl">
			<h3>Inscripciones</h3>
			<!--        clubs-->

			<div class="col-md-2">
				<div class="form-group">
					<label>Club</label> <select size="10" class="form-control"
						ng-model="club">
						<option ng-repeat="obj in clubes" value="{{obj.id}}">{{obj.nombre}}</option>
					</select>
				</div>
			</div>

			<!--        deportistas-->
			<div class="col-md-3">
				<div class="form-group">
					<label>Deportistas</label> <input class="form-control" type="text"
						ng-model="filtro" placeholder="filtro"> <select size="8"
						class="form-control" ng-model="deportistasSelect">
						<option ng-repeat="obj in deportistas |filter:filtro"
							value="{{obj.id}}">{{obj.ape1}} {{obj.ape2}}, {{obj.nombre}}</option>
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
					<label>Especialidad</label> <select size="10" class="form-control"
						ng-model="especialidad">
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
			<!--        botones-->
			<div class="col-md-1">
				<div class="form-group">
					<br> <br> <input class="btn btn-primary" type="button"
						value="Crear inscripción" ng-click="enviar()">

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
							<th>Seleccionar/Deseleccionar todo <input type="checkbox"
								name="seleccionar" id="idSeleccion"></th>
						</tr>
						<tr ng-repeat="insc in inscripciones">
							<td>{{insc.club.nombre}}</td>
							<td><p ng-repeat="dep in insc.ownDeportistaList">{{dep.ape1}}
									{{dep.ape2}}, {{dep.nombre}}</p></td>
							<td>{{insc.competicion.nombre}}</td>
							<td>{{insc.especialidad.descripcion}}</td>
							<td>{{insc.categoria.nombre}}</td>
							<td>{{insc.dorsal}}</td>
							<td><input type="checkbox" value="{{insc.inscripcion_id}}" name="inscSel[]"></span>
							</td>
						</tr>
					</table>

				</div>
			</div>
			<!-- botones -->

			<div class="col-md-1">
				<div class="form-group">
					<br />
					<br />
					<br />
					<button type="button" class="btn btn-primary"
						onclick="deseleccionar_todo()">Crear rotación</button>
					<br />
					<br /> <input type="button" class="btn btn-primary"
						onclick="borrar()" value="Borrar">

				</div>

			</div>

		</div>
	</form>
	<div class="row" ng-controller="rotacionCtrl">
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
							<td><button class="btn btn-remove" ng-click="borrar(rot)">
									<span class="glyphicon glyphicon-remove"></span>
								</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		window.onload=function(){
		document.getElementById('idSeleccion').onchange=funcionSeleccionar;
	}

	function funcionSeleccionar(){
		if(document.getElementById('idSeleccion').checked==true){
			 for (i=0;i<document.form.elements.length;i++)
			      if(document.form.elements[i].type == "checkbox")
			         document.form.elements[i].checked=1
		}else if(document.getElementById('idSeleccion').checked==false){
			for (i=0;i<document.form.elements.length;i++)
			      if(document.form.elements[i].type == "checkbox")
			         document.form.elements[i].checked=0
		}


	}

	$( "table tbody" ).sortable( {
		update: function( event, ui ) {
	    $(this).children().each(function(index) {
				$(this).find('td').first().html(index + 1)
	    });
	  }
	});

</script>
	<script type="text/javascript"
		src="<?=base_url()?>assets/js/serialize.js"></script>
	<script type="text/javascript">

	function borrar(){		
		conector=new XMLHttpRequest();
		var datosSerializados = serialize(document.getElementById('form'));
				
		conector.open("POST",'<?=base_url()?>inscripcion/borrar',true);
		conector.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conector.send(datosSerializados);

	}
</script>

</div>