<div class="container">
<div class="row">
<div class="col-xs-2"></div><div class="col-xs-2"></div>
<div class="col-xs-4"><img class="img" alt="logo.PNG" src="<?=base_url()?>assets/img/logo.PNG" width="400px"></div>
</div>
<br/>
<div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-8">
<div class="form-group">
<br/>
<form action="<?= base_url() ?>login/comprobarUsuario" method="Post">
	<label for="enlace">Pincha en la casilla para entrar como invitado</label>
	<div class="checkbox">	
  	<label><input type="checkbox" name="enlace" id="enlace">Enlace</label>
	</div>
	<br/>
	<label for="login">Login</label>	
	<input type="text" name="login" id="login" class="form-control">
	<label for="password">Contraseña</label>
	<input type="password" name="password" id="password" class="form-control">
	<br/>		
	<input type="submit" class="btn btn-primary">
</form>
</div>
</div>
</div>
</div>
<script>
	window.onload = function(){
		document.getElementById("enlace").onclick = activo_Enlace;
		document.getElementById("enlace").checked="";		
	};

	function activo_Enlace(){
		document.getElementById("login").value=null;
		document.getElementById("login").disabled = document.getElementById("enlace").checked;
	}

</script>