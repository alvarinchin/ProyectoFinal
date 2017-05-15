<nav class="container navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?=base_url()?>">ANDRAGA</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
			<li><a>Administrador</a></li>
			<li><a href="<?=base_url();?>/administracion">Administracion</a></li>


			<li class="dropdown"><a class="dropdown-toggle"
				data-toggle="dropdown" href="#">Gestor de competiciones<span
					class="caret"></span>
			</a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Gestor de competiciones</li>
					<li><a href="<?=base_url()?>competicion/crear">Crear</a></li>
					<li><a href="<?=base_url()?>competicion/listar">Listar</a></li>
					<li><a href="<?=base_url()?>competicion/modificar">Modificar</a></li>
					<li><a href="<?=base_url()?>competicion/borrar">Borrar</a></li>


					<!-- M�s beans y m�s acciones -->

				</ul></li>


			<li class="dropdown"><a class="dropdown-toggle"
				data-toggle="dropdown" href="#"> Puntuaciones<span class="caret"></span>
			</a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Puntuaciones</li>
					<li><a href="<?=base_url()?>puntuaciones/crear">Crear</a></li>
					<li><a href="<?=base_url()?>puntuaciones/listar">Listar</a></li>
					<li><a href="<?=base_url()?>puntuaciones/modificar">Modificar</a></li>
					<li><a href="<?=base_url()?>puntuaciones/borrar">Borrar</a></li>


					<!-- M�s beans y m�s acciones -->

				</ul></li>


			<li class="dropdown"><a class="dropdown-toggle"
				data-toggle="dropdown" href="#">Usuarios<span class="caret"></span>
			</a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Usuarios</li>
					<li><a href="<?=base_url()?>usuario/index">Gestionar usuarios</a></li>
					


					<!-- M�s beans y m�s acciones -->

				</ul></li>






			<!-- M�s men�s -->

		</ul>


	</div>
</nav>

