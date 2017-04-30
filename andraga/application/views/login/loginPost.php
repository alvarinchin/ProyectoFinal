<div class="container">
	<div class="row">
		<div class="col-xs-4"></div>
		<div class="col-xs-4">
			<form action="<?=base_url()?>Administracion/index">
			<H4>USUARIO LOGEADO CON ÉXITO</H4>
			<small>Bienvenido, <?= isset($login)?$login:null ?></small><br/>
			<input type="submit" value="Continuar" class="btn btn-primary">
			</form>
		</div>
	</div>
</div>
