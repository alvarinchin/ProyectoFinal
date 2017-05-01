<nav class="container navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?=base_url()?>">ANDRAGA</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
                        <li><a
                               >Juez</a>
			</li>
			<li class="dropdown"><a class="dropdown-toggle"
				data-toggle="dropdown" href="#">Gestor de competiciones<span
					class="caret"></span>
			</a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Lenguaje programación</li>
					<li><a href="<?=base_url()?>lenguaje/crear">Crear</a></li>
					<li><a href="<?=base_url()?>lenguaje/listar">Listar</a></li>
					<li><a href="<?=base_url()?>lenguaje/modificar">Modificar</a></li>
					<li><a href="<?=base_url()?>lenguaje/borrar">Borrar</a></li>


					<!-- M�s beans y m�s acciones -->

				</ul></li>


			<li class="dropdown"><a class="dropdown-toggle"
				data-toggle="dropdown" href="#"> Puntuaciones<span class="caret"></span>
			</a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Empleado</li>
					<li><a href="<?=base_url()?>empleado/crear">Crear</a></li>
					<li><a href="<?=base_url()?>empleado/listar">Listar</a></li>
					<li><a href="<?=base_url()?>empleado/modificar">Modificar</a></li>
					<li><a href="<?=base_url()?>empleado/borrar">Borrar</a></li>


					<!-- M�s beans y m�s acciones -->

				</ul></li>









			<!-- M�s men�s -->

		</ul>


	</div>
</nav>

