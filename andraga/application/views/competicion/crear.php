<div class="container">
	<h4>Introduce los datos de la nueva competición</h4>
	<form class="form" action="<?=base_url()?>competicion/crearPost">
		<div class="form-group">
			<label for="nombre">Nombre: </label> <input type="text"
				id="nombre" name="nombre" placeholder="Nombre competición" required>

		</div>
		<div class="form-group">
			<label for="fecha">Fecha: </label> <input type="date" id="fecha" name="fecha"
				placeholder="Fecha competición" required>

		</div>
		<div class="form-group">
			<input type="submit" value="Siguiente">
		</div>

	</form>
	<div id="resultados"></div>
</div>