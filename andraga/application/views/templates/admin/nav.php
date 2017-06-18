<?php
$uri = parse_url ( $_SERVER ['REQUEST_URI'], PHP_URL_PATH );
$segmentos = explode ( '/', $uri );
$controller = $segmentos [3];
?>
<nav class="container navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?=base_url()?>">Administrador de
			competiciones</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
			<li><a href="<?=base_url();?>administrador"><?php if($controller == 'administrador'):?><span
					style="color: white">Administración</span><?php else:?>Administración<?php endif;?></a></li>


			<li class="dropdown"><a class="dropdown-toggle"
				data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php if($controller == 'usuario'):?><span
					style="color: white">Usuarios</span><?php else:?>Usuarios<?php endif;?><span
					class="caret"></span> </a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Usuarios</li>
					<li><a href="<?=base_url()?>usuario/index">Gestionar usuarios</a></li>



					<!-- M�s beans y m�s acciones -->

				</ul></li>




			<!-- M�s men�s -->

		</ul>
		<ul class="nav navbar-nav navbar-right">
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#">Administrador<span class="caret"></span>
					</a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Administrador</li>
							<li>
								<form class="form" action="<?= base_url()?>acceso/logout"
									method="post" id="formulario">
									<div class="form-group">
										<input class="form-control" type="submit" value="Logout">
									</div>
								</form>
							</li>

							<!-- M�s beans y m�s acciones -->

						</ul></li>

				</ul>



			</div>
		</ul>


	</div>
</nav>

