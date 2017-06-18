<?php 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segmentos = explode('/', $uri);
$controller = $segmentos[3];
?>
<nav class="container navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?=base_url()?>">Administrador de
			competiciones</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">

			<li class="dropdown"><a href="<?=base_url();?>gestion"><?php if($controller == 'gestion'):?><span style="color:white">Gestor de competiciones</span><?php else:?>Gestor de competiciones<?php endif;?></a>
			
			<li class="dropdown"><a href="<?=base_url();?>puntuaciones"><?php if($controller == 'puntuaciones'):?><span style="color:white">Puntuaciones</span><?php else:?>Puntuaciones<?php endif;?></a> 
			<li class="dropdown"><a href="<?=base_url();?>podiums"><?php if($controller == 'podiums'):?><span style="color:white">Podiums</span><?php else:?>Podiums<?php endif;?></a> <!-- M�s men�s -->
			
			
		
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a class="dropdown-toggle"
						data-toggle="dropdown" href="#">Juez<span class="caret"></span>
					</a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Juez</li>
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

