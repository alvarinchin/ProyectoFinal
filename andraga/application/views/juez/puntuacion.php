<style>
    .selected{
        background-color: lightgrey;
    }
    
    
</style>

<div class="container">
	<h2>Puntuaciones</h2>
<div ng-controller="puntuacionCtrl">
	<div class="row">
            <div class="col-md-3">
                
               <table class="table table-resposive">
                    <thead>
                            <tr>
                                    <th>Orden</th>
                                    <th>Especialidad</th>
                                    <th>Categoria</th>
                                    <th>Dorsal</th>
                            </tr>
                    </thead>
                    <tbody>
                            <tr ng-repeat="rot in rotaciones" class="selected">
                                    <td>{{rot.orden}}</td>
                                    <td>{{rot.especialidad.descripcion}}</td>
                                    <td>{{rot.categoria.nombre}}</td>
                                    <td>{{rot.dorsal}}</td>   
                            </tr>
                    </tbody>
            </table>    
            </div>    
              <div class="col-md-9"></div>
	</div>
</div>
	
</div>