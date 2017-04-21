<div class="container-fluid">
	<form action="<?= base_url()?>login/comprobarUsuario" method="post">
	<div class="row">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
			<img class="img img-circle" src="<?= base_url()?>/assets/img/logo_FM.jpg"></img>
		</div>
		<div class="col-xs-4"></div>
	</div>
	<br/>
	<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-6">
		<h3>TIPO DE USUARIO</h3>
		<small>Seleccione el usuario de acceso</small>
		<br/>		
		<div class="form-group">
		<div class="checkbox">			
			<label><input type="checkbox" name="enlace" id="enlace">Enlace</label>
		</div>		
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre" class="form-control">
		<label for="password">Contraseña</label>
		<input type="password" name="password" id="password" class="form-control">
		</div>
		<div class="col-xs-3"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-5"></div>
		<div class="col-xs-2">
			<input type="submit" value="Enviar" class="btn btn-primary">
		</div>
		<div class="col-xs-5"></div>
	</div>
	</form>
</div>
