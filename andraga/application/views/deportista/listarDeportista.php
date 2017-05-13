<div class="form-group">



	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Primer apellido</th>
				<th>Segundo apellido</th>
				<th>Año de nacimiento</th>
				<th>Modificar</th>
				<th>¿Borrar?</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($body['deportistas'] as $deportista): ?>
			<tr>
				<td><?= $deportista['nombre'] ?></td>
				<td><?= $deportista['ape1'] ?></td>
				<td><?= $deportista['ape2'] ?></td>
				<td><?= $deportista['fecha']?></td>
				<td><form id="idFormedit" action="<?=base_url()?>deportista/crear"
						method="post">
						<input type="hidden" name="id_deportista" value="<?= $deportista -> id?>">
						<button
							onclick="function f() {document.getElementById('idFormEdit').submit();}">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
					</form></td>
				<td>
					<form id="idFormRemove" action="<?=base_url()?>deportista/borrarPost"
						method="post">
						<input type="hidden" name="id_deportista" value="<?= $deportista -> id?>">
						<input type="hidden" name="v" value="listarTodos">
						<button
							onclick="function f() {document.getElementById('idFormRemove').submit();}">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</form>
				</td>

			</tr>
<?php endforeach;?>
		</tbody>
	</table>
</div>