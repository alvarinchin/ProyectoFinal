<nav class="container navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?=base_url()?>">Administrador de competiciones</a>
    </div>
    <?php if (isset ($_COOKIE['tkn'])):?>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="<?=base_url();?>pantalla">Pantalla</a></li>
            
            
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                	
                    <li class="dropdown"><a class="dropdown-toggle"
                                            data-toggle="dropdown" href="#">Enlace<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Enlace</li>
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
                    <?php endif;?>
                </ul>
                
                
                
            </div>
        </ul>
        
    </div>
</nav>

