<script type="text/javascript"
	src="<?=base_url()?>assets/js/serialize.js"></script>
<script type="text/javascript">

	function enviar(){
		conector=new XMLHttpRequest();
		var datosSerializados = serialize(document.getElementById('formularioCrear'));
				
		conector.open("POST",'<?=base_url()?>deportista/crearPost',true);
		conector.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conector.send(datosSerializados);

		conector.onreadystatechange=function(){
			if(conector.readyState==4 && conector.status==200){
				
				document.getElementById('resultados').innerHTML= conector.responseText;
				}
			}

		
	}

	function listar(){
		conector=new XMLHttpRequest();
		var datosSerializados = serialize(document.getElementById('formularioCrear'));
				
		conector.open("POST",'<?=base_url()?>deportista/listarAjaxPost',true);
		conector.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conector.send(null);

		conector.onreadystatechange=function(){
			if(conector.readyState==4 && conector.status==200){
				
				document.getElementById('resultados').innerHTML= conector.responseText;
				}
			}

		}
</script>
<div class="container">
	<form class="form" method="post" id="formularioCrear">
	<?php foreach ($body['deportistas'] as $deportista): ?>
		<div class="col-md-6">
			<h4>Introduce los datos del nuevo deportista</h4>

			<div class="form-group">
				<label for="nombre">Nombre: </label> <input type="text" id="nombre"
					name="nombre" placeholder="Nombre" value="<?= $deportista['nombre'] ?>" required>

			</div>
			<div class="form-group">
				<label for="nombre">Primer apellido: </label> <input type="text"
					id="nombre" name="ape1" placeholder="Primer apellido"  value="<?= $deportista['ape1'] ?>" required>

			</div>

			<div class="form-group">
				<label for="nombre">Segundo apellido: </label> <input type="text"
					id="nombre" name="ape2" placeholder="Segundo apellido"  value="<?= $deportista['ape2'] ?>" required>

			</div>


			<div class="form-group">
				<label for="fecha">Fecha de nacimiento: </label> <input type="date"
					id="fecha" name="fecha" placeholder="Fecha de nacimiento"  value="<?= $deportista['fecha'] ?>" required>

			</div>
			<div class="form-group">
				<input type="button" value="Agregar" onclick="enviar()">
			</div>

		</div>
		<div class="col-md-6">
			<label for="idDeportista">Deportistas</label>
			<div id="resultados"></div>


		</div>
		<?php endforeach;?>
	</form>
	<script>listar();</script>
</div>