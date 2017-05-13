<div class="container">
	<h3>Introduce los datos que quieras cambiar</h3>
	<form class="form" action="<?= base_url() ?>deportista/editarPost" method="post">
		<label>Nombre</label>
		<input type="text" name="nombre" value="<?=$body['deportista']->nombre ?> ">
		<input type="text" name="nombre" value="<?=$body['deportista']->ape1 ?> ">
		<input type="text" name="nombre" value="<?=$body['deportista']->ape2 ?> ">
		<input type="text" name="nombre" value="<?=$body['deportista']->fecha ?> ">
		<input type="hidden" name="id_deportista" value="<?=$body['deportista']->id ?> ">
		<input type="submit"> 
	</form>
</div>
