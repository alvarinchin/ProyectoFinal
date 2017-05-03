<script type="text/javascript"
	src="<?=base_url()?>assets/js/serialize.js"></script>
<script type="text/javascript">

	function enviar(){
		conector=new XMLHttpRequest();
		var datosSerializados = serialize(document.getElementById('formularioCrear'));
				
		conector.open("POST",'<?=base_url()?>competicion/crearPost',true);
		conector.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conector.send(datosSerializados);

		conector.onreadystatechange=function(){
			if(conector.readyState==4 && conector.status==200){
				
				document.getElementById('resultados').innerHTML= conector.responseText;
				}
			}

		
	}
</script>
<div class="container">
	<h4>Introduce los datos de la nueva competición</h4>
	<form class="form" method="post" id="formularioCrear">
		<div class="form-group">
			<label for="nombre">Nombre: </label> <input value="" type="text"
				id="nombre" name="nombre" placeholder="Nombre competición" required>

		</div>
		<div class="form-group">
			<label for="fecha">Fecha: </label> <input type="date" id="fecha" name="fecha"
				placeholder="Fecha competición" required>

		</div>
		<div class="form-group">
			<input type="button" value="Siguiente" onclick="enviar()">
		</div>

	</form>
	<div id="resultados"></div>
</div>